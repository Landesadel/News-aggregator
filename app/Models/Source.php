<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Source extends Model
{
    use HasFactory;

    public function getSource(): Collection
    {
        return \DB::table('source')->select(['id', 'name', 'url', 'created_at'])->get();
    }
}
