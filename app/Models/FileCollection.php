<?php

namespace App\Models;

use Awstudio\LaravelFiles\Contracts\HasFilesInterface;
use Awstudio\LaravelFiles\Traits\HasFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FileCollection extends Model implements HasFilesInterface
{
    use HasFiles;

    protected $guarded = [];

    public static function booted()
    {
        self::creating(function ($collection) {
            if (! $collection->key) {
                $collection->key = Str::snake($collection->name);
            }
        });
    }
}