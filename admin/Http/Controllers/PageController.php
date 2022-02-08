<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\SiteIndex;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Macrame\Cms\Pages\Ui\PagesIndexPage;
use Macrame\Cms\Pages\Ui\PagesShowPage;

class PageController
{
    /**
     * Ship index page.
     *
     * @param  Page $page
     * @return Page
     */
    public function items(Request $request, SiteIndex $index)
    {
        return $index->items(
            $request,
            Page::query()
        );
    }

    /**
     * Show the ship index page for the admin application.
     *
     * @return PagesIndexPage
     */
    public function index(Request $request): PagesIndexPage
    {
        $pages = Page::root();

        return new PagesIndexPage(pages: $pages);
    }

    public function show(Page $page)
    {
        $pages = Page::root();

        return new PagesShowPage(page: $page, pages: $pages);
    }

    public function update(Request $request, Page $page)
    {
        $page->update([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $site = Page::make([
            'name'     => $request->name,
            'slug'     => Str::slug($request->name),
            'template' => $request->template,
        ]);

        $site->save();

        return redirect()->back();
    }

    public function order(Request $request)
    {
        $this->updateOrder($request->order);

        return redirect()->back();
    }

    public function updateOrder($order, $parentId = null)
    {
        foreach ($order as $position => $site) {
            Page::whereKey($site['id'])->update([
                'parent_id'    => $parentId,
                'order_column' => $position,
            ]);

            $this->updateOrder($site['children'], $site['id']);
        }
    }

    public function upload(Request $request, Page $page)
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);

        $page->addFile($validated['file'])->save();

        return Redirect::route('admin.sites.show', ['site' => $page]);
    }
}
