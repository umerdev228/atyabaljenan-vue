<?php

namespace App\Http\Controllers;

use App\BookeySetting;
use App\DoctorSchedule;
use App\OpeningHours;
use App\Schedule;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class SettingController extends Controller
{
    protected $uploadDir = '/images/upload/';

    protected $imageWidth = 200;
    //
    public function index(){
        $setting=Setting::first();
        return view('admin.setting.index',compact('setting'));
    }
    public function getSetting() {
        $setting = Setting::first();
        return response()->json([
            'type' => 'success',
            'settings' => $setting,
        ]);
    }
    public function postSetting(Request $request){
        $setting=Setting::first();
        $logoPath='';
        $backgroundPath='';
        $faviconPath='';
        if ($request->hasFile('logo')){
            $this->uploadDir='images/upload/logo';
            $type = $request->input('logo');
            $dir  = $this->uploadDir . $type;
            $this->imageWidth=240;

            $uploadedFile = $request->file('logo');
            $filename     = time() . '.png';

            $uploadedFile->move(public_path($dir), $filename);

            $method = 'optimize' . Str::title($type);
            if (method_exists($this, $method)) {
                $id = $this->{$method}($dir, $filename);
            } else {
                $id = $this->optimize($dir, $filename);
            }
            $logoPath=$id;
        }
        if ($request->hasFile('background_image')){
            $this->uploadDir='images/images/background';
            $type = $request->input('background_image');
            $dir  = $this->uploadDir . $type;
            $this->imageWidth=800;

            $uploadedFile = $request->file('background_image');
            $filename     = time() . '.png';

            $uploadedFile->move(public_path($dir), $filename);

            $method = 'optimize' . Str::title($type);
            if (method_exists($this, $method)) {
                $id = $this->{$method}($dir, $filename);
            } else {
                $id = $this->optimize($dir, $filename);
            }
            $backgroundPath=$id;
        }

        if ($request->hasFile('favicone')){
            $this->uploadDir='images/upload/favicon';
            $type = $request->input('favicone');
            $dir  = $this->uploadDir . $type;
            $this->imageWidth=50;
            $uploadedFile = $request->file('favicone');
            $filename     = time() . '.png';

            $uploadedFile->move(public_path($dir), $filename);

            $method = 'optimize' . Str::title($type);
            if (method_exists($this, $method)) {
                $id = $this->{$method}($dir, $filename);
            } else {
                $id = $this->optimize($dir, $filename);
            }
            $faviconPath=$id;
        }



        if ($setting){

            $updateSetting=Setting::find($setting->id);
            $updateSetting->site_name=$request->site_name;
            $updateSetting->site_name_ar=$request->site_name_ar;
            $updateSetting->site_description=$request->site_description;
            $updateSetting->site_description_ar=$request->site_description_ar;
            $updateSetting->site_description_ar=$request->site_description_ar;
            $updateSetting->currency=$request->currency;
            $updateSetting->currency_symbol=$request->currency_symbol;
            $updateSetting->delivery_info=$request->delivery_info;
            $updateSetting->delivery_info_ar=$request->delivery_info_ar;
            $updateSetting->restaurant_address=$request->restaurant_address;
            $updateSetting->restaurant_address_ar=$request->restaurant_address_ar;
            $updateSetting->open_from=date('H:i:s',strtotime($request->opening_time));
            $updateSetting->open_to=date('H:i:s',strtotime($request->closing_time));
            $updateSetting->button_color=$request->button_color;
            $updateSetting->background_color=$request->background_color;
            $updateSetting->category_color=$request->category_color;
            $updateSetting->time_zone=$request->time_zone;
            config(['app.timezone' => $request->time_zone]);
            if ($logoPath!='') {
                $updateSetting->logo = $logoPath;
            }
            if ($backgroundPath!=''){
                $updateSetting->background=$backgroundPath;
            }
            if ($faviconPath!=''){
                $updateSetting->favicon=$faviconPath;
            }
            $updateSetting->min_order=$request->min_order;
            $updateSetting->take_order=$request->take_order;
            $updateSetting->update();
        }else{
            $newSetting=new Setting();
            $newSetting->site_name=$request->site_name;
            $newSetting->site_name_ar=$request->site_name_ar;
            $newSetting->site_description=$request->site_description;
            $newSetting->site_description_ar=$request->site_description_ar;
            $newSetting->site_description_ar=$request->site_description_ar;
            $newSetting->currency=$request->currency;
            $newSetting->currency_symbol=$request->currency_symbol;
            $newSetting->delivery_info=$request->delivery_info;
            $newSetting->delivery_info_ar=$request->delivery_info_ar;
            $newSetting->restaurant_address=$request->restaurant_address;
            $newSetting->restaurant_address_ar=$request->restaurant_address_ar;
            $newSetting->open_from=date('H:i:s',strtotime($request->opening_time));
            $newSetting->open_to=date('H:i:s',strtotime($request->closing_time));
            $newSetting->button_color=$request->button_color;
            $newSetting->background_color=$request->background_color;
            $newSetting->category_color=$request->category_color;
            $newSetting->time_zone=$request->time_zone;
            $newSetting->min_order=$request->min_order;
            $newSetting->take_order=$request->take_order;
            config(['app.timezone' => $request->time_zone]);
            if ($logoPath!='') {
                $newSetting->logo = $logoPath;
            }
            if ($backgroundPath!=''){
                $newSetting->background=$backgroundPath;
            }
            if ($faviconPath!=''){
                $newSetting->favicon=$faviconPath;
            }
            $newSetting->save();



        }

        Session::flash('msg','Setting Updated Successfully');

        return redirect()->back();


    }

    protected function optimize($dir, $filename)
    {
        $path = public_path($dir . '/' . $filename);

        Image::load($path)
            ->width($this->imageWidth)
            ->format(Manipulations::FORMAT_PNG)
            ->optimize()
            ->save();

        return $dir . '/' . $filename;
    }
    public function payment(){
        $setting=BookeySetting::first();
        return view('admin.payment.index',compact('setting'));
    }
    public function saveBookey(Request $request){

        $setting=BookeySetting::first();
        if ($setting){
            $setting->secrete=$request->secrete;
            $setting->mid=$request->mid;
            $setting->status=$request->status;
            $setting->update();

        }else{
            $newSetting=new BookeySetting();
            $newSetting->secrete=$request->secrete;
            $newSetting->mid=$request->mid;
            $newSetting->status=$request->status;
            $newSetting->save();
        }
        Session::flash('message','Setting Saved Successfully...');
        return redirect()->back();


    }
    public function scheduleSettings(){
        return view('admin.setting.schedule.schedule');
    }
    public function getSchedule(){
        $data=array();
        $events=Schedule::all();

        $data=$events->map(function($item, $key) {
            $temp['id']=$item['id'];
            $temp['title']=$item['title'];
            $temp['start']=$item['start_date_time'];
            $temp['description']=$item['description'];
            $temp['end']=$item['end_date_time'];
            $temp['className']=$item['event_classes'];
            $temp['allDay']=true;
            return $temp;
        });
        return response($data);
    }
    public function postNewSchedule(Request $request){
        $date = explode(' - ', $request->date);
        $newevent=new Schedule();
        $newevent->title=$request->name;
        $newevent->description=$request->description;
        $newevent->start_date_time=date('Y-m-d H:i:s',strtotime($date[0]));
        $newevent->end_date_time=date('Y-m-d H:i:s',strtotime($date[1]));
        $newevent->event_classes='fc-event-primary';
        $newevent->save();
        return response(['success']);
    }
    public function editSechdual(Request $request){
        $updateEvent=Schedule::find($request->id);
        $updateEvent->start_date_time=date('Y-m-d H:i:s',strtotime($request->start));
        $updateEvent->end_date_time=date('Y-m-d H:i:s',strtotime($request->end));
        $updateEvent->update();
        return response('success');
    }
    public function editSchedule(){
        $monday=Schedule::where('day','=','monday')->get()->last();
        $tuesday=Schedule::where('day','=','tuesday')->get()->last();
        $wednesday=Schedule::where('day','=','wednesday')->get()->last();
        $thursday=Schedule::where('day','=','thursday')->get()->last();
        $friday=Schedule::where('day','=','friday')->get()->last();
        $saturday=Schedule::where('day','=','saturday')->get()->last();
        $sunday=Schedule::where('day','=','sunday')->get()->last();

        $monday_times=OpeningHours::where('schedule_id','=',$monday->id)->get();
        $tuesday_times=OpeningHours::where('schedule_id','=',$tuesday->id)->get();
        $wednesday_times=OpeningHours::where('schedule_id','=',$wednesday->id)->get();
        $thursday_times=OpeningHours::where('schedule_id','=',$thursday->id)->get();
        $friday_times=OpeningHours::where('schedule_id','=',$friday->id)->get();
        $saturday_times=OpeningHours::where('schedule_id','=',$saturday->id)->get();
        $sunday_times=OpeningHours::where('schedule_id','=',$sunday->id)->get();


        return view('admin.setting.schedule.edit_schedule',
        compact('monday','tuesday','wednesday','thursday','friday','saturday','sunday',
            'monday_times','tuesday_times','wednesday_times','thursday_times','friday_times','saturday_times','sunday_times'));
    }
    public function postEditSchedule(Request $request){
        $monday=Schedule::where('day','monday')->get()->last();
//        return response(gettype($request->monday_status));
        if ($request->monday_status == "true"){
            $monday->status="on";
        }else{
            $monday->status="off";
        }
        $monday->update();

        $tuesday=Schedule::where('day','tuesday')->get()->last();
        if ($request->tuesday_status == "true"){
            $tuesday->status="on";
        }else{
            $tuesday->status="off";
        }
        $tuesday->update();

        $wednesday=Schedule::where('day','wednesday')->get()->last();
        if ($request->wednesday_status == "true"){
            $wednesday->status="on";
        }else{
            $wednesday->status="off";
        }
        $wednesday->update();

        $thursday=Schedule::where('day','thursday')->get()->last();
        if ($request->thursday_status == "true"){
            $thursday->status="on";
        }else{
            $thursday->status="off";
        }
        $thursday->update();

        $friday=Schedule::where('day','friday')->get()->last();
        if ($request->friday_status == "true"){
            $friday->status="on";
        }else{
            $friday->status="off";
        }
        $friday->update();

        $saturday=Schedule::where('day','saturday')->get()->last();
        if ($request->saturday_status == "true"){
            $saturday->status="on";
        }else{
            $saturday->status="off";
        }
        $saturday->update();

        $sunday=Schedule::where('day','sunday')->get()->last();
        if ($request->sunday_status == "true"){
            $sunday->status="on";
        }else{
            $sunday->status="off";
        }
        $sunday->update();

        $monday_opening_hours=OpeningHours::where('schedule_id','=',$monday->id)->get();
        foreach($monday_opening_hours as $monday_opening_hour){
            $monday_opening_hour->delete();
        }
        $tuesday_opening_hours=OpeningHours::where('schedule_id','=',$tuesday->id)->get();
        foreach($tuesday_opening_hours as $tuesday_opening_hour){
            $tuesday_opening_hour->delete();
        }
        $wednesday_opening_hours=OpeningHours::where('schedule_id','=',$wednesday->id)->get();
        foreach($wednesday_opening_hours as $wednesday_opening_hour){
            $wednesday_opening_hour->delete();
        }
        $thursday_opening_hours=OpeningHours::where('schedule_id','=',$thursday->id)->get();
        foreach($thursday_opening_hours as $thursday_opening_hour){
            $thursday_opening_hour->delete();
        }
        $friday_opening_hours=OpeningHours::where('schedule_id','=',$friday->id)->get();
        foreach($friday_opening_hours as $friday_opening_hour){
            $friday_opening_hour->delete();
        }
        $saturday_opening_hours=OpeningHours::where('schedule_id','=',$saturday->id)->get();
        foreach($saturday_opening_hours as $saturday_opening_hour){
            $saturday_opening_hour->delete();
        }
        $sunday_opening_hours=OpeningHours::where('schedule_id','=',$sunday->id)->get();
        foreach($sunday_opening_hours as $sunday_opening_hour){
            $sunday_opening_hour->delete();
        }
        foreach ($request->monday_from as $new_monday_from){
            $insert_monday_from=new OpeningHours();
            $insert_monday_from->schedule_id=$monday->id;
            $insert_monday_from->start_time=$new_monday_from;
            $insert_monday_from->save();
        }
        foreach ($request->monday_to as $new_monday_to){
            $insert_monday_to=OpeningHours::where('schedule_id','=',$monday->id)->whereNull('end_time')->get()->first();
            $insert_monday_to->schedule_id=$monday->id;
            $insert_monday_to->end_time=$new_monday_to;
            $insert_monday_to->update();
        }

        foreach ($request->tuesday_from as $new_tuesday_from){
            $insert_tuesday_from=new OpeningHours();
            $insert_tuesday_from->schedule_id=$tuesday->id;
            $insert_tuesday_from->start_time=$new_tuesday_from;
            $insert_tuesday_from->save();
        }
        foreach ($request->tuesday_to as $new_tuesday_to){
            $insert_tuesday_to=OpeningHours::where('schedule_id','=',$tuesday->id)->whereNull('end_time')->get()->first();
            $insert_tuesday_to->schedule_id=$tuesday->id;
            $insert_tuesday_to->end_time=$new_tuesday_to;
            $insert_tuesday_to->update();
        }

        foreach ($request->wednesday_from as $new_wednesday_from){
            $insert_wednesday_from=new OpeningHours();
            $insert_wednesday_from->schedule_id=$wednesday->id;
            $insert_wednesday_from->start_time=$new_wednesday_from;
            $insert_wednesday_from->save();
        }
        foreach ($request->wednesday_to as $new_wednesday_to){
            $insert_wednesday_to=OpeningHours::where('schedule_id','=',$wednesday->id)->whereNull('end_time')->get()->first();
            $insert_wednesday_to->schedule_id=$wednesday->id;
            $insert_wednesday_to->end_time=$new_wednesday_to;
            $insert_wednesday_to->update();
        }

        foreach ($request->thursday_from as $new_thursday_from){
            $insert_thursday_from=new OpeningHours();
            $insert_thursday_from->schedule_id=$thursday->id;
            $insert_thursday_from->start_time=$new_thursday_from;
            $insert_thursday_from->save();
        }
        foreach ($request->thursday_to as $new_thursday_to){
            $insert_thursday_to=OpeningHours::where('schedule_id','=',$thursday->id)->whereNull('end_time')->get()->first();
            $insert_thursday_to->schedule_id=$thursday->id;
            $insert_thursday_to->end_time=$new_thursday_to;
            $insert_thursday_to->update();
        }

        foreach ($request->friday_from as $new_friday_from){
            $insert_friday_from=new OpeningHours();
            $insert_friday_from->schedule_id=$friday->id;
            $insert_friday_from->start_time=$new_friday_from;
            $insert_friday_from->save();
        }
        foreach ($request->friday_to as $new_friday_to){
            $insert_friday_to=OpeningHours::where('schedule_id','=',$friday->id)->whereNull('end_time')->get()->first();
            $insert_friday_to->schedule_id=$friday->id;
            $insert_friday_to->end_time=$new_friday_to;
            $insert_friday_to->update();
        }

        foreach ($request->saturday_from as $new_saturday_from){
            $insert_saturday_from=new OpeningHours();
            $insert_saturday_from->schedule_id=$saturday->id;
            $insert_saturday_from->start_time=$new_saturday_from;
            $insert_saturday_from->save();
        }
        foreach ($request->saturday_to as $new_saturday_to){
            $insert_saturday_to=OpeningHours::where('schedule_id','=',$saturday->id)->whereNull('end_time')->get()->first();
            $insert_saturday_to->schedule_id=$saturday->id;
            $insert_saturday_to->end_time=$new_saturday_to;
            $insert_saturday_to->update();
        }

        foreach ($request->sunday_from as $new_sunday_from){
            $insert_sunday_from=new OpeningHours();
            $insert_sunday_from->schedule_id=$sunday->id;
            $insert_sunday_from->start_time=$new_sunday_from;
            $insert_sunday_from->save();
        }
        foreach ($request->sunday_to as $new_sunday_to){
            $insert_sunday_to=OpeningHours::where('schedule_id','=',$sunday->id)->whereNull('end_time')->get()->first();
            $insert_sunday_to->schedule_id=$sunday->id;
            $insert_sunday_to->end_time=$new_sunday_to;
            $insert_sunday_to->update();
        }
        return response('success');
    }



}
