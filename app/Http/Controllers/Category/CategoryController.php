<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function index (): Factory|View|Application
    {
        return \view('Category.Category', [
            'categoryCollection' => $this->getCategoryList(),
        ]);
    }
}
