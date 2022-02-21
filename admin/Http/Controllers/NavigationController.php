<?php

namespace Admin\Http\Controllers;

use Admin\Http\Resources\NavItemTreeResource;
use Admin\Ui\Page;
use App\Models\NavItem;
use App\Models\Types\NavType;
use Illuminate\Http\Request;

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

        return $page->page('Navigations/Show')
            ->with('items', NavItemTreeResource::collection($items))
            ->with('type', $type->value);
    }

    public function store(Request $request, NavType $type, NavItem $item = null)
    {
        NavItem::create([
            'title'     => $request->title,
            'type'      => $type->value,
            'parent_id' => $item ? $item->id : null,
        ]);

        return redirect()->back();
    }

    public function order(Request $request, NavType $type)
    {
        $this->updateOrder($type, $request->order);

        return redirect()->back();
    }

    protected function updateOrder(NavType $type, $order, $parentId = null)
    {
        foreach ($order as $position => $item) {
            NavItem::where('type', $type->value)
                ->whereKey($item['id'])
                ->update([
                    'parent_id'    => $parentId,
                    'order_column' => $position,
                ]);

            $this->updateOrder($type, $item['children'], $item['id']);
        }
    }
}
