<?php

use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * About Articles
 * Test Success √
 */
Route::prefix('/article')->group(function () {
    Route::get('tags','ArticleController@all');
    Route::get('users', 'ArticleController@users');
    Route::get('search','ArticleController@search');
    Route::get('info', 'ArticleController@info');
    Route::post('new', 'ArticleController@new');
});

/**
 * About Comments
 * Test Success √
 */
Route::prefix('/comment')->group(function () {
    Route::get('comments','CommentController@all');
    Route::post('new','CommentController@new');
});

/**
 * About user like articles
 * Test Success √
 */
Route::prefix('/like')->group(function () {
    Route::get('like','LikeController@like');
    Route::get('likes', 'LikeController@likes');
});

/**
 * About users' Relationship
 * Test Success √
 */
Route::prefix('/relation')->group(function () {
    Route::get('follow', 'RelationController@new');
    Route::get('following', 'RelationController@all');
});