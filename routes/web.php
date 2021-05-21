<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::view('/', 'index');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('notes',App\Http\Controllers\NoteController::class);

});
