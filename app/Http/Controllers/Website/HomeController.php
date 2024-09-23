<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Cache;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

        $latestArticles = Cache::remember('latest_articles', now()->addMinutes(60), function () {
            return Article::query()->latest()->take(4)->get();
        });

        $mostViewedArticles = Article::query()->orderBy('views_count', 'desc')
            ->take(3)
            ->get();

        $popularArticles = Article::query()->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(3)
            ->get();

        $categories = Category::query()->with('articles', function (Builder $query) {
                $query->whereBetween('created_at', [
                    now()->subWeek(), now()
                ])->inRandomOrder()->take(4);
            })->inRandomOrder()->take(4)->get();

        $readMoreArticles = Cache::remember('read_more_articles', now()->addMinutes(60), function () {
            return Article::query()->select(['id', 'title'])->latest()->take(10)->get();
        });

        return Inertia::render('Website/Index', compact(
            'articles',
            'latestArticles',
            'mostViewedArticles',
            'popularArticles',
            'categories',
            'readMoreArticles'
        ));
    }
}
