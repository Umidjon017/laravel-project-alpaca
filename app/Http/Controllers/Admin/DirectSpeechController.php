<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDirectSpeechRequest;
use App\Http\Requests\Admin\UpdateDirectSpeechRequest;
use App\Models\Admin\DirectSpeech;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DirectSpeechController extends Controller
{
    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.direct_speech.create', compact('localizations', 'page'));
    }

    public function store(StoreDirectSpeechRequest $request)
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
                $info = DirectSpeech::create($data);

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

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Direct speech block added successfully!');
    }

    public function edit(DirectSpeech $directSpeech)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.direct_speech.edit', compact('localizations','directSpeech'));
    }

    public function update(UpdateDirectSpeechRequest $request, DirectSpeech $directSpeech)
    {
        try {
            DB::transaction(function() use ($request, $directSpeech){
                $data = $request->all();

                if ($request->hasFile('logo')) {
                    $directSpeech->deleteFile('logo');
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $directSpeech->deleteFile('image');
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $directSpeech->update($data);

                foreach($request->translations as $key => $value){
                    $directSpeech->translations()->updateOrCreate(['id' => $value['id']], [
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

        return redirect()->route('admin.pages.index')->with('success', 'Direct speech block edited successfully!');
    }

    public function destroy(DirectSpeech $directSpeech)
    {
        if ($directSpeech->logo == null) {
            $directSpeech->delete();
            $directSpeech->deleteFile('image');
        } elseif ($directSpeech->image == null) {
            $directSpeech->delete();
            $directSpeech->deleteFile('logo');
        } else {
            $directSpeech->delete();
            $directSpeech->deleteFile('logo');
            $directSpeech->deleteFile('image');
        }

        return redirect()->back()->with('success', 'Comment block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(DirectSpeech::FILE_PATH), $filename);
        return $filename;
    }
}
