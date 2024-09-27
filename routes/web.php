<?php

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters.store');

Route::get('contact-us', function () {
    return inertia('Website/ContactUs');
});
