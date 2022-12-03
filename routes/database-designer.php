<?php

use Illuminate\Support\Facades\Route;

Route::get('/db-designer', function () {
    return view('designer');
});
