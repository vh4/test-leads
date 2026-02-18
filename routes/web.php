<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/create-leads', function () {
    return view('create-leads');
})->name('create-leads');

