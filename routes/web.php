<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EmployeeController;

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

Route::view('/', 'home')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


    Route::get('/workdays', 'App\Http\Controllers\WorkdayController@index')->name('workdays');
    Route::post('/workdays', 'App\Http\Controllers\WorkdayController@store')->name('workdays.store');
    Route::get('/workdays/create', 'App\Http\Controllers\WorkdayController@create')->name('workdays.create');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@edit')->name('workdays.edit');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@destroy')->name('workdays.destroy');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@update')->name('workdays.update');
    Route::resource('applicants', ApplicantController::class)->names('applicants');

Route::middleware(['auth'])->group(function (){
    Route::resource('users', UserController::class)->names('users');


    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('departments', DepartmentController::class)->names('departments');
});
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('permissions', PermissionController::class)->names('permissions');
Route::resource('employees', EmployeeController::class)->names('employees');


