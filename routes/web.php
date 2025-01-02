<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('profile/storePicture', [ProfileController::class, 'storePicture'])->name('profile.store-picture');

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/get-users', [ProfileController::class, 'users'])->name('users.get');

    Route::get('/searchUser/{name}', [FriendshipController::class, 'search'])->name('search');
    Route::post('/addRequest', [FriendshipController::class, 'addRequest'])->name('addRequest');
});

require __DIR__.'/auth.php';
