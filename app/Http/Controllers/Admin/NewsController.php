<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsBuilder): View
    {
        return \view('admin.news.index', [
            'newsList' => $newsBuilder->getNewsWithPagination() ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesQueryBuilder $categoryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoryBuilder): View
    {
        return \view('admin.news.create', [
            'categories' => $categoryBuilder->getCollection(),
            'statuses' => NewsStatusEnum::getCollectionStatus(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'News added');
        }

        return \back()->with('error', 'Something wrong... Try again later');
    }

    public function show($id)
    {
        //
    }

    /**
     * @param News                   $news
     * @param CategoriesQueryBuilder $categoryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoryBuilder): View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoryBuilder->getCollection(),
            'statuses' => NewsStatusEnum::getCollectionStatus(),
        ]);
    }

    /**
     * @param Request $request
     * @param News    $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'Categories'));

        if ($news->save()) {
            $news->categories()->sync($request->input('Categories'));
            return redirect()->route('admin.news.index')->with('success', 'News changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    public function destroy($id)
    {
        //
    }
}
