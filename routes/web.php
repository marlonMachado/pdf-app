<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [PdfController::class, 'index'])->name('index.index');
Route::post('index', [PdfController::class, 'savePdf'])->name('index.savePdf');
Route::get('pdf/{paramen}/edit', [PdfController::class, 'edit'])->name('edit');
Route::put('pdf/{paramen}', [PdfController::class, 'update'])->name('update');
Route::delete('pdf/{paramen}/delete', [PdfController::class, 'destroy'])->name('delete');

