<?php

Route::get('/', function () {
    return view('welcome');
});

Route::layout('layouts.base')->prefix('admin')->name('admin.')->group(function () {
    // dashboard
    Route::livewire('/', 'pages.dashboard')->name('dashboard');

    // sub akun
    Route::livewire('/general-akun', 'general-akun.general-akun-index')->name('general-akun');

    // jurnal umum
    Route::livewire('/jurnal-umum', 'jurnal-umum.jurnal-index')->name('jurnal-umum');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
