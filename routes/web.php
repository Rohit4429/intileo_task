<?php

use App\Http\Controllers\DiscrictController;
use App\Models\Discrict;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[DiscrictController::class,'index'])->name('index');
Route::get('/list',[DiscrictController::class,'list'])->name('list');
Route::post('/store',[DiscrictController::class,'store'])->name('store');
Route::post('/update',[DiscrictController::class,'update'])->name('update');
Route::get('/delete/{id}',[DiscrictController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[DiscrictController::class,'edit'])->name('edit');

Route::get('/download-pdf',[DiscrictController::class,'download'])->name('download.pdf');
