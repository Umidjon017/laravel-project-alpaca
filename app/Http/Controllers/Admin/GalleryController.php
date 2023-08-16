<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $galleryImages = $this->fileUpload($image);
                Gallery::create([
                    'page_id' => $request->page_id,
                    'images' => $galleryImages
                ]);
            }
        }

        return back()->with('success', 'Gallery block added successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Gallery::FILE_PATH), $filename);
        return $filename;
    }
}
