<?php

use App\Http\Controllers\ApplicantController;
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
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LogController;

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
    Route::resource('plannings', PlanningController::class)->names('plannings');
    Route::resource('absences', AbsenceController::class)->names('absences');
    Route::resource('reports', ReportController::class)->names('reports')->only(['index', 'create']);
    Route::resource('applicants', ApplicantController::class)->names('applicants');
    Route::resource('logs', LogController::class)->only(['index'])->names('logs')->middleware('password.confirm');

    // carreras administrativas
    Route::resource('administrative-careers', AdministrativeCareerController::class)->names('administrative-careers')->only('index');
    Route::get('administrative-careers/{employee}', [AdministrativeCareerController::class, 'show'])->name('administrative-careers.show');

    //contratos
    Route::resource('contracts', ContractController::class)->names('contracts')->except(['create', 'store']);
    Route::get('contracts/create/{employee}', [ContractController::class, 'create'])->name('contracts.create');
    Route::put('contracts/{employee}', [ContractController::class, 'store'])->name('contracts.store');

    //asistencias
    Route::get('/workdays', 'App\Http\Controllers\WorkdayController@index')->name('workdays');
    Route::post('/workdays', 'App\Http\Controllers\WorkdayController@store')->name('workdays.store');
    Route::get('/workdays/create', 'App\Http\Controllers\WorkdayController@create')->name('workdays.create');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@edit')->name('workdays.edit');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@destroy')->name('workdays.destroy');
    Route::get('/workdays/{workday}', 'App\Http\Controllers\WorkdayController@update')->name('workdays.update');

});


//RUTA para pruebas
Route::get('/test', function (){
    return \Carbon\Carbon::now('America/La_Paz')->toDateTimeString();
});


Route::get("/ordencomplete/{order}",[OrderController::class, 'complete'])->name('ordencomplete.complete');

require __DIR__.'/auth.php';
