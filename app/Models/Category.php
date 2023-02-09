<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    public function getCategory(): Collection
    {
        return \DB::table('categories')->select(['id', 'title'])->get();
    }
}
