<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['throttle:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('/services', 'App\Http\Controllers\ServiceController');

    Route::resource('/credentials', 'App\Http\Controllers\CredentialController');

    Route::resource('/checks', 'App\Http\Controllers\CheckController');

});

