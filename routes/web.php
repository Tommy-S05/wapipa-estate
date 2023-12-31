<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Route::middleware(['auth', 'auth.admin'])->group(function() {
//    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
//});

Route::middleware(['auth', 'auth.role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'auth.role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});

//Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])
//    //    ->middleware(['auth'/*, 'auth.admin'*/])
//    ->name('admin.dashboard');
//
//Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])
//    //    ->middleware(['auth'/*, 'auth.admin'*/])
//    ->name('agent.dashboard');
