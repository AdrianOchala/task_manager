<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->get('/auth', fn () => view('login'))->name('login');
Route::middleware('auth')->get('/', fn () => view('home'))->name('home');
