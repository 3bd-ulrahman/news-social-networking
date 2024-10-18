<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::search($request->search)->paginate(9);

        return Inertia::render('Website/Search', compact('articles'));
    }
}
