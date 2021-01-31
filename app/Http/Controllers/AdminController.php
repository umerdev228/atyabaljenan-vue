<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function getStatics(){
        $yesterday=Carbon::yesterday();
        $today=Carbon::today();
        $totalCustomer=Customer::all()->count();
        $todayOrders=Order::whereBetween('created_at',[$yesterday->addHours(23)->toDateTimeString(),$today->addHours(23)->toDateTimeString()])->count();
        $todaySales=Order::whereBetween('created_at',[$yesterday->toDateTimeString(),$today->toDateTimeString()])->sum('total');
        $pendingOrder=Order::whereNull('status_id')->count();
        $setting=Setting::first();
        return response(['customer'=>$totalCustomer,
            'todayorders'=>$todayOrders,
            'pendings'=>$pendingOrder,
            'sales'=>$setting->currency_symblo.' '.$todaySales
        ]);

        }
        public function saleReport(){
        return view('admin.report.sales');
        }

}
