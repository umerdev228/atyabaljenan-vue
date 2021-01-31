<?php

use App\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Session::updateCurrent();

Route::get('/', function () {
    return view('frontend.layout.home');
});

Route::get('active/users', function (Illuminate\Http\Request $request) {
    $limit = 10;
    $lastActivity = strtotime(Carbon::now()->subMinutes($limit));
    $sess = Session::where('last_activity', '>=',  $lastActivity)->get();
    return response(['active' => count($sess)]);
});

//Route::group(['prefix' => '/','middleware'=>'language'],function (){
//    Route::get('/', 'ClientController@categories');
//});

Route::group(['prefix' => 'admin' ,'middleware'=>['role','language']], function () {
        Route::get('/','AdminController@index');
        Route::get('getstatics','AdminController@getStatics');
        Route::get('payments','SettingController@payment');
        Route::post('savebookey','SettingController@saveBookey');
        Route::get('dashboard','AdminController@index');
        Route::get('salereport','AdminController@saleReport');

        Route::group(['prefix' => 'product'], function () {
        //categories
        Route::get('category', 'ProductController@category');
        Route::get('getCategories', 'ProductController@getCategories');
        Route::post('dtCategories', 'ProductController@dtCategories');

        //products
        Route::get('product', 'ProductController@product');
        Route::get('getProduct', 'ProductController@getProduct');
        Route::get('getCategoriesForSelect2', 'ProductController@getCategoriesForSelect2');
        Route::post('dtProducts', 'ProductController@dtProducts');

        //variants
        Route::get('variant', 'ProductController@variant');
        Route::get('getVariants', 'ProductController@getVariants');
        Route::get('getProductsForSelect2', 'ProductController@getProductsForSelect2');
        Route::get('getVariantHeadsForSelect2', 'ProductController@getVariantHeadsForSelect2');
        Route::post('dtVariants', 'ProductController@dtVariants');

        //Variant Heads
        Route::get('getVariantHeads','ProductController@getVariantHeads');
        Route::post('dtVariantHeads','ProductController@dtVariantHeads');

        //add-ons
        Route::get('addon', 'ProductController@addon');
        Route::get('getAddOns', 'ProductController@getAddOns');
        Route::post('dtAddOns', 'ProductController@dtAddOns');
        Route::get('getAddOnnHeadsForSelect2', 'ProductController@getAddOnnHeadsForSelect2');

        //Add-on Heads
        Route::get('getAddOntHeads','ProductController@getAddOntHeads');
        Route::post('dtAddOnHeads','ProductController@dtAddOnHeads');

    });

    Route::group(['prefix' => 'areas'],function (){
        //governments
        Route::get('governments', 'AreaController@governments');
        Route::get('getGovernments', 'AreaController@getGovernments');
        Route::post('dtGovernments', 'AreaController@dtGovernments');


        //areas
        Route::get('areas', 'AreaController@areas');
        Route::get('getAreas', 'AreaController@getAreas');
        Route::post('dtAreas', 'AreaController@dtAreas');
        Route::get('getGovernmentsForSelect2', 'AreaController@getGovernmentsForSelect2');
    });

    Route::group(['prefix' => 'setting'],function (){
        Route::get('/','SettingController@index');
        Route::post('postsettings','SettingController@postSetting');

        Route::get('scheduleSettings','SettingController@scheduleSettings');
        Route::get('getSchedule','SettingController@getSchedule');
        Route::get('editSchedule','SettingController@editSchedule');
        Route::post('postNewSchedule','SettingController@postNewSchedule');
        Route::post('postEditSchedule','SettingController@postEditSchedule');
        Route::post('editsechdual','SettingController@editSechdual');
    });
    Route::group(['prefix' => 'promo_code'],function (){
        Route::get('/','PromoCodeController@index');
        Route::get('getPromoCodes', 'PromoCodeController@getPromoCodes');
        Route::post('dtPromoCodes', 'PromoCodeController@dtPromoCodes');
    });

    Route::group(['prefix' => 'user'],function (){
//        Route::get('/','');
        Route::get('/new','UserController@newUser');
        Route::post('/postuser','UserController@postUser');
        Route::get('/index','UserController@index');
        Route::get('/getusers','UserController@getUsers');
        Route::get('edituser/{id}','UserController@editUser');
        Route::post('postedituser/{id}','UserController@postEditUser');
        Route::get('deleteuser/{id}','UserController@deleteUser');

    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('/','OrderController@index');
        Route::get('/getorders','OrderController@getOrder');
        Route::get('/statusupdate','OrderController@statusUpdate');
        Route::get('/details/{id}','OrderController@details');
        Route::get('/deleteorder','OrderController@deleteorder');
        Route::get('/getsales','OrderController@getSales');

    });

});

Route::group(['prefix'=>'client', 'middleware'=>'language'],function (){
   Route::get('getProducts','ClientController@getProducts');
   Route::get('searchproducts','ClientController@searchProducts');
   Route::get('productdetail/{id}','ClientController@productDetail');
   Route::get('selectarea','ClientController@selectArea');
   Route::get('availabilityTime','ClientController@availabilityTime');
   Route::get('areaselection/{id}','ClientController@areaSelection');
   Route::get('revieworder','ClientController@reviewOrder');
   Route::get('checkout','ClientController@checkout');
   Route::get('contactinfo','ClientController@contactInfo');
   Route::get('addnameaddres','ClientController@addnameandemail');
   Route::get('contactaddress','ClientController@contactaddress');
   Route::get('addpromocode','ClientController@addPromoCode');

   Route::get('addressinfo','ClientController@addressinfo');
   Route::get('saveorder','ClientController@saveOrder');
   Route::get('storepaymenttype','ClientController@storepaymenttype');
   Route::get('order_placed','ClientController@order_placed');
   Route::get('select-map','ClientController@selectMap');
   Route::get('view-receipt/{order_id}','ClientController@orderStatus');
   Route::get('order-lookup','ClientController@order_lookup');
   Route::get('get-orders','ClientController@getOrders');
   Route::get('saveMapAddress','ClientController@saveMapAddress');
   Route::get('addschedual','ClientController@updateSchedual');
   Route::get('forget-schedual','ClientController@forgetSchedual');

    Route::get('remove-item/{id}','ClientController@removeItem');

    Route::get('categories','ClientController@categories');
    Route::get('cat-products/{id}','ClientController@catProducts');

    Route::get('switch-currency/{currency}','ClientController@switchCurrency');



});

Route::get('lang/{locale}','LanguageController@switchLanguage');
Route::get('getlocal','LanguageController@getLocal')->middleware('language');

Route::get('addcart','ClientController@addCart');
Route::get('/addcartaddon','ClientController@addCartAddon');
Route::get('/removecartaddon/{id}','ClientController@removeCartAddon');
Route::get('/remove-varient/{id}','ClientController@removeVarient');


Route::get('addcartvariant','ClientController@addCartVariant');


Route::get('forgetcart','ClientController@forgetCart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('newuseremail','UserController@checkEmail');

Route::get('payment-test','FatoorahController@index');


Route::get('home', function (){
    return view('design.home');
});

//CART
Route::post('store-cart', 'CartController@store')->name('cart.store');
Route::post('get-store-cart', 'CartController@getCart')->name('get.cart');
Route::get('get-all-cart', 'CartController@getAllCart')->name('get.all.cart');
