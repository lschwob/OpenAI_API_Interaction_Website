<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;
use App\Http\Controllers\LoginController;

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
Route::get('/ias', [IaController::class, 'ias_show'])->name('ias');
Route::get('/about', [IaController::class, 'about'])->name('about');
Route::get('/products', [IaController::class, 'products'])->name('products');
Route::get('/contact', [IaController::class, 'contact'])->name('contact');
Route::post('/contact', [IaController::class, 'store_contact'])->name('contact.store');
Route::get('/contact/success', [IaController::class, 'contact_success'])->name('contact.success');
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('admin.login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
// Route::get('/admin/signup', [IaController::class, 'register'])->name('register');
// Route::post('/admin/signup', [IaController::class, 'store_register'])->name('register.store');
Route::get('/admin', [IaController::class, 'admin'])->name('admin');
Route::post('/admin', [IaController::class, 'store_ia'])->name('ia.store');

//Routes pro
// Route::get('/pro', [IaController::class, 'pro'])->name('pro');

//Ias routes
Route::get('/ias/mail_gen', [IaController::class, 'mail_show'])->name('mail');
Route::post('/ias/mail_gen', [IaController::class, 'mail_form'])->name('mail_form');
Route::get('/ias/image', [IaController::class, 'image'])->name('image');
Route::post('/ias/image', [IaController::class, 'image_form'])->name('image_form');
Route::get('/ias/audio_explainer', [IaController::class, 'audio'])->name('audio');
Route::post('/ias/audio_explainer', [IaController::class, 'audio_form_explain'])->name('audio_explain_form');
Route::get('/ias/pdf_explainer', [IaController::class, 'pdf_view'])->name('pdf');
Route::post('/ias/pdf_explainer', [IaController::class, 'pdf_to_text'])->name('pdf_to_text');