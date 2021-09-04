<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{id?}',[ProductController::class,'getproducts']);
Route::post('/addproducts',[ProductController::class,'addproducts']);
Route::put('/editproducts',[ProductController::class,'editproducts']);
Route::delete('/products/{id}',[ProductController::class,'deleteproduct']);
Route::get('/search/{name}',[ProductController ::class,'searchproduct']);

