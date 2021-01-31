<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;


class LanguageController extends Controller
{
    //
    public function switchLanguage($locale){
        \Session::forget('applocale');
//        dd($locale);
        \Session::put('applocale',$locale);
        App::setLocale($locale);

        Artisan::call('view:clear');
        return redirect()->back();

    }
    public function getLocal(){
        dd(App::getLocale());
    }
}
