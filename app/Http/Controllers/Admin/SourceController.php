<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourceQueryBuilder $sourceBuilder
     * @return View
     */
    public function index(SourceQueryBuilder $sourceBuilder): View
    {
        return \view('admin.sources.index', [
            'sourceList' => $sourceBuilder->getSourceWithPagination(),
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
        return \view('admin.sources.create', [
            'categories' => $categoryBuilder->getCollection(),
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
            'name' => 'required',
            'category' => 'selected',
            'url' => 'required|url',
        ]);

        $source = new Source($request->except('_token'));

        if ($source->save()) {
            return redirect()->route('admin.source.index')->with('success', 'New source added');
        }

        return \back()->with('error', 'Something wrong... Try again later!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source                 $source
     * @param CategoriesQueryBuilder $categoryBuilder
     * @return View
     */
    public function edit(Source $source, CategoriesQueryBuilder $categoryBuilder): View
    {
        return \view('admin.sources.edit', [
            'source' => $source,
            'categories' => $categoryBuilder->getCollection(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Source  $source
     * @return RedirectResponse
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token'));

        if ($source->save()) {
            $source->categories()->sync($request->input('Categories'));
            return redirect()->route('admin.source.index')->with('success', 'Source changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
