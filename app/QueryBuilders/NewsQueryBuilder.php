<?php


namespace App\QueryBuilders;


use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    /**
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('Categories')->paginate($quantity);
    }

    public function getNewsByStatus(string $status): Collection
    {
        return News::query()->where('status', $status)->get();
    }

    /**
     * @return $this
     */
    function getCollection(): Collection
    {
        return News::query()->get();
    }
}
