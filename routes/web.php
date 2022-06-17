<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Web\BlogController;
use Illuminate\Support\Facades\Route;

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


// PROTECTING THE ROUTES WITH MIDDLEWARE
// middleware INCLUDES THE auth FOR THE AUTHENTICATION AND admin TO VERIFY IF THE USER IS ADMIN
Route::group(['prefix' => 'dashboard', 'middleware' => ["auth","admin"]], function() {
    
    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard");
    
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
});


Route::group(['prefix' => 'blog'], function () {
   Route::controller(BlogController::class)->group(function(){
        Route::get('/', "index")->name("web.blog.index");
        Route::get('/{post}', "show")->name("web.blog.show");
   }); 
   
});


require __DIR__.'/auth.php';

