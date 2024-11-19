<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API routes for your application
Route::middleware('api')->group(function () {
    Route::apiResource('books', BookController::class);
});
