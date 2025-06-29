<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

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
});



Route::get('/' , [FrontendController::class, 'index'])->name('home');

Route::controller(BackendController::class)->group(function () {
    Route::get('/user/cv' ,  'userCv')->name('user.cv');
    Route::get('/user/logout' ,  'userLogout')->name('user.logout');
    Route::post('/user/information/store' ,  'storeUserInfo')->name('user.information.store');
    
});