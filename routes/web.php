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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/about',function(){
//     return view('about',['name'=>'welcome to']);
// })-> middleware('age');

// Route::get('/contact', function () {
//     echo 'its contact';
// })->name('contact');

// Route::prefix('learnhunter')->group(function(){

    
//     Route::get('/image', function(){
//         echo 'its image';
//     });
//     Route::get('/name', function(){
//         echo 'its name';
//     });
    
// });

//// category CRUE /////


Route::get('/add_category', 'HelloController@addCategory')->name('add.category');
Route::post('/store_category', 'HelloController@storeCategory')->name('store.category');
Route::get('/all_category', 'HelloController@allCategory')->name('all.category');
Route::get('/view_category/{id}', 'HelloController@viewCategory');
Route::get('/delete_category/{id}', 'HelloController@deleteCategory');
Route::get('/edit_category/{id}', 'HelloController@editCategory');
Route::post('/update_category/{id}', 'HelloController@updateCategory');


// Post CRUDE
Route::get('/post', 'PostController@writePost')->name('write.post');
Route::post('/store_post','PostController@store')->name('store.post');
Route::get('/all_post','PostController@allPost')->name('all.post');
Route::get('/view_post/{id}', 'PostController@viewPost');
Route::get('/edit_post/{id}', 'PostController@editPost');
Route::post('/update_post/{id}', 'PostController@updatePost');
Route::get('/delete_post/{id}', 'PostController@deletePost');


