<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Category\CategoryTrait;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoryTrait;

    public function index (): Factory|View|Application
    {
        return \view('News.News', [
            'newsCollection' => $this->getNews(),
        ]);
    }

    public function show (int $id): array
    {
        return $this->getCategoryNews($id);
    }
}
