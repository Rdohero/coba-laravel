<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentDatabaseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsDatabasesController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can re  gister web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello world";
});

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' =>  'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' =>  'about',
        "name" => "Roja Ridho Robbihi",
        "email" => "rojaridho8888@gmail.com",
        "image" => "ridho.png",
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// halaman singel post

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories', function (Category $category){
    return view('categories',[
        'title' => 'Post Categories',
        'active' =>  'categories',
        'categories' => Category::all(),
    ]);
});

Route::get('login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class, 'authenticate']);

Route::post('logout',[LoginController::class, 'logout']);

Route::get('register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store']);

Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/student', StudentsController::class)->middleware('auth');
Route::resource('/dashboard/class',KelasController::class)->middleware('auth');

Route::get('/pancasila', function () {
    return view('pancasila.index');
});

Route::resource('/dashboard', UserController::class)->middleware('auth');

Route::get('/class',[KelasController::class,'index2']);
Route::get('/students',[StudentsController::class, 'index2']);
Route::get('/extracurricular',[ExtracurricularController::class, 'index2']);

Route::resource('/database2',ExtracurricularController::class);
