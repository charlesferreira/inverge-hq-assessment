<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ObjectsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/objects', ObjectsController::class);
Route::apiResource('/departments', DepartmentsController::class);
