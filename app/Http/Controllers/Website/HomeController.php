<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::query()->latest()->paginate(9);

        $latestArticles = Article::query()->latest()->take(3)->get();

        return Inertia::render('Website/Index', compact(
            'articles',
            'latestArticles'
        ));
    }
}
