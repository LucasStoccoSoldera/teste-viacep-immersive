<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\InitController::class, 'init'])->name('init');

Route::post('/new_endereco/', [App\Http\Controllers\EnderecoController::class, 'create'])->name('create.endereco');
Route::get('/list_endereco/', [App\Http\Controllers\EnderecoController::class, 'list'])->name('list.endereco');
Route::get('/cep/{cep}', [App\Http\Controllers\APIController::class, 'processCEP']);
Route::delete('/delete_endereco/', [App\Http\Controllers\EnderecoController::class, 'delete'])->name('delete.endereco');
