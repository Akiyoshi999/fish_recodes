<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecodeController;

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

// 釣り記録一覧を表示
Route::get('/', [RecodeController::class, 'showList'])->name('recodes');

// 釣果記録登録画面を表示
Route::get('/recode/create', [RecodeController::class, 'showCreate'])->name('create');

// 釣果記録登録
Route::post('/recode/store', [RecodeController::class, 'exeStore'])->name('store');

// 釣り記録詳細を表示
Route::get('/recode/{id}', [RecodeController::class, 'showDetail'])->name('recode');

// 釣果記録編集画面を表示
Route::get('/recode/edit/{id}', [RecodeController::class, 'showEdit'])->name('edti');

// 釣果記録の編集情報を登録
Route::post('/recode/update', [RecodeController::class, 'exeUpdate'])->name('update');