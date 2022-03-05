<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard.polluxui.partials.master');
});

Route::get('/master', function () {
    return view('dashboard.polluxui.partials.master');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/view', function () {
    return view('dashboard.product.productcard');
});

//CRUD Product
Route::resource('product', ProductController::class);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::patch('/category/{id}', [CategoryController::class, 'update']);
    // Route::get('/profile', [ProfileController::class, 'index']);
});

Auth::routes();
