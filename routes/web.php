<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
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
    return view('home');
})->middleware('auth');

Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit']);
    Route::post('profile/update', [ProfileController::class, 'update']);

    Route::get('jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('job/{id}/view', [JobController::class, 'show']);
    Route::post('apply/{job}', [ApplicationController::class, 'store']);
    Route::get('applications', [ApplicationController::class, 'index']);
});

Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('company/create', [CompanyController::class, 'create']);
    Route::post('company/save', [CompanyController::class, 'store']);

    Route::get('jobs/create', [JobController::class, 'create']);
    Route::post('jobs/save', [JobController::class, 'store']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/jobs', [AdminController::class, 'index']);
    Route::post('admin/jobs/{job}/approve', [AdminController::class, 'approve']);
    Route::post('admin/jobs/{job}/cancel', [AdminController::class, 'cancel']);
    Route::get('admin/users', [AdminController::class, 'users']);
    Route::post('admin/users/{id}/delete', [AdminController::class, 'delete_user']);
});

Auth::routes();