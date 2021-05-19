<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth'])->group(function () {




});

// routes that require user to be authenticated
Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

//Route::middleware('CheckToken')->get('/test', 'PhpTestController@index');

//Route::middleware('CheckToken')->get('/test', 'PhpTestController@index');