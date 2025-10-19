<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; //追記
use App\Http\Controllers\CategoryController; //追記

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

Route::get('/item', [ItemController::class, 'index']);


Route::get('/item/edit/{id}', [ItemController::class, 'showEdit']);

Route::post('/item/edit/{id}', [ItemController::class, 'edit']);

Route::get('/item/add', [ItemController::class, 'showAdd']);

Route::post('/item/add', [ItemController::class, 'add']);

Route::post('/item/delete/{id}', [ItemController::class, 'delete']);

//カテゴリ
Route::get('/category', [CategoryController::class, 'index']);

Route::post('/category/add', [CategoryController::class, 'add']);

Route::get('/category/add', [CategoryController::class, 'showAdd']);

Route::post('/category/edit/{id}', [CategoryController::class, 'edit']);

Route::get('/category/edit/{id}', [CategoryController::class, 'showEdit']);

Route::post('/category/delete/{id}', [CategoryController::class, 'delete']);


// Route::get('/item', function () {
//     return view("item.index");
// });
