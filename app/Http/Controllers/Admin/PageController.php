<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\PageStoreRequest;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('translations')->latest()->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.create', compact('localizations'));
    }

    public function store(Request $request)
    {
      $data = $request->all();

      try{
          DB::transaction(function() use ($request) {
            if ($request->hasFile('image')) {
              $data['image'] = $this->fileUploadToPage($request->file('image'));
            }

            $localizationId = Localization::first()->id;

            $data['slug'] = Str::slug($request->translations[$localizationId]['title']);

            $page = Page::create($data);

            foreach($request->translations as $key=>$value){
              $page->translations()->create([
                'localization_id'=>$key,
                'title'=>$value['title'],
                'content'=>$value['content'],
              ]);
            }
          });
        }catch(\Exception $e){
          return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully !');
    }

    public function show(Page $page)
    {
      $localizations = Cache::get('localizations');
      $galleries = Gallery::where('page_id', $page->id)->get();

      return view('admin.pages.show', compact('localizations', 'page', 'galleries'));
    }

    public function storeGallery(Request $request)
    {
      $data = $request->all();

      if ($request->hasFile('images')) {
        foreach ($request->images as $image) {
          $galleryImages = $this->fileUploadToGallery($image);
          Gallery::create([
            'page_id' => $request->page_id,
            'images' => $galleryImages
          ]);
        }
      }

      return back()->with('success', 'Gallery component added successfully!');
    }

    public function fileUploadToPage($file): string
    {
      $filename = time().'_'.$file->getClientOriginalName();
      $file->move(public_path(Page::FILE_PATH), $filename);
      return $filename;
    }

    public function fileUploadToGallery($file): string
    {
      $filename = time().'_'.$file->getClientOriginalName();
      $file->move(public_path(Gallery::FILE_PATH), $filename);
      return $filename;
    }
}
