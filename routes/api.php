<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\AuthController;





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

Route::get('v1/customers', [CustomerController::class, 'index']);
Route::get('v1/customer/{id}', [CustomerController::class, 'show']);
Route::post('v1/customers', [CustomerController::class, 'store']);
Route::put('v1/customer/{id}', [CustomerController::class, 'update']);
Route::delete('v1/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('v1/products', [ProductController::class, 'index']);
Route::get('v1/product/{id}', [ProductController::class, 'show']);
Route::post('v1/products', [ProductController::class, 'store']);
Route::put('v1/product/{id}', [ProductController::class, 'update']);
Route::delete('v1/product/{id}', [ProductController::class, 'destroy']);

// untuk tabel Categories tanpa penggunaan resource
Route::get('v1/categorie', [CategorieController::class, 'index']);
Route::get('v1/categorie/{id}', [CategorieController::class, 'show']);
Route::post('v1/categorie', [CategorieController::class, 'store']);
Route::put('v1/categorie/{id}', [CategorieController::class, 'update']);
Route::delete('v1/categorie/{id}', [CategorieController::class, 'destroy']);
//tes relasi antar tabel
Route::get('v1/categoriR', [CategorieController::class, 'indexRelasi']);

//auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);

});

Route::get('/pass', function(){
    return bcrypt('12345678');
});

