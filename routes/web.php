<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('product/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('paginator',[ProductController::class, 'paginate']);
Route::get('search',[ProductController::class, 'search'])->name('search');
