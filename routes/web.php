<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', 'testController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Route::get('/challan', 'TestController@challan')->name('challan');
Route::get('/delete_challan', 'TestController@delete_challan')->name('delete_challan');

Route::get('/generate_challan', 'TestController@generate_challan')->name('generate_challan');

Route::post('/create_challan', 'TestController@create_challan')->name('create_challan');
Route::get('/consession', 'TestController@consession')->name('consession');

Route::get('/zoom', 'ZoomController@zoom')->name('zoom');
