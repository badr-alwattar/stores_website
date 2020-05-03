<?php
use App\Category;
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

Route::get('/', function () {
    $categories = Category::all();
    return view('welcome')->with('categories', $categories);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/carts/{id}', 'CartsController@show');
Route::post('/carts/addProduct', 'CartsController@addProduct');
Route::post('/carts/removeProduct', 'CartsController@removeProduct');
Route::post('/carts/checkout', 'CartsController@checkout');
Route::post('/carts/deleteProduct', 'CartsController@deleteProduct');

Route::get('/orders/show', 'OrdersController@show');
Route::get('/orders/{id}/all', 'OrdersController@all');
Route::post('/orders/addProduct', 'OrdersController@addProduct');
Route::post('/orders/removeProduct', 'OrdersController@removeProduct');
Route::post('/orders/deleteProduct', 'OrdersController@deleteProduct');
Route::post('/orders/confirm', 'OrdersController@confirm');
Route::post('/orders/cancel', 'OrdersController@cancel');
Route::get('/orders/delivery', 'OrdersController@delivery');


Route::get('/users/{id}/edit', 'UsersController@edit');
Route::post('/users/update', 'UsersController@update');

Route::resource('/products', 'ProductsController');
Route::resource('/stores', 'StoresController');
