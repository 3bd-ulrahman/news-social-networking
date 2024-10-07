<?php

use App\Http\Controllers\Website\CategoryArticleController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsletterController;
use App\Http\Controllers\Website\ArticleCommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters.store');

Route::resource('categories.articles', CategoryArticleController::class)->shallow();

Route::resource('articles.comments', ArticleCommentController::class)->scoped([
    'article' => 'id'
]);

Route::get('contact-us', function () {
    return inertia('Website/ContactUs');
});
