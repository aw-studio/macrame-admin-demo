<?php

namespace App\Models;

use App\Http\Controllers\SiteController;
use Astrotomic\Fileable\Concerns\HasFiles;
use Astrotomic\Fileable\Contracts\Fileable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;

class Site extends Model implements Fileable
{
    use HasFactory, HasFiles;

    protected $controller = SiteController::class;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'name', 'slug', 'template', 'full_slug', 'order_column', 'is_live',
    ];

    /**
     * Attributes casts.
     *
     * @var array
     */
    protected $casts = [
        'content'    => 'json',
        'attributes' => 'json',
        'is_live'    => 'boolean',
    ];

    protected $attributes = [
        'content'    => '[]',
        'attributes' => '[]',
    ];

    public function scopeWhereRoot($query)
    {
        $query->whereNull('parent_id');
    }

    public static function root()
    {
        return static::whereRoot()->orderBy('order_column')->get();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    public static function routes()
    {
        static::where('parent_id', null)
            ->get()
            ->each(function (self $site) {
                // if (! $site->is_live) {
                //     return;
                // }

                Route::get(
                    $site->getFullSlug(),
                    $site->getController()
                )->name("site.{$site->id}");
            });
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getFullSlug()
    {
        if (! $this->parent) {
            return '/'.$this->slug;
        }

        return $this->parent->slug.'/'.$this->slug;
    }
}
