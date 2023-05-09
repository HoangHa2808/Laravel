<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

Route::controller(ProductController::class)->prefix("/admin/posts")
    ->group(function() {
        Route::get('/index', 'index')->name('posts.index');
        Route::get('/view', 'view')->name('posts.view');
        Route::post('/add', 'add')->name('posts.add');
        Route::post('/delete', 'delete')->name('posts.delete');
});
