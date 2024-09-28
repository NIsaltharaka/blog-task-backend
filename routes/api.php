<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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

// Authentication routes for user registration, login, and logout
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Blog routes for creating, retrieving, updating, and deleting blog posts
Route::post('/add-blog', [BlogController::class, 'saveBlog']);
Route::get('/get-blog-data', [BlogController::class, 'getBlog']);
Route::delete('/delete-blog/{id}', [BlogController::class, 'deleteBlog']);
Route::post('/update-blog/{id}', [BlogController::class, 'updateBlog']);

