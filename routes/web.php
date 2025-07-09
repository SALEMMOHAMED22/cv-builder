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


    Route::get('/user/information/edit' ,  'editUserInfo')->name('user.information.edit');
    Route::post('/user/information/update' ,  'updateUserInfo')->name('user.information.update');

    Route::get('/user/profile' ,  'userProfile')->name('user.profile');
    Route::post('/user/profile/store' ,  'userProfileStore')->name('user.profile.store');
    Route::get('/user/profile/edit' ,  'userProfileEdit')->name('user.profile.edit');
    Route::post('/user/profile/update' ,  'userProfileUpdate')->name('user.profile.update');

    Route::get('/user/skills' ,  'userSkills')->name('user.skills');
    Route::post('/user/skills/store' ,  'userSkillsStore')->name('user.skills.store');

    Route::get('/user/skills/edit' ,  'userSkillsEdit')->name('user.skills.edit');

    Route::post('/user/skills/update' ,  'userSkillsUpdate')->name('user.skills.update');



    Route::get('/user/edu' ,  'userEdu')->name('user.edu');


    Route::get('/user/edu/show' ,  'showUserEdu')->name('user.edu.show');
    Route::post('/user/edu/store' ,  'userEduStore')->name('user.edu.store');


    Route::get('/user/edu/edit/{id}' ,  'userEduEdit')->name('user.edu.edit');
    Route::post('/user/edu/update' ,  'userEduUpdate')->name('user.edu.update');

    Route::get('/user/edu/delete/{id}' ,  'userEduDelete')->name('user.edu.delete');


    
});
