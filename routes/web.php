<?php

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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});



/*Route::group(['middleware' => ['role:admin']], function () {
    
});*/

Route::post('registro', 'Auth\RegisterController@registro')->name('registro');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', function() { return view('admin.index'); })->name('index');
    Route::get('/users', function () { return view('admin.user.index'); });
 
    
});

Route::group(['middleware' => ['auth'], 'prefix' => 'almacen', 'as' => 'almacen.'], function() {
    Route::get('/', function() { return view('almacen.index'); })->name('index');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'compras', 'as' => 'compras.'], function() {
    Route::get('/', function() { return view('compras.index'); })->name('index');
});
 




