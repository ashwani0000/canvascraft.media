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

Route::resource('employe', App\Http\Controllers\EmployeController::class);
Route::get('/employes/create', [App\Http\Controllers\EmployeController::class, 'create']);
// Route::get('/show/{user_id}', [App\Http\Controllers\EmployeController::class ,'show']);  
Route::post('/employee/save', [App\Http\Controllers\EmployeController::class ,'store']);

Route::get('/employes', [App\Http\Controllers\EmployeController::class , 'index']);