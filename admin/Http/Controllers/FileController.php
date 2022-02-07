<?php

namespace Admin\Http\Controllers;

use Admin\Ui\Page;

class FileController
{
    /**
     * Show the file.
     *
     * @param  Page $page
     * @return Page
     */
    public function show(Page $page)
    {
        return $page->page('Files/Show');
    }

    /**
     * Show the index of all files.
     *
     * @param  Page $page
     * @return Page
     */
    public function index(Page $page)
    {
        return $page->page('Files/Index');
    }
}
