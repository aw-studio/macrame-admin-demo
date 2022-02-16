<?php

namespace Admin\Http\Indexes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Macrame\Table\Table;

class FileIndex extends Table
{
    protected $defaultPerPage = 10;

    /**
     * Handle search.
     *
     * @param  Builder $query
     * @param  string  $search
     * @return void
     */
    public function search(Builder $query, $search)
    {
        $query->where(function (Builder $query) use ($search) {
            $query
                ->where('filename', 'LIKE', "%{$search}%");
        });
    }

    /**
     * Apply filter to the query.
     *
     * @param  Builder    $query
     * @param  Collection $filters
     * @return void
     */
    public function filter(Builder $query, Collection $filters)
    {
        if ($filters->has('collection')) {
            // query files

            $query->whereHas(
                'collections',
                fn ($q) => $q->where('key', $filters['collection'])
            );
        }

        if ($filters->has('type')) {
            if ($filters['type'] == 'images') {
                $query->where('mimetype', 'like', 'image/%');
            }
            if ($filters['type'] == 'documents') {
                $query->where('mimetype', 'like', 'application/%')
                    ->orWhere('mimetype', 'like', 'text/%');
            }
        }
    }

    /**
     * Apply orders to the query.
     *
     * @param  Builder    $query
     * @param  Collection $sort
     * @return void
     */
    public function sort(Builder $query, Collection $sort)
    {
        foreach ($sort as $key => $direction) {
            $query->orderBy($key, $direction);
        }
    }
}
