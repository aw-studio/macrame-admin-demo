<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\FileIndex;
use Admin\Ui\Page;
use App\Models\File;
use App\Models\FileCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FileController
{
    /**
     * Ship index page.
     *
     * @param  Page $page
     * @return Page
     */
    public function items(Request $request, FileIndex $index)
    {
        return $index->items(
            $request,
            File::query()
        );
    }

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
        return $page->page('Files/Index')->with(
            'collections',
            FileCollection::withCount('files')->get()
        );
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $addedFiles = new Collection;

        foreach ($request->files->get('files') as $file) {
            $file = File::fromUpload($file);

            $addedFiles->push($file);

            if ($request->collection) {
                FileCollection::firstOrCreate(['key' => $request->collection])
                    ->files()
                    ->attach($file->id);
            }
        }

        return $addedFiles;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function destroy(Request $request, $file)
    {
        // code...
    }
}