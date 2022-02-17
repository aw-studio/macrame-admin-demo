<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Macrame\CMS\Media\Contracts\AttachableFile;
use Macrame\CMS\Media\Traits\IsAttachableFile;

class File extends Model implements AttachableFile
{
    use IsAttachableFile;

    protected $fillable = [
        'display_name', 'group', 'disk', 'filepath', 'filename', 'mimetype',
        'size', 'meta',
    ];

    protected $casts = [
        'size' => 'int',
        'meta' => 'json',
    ];

    protected $attributes = [
        'disk' => 'public',
    ];

    public function collections(): BelongsToMany
    {
        return $this->attached(FileCollection::class);
    }
}
