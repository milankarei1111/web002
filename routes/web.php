<?php

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

// Route::name('home')->prefix('/home')
//         ->get('', function() {
//     return view('home');
// })->middleware('auth');

Route::name('home.')->middleware('auth')->prefix('home')->group(function () {
    Route::get('/', function(){
        return view('home');
    });

   Route::resource('users', 'UserController');

   Route::resource('category','CategoryController');
});
