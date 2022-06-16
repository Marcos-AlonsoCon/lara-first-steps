<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\TestController;
use App\Http\Middleware\TestMiddleware;
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

Route::get('/', function() {
    return view('welcome');
});

// OPTIONAL AGRUMENTS WITH ?
    route::get('/test/{id?}/{name?}',function($id = 10,$name="marcos"){
        echo $id;
        echo $name;
    });

// RESOURCE ROUTE TYPE
// ALLOWS TO AVOID WRITING A ROUTE FOR EVERY METHOD IN A CONTROLLER
    // Route::resource('post', PostController::class);
    // Route::resource('category', CategoryController::class);

//////// WITH PREVIOUS ROUTE resource WE AVOID WRITING ALL THE 
//////// FOLLOWING ROUTES
    // Route::get('post', PostController::class, 'index');
    // Route::get('post/{post}', PostController::class, 'show');
    // Route::get('post/create', PostController::class, 'create');
    // Route::get('post/{post}/edit', PostController::class, 'edit');
    // Route::post('post', PostController::class, 'store');
    // Route::put('post/{post}', PostController::class, 'update');
    // Route::delete('post/{post}', PostController::class, 'delete');


// ANOTHER WAY TO SET THE ROUTES IS DEFINING A GROUP:
    // Route::controller(PostController::class)->group(function()
    // {
    //     Route::get('post', 'index')->name('post.index');
    //     Route::get('post/{post}', 'show')->name('post.show');
    //     Route::get('post/create', 'create')->name('post.create');
    //     Route::get('post/{post}/edit', 'edit')->name('post.edit');


    //     Route::post('post', 'store')->name('post.store');
    //     Route::put('post/{post}', 'update')->name('post.update');
    //     Route::delete('post/{post}', 'delete')->name('post.destroy');
    // });


// MIDDLEWARE IS ANOTHER FORM TO GROUP ROUTES:
    // Route::middleware([TestMiddleware::class])->group(function()
    // {
    //     route::get('/test/{id?}/{name?}',function($id = 10,$name="marcos"){
    //         echo $id;
    //         echo $name;
    //     });
    // });

// THE LAST WAY TO GROUP ROUTES IS USING group
       
    Route::group(['prefix' => 'dashboard'], function()
    { 
        // INDICATE THAT SHOW IS THE ONLY ROUTE THAT CAN BE ACCESSED  
            // Route::resource('post', PostController::class)->except('show');
        Route::resource('post', PostController::class);
        Route::resource('category', CategoryController::class);

        // Route::resources([
        //     'post' => 'post', PostController::class,
        //     'category', CategoryController::class
        // ]);
    });