<?php

Route::get('/', function () {
    return view('welcome');
});

Route::layout('layouts.base')->prefix('admin')->group(function () {
    Route::livewire('/', 'pages.dashboard');
    Route::livewire('/akun', 'pages.akun-index');
    Route::livewire('/jurnal-umum', 'pages.jurnal-umum');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
