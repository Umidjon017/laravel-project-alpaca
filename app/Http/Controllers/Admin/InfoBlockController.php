<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInfoBlockRequest;
use App\Http\Requests\Admin\UpdateInfoBlockRequest;
use App\Models\Admin\InfoBlock;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class InfoBlockController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.infos.create', compact('localizations', 'id'));
    }

    public function store(StoreInfoBlockRequest $request): RedirectResponse
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $data['page_id'] = $request->page_id;
                $info = InfoBlock::create($data);

                foreach($request->translations as $key=>$value){
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Information block added successfully!');
    }

    public function show(Page $id): View
    {
        $infos = InfoBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.infos.show', compact('infos', 'id'));
    }

    public function edit(InfoBlock $info): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.infos.edit', compact('localizations','info'));
    }

    public function update(UpdateInfoBlockRequest $request, InfoBlock $info): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $info){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $info->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $info->update($data);

                foreach($request->translations as $key => $value){
                    $info->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$info->page_id.'/infos/show')->with('success', 'Info block edited successfully!');
    }

    public function destroy(InfoBlock $info): RedirectResponse
    {
        $info->delete();
        $info->deleteImage();

        return redirect('admin/pages/'.$info->page_id)->with('success', 'Info block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(InfoBlock::FILE_PATH), $filename);
        return $filename;
    }
}
