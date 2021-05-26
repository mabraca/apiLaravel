<?php

use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use App\Http\Controllers\Api\V1\Auth\PostsController;
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

Route::namespace('Api\V1\Auth')->prefix('api/v1')->middleware('json.api')->group(function () {
    Route::post('/login', 'LoginController');
    Route::post('/register', 'RegisterController');
    Route::post('/logout', 'LogoutController')->middleware('auth:api');
    Route::post('/password-forgot', 'ForgotPasswordController');
    Route::post('/password-reset', 'ResetPasswordController');
    Route::get('/posts', [PostsController::class, 'index']);
    
});

JsonApi::register('v1')->middleware('auth:api')->routes(function ($api) {
    $api->get('me', 'Api\V1\MeController@readProfile');
    $api->patch('me', 'Api\V1\MeController@updateProfile');
    Route::post('/posts/create', [PostsController::class, 'store']);
    Route::put('/posts/update/{id}', [PostsController::class, 'update']);
    Route::delete('/posts/delete/{id}', [PostsController::class, 'destroy']);
    Route::get('/posts/all', [PostsController::class, 'showAll']);
    

    $api->resource('users');
    // $api->resource('posts');
});


