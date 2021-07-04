<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [ProfileController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile/index', [ProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/profile/create', [ProfileController::class, 'create'])
    ->name('profile.create');

Route::post('/profile/store', [ProfileController::class, 'store'])
    ->name('profile.store');
    
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])
->name('profile.edit');

Route::post('/profile/{id}/update', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::post('/profile/{id}/destroy', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

Route::get('/contact/index', [ContactController::class, 'index'])
    ->name('contact.index');

Route::get('/contact/create', [ContactController::class, 'create'])
    ->name('contact.create');
    
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');

