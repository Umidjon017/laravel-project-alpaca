<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $galleryImages = $this->fileUpload($image);
                Gallery::create([
                    'page_id' => $request->page_id,
                    'image' => $galleryImages
                ]);
            }
        }

        return back()->with('success', 'Gallery block added successfully!');
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        if ($request->hasFile('images')) {
            $gallery->deleteImage();

            foreach ($request->images as $image) {
                $galleryImages = $this->fileUpload($image);
                $gallery->update([
                    'page_id' => $request->page_id,
                    'image' => $galleryImages
                ]);
            }
        }

        return back()->with('success', 'Gallery block added successfully!');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();
        $gallery->deleteImage();

        return back()->with('success', 'Gallery block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Gallery::FILE_PATH), $filename);

        return $filename;
    }
}
