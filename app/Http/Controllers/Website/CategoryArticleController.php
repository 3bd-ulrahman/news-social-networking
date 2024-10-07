<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $articles = $category->articles()->latest()->paginate(9);

        return Inertia::render('Website/Categories/Posts/Index', compact('category', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = $article->load(['comments' => function ($query) {
            $query->take(10);
        }, 'comments.user:id,username,avatar']);

        $similarArticles = Article::query()->whereHas('category', function (Builder $query) use ($article) {
            $query->where('slug', $article->category->slug);
        })->where('articles.id', '!=', $article->id)->latest()->take(5)->get();

        return Inertia::render('Website/Categories/Posts/Show', compact('article', 'similarArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
