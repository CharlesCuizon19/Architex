<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/properties', [PageController::class, 'properties'])->name('properties');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/blog-single-page', [PageController::class, 'blogSinglePage'])->name('blog-single-page');
Route::get('/properties-single-page', [PageController::class, 'propertiesSinglePage'])->name('properties-single-page');
