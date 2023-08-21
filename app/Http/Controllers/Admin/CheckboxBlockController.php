<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCheckboxBlockRequest;
use App\Http\Requests\Admin\UpdateCheckboxBlockRequest;
use App\Models\Admin\CheckboxBlock;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CheckboxBlockController extends Controller
{
    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.checkbox.create', compact('localizations', 'page'));
    }

    public function store(StoreCheckboxBlockRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                $data['page_id'] = $request->page_id;
                $info = CheckboxBlock::create($data);

                foreach($request->translations as $key=>$value) {
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Checkbox block added successfully!');
    }

    public function edit(CheckboxBlock $checkbox)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.checkbox.edit', compact('localizations','checkbox'));
    }

    public function update(UpdateCheckboxBlockRequest $request, CheckboxBlock $checkbox)
    {
        try {
            DB::transaction(function() use ($request, $checkbox){
                $data = $request->all();

                $checkbox->update($data);

                foreach($request->translations as $key => $value){
                    $checkbox->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pages.index')->with('success', 'Checkbox block edited successfully!');
    }

    public function destroy(CheckboxBlock $checkbox)
    {
        $checkbox->delete();

        return back()->with('success', 'Checkbox block deleted successfully!');
    }
}
