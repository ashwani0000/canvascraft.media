<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/employees/{employee:id}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');  
Route::get('/employees/{employee:id}/edit', [App\Http\Controllers\EmployeeController::class , 'edit'])->name('employees.edit');
Route::put('/employees/{employee:id}', [App\Http\Controllers\EmployeeController::class , 'update'])->name('employees.update');
Route::delete("/employees/{employee:id}", [App\Http\Controllers\EmployeeController::class , 'destroy'])->name('employees.destroy');
Route::any('{query}',
    function() { return redirect('/'); })
    ->where('query', '.*');
