<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCommentRequest;
use App\Http\Requests\Admin\UpdateCommentRequest;
use App\Models\Admin\Comment;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.comments.create', compact('localizations', 'id'));
    }

    public function store(StoreCommentRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('logo')) {
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $data['page_id'] = $request->page_id;
                $info = Comment::create($data);

                foreach($request->translations as $key=>$value){
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'text'=>$value['text'],
                        'full_name'=>$value['full_name'],
                        'position'=>$value['position'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Comment block added successfully!');
    }

    public function show(Page $id): View
    {
        $comments = Comment::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.comments.show', compact('comments', 'id'));
    }

    public function edit(Comment $comment): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.comments.edit', compact('localizations','comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $comment){
                $data = $request->all();

                if ($request->hasFile('logo')) {
                    $comment->deleteFile('logo');
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $comment->deleteFile('image');
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $comment->update($data);

                foreach($request->translations as $key => $value){
                    $comment->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'text'=>$value['text'],
                        'full_name'=>$value['full_name'],
                        'position'=>$value['position'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$comment->page_id.'/comments/show')->with('success', 'Comment block edited successfully!');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        $comment->deleteFile('image');
        $comment->deleteFile('logo');

        return redirect('admin/pages/'.$comment->page_id)->with('success', 'Comment block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Comment::FILE_PATH), $filename);
        return $filename;
    }
}
