<?php

Route::get('/', function () {
    return view('welcome');
});

Route::layout('layouts.base')->prefix('admin')->name('admin.')->group(function () {
    // dashboard
    Route::livewire('/', 'akun.dashboard')->name('dashboard');

    // akun
    Route::livewire('/akun', 'akun.akun-index')->name('akun');

    // sub akun
    Route::livewire('/sub-akun', 'sub-akun.sub-akun-index')->name('sub-akun');

    // jurnal umum
    Route::livewire('/jurnal-umum', 'pages.jurnal-umum')->name('jurnal-umum');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
