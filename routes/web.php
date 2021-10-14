<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcController;

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
Route::get('/', [EcController::class, 'showList'])->name('showList');