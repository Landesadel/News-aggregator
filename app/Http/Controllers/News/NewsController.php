<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Category\CategoryTrait;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoryTrait;

    /**
     * @param $category
     * @return View
     */
    public function index(QueryBuilder $builder): View
    {
        $newsModel = new News;
        return \view('News.News', [
            'newsCollection' => $newsModel->getNews(),
        ]);
    }

    /**
     * @param int $id
     * @param string|null $category
     * @return View
     */
    public function show(int $id, string $category = null): View
    {
        $newsModel = new News;
        return \view('News.Article', [
            'news' => $newsModel->getNewsById($id)
        ]);
    }
}
