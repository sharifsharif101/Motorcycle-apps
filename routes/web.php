<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\MotorcycleController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('motorcycle', [MotorcycleController::class,'create'])->name('crete_motorcycle');
    Route::post('motorcycle', [MotorcycleController::class,'store'])->name('store_motorcycle');
    Route::get('/Show-My-Motors/{user}', [MotorcycleController::class, 'index'])->name('motors.index');
    Route::get('/edit/{id}', [MotorcycleController::class, 'edit']);
    Route::put('/edit/{id}', [MotorcycleController::class, 'update']);
    Route::delete('/delete/{id}', [MotorcycleController::class, 'delete'])->name('delete.motors.index');;
    // Route::get('/motors/{user}', [MotorController::class, 'index'])->name('motors.index');


});

require __DIR__.'/auth.php';

/*Admin*/
Route::get('admin/dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard');
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
});
Route::get('admin/login', [AdminController::class,'login'])->name('admin_login');
Route::post('admin/login-submit', [AdminController::class,'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminController::class,'logout'])->name('admin_logout');


// Route::get('motorcycle', 'MotorcycleController@create');


