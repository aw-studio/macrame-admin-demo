<?php

namespace Macrame\CMS\Pages\Traits;

use Closure;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Route;

trait IsPage
{
    public static function routes()
    {
        try {
            static::where('parent_id', null)
                ->get()
                ->each(function (self $site) {
                    if (! $site->is_live) {
                        return;
                    }

                    Route::get(
                        $site->getFullSlug(),
                        $site->getController()
                    )->name("site.{$site->id}");
                });
        } catch (QueryException $e) {
        }
    }

    public static function root()
    {
        return static::whereRoot()->orderBy('order_column')->get();
    }

    public function getRouteAction(): string | Closure
    {
        return $this->controller;
    }

    public function getFullSlug(): string
    {
        if (! $this->parent) {
            return '/'.$this->slug;
        }

        return $this->parent->slug.'/'.$this->slug;
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    public function scopeWhereRoot($query)
    {
        $query->whereNull('parent_id');
    }
}
