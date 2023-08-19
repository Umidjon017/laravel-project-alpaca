<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePageRequest;
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

    public function update(UpdatePageRequest $request, Page $page)
    {
        try {
            DB::transaction(function() use ($request, $page){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $page->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $page->update($data);

                foreach($request->translations as $key => $value){
                    $page->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'content'=>$value['content'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pages.index')->with('success', 'Page edited successfully!');
    }

    public function destroy(Page $page)
    {
        if ($page->image == null) {
            $this->deletePageWithRelations($page);
        } else {
            $this->deletePageWithRelations($page);
            $page->deleteImage();

        }

        return redirect()->back()->with('success', 'Page deleted successfully');
    }

    public function fileUpload($file): string
    {
      $filename = time().'_'.$file->getClientOriginalName();
      $file->move(public_path(Page::FILE_PATH), $filename);
      return $filename;
    }

    /**
     * @param Page $page
     * @return void
     */
    public function deletePageWithRelations(Page $page): void
    {
        foreach ($page->galleries as $gallery) {
            if (file_exists(public_path(gallery_file_path()) . $gallery->images)) {
                unlink(public_path(gallery_file_path()) . $gallery->images);
            }
        }
        foreach ($page->infos as $info) {
            if (file_exists(public_path(info_file_path()) . $info->image)) {
                unlink(public_path(info_file_path()) . $info->image);
            }
        }
        foreach ($page->comments as $comment) {
            if (file_exists(public_path(comment_file_path()) . $comment->logo)) {
                unlink(public_path(comment_file_path()) . $comment->logo);
            }
            if (file_exists(public_path(comment_file_path()) . $comment->image)) {
                unlink(public_path(comment_file_path()) . $comment->image);
            }
        }
        foreach ($page->videoPlayers as $video) {
            if (file_exists(public_path(videos_file_path()) . $video->video_poster)) {
                unlink(public_path(videos_file_path()) . $video->video_poster);
            }
        }
        $page->delete();
    }
}
