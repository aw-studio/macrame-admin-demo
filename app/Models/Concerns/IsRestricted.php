<?php

namespace App\Models\Concerns;

use App\Models\Types\PermissionType as Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait IsRestricted
{
    public function grantFor(Model $model, Type $type = null)
    {
    }

    public function denyFor(Model $model, Type $type = null)
    {
    }

    public function users(): MorphTo
    {
        return $this->morphTo();
    }
}
