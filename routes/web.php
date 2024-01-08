<?php

use App\Http\Controllers\HomeController;
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

Route::post('table_load_content/', [HomeController::class, 'table_load_content'])->name('table_load_content');
Route::get('table/', [HomeController::class, 'table'])->name('table');
Route::get('/', [HomeController::class, 'index'])->name('index');