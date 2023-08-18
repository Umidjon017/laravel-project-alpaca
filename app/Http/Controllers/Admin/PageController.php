<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\InfoBlock;
use App\Models\OurClient;
use App\Models\Page;
use App\Models\TextBlock;
use App\Models\VideoPlayer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        try{
          DB::transaction(function() use ($request) {
              $data = $request->all();

            if ($request->hasFile('image')) {
              $data['image'] = $this->fileUpload($request->file('image'));
            }

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
      $comments = Comment::where('page_id', $page->id)->with('translations')->get();
      $appeals = Appeal::where('page_id', $page->id)->with('translations')->get();
      $texts = TextBlock::where('page_id', $page->id)->with('translations')->get();
      $videos = VideoPlayer::where('page_id', $page->id)->get();
      $clients = OurClient::where('page_id', $page->id)->with('translations')->get();

      return view('admin.pages.show', compact(
          'localizations','page', 'galleries', 'infos', 'comments', 'appeals', 'texts',
          'videos', 'clients'));
    }

    public function edit(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.edit', compact('localizations', 'page'));
    }

    public function destroy(Page $page)
    {
        if ($page->image == null) {
            $page->delete();
        } else {
            $page->delete();
            $page->deleteImage();

            foreach ($page->galleries as $gallery) {
                unlink(public_path(gallery_file_path()) . $gallery->images);
            }
        }
//        if (count($page->galleries()->get()) > 0 || count($page->infos()->get()) > 0 || count($page->comments()->get()) > 0)
//        {
//            Gallery::where('page_id', $page->id)->delete();
//            InfoBlock::where('page_id', $page->id)->delete();
//            Comment::where('page_id', $page->id)->delete(0);
//        }

        return redirect()->back()->with('success', 'Page deleted successfully');
    }

    public function fileUpload($file): string
    {
      $filename = time().'_'.$file->getClientOriginalName();
      $file->move(public_path(Page::FILE_PATH), $filename);
      return $filename;
    }
}
