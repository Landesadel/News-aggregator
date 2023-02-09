<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;
    public function getNews(): Collection
    {
        return \DB::table('news')->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->get();
    }

    public function getNewsById(int $id): mixed
    {
        return \DB::table('news')->find($id);
    }
}
