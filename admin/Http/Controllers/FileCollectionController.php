<?php

namespace Admin\Http\Controllers;

use App\Models\FileCollection;
use Illuminate\Http\Request;

class FileCollectionController
{
    public function store(Request $request)
    {
        FileCollection::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
}