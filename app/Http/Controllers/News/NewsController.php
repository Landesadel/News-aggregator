<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Category\CategoryTrait;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoryTrait;

    /**
     * @param  QueryBuilder  $builder
     * @return View
     */
    public function index(QueryBuilder $builder): View
    {
        $newsModel = News::query()->paginate(10);
        return \view('News.index', [
            'newsCollection' => $newsModel,
        ]);
    }

    /**
     * @param News $news
     * @return View
     */
    public function show(News $news): View
    {
        return \view('News.Article', [
            'news' => $news,
        ]);
    }
}
