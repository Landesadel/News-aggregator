<?php


namespace App\QueryBuilders;


use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SourceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    function __construct()
    {
        $this->model = Source::query();
    }

    public function getSourceWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('Categories')->paginate($quantity);
    }

    public function getSourceById(int $id): Collection
    {
        return Source::query()->where('id', $id)->get();
    }

    /**
     * @return Collection
     */
    function getCollection(): Collection
    {
        return $this->model->get();
    }
}
