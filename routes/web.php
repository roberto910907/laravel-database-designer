<?php

use Illuminate\Support\Facades\Route;
use DBDesigner\Http\Controllers\HomeController;
use DBDesigner\Http\Controllers\Api\SchemaController;

Route::prefix('api')->group(function () {
    Route::get('/schema/details', [SchemaController::class, 'details'])->name('schema.details');
});

Route::get('/db-designer/{route?}', [HomeController::class, 'index'])->name('db-designer.index');
