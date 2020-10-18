<?php

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

Route::get('/products/new', 'ProductController@create')->middleware('isAdmin');
Route::post('/products', 'ProductController@store')->middleware('isAdmin');
Route::delete('/products/{id}', 'ProductController@destroy')->middleware('isAdmin');

Route::get('/products/{id}/orders/new', 'ProductOrderController@create')->middleware('isAdminOrSelf');
Route::post('/products/{id}/orders', 'ProductOrderController@store')->middleware('isAdminOrSelf');

Route::get('/products/{id}/comments/new', 'ProductCommentController@create')->middleware('isAdminOrSelf');
Route::post('/products/{id}/comments', 'ProductCommentController@store')->middleware('isAdminOrSelf');

Route::get('/products/{id}/comments', 'ProductCommentController@index');

Route::post('/comments/{id}/likes', 'ProductCommentLikeController@store')->middleware('isAdminOrSelf');
Route::delete('/comments/{id}/likes/{id}', 'ProductCommentLikeController@destroy')->middleware('isAdminOrSelf');

Route::post('/products/{id}/wish-list', 'WishListController@store')->middleware('isAdminOrSelf');

Route::put('/products/{id}/cover-image', 'ProductCoverImageController@update')->middleware('isAdmin');

Route::get('orders/{id}/payments/new', 'PaymentController@create')->middleware('isAdminOrSelf');
Route::get('orders/{id}/payments', 'PaymentController@store')->middleware('isAdminOrSelf');
