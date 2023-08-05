<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-employee',[EmployeeController::class,'EmployeeList']);
Route::post('/create-employee',[EmployeeController::class,'CreateEmployee']);
Route::put('/update-employee',[EmployeeController::class,'UpdateEmployee']);
Route::post('/delete-employee',[EmployeeController::class,'DeleteEmployee']);
Route::post('/employee-by-id',[EmployeeController::class,'EmployeeById']);

// page route
Route::get('/employee',[EmployeeController::class,'EmployeePage']);