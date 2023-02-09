<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;

    /**
     * @return View
     */
    public function index (): View
    {
        $model = new Category();
        return \view('Category.Category', [
            'categoryCollection' => $model->getCategory(),
        ]);
    }
}
