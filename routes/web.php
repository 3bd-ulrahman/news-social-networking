<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Website\CategoryArticleController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsletterController;
use App\Http\Controllers\Website\ArticleCommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters.store');

Route::get('articles/search', SearchController::class)->name('articles.search');

Route::resource('categories.articles', CategoryArticleController::class)->shallow();

Route::resource('articles.comments', ArticleCommentController::class)->scoped([
    'article' => 'id'
]);

Route::resource('contacts', ContactController::class);
