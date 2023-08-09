<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Localization;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  public function index()
  {

    $posts = Post::with('translations')->latest()->get();

    return view('admin.posts.index', compact('posts'));
  }

  public function create()
  {
    $localizations = Cache::get('localizations');
    $projects = Project::with('translations')->get();
    return view('admin.posts.create', compact('localizations', 'projects'));
  }

  public function store(PostStoreRequest $request)
  {
    $data = $request->all();
    try{
      DB::transaction(function() use ($request) {
        if ($request->hasFile('image')) {
          $data['image'] = $this->fileUpload($request->file('image'));
        }

        $localizationId=Localization::first()->id;

        $data['slug']=\Str::slug($request->translations[$localizationId]['title']);

        $post=Post::create($data);

        foreach($request->translations as $key=>$value){
          $post->translations()->create([
            'localization_id'=>$key,
            'title'=>$value['title'],
            'description'=>$value['description'],
            'body'=>$value['body'],
          ]);
        }

        $projects = $request->project_id;
        if (isset($projects)) {
            foreach ($projects as $project) {
                $post->projects()->attach($project);
            }
        }
      });
    }catch(\Exception $e){
      return redirect()->back()->with('error', $e->getMessage());
    }

    return redirect()->route('admin.posts.index')->with('success', 'Новость создан успешно !');

  }


  public function show(Post $post)
  {
    $localizations = Cache::get('localizations');
    return view('admin.posts.show', compact('post','localizations'));
  }

  public function edit(Post $post)
  {
    $localizations = Cache::get('localizations');
    $projects = Project::with('translations')->get();
    return view('admin.posts.edit', compact('localizations', 'post', 'projects'));
  }

  public function update(Request $request, Post $post)
  {
    $request->validate([
      'translations'=>'required',
    ]);

    try{
      DB::transaction(function() use ($request,$post){
        $data = $request->all();

        if ($request->hasFile('image')) {
          $post->deleteImage();
          $data['image'] = $this->fileUpload($request->file('image'));
        }

        $localizationId=Localization::first()->id;

        $data['slug']=\Str::slug($request->translations[$localizationId]['title']);

        $post->update($data);

        foreach($request->translations as $key=>$value){
          $post->translations()->updateOrCreate(['id'=>$value['id']],[
            'localization_id'=>$key,
            'title'=>$value['title'],
            'description'=>$value['description'],
            'body'=>$value['body'],
          ]);
        }

        $post->projects()->sync($request->project_id);
      });

    }catch(\Exception $e){
      return redirect()->back()->with('error', $e->getMessage());
    }

    return redirect()->route('admin.posts.index')->with('success', 'Новость обновлен успешно !');

  }

  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('admin.posts.index')->with('success', 'Новость удален успешно !');
  }

  public function fileUpload($file)
  {
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path(Post::FILE_PATH), $filename);
    return $filename;
  }

  public function storeImage(Request $request)
  {
    if ($request->hasFile('upload')) {
      $fileName = time().'_'.$request->file('upload')->getClientOriginalName();
      $request->file('upload')->move(public_path(Post::FILE_PATH), $fileName);

      $CKEditorFuncNum = $request->input('CKEditorFuncNum');
      $url             = asset(Post::FILE_PATH.$fileName);
      $msg             = 'Image uploaded successfully';
      $response        = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

      @header('Content-type: text/html; charset=utf-8');
      echo $response;
    }
  }
}
