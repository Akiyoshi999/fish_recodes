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
Route::get('/recodes', [RecodeController::class, 'showList'])->name('recodes');



Route::get('/', function () {
    return view('welcome');
});