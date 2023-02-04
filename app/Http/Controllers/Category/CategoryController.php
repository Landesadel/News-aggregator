<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;

    /**
     * @return View
     */
    public function index (): View
    {
        return \view('Category.Category', [
            'categoryCollection' => $this->getCategoryList(),
        ]);
    }
}
