<?php

namespace App\Providers;


use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {



        //

        }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Kuwait');

        foreach (glob(app_path().'/Helpers/*.php') as $filename){
            require_once($filename);
        }
        //
        if($this->app->environment('prod')) {
            \URL::forceScheme('https');
        }
        $myLang=null;
        View::composer('*', function($view) use ($myLang)
        {
            $lang = (session()->get('applocale')) ? session()->get('applocale') : null;

            Blade::directive('category', function ($category) use ($lang){

                if ($lang=='ar'){
                    return "<?php echo ($category)->category_ar ?>";
                }
                return "<?php echo ($category)->category ?>";

            });


            Blade::directive('product_name', function ($product) use ($lang){
                if ($lang==='ar'){
                    return "<?php echo ($product)->name_ar ?>";
                }
                return "<?php echo ($product)->name ?>";

            });


            Blade::directive('productdesc', function ($pr) use ($lang){

                if ($lang=='ar'){
                    return "<?php echo ($pr)->description_ar ?>";
                }
                return "<?php echo ($pr)->description  ?>";

            });

            Blade::directive('variantname', function ($pr) use ($lang){

                if ($lang=='ar'){
                    return "<?php echo ($pr)->name_ar ?>";
                }
                return "<?php echo ($pr)->name  ?>";

            });

            Blade::directive('area', function ($pr) use ($lang){

                if ($lang=='ar'){
                    return "<?php echo ($pr)->name_ar; ?>";
                }
                return "<?php echo ($pr)->name;  ?>";

            });



        });
        Blade::directive('money', function ($amount){
            $setting=\App\Setting::first();
            $currency=\Session::get('currency');
            $symbol='KWD';

            if ($currency=='BD'){
                $symbol= 'BD';
            }
            if ($currency=='OMR'){
                $symbol= 'OMR';
            }
            if ($currency=='QAR'){
                $symbol= 'QAR';
            }
            if ($currency=='SAR'){
                $symbol= 'SAR';
            }
            if ($currency=='AED'){
                $symbol= 'AED';
            }

            if ($setting) {


                if ($currency==null || $currency=='KWD'){
                    $symbol= $setting->currency_symbol;
                }




                return "<?php echo '" . $symbol . " '   .  number_format($amount, 2); ?>";




            }else{

                return "<?php echo '$symbol'  . number_format($amount, 2); ?>";


            }

          //  dd($currency);
        });




    }
}
