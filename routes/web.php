<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group( function(){
    Route::get('/','index')->name('home');
    Route::get('/books','all')->name('books');
    Route::get('/result', 'search')->name('search');
    Route::get('/result/category', 'filter')->name('category.filter');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin')->middleware(AdminMiddleware::class)->name('admin.')->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::controller(BookController::class)->group( function() {
        Route::get('/book', 'index')->name('book');
        Route::get('/book/create', 'create')->name('book.create');
        Route::post('/book/store', 'store')->name('book.store');
        Route::get('/book/edit/{id}', 'edit')->name('book.edit');
        Route::put('/book/update/{id}', 'update')->name('book.update');
        Route::delete('/book/destroy/{id}', 'destroy')->name('book.destroy');
        Route::get('/result', 'search')->name('search');
    });
    Route::controller(PageController::class)->group( function() {
        Route::get('/book/{id}/pages', 'index')->name('book.pages');
        Route::get('/book/{id}/pages/create', 'create')->name('book.pages.create');
        Route::post('/book/{id}/pages/store', 'store')->name('book.pages.store');
        Route::delete('/book/pages/destroy/{id}', 'destroy')->name('book.pages.destroy');
    });
    Route::controller(CategoryController::class)->group( function() {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::put('/category/update/{id}', 'update')->name('category.update');
        Route::delete('/category/destroy/{id}', 'destroy')->name('category.destroy');
    });
});

require __DIR__.'/auth.php';
