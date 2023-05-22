<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/video/add', [App\Http\Controllers\VideoController::class, 'create']);
Route::get('/', [App\Http\Controllers\VideoViewerController::class, 'index']);
Route::get('/video/{video}', [App\Http\Controllers\VideoViewerController::class, 'show']);

Route::post('/video/{video}/comment', [App\Http\Controllers\CommentsController::class, 'store']);
Route::get('/comment', [App\Http\Controllers\CommentsController::class, 'index']);

Route::post('/video', [App\Http\Controllers\VideoController::class, 'store']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


