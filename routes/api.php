<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// PROTECTING API ROUTES WITH SANCTUM
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('category', CategoryController::class)->except(["create","edit"]);
    Route::resource('post', PostController::class)->except(["create","edit"]);
});

Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);
Route::get('category/all', [CategoryController::class, 'all']);
Route::get('category/slug/{post}', [CategoryController::class, 'slug']);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);
// DELCARES THE CATEGORY API ROUTES EXCEPT create AND edit WICH ARE NEVER USED
// Route::resource('category', CategoryController::class)->except(["create","edit"]);
// Route::resource('post', PostController::class)->except(["create","edit"]);
