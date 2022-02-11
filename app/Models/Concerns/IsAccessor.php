<?php

namespace App\Models\Concerns;

use App\Contracts\Restrictable;
use App\Models\Permission;
use App\Models\Types\PermissionType as Type;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait IsAccessor
{
    //

    public function grant(Restrictable | Collection $model, Type $type = null)
    {
        if ($model instanceof Collection) {
            return $model->each(fn (Restrictable $m) => $this->grant($m));
        }

        // Only owners can grant access to a model.
        if (! $this->is_owner($model)) {
            throw new AuthorizationException('Unauthorized');
        }

        // Accessor already has access to the model.
        if ($this->hasAccess($model)) {
            return;
        }

        $this->permissions([
            // todo
        ])->create();
    }

    public function deny(Restrictable | Collection $model, Type $type = null)
    {
        if ($model instanceof Collection) {
            return $model->each(fn (Restrictable $m) => $this->grant($m));
        }

        // Only owners can revoke access to a model.
        if (! $this->is_owner($model)) {
            throw new AuthorizationException('Unauthorized');
        }

        DB::transaction(function () use ($model, $type) {
            $permission = $this->getPermissionsFor($model, $type);

            if ($this->isLoaded('permissions')) {
                $this->relations['permissions'] = $this->permissions->filter(
                    fn ($p) => $p->getKey() == $permission->getKey()
                );
            }

            $permission->delete();
        });
    }

    public function isOwner(Restrictable $model): bool
    {
        return $this->is_admin;
    }

    public function hasAccess(Restrictable | Collection $model, Type $type = null): bool
    {
        if ($model instanceof Collection) {
            return ! $model->first(fn (Restrictable $m) => ! $this->has_access($m));
        }

        return $this->getPermissionsFor($model, $type);
    }

    public function getPermissionsFor(Restrictable $model, Type $type = null): ?Permission
    {
        return $this->permissions
            ->filter(function (Permission $permission) use ($type) {
                return is_null($type) || $permission->type == $type;
            })
            ->first(function (Permission $permission) use ($model) {
                return $permission->object_type == get_class($model)
                    && $permission->object_id == $model->getKey();
            });
    }

    public function permissions(): MorphMany
    {
        return $this->morphMany(Permission::class, 'user');
    }

    public function granted(string $model): BelongsToMany
    {
        return $this
            ->belongsToMany($model, 'permissions', 'user_id', 'object_id')
            ->where('user_type', static::class)
            ->where('object_type', $model);
    }
}
