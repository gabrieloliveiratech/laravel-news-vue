<?php

use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/news');

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/create', [NewsController::class, 'create']);
    Route::get('/{id}', [NewsController::class, 'show']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});
