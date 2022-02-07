<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\SiteIndex;
use Admin\Http\Resources\SiteListResource;
use Admin\Http\Resources\SiteResource;
use Admin\Ui\Page;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SiteController
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
            Site::query()
        );
    }

    /**
     * Show the ship index page for the admin application.
     *
     * @param  Page $page
     * @return Page
     */
    public function index(Page $page)
    {
        $siteList = SiteListResource::collection(Site::root());

        return $page
            ->page('Sites/Index')
            ->with('sites', $siteList);
    }

    public function show(Page $page, Site $site)
    {
        $siteList = SiteListResource::collection(Site::root());

        $site->load('files');

        return $page
            ->page('Sites/Show')
            ->with('sites', $siteList)
            ->with('site', new SiteResource($site));
    }

    public function update(Request $request, Site $site)
    {
        $site->update([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $site = Site::make([
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
            Site::whereKey($site['id'])->update([
                'parent_id'    => $parentId,
                'order_column' => $position,
            ]);

            $this->updateOrder($site['children'], $site['id']);
        }
    }

    public function upload(Request $request, Site $site)
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);

        $site->addFile($validated['file'])->save();

        return Redirect::route('admin.sites.show', ['site' => $site]);
    }
}
