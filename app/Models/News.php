<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'Categories_id' => 'array',
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_has_news',
            'news_id',
            'category_id'
        );
    }

    /**
     * @return Collection
     */
    public function getNews(): Collection
    {
        return \DB::table('news')->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getNewsById(int $id): mixed
    {
        return \DB::table('news')->find($id);
    }
}
