<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
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
     *
     */
    public function create(SourceQueryBuilder $sourceBuilder): view
    {
        return \view('admin.categories.create', [
            'sources' => $sourceBuilder->getCollection(),
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = new Category($request->except('_token'));

        if ($category->save()) {
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
     * @param Request  $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->except('_token', 'sources'));

        if ($category->save()) {
            $category->sources()->sync($request->input('sources'));
            return redirect()->route('admin.categories.index')->with('success', 'Category changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
