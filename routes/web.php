<?php

use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Customer\CustomerDashboardComponent;
use App\Livewire\HomeComponent;
use App\Livewire\Sprovider\SproviderDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');

// For customer
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/my/dashboard',CustomerDashboardComponent::class)->name('user.dashboard');
});

// For Service Provider
Route::middleware(['auth:sanctum', 'authsprovider',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/serviceprovider/dashboard',SproviderDashboardComponent::class)->name('svp.dashboard');
});

// For admin
Route::middleware(['auth:sanctum','authadmin',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});
