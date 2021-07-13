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
Auth::routes(['verify'=>true]);
Route::prefix('/admin')->middleware('CheckRole')->group(function (){
    Route::get('/','back\AdminController@index')->name('admin');
    Route::get('/users','back\UserController@index')->name('adminUsers');
    Route::get('/EditUsers/{user}','back\UserController@edit')->name('adminEditUsers');
    Route::put('/UpdateUser/{user}','back\UserController@update')->name('adminUpdateUsers');
    Route::get('/DestroyUser/{user}','back\UserController@destroy')->name('adminDestroyUsers');
    Route::get('/StatusUser/{user}','back\UserController@Status')->name('adminStatusUsers');
});

Route::prefix('/admin/category')->middleware('CheckRole')->group(function (){
    Route::get('/','back\CategoryController@index')->name('adminCategory');
    Route::get('/CreateCategory','back\CategoryController@create')->name('adminCreateCategory');
    Route::post('/StoreCategory','back\CategoryController@store')->name('adminStoreCategory');
    Route::get('/EditCategory/{category}','back\CategoryController@edit')->name('adminEditCategory');
    Route::put('/UpdateCategory/{category}','back\CategoryController@update')->name('adminUpdateCategory');
    Route::get('/DestroyCategory/{category}','back\CategoryController@destroy')->name('adminDestroyCategory');
});

Route::prefix('/admin/article')->middleware('CheckRole')->group(function (){
    Route::get('/','back\ArticleController@index')->name('adminArticle');
    Route::get('/CreateArticle','back\ArticleController@create')->name('adminCreateArticle');
    Route::post('/StoreArticle','back\ArticleController@store')->name('adminStoreArticle');
    Route::get('/EditArticle/{article}','back\ArticleController@edit')->name('adminEditArticle');
    Route::put('/UpdateArticle/{article}','back\ArticleController@update')->name('adminUpdateArticle');
    Route::get('/DestroyArticle/{article}','back\ArticleController@destroy')->name('adminDestroyArticle');
    Route::get('/StatusUser/{article}','back\ArticleController@Status')->name('adminStatusArticle');
});

Route::prefix('/admin/article/comments')->middleware('CheckRole')->group(function (){
    Route::get('/','back\CommentController@index')->name('adminComment');
    Route::get('/EditComment/{comment}','back\CommentController@edit')->name('adminEditComment');
    Route::put('/UpdateComment/{comment}','back\CommentController@update')->name('adminUpdateComment');
    Route::get('/DestroyComment/{comment}','back\CommentController@destroy')->name('adminDestroyComment');
    Route::get('/StatusComment/{comment}','back\CommentController@Status')->name('adminStatusComment');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/','front\FrontController@index')->name('home');
Route::get('/articles','front\ArticleController@index')->name('articles')->middleware('verified');
Route::get('/article/{article}','front\ArticleController@show')->name('article');
Route::get('/editProfile/{user}','front\UserController@edit')->name('editProfile');
Route::put('/updateProfile/{user}','front\UserController@update')->name('updateProfile');

Route::post('/comments/{article}','front\CommentController@store')->name('StoreComment');


