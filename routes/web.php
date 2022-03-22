<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');


// admin group routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
    Route::get('/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
    Route::delete('/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
    Route::delete('/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
});


Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');

//Route::get('products/{id}', [CommentController::class, 'loadComments'])->name('product.show');
Route::post('/products/{id}', [CommentController::class, 'addComment']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/admin/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
//Route::get('/admin/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
//Route::delete('/admin/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
//Route::delete('/admin/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
