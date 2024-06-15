<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//de esta forma SOLO nos genera las rutas de los metodos que estan en el only
//Route::resource('blog',App\Http\Controllers\BlogController::class)->only(['index','store','show','update','destroy']);

//de esta forma nos genera todas las rutas

Route::post('register',[App\Http\Controllers\AuthController::class, 'register']);
Route::post('login',[App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout',[App\Http\Controllers\AuthController::class, 'logout']);
});


Route::prefix('movie')->group(function () {

    Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
    Route::post('/create', [App\Http\Controllers\MovieController::class, 'storeMovie']);
    Route::put('/update/{id}', [App\Http\Controllers\MovieController::class, 'updateMovie']);
    Route::get('/show/{id}', [App\Http\Controllers\MovieController::class, 'showMovie']);
    Route::delete('/delete/{id}', [App\Http\Controllers\MovieController::class, 'destroyMovie']);
    Route::get('/get-schedules/{id}', [App\Http\Controllers\MovieController::class, 'getMovieSchedules']);
    Route::get('/get-all-schedules', [App\Http\Controllers\MovieController::class, 'getAllMovieSchedules']);
});

Route::prefix('schedule')->group(function () {

    Route::get('/', [App\Http\Controllers\ScheduleController::class, 'index']);
    Route::post('/create', [App\Http\Controllers\ScheduleController::class, 'storeSchedule']);
    Route::put('/update/{id}', [App\Http\Controllers\ScheduleController::class, 'updateSchedule']);
    Route::get('/show/{id}', [App\Http\Controllers\ScheduleController::class, 'showSchedule']);
    Route::delete('/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'destroySchedule']);
    Route::post('/create-schedule', [App\Http\Controllers\ScheduleController::class, 'createMovieSchedule']);
});
