<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('login', function () {
    return view('login');
});
Route::get('marketplace', function () {
    return view('marketplace.index');
});

