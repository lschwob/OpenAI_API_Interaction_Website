<?php

use App\Http\Controllers\IaController;
use App\Http\Controllers\LoginController;
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
Route::post('/contact', [IaController::class, 'store_contact'])->name('contact.store');
Route::get('/contact/success', [IaController::class, 'contact_success'])->name('contact.success');
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('admin.login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/signup', [IaController::class, 'register'])->name('register');
Route::post('/admin/signup', [IaController::class, 'store_register'])->name('register.store');