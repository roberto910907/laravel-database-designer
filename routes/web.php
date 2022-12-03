<?php

use Illuminate\Support\Facades\Route;
use DBDesigner\Http\Controllers\HomeController;
use DBDesigner\Http\Controllers\Api\SchemaController;

Route::prefix('api')->group(function () {
    Route::get('/schema/list', [SchemaController::class, 'list'])->name('schema.tables');
});

Route::get('/db-designer', [HomeController::class, 'index'])->name('db-designer.index');
