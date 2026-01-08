<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact_form');
Route::post('/adresa', [HomeController::class, 'storeAdresa'])->name('adresa_form');

Route::get('/people', [PersonController::class, 'index']);
Route::post('/people', [PersonController::class, 'store']);
Route::delete('/people/{id}', [PersonController::class, 'destroy']);
Route::post('/people/update/{id}', [PersonController::class, 'update']);
