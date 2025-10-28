<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\InnovationController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;


// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu utama
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/innovation', [InnovationController::class, 'index'])->name('innovation');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
