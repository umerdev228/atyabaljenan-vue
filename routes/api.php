<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getAllCategories', 'CategoryController@getAllCategories')->name('categories.get.all');
Route::post('/getProducts', 'ProductController@getProducts')->name('products.get.by.category');
Route::post('/getProduct', 'ProductController@getProductDetails')->name('product.get.by.id');
Route::get('/getAllAreas', 'AreaController@getAllAreas')->name('areas.get.all');
Route::get('/getCart', 'CartController@index')->name('cart.get.all');
Route::post('/createCustomer', 'CustomerController@store')->name('customer.create');

/*
 * Cart
 * */
Route::post('store-cart', 'CartController@store')->name('cart.store');


/*
 *
 * Storing Data into Sessions
 *
 */
Route::post('/session/store/area', 'AreaController@storeArea')->name('session.store.area');

/*
 *
 * Get Data from Sessions
 *
 */
Route::get('/session/get/area', 'AreaController@getStoreArea')->name('session.get.area');


