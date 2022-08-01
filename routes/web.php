<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Beneficiary\PrimaryDataController;
use App\Http\Controllers\User\PersonalController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('changepassword', ChangePasswordController::class)->except('update');
    Route::put('changepassword', [ChangePasswordController::class, 'update'])->name('changepassword.update');

    Route::get('personal/edit', [PersonalController::class, 'edit'])->name('personal.edit');
    Route::put('personal', [PersonalController::class, 'update'])->name('personal.update');
    Route::resource('personal', PersonalController::class)->except(['edit', 'update']);

    Route::get('primarydata/edit', [PrimaryDataController::class, 'edit'])->name('primarydata.edit');
    Route::get('primarydata/changerequests', [PrimaryDataController::class, 'changerequests'])->name('primarydata.changerequests')->middleware('role:superadmin');
    Route::put('primarydata/changerequests/approve/{id}', [PrimaryDataController::class, 'approveRequest'])->name('primarydata.approveRequest')->middleware('role:superadmin');
    Route::put('primarydata', [PrimaryDataController::class, 'update'])->name('primarydata.update');
    Route::resource('primarydata', PrimaryDataController::class)->except(['edit', 'update']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
