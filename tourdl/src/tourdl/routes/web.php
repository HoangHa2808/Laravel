<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Posts\HotelController;
use App\Http\Controllers\Posts\ToursController;
use App\Http\Controllers\Posts\NewsPostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/dashboard/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/dashboard/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/dashboard/category', [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/dashboard/posts/hotel', [HotelController::class, 'index'])->name('posts.hotel.index');
Route::get('/dashboard/posts/hotel/create', [HotelController::class, 'create'])->name('posts.hotel.create');
Route::post('/dashboard/posts/hotel/create', [HotelController::class, 'store'])->name('posts.hotel.store');
Route::get('/dashboard/posts/hotel/edit/', [HotelController::class, 'edit'])->name('posts.hotel.edit');
Route::put('/dashboard/posts/hotel/update/', [HotelController::class, 'update'])->name('posts.hotel.update');
Route::delete('/dashboard/posts/hotel', [HotelController::class, 'destroy'])->name('posts.hotel.destroy');

Route::get('/dashboard/posts/tours', [ToursController::class, 'index'])->name('posts.tours.index');
Route::get('/dashboard/posts/tours/create', [ToursController::class, 'create'])->name('posts.tours.create');
Route::post('/dashboard/posts/tours/create', [ToursController::class, 'store'])->name('posts.tours.store');
Route::get('/dashboard/posts/tours/edit/', [ToursController::class, 'edit'])->name('posts.tours.edit');
Route::delete('/dashboard/posts/tours', [ToursController::class, 'destroy'])->name('posts.tours.destroy');

Route::get('/dashboard/posts/news', [NewsPostController::class, 'index'])->name('posts.news.index');
Route::get('/dashboard/posts/news/create', [NewsPostController::class, 'create'])->name('posts.news.create');
Route::post('/dashboard/posts/news/create', [NewsPostController::class, 'store'])->name('posts.news.store');
Route::get('/dashboard/posts/news/edit/', [NewsPostController::class, 'edit'])->name('posts.news.edit');
Route::put('/dashboard/posts/news/update/', [NewsPostController::class, 'update'])->name('posts.news.update');
Route::delete('/dashboard/posts/news', [NewsPostController::class, 'destroy'])->name('posts.news.destroy');


Route::get('/dashboard/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/dashboard/feedback', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

Route::get('/dashboard/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/dashboard/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/dashboard/role', [RoleController::class, 'destroy'])->name('role.destroy');

require __DIR__.'/auth.php';
