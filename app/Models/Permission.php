<?php

namespace App\Models;

use App\Models\Types\PermissionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_type', 'object_id',
        'user_type', 'user_id',
        'owner_type', 'owner_id',
        'type',
    ];

    protected $casts = [
        'type' => PermissionType::class,
    ];
}
