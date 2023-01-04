<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TimController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/portofolio', [HomeController::class, 'portofolio']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/feedback', FeedbackController::class)->except(['index', 'create', 'show', 'edit']);

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/autentikasi', [LoginController::class, 'autentikasi']);
Route::post('/keluar', [LoginController::class, 'keluar']);

Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth');
Route::resource('/admin/masjid', MasjidController::class)->except('create')->middleware('auth');
Route::resource('/admin/bahan', BahanController::class)->except('create')->middleware('auth');
Route::resource('/admin/tim', TimController::class)->except('show')->middleware('auth');
Route::resource('/admin/dokumentasi', PortofolioController::class)->except(['create', 'show'])->middleware('auth');
