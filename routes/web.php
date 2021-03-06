<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DepartmentController;
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

Route::middleware(['auth'])->group(function (){
    Route::view('/', 'home')->name('home');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('departments', DepartmentController::class)->names('departments');
    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('permissions', PermissionController::class)->names('permissions');
    Route::resource('employees', EmployeeController::class)->names('employees');
});


//RUTA PARA CREAR USUARIOS DE PRUEBA
Route::get('/test', function (){
    $user = new \App\Models\User();
    $user->name = 'Rodrigo Duarte';
    $user->email = 'rodrijedbu2@outlook.com';
    $user->password = bcrypt('laravel1234');
    $user->type = 1;
    $user->save();
    return $user;
});

require __DIR__.'/auth.php';
