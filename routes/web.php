<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', \App\Livewire\Auth\LoginPage::class)
    ->name('login');

Route::get('/register', \App\Livewire\Auth\RegisterPage::class)
    ->name('register');

Route::post('/logout', function () {
    auth()->logout();

    return redirect()->route('home');
})->name('logout');
