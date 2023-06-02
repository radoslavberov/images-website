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

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('images', \App\Http\Controllers\ImageController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::post('/contact', [\App\Http\Controllers\MessageController::class, 'sendMessage'])->name('contact.send');
Route::get('/contact', [\App\Http\Controllers\MessageController::class, 'showForm'])->name('show');


