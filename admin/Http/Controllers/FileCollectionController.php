<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\FileIndex;
use Admin\Http\Resources\FileCollectionResource;
use Admin\Ui\Page;
use App\Models\File;
use App\Models\FileCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileCollectionController
{
    /**
     * Ship index page.
     *
     * @param  Page $page
     * @return Page
     */
    public function items(
        Request $request,
        FileCollection $collection,
        FileIndex $index
    ) {
        return $index->items($request, $collection->files());
    }

    /**
     * Show the file.
     *
     * @param  Page $page
     * @return Page
     */
    public function show(Page $page, FileCollection $collection)
    {
        $collections = FileCollection::withCount('files')->get();

        return $page
            ->page('Files/Show')
            ->with('collection', new FileCollectionResource($collection))
            ->with('collections', FileCollectionResource::collection($collections));
    }

    /**
     * Show the index of all file collections.
     *
     * @param  Page $page
     * @return Page
     */
    public function index(Page $page)
    {
        $collections = FileCollection::withCount('files')->get();

        return $page
            ->page('Files/Index')
            ->with('collections', FileCollectionResource::collection($collections));
    }

    public function store(Request $request)
    {
        FileCollection::create([
            'title' => $request->title,
            'key'   => Str::slug($request->title),
        ]);

        return redirect()->back();
    }

    public function upload(Request $request, FileCollection $collection)
    {
        collect($request->files->get('images'))
            ->each(function (UploadedFile $file) use ($collection) {
                $file = File::newFromUploadedFile($file);

                $file->save();

                $file->attach($collection);
            });
    }
}
