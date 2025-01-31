<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', static fn () => view('login'))->name('login');
    Route::get('/register', static fn () => view('register'))->name('register');
});

Route::middleware('auth')->get('/', static fn () => view('home'))->name('home');
