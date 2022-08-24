<?php

use App\Http\Controllers\EmployeController;
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

require __DIR__.'/auth.php';

Route::resources(['employees' => EmployeController::class]);
// Route::get('/show/{user_id}', [App\Http\Controllers\EmployeController::class ,'show'])->name('employees.show');  
// Route::get('/employees/create', [App\Http\Controllers\EmployeController::class, 'create'])->name('employees.create');
// Route::post('/employee/save', [App\Http\Controllers\EmployeController::class ,'store'])->name('employees.store');

// Route::get('/employees', [App\Http\Controllers\EmployeController::class , 'index'])->name('employees.index');
// Route::get('/employees/{id}/edit', [App\Http\Controllers\EmployeController::class , 'edit'])->name('employees.edit');
// Route::put('/employees/{id}', [App\Http\Controllers\EmployeController::class , 'update'])->name('employees.update');
// Route::delete("/employees/{row_id}", [App\Http\Controllers\EmployeController::class , 'destroy'])->name('employees.destroy');