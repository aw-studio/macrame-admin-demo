<?php

namespace App\Models;

use Astrotomic\Fileable\Concerns\HasFiles;
use Astrotomic\Fileable\Contracts\Fileable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model implements Fileable
{
    use HasFactory, HasFiles;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'name', 'slug',
    ];

    /**
     * Attributes casts.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'json',
    ];
}
