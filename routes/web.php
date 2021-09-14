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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@showWantList');
Route::get('/sum_price', 'App\Http\Controllers\SumPriceController@showSumPrice');
// Route::get('/total_pay', 'App\Http\Controllers\TotalToPayController@showTotalPay');
Route::get('/total_pay/{month}', 'App\Http\Controllers\TotalToPayController@showTotalPay');

// Route::get('/want', 'App\Http\Controllers\WantListController@showWantList');
Route::get('/detail', 'App\Http\Controllers\DetailController@showDetailList');
Route::get('/price/{month}', 'App\Http\Controllers\SumPriceController@showTargetMonth');

// want_list
Route::post('/home', 'App\Http\Controllers\HomeController@showWantList');
Route::post('/update', 'App\Http\Controllers\HomeController@updateWantList');

Route::post('/add_want_list', 'App\Http\Controllers\HomeController@addWantList');
Route::post('/want_list_del', 'App\Http\Controllers\HomeController@delWantList');
Route::post('/want_list_edit', 'App\Http\Controllers\HomeController@editWantList');

// sum_price
Route::post('/save_price', 'App\Http\Controllers\SumPriceController@saveSumPrice');

//detail
Route::post('/add_detail', 'App\Http\Controllers\DetailController@addDetailList');
Route::post('/detail_del', 'App\Http\Controllers\DetailController@delDetailList');
Route::post('/detail_edit', 'App\Http\Controllers\DetailController@editDetailList');
Route::post('/update_detail', 'App\Http\Controllers\DetailController@updateDetailList');
Route::get('/detail/{month}', 'App\Http\Controllers\DetailController@showTargetMonth');

