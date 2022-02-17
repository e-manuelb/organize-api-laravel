<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('diary', DiaryController::class);
    Route::resource('toDo', ToDoController::class);
    Route::resource('finances', FinancesController::class);
});

Route::resource('user', UserController::class);
