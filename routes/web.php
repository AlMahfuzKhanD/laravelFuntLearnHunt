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

// Route::get('/about',function(){
//     return view('about',['name'=>'welcome to']);
// })-> middleware('age');

Route::get('/contact', function () {
    echo 'its contact';
})->name('contact');

Route::prefix('learnhunter')->group(function(){

    
    Route::get('/image', function(){
        echo 'its image';
    });
    Route::get('/name', function(){
        echo 'its name';
    });
    
});

Route::get('/about', 'HelloController@someMethod');


