<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('profil');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/anggota', function () {
    return view('anggota');
});
