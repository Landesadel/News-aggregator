<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

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
            'newsList' => $newsBuilder->getNewsWithPagination(),
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoriesId());
            return redirect()->route('admin.news.index')->with('success', 'News added');
        }

        return \back()->with('error', 'Something wrong... Try again later');
    }

    /**
     * @param $id
     */
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
     * @param EditRequest $request
     * @param News        $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());

        if ($news) {
            $news->categories()->sync($request->getCategoriesId());
            return redirect()->route('admin.news.index')->with('success', 'News changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    /**
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
