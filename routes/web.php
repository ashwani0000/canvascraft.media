<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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
    


// Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
// Route::get('/employees', [App\Http\Controllers\EmployeeController::class , 'index'])->name('employees.index');
// Route::get('/employees/{employee:id}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');  
// Route::get('/employees/{employee:id}/edit', [App\Http\Controllers\EmployeeController::class , 'edit'])->name('employees.edit')->middleware('auth');
// Route::put('/employees/{employee:id}', [App\Http\Controllers\EmployeeController::class , 'update'])->name('employees.update');
// Route::delete("/employees/{employee:id}", [App\Http\Controllers\EmployeeController::class , 'destroy'])->name('employees.destroy');



Route::get('/users/{user:id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/{user:id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::post('/checkemail', [\App\Http\Controllers\UserController::class, 'checkEmail']);


// At last only
Route::any('{query}',
    function() { return redirect('/'); })
    ->where('query', '.*');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
