<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('', 'dashboard')->name('dashboard');
Volt::route('product/{id}', 'pages.product-details')->name('product.details');
Volt::route('stories/{story}', 'pages.stories')->name('stories');
Volt::route('checkout', 'pages.checkout')->name('checkout');

Route::middleware('auth.session')->group(function () {
    Route::view('profile', 'profile')->name('profile');
});


require __DIR__.'/auth.php';
