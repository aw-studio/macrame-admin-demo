<?php

namespace Admin\Http\Resources;

use App\Models\NavItem;
use Macrame\Tree\TreeResource;

/**
 * @mixin NavItem
 */
class NavItemTreeResource extends TreeResource
{
    /**
     * The resource instance.
     *
     * @var NavItem
     */
    public $resource;
}
