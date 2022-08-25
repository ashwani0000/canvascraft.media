<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::resources(['employees' => EmployeeController::class]);

// Route::resource('employees', EmployeeController::class)
//         ->missing(function (Request $request) {
//             dd($request);
//             return Redirect::route('/dashboard');
//         });
// Route::get('/show/{id}', [App\Http\Controllers\EmployeeController::class ,'show'])->name('employees.show');  
Route::get('/employees/{employee:id}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');  

// Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
// Route::post('/employee/save', [App\Http\Controllers\EmployeeController::class ,'store'])->name('employees.store');

// Route::get('/employees', [App\Http\Controllers\EmployeeController::class , 'index'])->name('employees.index');
// Route::get('/employees/{id}/edit', [App\Http\Controllers\EmployeeController::class , 'edit'])->name('employees.edit');
// Route::put('/employees/{id}', [App\Http\Controllers\EmployeeController::class , 'update'])->name('employees.update');
// Route::delete("/employees/{row_id}", [App\Http\Controllers\EmployeeController::class , 'destroy'])->name('employees.destroy');