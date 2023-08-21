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
    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.texts.create', compact('localizations', 'page'));
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
                        'text'=>$value['text'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Text block added successfully!');
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
                        'text'=>$value['text'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pages.index')->with('success', 'Text block edited successfully!');
    }

    public function destroy(TextBlock $text): RedirectResponse
    {
        $text->delete();
        return redirect()->back()->with('success', 'Text block deleted successfully!');
    }
}
