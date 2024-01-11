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
    Route::get('/customers', [ProfileController::class, 'customers'])->name('customers');
    Route::post('/customer/create', [ProfileController::class, 'customer_create'])->name('customer_create');
    Route::post('/customer/edit/{id}', [ProfileController::class, 'customer_edit'])->name('customer_edit');

    // 
    Route::get('/buyers', [ProfileController::class, 'buyers'])->name('buyers');
    Route::post('/buyer/create', [ProfileController::class, 'buyer_create'])->name('buyer_create');
    Route::post('/buyer/edit/{id}', [ProfileController::class, 'buyer_edit'])->name('buyer_edit');


    Route::get('/sellers', [ProfileController::class, 'sellers'])->name('sellers');
    Route::post('/seller/create', [ProfileController::class, 'seller_create'])->name('seller_create');
    Route::post('/seller/edit/{id}', [ProfileController::class, 'seller_edit'])->name('seller_edit');

    // 
    Route::get('/classifiers', [ProfileController::class, 'classifiers'])->name('classifiers');
    Route::post('/classifier/create', [ProfileController::class, 'classifier_create'])->name('classifier_create');
    Route::post('/classifier/edit/{id}', [ProfileController::class, 'classifier_edit'])->name('classifier_edit');
    Route::get('/tasks', [ProfileController::class, 'tasks'])->name('tasks');
    Route::post('/task/create', [ProfileController::class, 'task_create'])->name('task_create');
    Route::post('/task/edit/{id}', [ProfileController::class, 'task_edit'])->name('task_edit');
    Route::post('/task/change_status/{id}', [ProfileController::class, 'change_status'])->name('change_status');
    Route::get('/task/inbox/{id}', [ProfileController::class, 'inbox'])->name('inbox');
    Route::get('/task/compose/{id}', [ProfileController::class, 'compose'])->name('compose');
    Route::post('/task/compose/{id}', [ProfileController::class, 'compose'])->name('compose_post');
    Route::get('/task/readMessage/{id}', [ProfileController::class, 'readMessage'])->name('readMessage');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
