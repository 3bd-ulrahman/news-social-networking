<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'settings' => $this->settings(),
            'sharedCategories' => $this->categories(),
            'flash' => [
                'success' => session('success'),
                'warning' => session('warning'),
                'error' => session('error')
            ],
        ]);
    }

    private function settings()
    {
        $settings = Cache::remember('settings', now()->addDay(), function () {
            return \App\Models\Setting::query()->get();
        });

        return $settings->mapWithKeys(function ($item) {
            return [$item['key'] => $item['value']];
        });
    }

    private function categories()
    {
        return Cache::remember('shared_categories', now()->addDay(), function () {
            return \App\Models\Category::query()->active()->get();
        });
    }
}
