<?php

namespace App\Models;

use App\Contracts\Restrictable;
use App\Http\Controllers\SiteController;
use App\Models\Concerns\IsRestricted;
use Astrotomic\Fileable\Concerns\HasFiles;
use Astrotomic\Fileable\Contracts\Fileable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Macrame\Cms\Pages\Contracts\Page as PageContract;
use Macrame\Cms\Pages\Traits\IsPage;

class Page extends Model implements Fileable, PageContract, Restrictable
{
    use HasFactory, HasFiles, IsPage, IsRestricted;

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

    // public function addFile(File $file)
    // {
    //     $this->files()->attach($file->id);
    // }

    // public function files()
    // {

    // }
}
