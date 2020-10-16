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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/country/{id}', 'DefaultController@city');
    Route::get('getSamples', 'DefaultController@getSamples')->name('getSamples');

    //users routes
    Route::resource('users', 'UserController');
    Route::put('users/update', 'UserController@update')->name('user.update');
    Route::delete('users', 'UserController@destroy')->name('users.remove');

    //Buyers routes
    Route::resource('buyers', 'BuyerController');
    Route::put('buyers/update', 'UserController@update')->name('buyer.update');
    Route::delete('buyers', 'BuyerController@destroy')->name('buyers.remove');

    //Supplier routes
    Route::resource('suppliers', 'SupplierController');
    Route::put('suppliers/update', 'UserController@update')->name('supplier.update');
    Route::delete('suppliers', 'SupplierController@destroy')->name('suppliers.remove');

    //Sample Routes
    Route::resource('samples', 'SampleController');

    //Product Controller
    Route::resource('products', 'ProductController');

    //Order Controller
    Route::resource('orders', 'OrderController');

    Route::get('getSample/{id}', 'OrderInfoController@getSample');
    Route::post('orderInfo', 'OrderInfoController@addItem')->name('order.info');

    //BOM
    Route::post('bomInfo', 'OrderInfoController@addBom')->name('bom.info');
    Route::get('bill-of-material', 'BomController@index')->name('view.bom');
    Route::get('bill-of-material', 'BomController@create')->name('view.bom');
    Route::post('bom', 'BomController@store')->name('bom.store');
    Route::get('bom/{id}', 'BomController@view');

    //Trim controller
    Route::get('trims', 'TrimsController@index')->name('trims');
    Route::post('trims', 'TrimsController@store')->name('trims.store');
    Route::get('trims/dispatch', 'TrimsController@dispatchTrims')->name('trims.dispatch');
    Route::post('trims/dispatch', 'TrimsController@dispatchTrimsStore')->name('dispatch.store');

    //stocks
    Route::get('stocks', 'StockController@index')->name('stocks');
    Route::post('stocks/list', 'StockController@listItems')->name('stocks.list');

    //production
    Route::get('productions', 'ProductionController@create')->name('productions');
    Route::post('productions', 'ProductionController@store')->name('productions.store');
    Route::get('productions/list', 'ProductionController@index')->name('productions.list');
    Route::post('productions/details', 'ProductionController@details')->name('productions.details');
});
