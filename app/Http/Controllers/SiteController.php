<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController
{
    /**
     * Get the site from the given request.
     *
     * @param  Request $request
     * @return Site
     */
    protected function getSiteFromRequest(Request $request): Site
    {
        $id = last(explode('.', $request->route()->getName()));

        return Site::findOrFail($id);
    }

    /**
     * Handle the incomming request.
     *
     * @param  Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $site = $this->getSiteFromRequest($request);

        return $site;
    }
}
