<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FineTuningController;

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
Route::get('/ias/blog_intro', [FineTuningController::class, 'blog_intro'])->name('blog_intro');
Route::post('/ias/blog_intro', [FineTuningController::class, 'blog_intro_form'])->name('blog_intro_form');

//Ias routes
Route::get('/ias/mail_gen', [IaController::class, 'mail_show'])->name('mail');
Route::post('/ias/mail_gen', [IaController::class, 'mail_form'])->name('mail_form');
Route::get('/ias/image', [IaController::class, 'image'])->name('image');
Route::post('/ias/image', [IaController::class, 'image_form'])->name('image_form');
Route::get('/ias/audio_explainer', [IaController::class, 'audio'])->name('audio');
Route::post('/ias/audio_explainer', [IaController::class, 'audio_form_explain'])->name('audio_explain_form');
Route::get('/ias/pdf_explainer', [IaController::class, 'pdf_view'])->name('pdf');
Route::post('/ias/pdf_explainer', [IaController::class, 'pdf_to_text'])->name('pdf_to_text');

//Ft routes
// Route::get('/ft', [FineTuningController::class, 'ft'])->name('ft');
// Route::post('/ft/upload_training', [FineTuningController::class, 'upload_ft_training'])->name('upload_training');
// Route::get('/ft/list_files', [FineTuningController::class, 'list_files'])->name('list_files');
// Route::post('/ft/retrieve_file', [FineTuningController::class, 'retrieve_file'])->name('retrieve_file');
// Route::post('/ft/delete_file', [FineTuningController::class, 'delete_file'])->name('delete_file');
// Route::post('/ft/download_file', [FineTuningController::class, 'download_file'])->name('download_file');
// Route::post('/ft/create_ft', [FineTuningController::class, 'create_ft'])->name('create_ft');
// Route::get('/ft/list_ft', [FineTuningController::class, 'list_ft'])->name('list_ft');
// Route::post('/ft/retrieve_ft', [FineTuningController::class, 'retrieve_ft'])->name('retrieve_ft');
// Route::post('/ft/try_ft', [FineTuningController::class, 'try_ft'])->name('try_ft');
// Route::post('/ft/compare_gpt', [FineTuningController::class, 'compare_gpt'])->name('compare_gpt');


//Test Routes
// Route::get('/test', [IaController::class, 'test'])->name('test');