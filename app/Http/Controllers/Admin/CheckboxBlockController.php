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
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.checkbox.create', compact('localizations', 'id'));
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

    public function show(Page $id): View
    {
        $checkboxBlocks = CheckboxBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.checkbox.show', compact('checkboxBlocks', 'id'));
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

        return redirect('admin/'.$checkbox->page_id.'/checkbox/show')->with('success', 'Checkbox block edited successfully!');
    }

    public function destroy(CheckboxBlock $checkbox)
    {
        $checkbox->delete();

        return redirect('admin/pages/'.$checkbox->page_id)->with('success', 'Checkbox block deleted successfully!');
    }
}
