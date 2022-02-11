<?php

namespace App\Contracts;

use App\Models\Types\PermissionType as Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

interface Accessor
{
    public function grant(Restrictable | Collection $model, Type $type = null);

    public function deny(Restrictable | Collection $model, Type $type = null);

    public function isOwner(Restrictable $model): bool;

    public function hasAccess(Restrictable | Collection $model, Type $type = null): bool;

    public function granted(string $model): BelongsToMany;

    public function permissions(): MorphMany;
}
