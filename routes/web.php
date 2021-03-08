<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AdministrativeCareerController;
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
    Route::resource('users', UserController::class)->names('users');
    Route::resource('departments', DepartmentController::class)->names('departments');
    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('permissions', PermissionController::class)->names('permissions');
    Route::resource('employees', EmployeeController::class)->names('employees');
<<<<<<< Updated upstream

    
=======
    Route::resource('plannings', PlanningController::class)->names('plannings');

    // carreras administrativas
    Route::resource('administrative-careers', AdministrativeCareerController::class)->names('administrative-careers')->only('index');
    Route::get('administrative-careers/{employee}', [AdministrativeCareerController::class, 'show'])->name('administrative-careers.show');

    //contratos
    Route::resource('contracts', ContractController::class)->names('contracts')->except(['create', 'store', 'edit']);
    Route::get('contracts/create/{employee}', [ContractController::class, 'create'])->name('contracts.create');
    Route::put('contracts/{employee}', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('contracts/{contract}/edit/{employee}', [ContractController::class, 'edit'])->name('contracts.edit');
>>>>>>> Stashed changes
});


//RUTA PARA CREAR USUARIOS DE PRUEBA
Route::get('/test', function (){

//    $user = new \App\Models\User();
//    $user->name = 'Prueba';
//    $user->email = 'prueba@gmail.com';
//    $user->password = bcrypt('prueba1234');
//    $user->type = \App\Models\User::$ADMINISTRATOR;
//    $user->save();
//    $user->syncPermissions(['Gestionar Personal']);
//    return $user;

//    $employee = new \App\Models\Employee();
//    $employee->name = 'Rodrigo';
//    $employee->last_name = 'Duarte';
//    $employee->work_phone = '78496366';
//    $employee->image_name = 'image.jpg';
//    $employee->sex = 'Masculino';
//    $employee->ID_number = '861646254';
//    $employee->address = 'Av 4to Anillo Alemana';
//    $employee->nationality = 'boliviano';
//    $employee->birthdate = '14-10-1998';
//    $employee->birthplace = 'Santa Cruz';
//    $employee->marital_status = 'Soltero';
//    $employee->status = \App\Models\Employee::$ACTIVE;
//    $employee->user_id = 4;
//    $employee->save();
//    return $employee;

//    $user = \App\Models\User::find(1);
//    $user->givePermissionTo('Listar Personal');
});

Route::get('/test2', function (){
    $permission = Permission::where('name', '=', 'Crear Empleados')->get();
    return date('d-m-Y');
});

require __DIR__.'/auth.php';
