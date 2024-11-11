<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/desk', function () {
    return view('desk');
});

Route::get('/register', function () {
    return view('register');
});
