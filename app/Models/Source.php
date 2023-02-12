<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Source extends Model
{
    use HasFactory;

    protected $table = 'source';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
        'category',
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
            'source_has_category',
            'source_id',
            'category_id'
        );
    }

    /**
     * @return Collection
     */
    public function getSource(): Collection
    {
        return \DB::table('source')->select(['id', 'name', 'url', 'created_at'])->get();
    }
}
