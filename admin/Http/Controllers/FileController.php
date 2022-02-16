<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\FileIndex;
use Admin\Http\Resources\FileResource;
use Admin\Ui\Page;
use App\Models\File;
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

    public function upload(Request $request)
    {
        collect($request->files->get('images'))
            ->each(function (UploadedFile $file) {
                File::newFromUploadedFile($file)->save();
            });
    }
}
