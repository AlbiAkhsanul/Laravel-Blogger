<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
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
    return view('home.index',[
        'title' => 'Home'
    ]);
});

Route::get('/home', function () {
    return view('home.index',[
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about.index',[
        'title' => 'About',
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'getPostBySlug']);

Route::get('/categories',[CategoryController::class, 'index']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth');

Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');