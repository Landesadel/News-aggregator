<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Category\CategoryTrait;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoryTrait;

    /**
     * @param $category
     * @return View
     */
    public function index($category): View
    {
        return \view('News.News', [
            'newsCollection' => $this->getNews($category),
        ]);
    }

    /**
     * @param int $id
     * @param string $category
     * @return View
     */
    public function show(int $id, string $category): View
    {
        return \view('News.Article', [
            'news' => $this->getArticle($id, $category)
        ]);
    }
}
