<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {

    //CRUD Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::patch('/category/{id}', [CategoryController::class, 'update']);

    //CRUD Product
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/create', [ProductController::class, 'create']);
    Route::post('product', [ProductController::class, 'store']);
    Route::get('product/edit', [ProductController::class, 'edit']);
    Route::post('product/{product_id}', [ProductController::class, 'update']);
    Route::get('product/{product_id}/show', [ProductController::class, 'show']);

    Route::resource('product', ProductController::class);

    Route::get('/profile/{id}/show', [ProfileController::class, 'index']);
    Route::patch('/profile/{id}', [ProfileController::class, 'update']);

    Route::get('/products', function () {
        return view('dashboard.polluxui.customer.products');
    });
});

Auth::routes();
//CRUD Product
Route::resource('product', ProductController::class);

