<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Admin\Page;
use App\Models\Localization;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::with('translations', 'galleries', 'infos', 'comments', 'textBlocks', 'checkBoxes',
            'videoPlayers', 'ourClients', 'ourClientsLogo', 'directSpeeches', 'recommendationBlocks', 'appeals')
            ->latest()
            ->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    public function create(): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.create', compact('localizations'));
    }

    public function store(Request $request): RedirectResponse
    {
        try{
          DB::transaction(function() use ($request) {
              $data = $request->all();

              $localizationId = Localization::first()->id;
              $data['slug'] = \Str::slug($request->translations[$localizationId]['title']);

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

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Page created successfully !');
    }

    public function show(Page $page): View
    {
      $localizations = Cache::get('localizations');
        $relatedData = [
            'infos', 'comments', 'appeals', 'textBlocks', 'appeals',
            'ourClients', 'directSpeeches', 'checkBoxes', 'recommendationBlocks'
        ];

        foreach ($relatedData as $relation) {
            $page->load($relation, $relation . '.translations');
        }
        $page->load('galleries', 'videoPlayers');

        return view('admin.pages.show', compact('localizations', 'page'));
    }

    public function edit(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.edit', compact('localizations', 'page'));
    }

    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $page){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $page->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $localizationId = Localization::first()->id;
                $data['slug'] = \Str::slug($request->translations[$localizationId]['title']);

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

    public function destroy(Page $page): RedirectResponse
    {
        $this->deletePageWithRelations($page);
        $page->deleteImage();

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
            if (file_exists(public_path(gallery_file_path()) . $gallery->image)) {
                unlink(public_path(gallery_file_path()) . $gallery->image);
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
        foreach ($page->directSpeeches as $directSpeech) {
            if (file_exists(public_path(direct_speech_file_path()) . $directSpeech->logo)) {
                unlink(public_path(direct_speech_file_path()) . $directSpeech->logo);
            }
            if (file_exists(public_path(direct_speech_file_path()) . $directSpeech->image)) {
                unlink(public_path(direct_speech_file_path()) . $directSpeech->image);
            }
        }
        foreach ($page->ourClientsLogo as $logo) {
            if (file_exists(public_path(clients_logo_file_path()) . $logo->logo)) {
                unlink(public_path(clients_logo_file_path()) . $logo->logo);
            }
        }
        $page->delete();
    }
}
