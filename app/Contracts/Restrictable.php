<?php

namespace App\Contracts;

use App\Models\Types\PermissionType as Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

interface Restrictable
{
    public function getKey();

    public function grantFor(Model $model, Type $type = null);

    public function denyFor(Model $model, Type $type = null);

    public function users(): MorphTo;
}
