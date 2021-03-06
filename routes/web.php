<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('threads/create',[ThreadsController::class,'create']);

Route::get('/threads',[ThreadsController::class,'index']);
Route::get('threads/{channel}',[ThreadsController::class,'index']);


//Route::get('/threads/{thread}',[ThreadsController::class,'show']);
Route::get('threads/{channel}/{thread}',[ThreadsController::class,'show']);
Route::post('threads',[ThreadsController::class,'store']);

Route::delete('threads/{channel}/{thread}', [ThreadsController::class,'destroy']);

//Route::resource('threads',ThreadsController::class);
Route::get('/threads/{channel}',[ThreadsController::class,'index']);

Route::post('threads/{channel}/{thread}/replies',[RepliesController::class,'store']);

Route::post('replies/{reply}/favorites',[FavoritesController::class, 'store'])->name('favreply');

Route::delete('replies/{reply}', [RepliesController::class,'destroy']);

Route::patch('/replies/{reply}', [RepliesController::class,'update']);

//Profile
Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile');

