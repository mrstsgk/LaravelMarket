<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;

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

// 並べ替え機能
Route::post('/sortItemList/{sort?}',[ItemListController::class, 'sortItemList'])->name('sortItemList');
// Route::get('/itemSortHigh',[ItemListController::class, 'sortDescendingPrice'])->name('sortDescendingPrice');
// Route::get('/listSortHigh',[ItemListController::class, ''])->name('');

// ログイン
Route::get('/login', [LoginController::class, 'show']);
Route::POST('/login', [LoginController::class, 'login']);

// ログアウト
Route::get('/logout', [LoginController::class, 'logout'])->middleware('login');

// マイページ
Route::get('/mypage', [MyPageController::class, 'show']);