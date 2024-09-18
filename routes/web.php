<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Website/Index');
});

Route::get('contact-us', function () {
    return inertia('Website/ContactUs');
});
