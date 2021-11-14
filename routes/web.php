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

Route::post('/listSortHigh',[ItemListController::class, 'descendingOderPrice'])->name('descendingOderPrice');

// ログイン
Route::get('/login', [LoginController::class, 'show']);
Route::POST('/login', [LoginController::class, 'login']);

// ログアウト
Route::get('/logout', [LoginController::class, 'logout'])->middleware('login');

// マイページ
Route::get('/mypage', [MyPageController::class, 'show']);