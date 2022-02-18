<?php

namespace Admin\Http\Controllers;

use Admin\Http\Resources\NavItemTreeResource;
use Admin\Ui\Page;
use App\Models\NavItem;
use App\Models\Types\NavType;

class NavigationController
{
    /**
     * Show the nav page for the admin application.
     *
     * @param  Page    $page
     * @param  NavType $type
     * @return Page
     */
    public function show(Page $page, NavType $type)
    {
        $items = NavItem::whereRoot()
            ->where('type', $type)
            ->orderBy('order_column')
            ->get();

        return $page->page('Nav/Show')
            ->with('items', NavItemTreeResource::collection($items));
    }
}
