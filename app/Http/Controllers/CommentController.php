<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Localization;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.comments.create', compact('localizations', 'page'));
    }

    public function store(Request $request)
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

                $localizationId = Localization::first()->id;
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

        return redirect()->route('admin.pages.index')->with('success', 'Comment block added successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Comment::FILE_PATH), $filename);
        return $filename;
    }
}
