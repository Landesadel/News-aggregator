<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param CategoriesQueryBuilder $categoryBuilder
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoryBuilder): View
    {
        return \view('admin.categories.index', [
            'categoryList' => $categoryBuilder->getCategoriesWithPagination(),
        ]);
    }


    /**
     * @param SourceQueryBuilder $sourceBuilder
     * @return View
     */
    public function create(SourceQueryBuilder $sourceBuilder): view
    {
        return \view('admin.categories.create', [
            'sources' => $sourceBuilder->getCollection(),
        ]);
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        if ($category) {
            $category->sources()->attach($request->getSourcesId());
            return redirect()->route('admin.categories.index')->with('success', 'New Category added');
        }

        return \back()->with('error', 'Something wrong... Try again later!');
    }

    /**
     * @param int $id
     */
    public function show(int $id)
    {
        //
    }

    /**
     * @param Category           $category
     * @param SourceQueryBuilder $sourceBuilder
     * @return View
     */
    public function edit(Category $category, SourceQueryBuilder $sourceBuilder): view
    {
        return \view('admin.categories.edit', [
            'category' => $category,
            'sources' => $sourceBuilder->getCollection(),
        ]);
    }

    /**
     * @param EditRequest $request
     * @param Category    $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());

        if ($category) {
            $category->sources()->sync($request->getSourcesId());
            return redirect()->route('admin.categories.index')->with('success', 'Category changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    /**
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        try{
            $category->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
