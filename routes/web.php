<?php

use Illuminate\Support\Facades\Route;
use DBDesigner\Http\Controllers\HomeController;

Route::prefix('api')->group(function () {
    // Dashboard Routes...
});

Route::get('/db-designer', [HomeController::class, 'index'])->name('db-designer.index');
