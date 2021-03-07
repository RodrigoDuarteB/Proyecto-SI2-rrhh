<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DepartmentController;
use Spatie\Permission\Models\Permission;

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
Route::view('index', 'index')->name('index');

Route::middleware(['auth'])->group(function (){
    Route::view('/', 'home')->name('home');
    Route::view('/error', 'error')->name('error');
    Route::view('/error405', 'error405')->name('error405');
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

    $user->name = 'Romina0Cortez';
    $user->email = 'rominacortez@outlook.com';
    $user->password = bcrypt('laravel1234');

    $user->name = 'Prueba';
    $user->email = 'prueba@gmail.com';
    $user->password = bcrypt('prueba');
    $user->type = \App\Models\User::$ADMINISTRATOR;

    $user->save();
    $user->syncPermissions(['Gestionar Personal']);
    return $user;
});

Route::get('/test2', function (){
    $permission = Permission::where('name', '=', 'Crear Empleados')->get();
    return dd($permission);
});

require __DIR__.'/auth.php';
