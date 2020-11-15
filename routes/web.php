<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);




//================== categories ======================
Route::group(['middleware' => ['role:super-admin']], function () {
Route::get('/categories/create', 'CategotyController@create')->name('category.create');
Route::post('/categories', 'CategotyController@store')->name('category.store');
Route::GET('/categories/{category}/edit','CategotyController@edit')->name('category.edit');
Route::PUT('/categories/{category}/','CategotyController@update')->name('category.update');
Route::DELETE('/categories/{category}/delete','CategotyController@destroy')->name('category.destroy');
});
Route::group(['middleware' => 'auth'], function () {
Route::get('/categories', 'CategotyController@index')->name('category.index');
Route::get('/categories/{category}', 'CategotyController@show')->name('category.show');
});


//================= products ===============
Route::group(['middleware' => ['role:super-admin']], function () {
Route::get('/products/create', 'ProductController@create')->name('product.create')->middleware(['role:super-admin']);
Route::post('/products', 'ProductController@store')->name('product.store')->middleware(['role:super-admin']);
Route::GET('/products/{product}/edit','ProductController@edit')->name('product.edit')->middleware(['role:super-admin']);
Route::post('/products/{product}/','ProductController@update')->name('product.update')->middleware(['role:super-admin']);
Route::DELETE('/products/{product}/delete','ProductController@destroy')->name('product.destroy')->middleware(['role:super-admin']);
});
Route::group(['middleware' => ['auth']], function () {
Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');
Route::get('/attach/{product}', 'ProductController@attach')->name('attach');
Route::get('/detach/{product}', 'ProductController@detach')->name('detach');
Route::get('/shopping_cart', 'ProductController@shopping_cart')->name('shopping_cart');
});


//================= users ===============
Route::group(['middleware' => ['role:super-admin']], function () {
Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/users/create', 'UserController@create')->name('user.create');
Route::post('/users', 'UserController@store')->name('user.store');
Route::DELETE('/users/{user}/delete','UserController@destroy')->name('user.destroy');
});
Route::get('/users/{user}', 'UserController@show')->name('user.show')->middleware('auth');
Route::GET('/users/{user}/edit','UserController@edit')->name('user.edit');
Route::post('/users/{user}/','UserController@update')->name('user.update')->middleware(['auth']);








