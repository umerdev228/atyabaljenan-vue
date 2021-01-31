<?php

namespace App\Http\Controllers;

use App\Area;
use App\DataTables\AreaDataTableEditor;
use App\DataTables\GovernmentDataTableEditor;
use App\Government;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    //governments
    public function governments(){
        return view('admin.areas.governments');
    }
    public function getGovernments(){
        $data=Government::select('id','name','name_ar','delivery_charges')->get();
        try {
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){

        }
    }
    public function dtGovernments(GovernmentDataTableEditor $editor){
        return $editor->process(\request());
    }


    //areas
    public function areas(){
        return view('admin.areas.areas');
    }
    public function getAreas(){
        $data=Area::select('areas.id','delivery_time','areas.name','areas.name_ar','areas.delivery_charges','governments.name as government')
            ->leftJoin('governments','governments.id','=','areas.government_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){

        }
    }
    public function dtAreas(AreaDataTableEditor $editor){
        return $editor->process(\request());
    }
    public function getGovernmentsForSelect2(Request $request){
        $data=Government::all();
        return response(['dat'=>$data]);
    }

    public function getAllAreas() {
        $governments = Government::with('areas')->get();
        return response()->json([
            'type' => 'success',
            'message' => 'Got Areas Successfully',
            'governments' => $governments
        ]);
    }

    public function storeArea(Request $request) {
        $area = Area::where('id', $request['id'])->first();
        Session::put('Selected_Area', $request['id']);
        $area_id = Session::get('Selected_Area');
        return response()->json([
            'type' => 'success',
            'area' => $area->name,
            'message' => 'Area Updated Successfully'
        ]);
    }

    public function getStoreArea() {
        $area_id = Session::get('Selected_Area');
        if ($area_id) {
            $area = Area::where('id', $area_id)->first();
            $type = 'success';
            $message = 'Selected Area Got Successfully';
        }
        else {
            $area = null;
            $type = 'error';
            $message = 'No Area Selected';
        }
        return response()->json([
            'type' => $type,
            'message' => $message,
            'area' => $area,
        ]);
    }
}
