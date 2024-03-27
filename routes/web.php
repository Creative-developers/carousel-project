<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/carousel', [CarouselController::class, 'index']);
