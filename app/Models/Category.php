<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'source',
        'description',
    ];

    protected $casts = [
        'news_id' => 'array',
        'sources_id' => 'array'
    ];

    /**
     * @return BelongsToMany
     */
    public function News(): BelongsToMany
    {
        return $this->belongsToMany(
            News::class,
            'category_has_news',
            'category_id',
            'news_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function sources(): BelongsToMany
    {
        return $this->belongsToMany(
            Source::class,
            'source_has_category',
            'category_id',
            'source_id'
        );
    }

    /**
     * @return Collection
     */
    public function getCategory(): Collection
    {
        return \DB::table('categories')->select(['id', 'title', 'description, created_at'])->get();
    }
}
