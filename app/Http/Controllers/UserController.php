<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //
    public function index(){
        return view('admin.user.index');
    }
    public function newUser(){
        return view('admin.user.new');
    }
    public function postUser(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->picture='/metronic/theme/html/demo10/dist/assets/media/svg/avatars/007-boy-2.svg';
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->save();
        $role=Role::where('name',$request->type)->first();
        if ($role){
            $user->roles()->attach($role);
        }

        if ($request->hasFile('profile_avatar')){
            $uploadedFile = $request->file('profile_avatar');
            $filename = time().$uploadedFile->getClientOriginalName();
            $destinationPath = 'uploads';
            if ($uploadedFile->move($destinationPath,$filename)){

                $user->picture=$filename;
                $user->update();
            }



        }

        return redirect('admin/user/index');
    }
    public function checkEmail(Request $request){

        $validator=Validator::make($request->all(),['email|required|unique:users,email']);
        if ($validator->failed()){
            return response(['valid'=>false]);
        }
        return response(['valid'=>true]);

    }
    public function getUsers(){
        $users=User::select('users.id','users.name','email','users.status','address','picture','roles.name as type')
        ->join('assign_roles','users.id','=','assign_roles.user_id')
        ->join('roles','roles.id','=','assign_roles.role_id');

        return DataTables::of($users)->addColumn('is_has_image',function($user){
            if(file_exists('uploads/'.$user->picture)){
                return true;
            }
            return false;
        })->make(true);
    }
    public function editUser($id){
        $user=User::find($id);

        return view('admin.user.edit',compact('user'));

    }
    public function postEditUser(Request $request,$id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->picture = '/metronic/theme/html/demo10/dist/assets/media/svg/avatars/007-boy-2.svg';
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            $role = Role::where('name', $request->type)->first();
            if ($role) {
                $user->roles()->detach();
                $user->roles()->attach($role);
            }

            if ($request->hasFile('profile_avatar')) {
                $uploadedFile = $request->file('profile_avatar');
                $filename = time() . $uploadedFile->getClientOriginalName();
                $destinationPath = 'uploads';
                if ($uploadedFile->move($destinationPath, $filename)) {

                    $user->picture = $filename;
                    $user->update();
                }


            }

        }
        Session::flash('message','User Edited Successfully');
        return redirect('admin/user/index');
    }
    public function deleteUser($id){
        $user=User::find($id);
        if ($user){

            $user->delete();

        }
        Session::flash('message','User Deleted Successfully');
        return redirect()->back();

    }



}
