<?php

namespace Admin\Http\Indexes;

use App\Models\FileCollection;
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
                'model_has_files',
                function ($query) use ($filters) {
                    $query
                        ->where('model_type', FileCollection::class)
                        ->where(
                            'model_id',
                            FileCollection::firstOrCreate(['key' => $filters['collection']])->id
                        );
                }
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