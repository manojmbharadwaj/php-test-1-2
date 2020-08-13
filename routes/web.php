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
})->name('landing_page');

Route::get('/ajax', 'AjaxDemoController@index')->name('ajax');
Route::get('/ajax/getUsers', 'AjaxDemoController@getUsersList')->name('ajax.userslist');
Route::post('/ajax/store', 'AjaxDemoController@store')->name('ajax.store');
Route::post('/ajax/update/{id}', 'AjaxDemoController@update')->name('ajax.update');
