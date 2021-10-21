<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\InitController::class, 'init'])->name('init');
