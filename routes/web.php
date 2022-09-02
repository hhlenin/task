<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/products', ProductController::class);
});
