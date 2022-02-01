<?php

namespace Admin\Http\Controllers;

use Admin\Ui\Page;

class HomeController
{
    /**
     * Show the home page for the admin application.
     *
     * @param  Page $page
     * @return Page
     */
    public function show(Page $page)
    {
        return $page->page('Home/Show');
    }

    /**
     * Show the components page for the admin application.
     *
     * @param  Page $page
     * @return Page
     */
    public function components(Page $page)
    {
        return $page->page('Components/Show');
    }
}
