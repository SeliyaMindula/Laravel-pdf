<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LabelController; 
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for label filtering and PDF generation
    Route::get('/labels/filter', [LabelController::class, 'showFilterForm'])->name('labels.filter');
    Route::post('/labels/generate', [LabelController::class, 'generatePDF'])->name('labels.generate');
   
});

require __DIR__.'/auth.php';
