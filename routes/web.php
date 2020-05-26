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
})->name('welcome');

Route::resource('customers', 'CustomerController');

Route::prefix('tasks')->group(function () {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::get('create', 'TaskController@create')->name('tasks.create');
    Route::post('/create', 'TaskController@store')->name('tasks.store');
});

