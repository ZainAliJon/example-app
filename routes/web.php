<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/',

Route::get('/dashboard', function () {
    return redirect(url('/'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'welcome'])->name('welcome');
    Route::get('/users', [ProfileController::class, 'users'])->name('customers');
    Route::post('/user/create', [ProfileController::class, 'user_create'])->name('user_create');
    Route::post('/user/edit/{id}', [ProfileController::class, 'user_edit'])->name('user_edit');
    Route::get('/user/delete/{id}', [ProfileController::class, 'Delete'])->name('user.Delete');

        
    Route::get('/site', [ProfileController::class, 'sites'])->name('sites');
    Route::post('/site/create', [ProfileController::class, 'site_create'])->name('site_create');
    Route::post('/site/edit/{id}', [ProfileController::class, 'site_edit'])->name('site_edit');
    Route::get('/site/delete/{id}', [ProfileController::class, 'Deletesites'])->name('site.Delete');
});

require __DIR__.'/auth.php';
