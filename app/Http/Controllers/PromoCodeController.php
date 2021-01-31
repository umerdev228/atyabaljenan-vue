<?php

namespace App\Http\Controllers;

use App\Area;
use App\DataTables\PromoCodeDataTableEditor;
use App\PromoCode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PromoCodeController extends Controller
{
    public function index(){
        return view('admin.promo_code.promo_code');
    }
    public function getPromoCodes(){
        $data=PromoCode::select('id','code','type','description','status','description_ar','percentage','amount','active_until','limited_usage','customer_usage')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        }catch (\Exception $e){

        }
    }
    public function dtPromoCodes(PromoCodeDataTableEditor $editor){
        return $editor->process(\request());
    }
}
