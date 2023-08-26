<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTextBlockRequest;
use App\Http\Requests\Admin\UpdateTextBlockRequest;
use App\Models\Admin\Page;
use App\Models\Admin\TextBlock;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TextBlockController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.texts.create', compact('localizations', 'id'));
    }

    public function store(StoreTextBlockRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                $data['page_id'] = $request->page_id;
                $info = TextBlock::create($data);

                foreach($request->translations as $key=>$value){
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'text'=>$value['text'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Text block added successfully!');
    }


    public function show(Page $id): View
    {
        $texts = TextBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.texts.show', compact('texts', 'id'));
    }

    public function edit(TextBlock $text): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.texts.edit', compact('localizations','text'));
    }

    public function update(UpdateTextBlockRequest $request, TextBlock $text): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $text){
                $data = $request->all();
                $text->update($data);

                foreach($request->translations as $key => $value){
                    $text->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'text'=>$value['text'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$text->page_id.'/texts/show')->with('success', 'Text block edited successfully!');
    }

    public function destroy(TextBlock $text): RedirectResponse
    {
        $text->delete();
        return redirect('admin/pages/'.$text->page_id)->with('success', 'Text block deleted successfully!');
    }
}
