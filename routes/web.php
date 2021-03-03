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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

    Route::get('/workdays', 'App\Http\Controllers\WorkdayController@index')->name('workdays');
    Route::post('/workdays', 'App\Http\Controllers\WorkdayController@store')->name('workdays.store');
    Route::get('/workdays/create', 'App\Http\Controllers\WorkdayController@create')->name('workdays.create');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@edit')->name('workdays.edit');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@destroy')->name('workdays.destroy');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@update')->name('workdays.update');

require __DIR__.'/auth.php';
