<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::inertia('/', 'Welcome')->name('home');

Route::get('/produtos', [ProdutoController::class, 'index'])
    ->name('produtos.index');
