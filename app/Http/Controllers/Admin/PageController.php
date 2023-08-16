<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoBlock;
use App\Models\Page;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
      $data = $request->all();

      try{
          DB::transaction(function() use ($request) {
            if ($request->hasFile('image')) {
              $data['image'] = $this->fileUpload($request->file('image'));
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
      $infos = InfoBlock::where('page_id', $page->id)->with('translations')->get();

      return view('admin.pages.show', compact('localizations', 'page', 'galleries', 'infos'));
    }

    public function fileUpload($file): string
    {
      $filename = time().'_'.$file->getClientOriginalName();
      $file->move(public_path(Page::FILE_PATH), $filename);
      return $filename;
    }
}
