<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVideoPlayerRequest;
use App\Http\Requests\Admin\UpdateVideoPlayerRequest;
use App\Models\Admin\Page;
use App\Models\Admin\VideoPlayer;
use Illuminate\Contracts\View\View;

class VideoPlayerController extends Controller
{
    public function create(Page $id): View
    {
        return view('admin.pages.videos.create', compact('id'));
    }

    public function store(StoreVideoPlayerRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('video_poster')) {
            $data['video_poster'] = $this->fileUpload($request->file('video_poster'));
        }

        VideoPlayer::create($data);

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Video Player added successfully!');
    }

    public function show(Page $id): View
    {
        $videos = VideoPlayer::where('page_id', $id->id)->get();

        return view('admin.pages.videos.show', compact('videos', 'id'));
    }

    public function update(UpdateVideoPlayerRequest $request, VideoPlayer $video)
    {
        $data = $request->all();

        if ($request->hasFile('video_poster')) {
            $video->deletePoster();
            $data['video_poster'] = $this->fileUpload($request->file('video_poster'));
        }

        $video->update($data);

        return redirect('admin/'.$video->page_id.'/videos/show')->with('success', 'Video Player edited successfully!');
    }

    public function edit(VideoPlayer $video): View
    {
        return view('admin.pages.videos.edit', compact('video'));
    }

    public function destroy(VideoPlayer $video)
    {
        if ($video->video_poster == null) {
            $video->delete();
        } else {
            $video->delete();
            $video->deletePoster();
        }

        return redirect('admin/pages/'.$video->page_id)->with('success', 'Video Player deleted successfully');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(videos_file_path()), $filename);
        return $filename;
    }
}
