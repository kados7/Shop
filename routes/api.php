<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\ProductController;
use App\Models\Product;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/posts', [PostController::class , 'index']);
// Route::get('/posts/{post}', [PostController::class , 'show']);
// Route::post('/post', [PostController::class , 'store']);

Route::apiResource('posts', PostController::class)->middleware('auth:api');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
