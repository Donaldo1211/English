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

Route::group(['prefix'=>'admin'],function(){
  Route::resource('verbs','VerbsController');
});
Route::post('editarVerbo','VerbsController@getVerb')->name('verb.getVerb');
Route::post('guardarVerbo','VerbsController@guardarVerbo')->name('verb.guardarVerbo');
Route::get('listar','VerbsController@listar')->name('verb.listar');
Route::post('eliminar','VerbsController@eliminar')->name('verb.eliminar');
