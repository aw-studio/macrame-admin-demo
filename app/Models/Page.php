<?php

namespace App\Models;

use App\Http\Controllers\SiteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Macrame\CMS\Media\Traits\HasFiles;

class Page extends Model
{
    use HasFactory, HasFiles;

    /**
     * The namespace of the controller that handles pages.
     *
     * @var string
     */
    protected $controller = SiteController::class;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'name',
        'slug',
        'template',
        'full_slug',
        'order_column',
        'is_live',
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
}
