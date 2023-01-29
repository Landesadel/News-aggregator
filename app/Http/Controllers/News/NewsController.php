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

    public function index($category): Factory|View|Application
    {
        return \view('News.News', [
            'newsCollection' => $this->getNews($category),
        ]);
    }

    public function show(int $id, string $category): Factory|View|Application
    {
        return \view('News.Article', [
            'news' => $this->getArticle($id, $category)
        ]);
    }
}
