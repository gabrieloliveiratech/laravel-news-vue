<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Contracts\NewsRepository;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class NewsRepositoryEloquent.
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Return build Eloquent query
     *
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string  $queryBuilder
     * @return mixed
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
                        $subquery->where('title', 'LIKE', '%'.$value.'%')
                            ->orWhere('content', 'LIKE', '%'.$value.'%')
                            ->orWhereHas('categories', function (Builder $query) use ($value) {
                                $query->where('name', 'LIKE', '%'.$value.'%');
                            });
                    });
                }),
            ])->get();
    }

    public function getAll()
    {
        return $this->queryBuilder($this->model());
    }
}
