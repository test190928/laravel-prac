<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    //ログインページ表示
    Route::get('/', [AuthController::class,'showLogin'])->name('showLogin');
    //ログイン処理
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


Route::middleware(['auth'])->group(function () {
    //ホーム表示
    Route::get('home', [AuthController::class, 'home'])->name('home');
    //ログアウト処理
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    //検索処理
    Route::post('search', [PostController::class, 'search'])->name('search');
    //投稿処理
    Route::post('post', [PostController::class, 'post'])->name('post');
    //投稿編集
    Route::get('{id}/edit',[PostController::class, 'showEdit']);
    //編集処理
    Route::post('post/edit',[PostController::class, 'postEdit'])->name('postEdit');
    //投稿削除
    Route::get('{id}/delete',[PostController::class, 'postDelete']);
    //会社概要表示
    Route::get('about',[PostController::class,'about'])->name('about');
    //プロフィール表示
    Route::get('profile/{id}',[UserController::class,'showProfile']);
});

