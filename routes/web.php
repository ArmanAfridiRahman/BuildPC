<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/user/logout',[DashboardController::class,'logout'])->name('user.logout');

//    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');

    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/save', [CategoryController::class, 'saveCategory'])->name('category.save');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::get('/sub-category/add', [SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::post('/sub-category/save', [SubCategoryController::class, 'saveSubCategory'])->name('sub-category.save');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::get('/sub-category/status/{id}', [SubCategoryController::class, 'status'])->name('sub-category.status');
    Route::post('/sub-category/delete', [SubCategoryController::class, 'subCategoryDelete'])->name('sub-category.delete');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('sub-category.update');

    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/save', [BrandController::class, 'saveBrand'])->name('brand.save');
    Route::get('/brand/status/{id}', [BrandController::class, 'status'])->name('brand.status');
    Route::post('/brand/delete', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');

    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


});
