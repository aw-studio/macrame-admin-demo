<?php

namespace App\Models\Types;

enum PermissionType: string
{
    case CREATE = 'create';
    case READ = 'read';
    case UPDATE = 'update';
    case DELETE = 'delete';
    case ANY = 'any';
}
