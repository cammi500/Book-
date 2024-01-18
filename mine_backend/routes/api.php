<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//get all book
Route::get('/books',[BookController::class, 'index']);
//post all book store routes
Route::post('/books',[BookController::class, 'store']);
//update all book store 
Route::patch('/books/{book}',[BookController::class, 'update']);
//get  all category 
Route::get('/categories',[CategoryController::class, 'index']);
//get one book id  wildcard
Route::get('/books/{book}',[BookController::class, 'show']);
//uploadphoto
Route::post('/books/upload',[BookController::class, 'upload']);

//delete one book
Route::delete('/books/{book}',[BookController::class, 'destroy']);


// Route::get('/api/book', [BookController::class, 'yourMethodName']);
