<?php

use App\Http\Controllers\IaController;
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

Route::get('/', [IaController::class, 'index'])->name('home');
Route::get('/mail', [IaController::class, 'mail_show'])->name('mail');
Route::get('/ias', [IaController::class, 'ias_show'])->name('ias');
Route::get('/about', [IaController::class, 'about'])->name('about');
Route::get('/contact', [IaController::class, 'contact'])->name('contact');