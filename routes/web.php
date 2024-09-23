<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Website\HomeController::class)->name('home');

Route::get('contact-us', function () {
    return inertia('Website/ContactUs');
});
