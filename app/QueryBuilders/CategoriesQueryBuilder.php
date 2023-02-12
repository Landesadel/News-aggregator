<?php


namespace App\QueryBuilders;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategoriesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getCategoryById(int $id): Collection
    {
        return Category::query()->where('id', $id)->get();
    }

    /**
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return $this->model->get();
    }
}
