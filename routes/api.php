<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('categoryview', [CategoryController::class, 'categoryview'])->name('categoryview');
// Route::get('main', [CategoryController::class, 'index']);
Route::get('productapi', [ProductApiController::class, 'index'])->name('productapi');
Route::get('productapi_view/{id_nhom}', [ProductApiController::class, 'productapi_view'])->name('productapi_view');
Route::post('productapi_add', [ProductApiController::class, 'store'])->name('productapi_add');
