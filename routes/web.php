<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modal\UserAvatarModal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Oauth\MicrosoftController;
use Inertia\Inertia;

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
    return to_route('login');
});

Route::middleware('guest')->group(function(){
    Route::get('/auth/microsoft/login', [MicrosoftController::class, 'login'] )->name('auth.microsoft.login');
    Route::get('/auth/microsoft/callback', [MicrosoftController::class, 'callback'] )->name('auth.microsoft.callback');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/apps', [AppsController::class,'index'])->name('apps');

    Route::get('change-avatar', [UserAvatarModal::class, 'change'])->name('user.avatar.change');
    Route::put('update-update', [UserAvatarModal::class, 'update'])->name('user.avatar.update');
});

require __DIR__.'/auth.php';
