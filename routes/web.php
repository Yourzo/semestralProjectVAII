<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::view('/desk', 'desk')->name('desk');

Route::view('/register', 'register')->name('register');
