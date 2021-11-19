<?php

use App\Http\Controllers\ObjectsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/objects', ObjectsController::class);
