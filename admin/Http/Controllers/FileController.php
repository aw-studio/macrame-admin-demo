<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\FileIndex;
use Admin\Http\Resources\FileCollectionResource;
use Admin\Http\Resources\FileResource;
use Admin\Ui\Page;
use App\Models\File;
use App\Models\FileCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileController
{
    /**
     * Ship index page.
     *
     * @param  Page $page
     * @return Page
     */
    public function files(Request $request, FileIndex $index)
    {
        return $index->items($request, File::query(), FileResource::class);
    }

    /**
     * Show the index of all file collections.
     *
     * @param  Page $page
     * @return Page
     */
    public function index(Page $page, $mimeType = null)
    {
        $collections = FileCollection::withCount('files')->get();

        return $page
            ->page('Files/Index')
            ->with('collections', FileCollectionResource::collection($collections));
    }

    public function upload(Request $request)
    {
        collect($request->files->get('images'))
            ->each(function (UploadedFile $file) {
                File::newFromUploadedFile($file)->save();
            });
    }
}
