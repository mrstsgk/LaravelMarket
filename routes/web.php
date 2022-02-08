<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LikeController;

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

// 商品一覧を表示する
Route::get('/', [ItemListController::class, 'showList'])->name('showList');

// 検索
Route::get('/searchItemList', [ItemListController::class, 'searchItemList'])->name('searchItemList');

// 並べ替え機能
Route::post('/sortItemList/{sort?}',[ItemListController::class, 'sortItemList'])->name('sortItemList');

// ログイン
Route::get('/login', [LoginController::class, 'show']);
Route::POST('/login', [LoginController::class, 'login']);

// ログアウト
Route::get('/logout', [LoginController::class, 'logout'])->middleware('login');

// マイページ
Route::get('/mypage', [MyPageController::class, 'show']);

// 新規登録
Route::get('/signup', [SignUpController::class, 'show']);
Route::POST('/signup', [SignUpController::class, 'signUp']);

// いいねボタン
Route::get('/reply/like/{item}', [LikeController::class, 'like'])->name('like');
Route::get('/reply/unlike/{item}', [LikeController::class , 'unlike'])->name('unlike');

Route::post('/ajaxlike', [LikeController::class, 'ajaxlike'])->name('posts.ajaxlike');