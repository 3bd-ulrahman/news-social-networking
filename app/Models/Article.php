<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Sluggable, Searchable;

    protected $table = 'articles';

    protected $fillable = [
        'category_id',
        'user_id',
        'status',
        'is_commentable',
        'views_count',
        'title',
        'slug',
        'content',
        'images'
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array'
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }
}
