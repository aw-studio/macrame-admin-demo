<?php

namespace App\Models;

use Astrotomic\LaravelEloquentUuid\Eloquent\Concerns\UsesUUID;
use Awstudio\LaravelFiles\Contracts\FileContract;
use Awstudio\LaravelFiles\Traits\IsFile;
use Illuminate\Database\Eloquent\Model;

class File extends Model implements FileContract
{
    use UsesUUID;
    use IsFile;

    protected $guarded = [];

    protected $casts = [
        'size' => 'int',
        'meta' => 'json',
    ];

    protected $appends = [
        'url',
    ];

    public static function booted()
    {
        self::deleting(function ($file) {
            $file->model_has_files()->delete();
        });
    }

    public function getUrlAttribute()
    {
        return $this->storage()->url($this->filepath);
    }
}