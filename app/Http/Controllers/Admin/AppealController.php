<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppealRequest;
use App\Http\Requests\Admin\UpdateAppealRequest;
use App\Models\Admin\Appeal;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AppealController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.appeals.create', compact('localizations', 'id'));
    }

    public function store(StoreAppealRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                $data['page_id'] = $request->page_id;
                $info = Appeal::create($data);

                foreach($request->translations as $key=>$value) {
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Appeal block added successfully!');
    }

    public function show(Page $id): View
    {
        $appeals = Appeal::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.appeals.show', compact('appeals', 'id'));
    }

    public function edit(Appeal $appeal): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.appeals.edit', compact('localizations','appeal'));
    }

    public function update(UpdateAppealRequest $request, Appeal $appeal)
    {
        try {
            DB::transaction(function() use ($request, $appeal){
                $data = $request->all();

                $appeal->update($data);

                foreach($request->translations as $key => $value){
                    $appeal->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$appeal->page_id.'/appeals/show')->with('success', 'Appeal block edited successfully!');
    }

    public function destroy(Appeal $appeal)
    {
        $appeal->delete();

        return redirect('admin/pages/'.$appeal->page_id)->with('success', 'Appeal block deleted successfully!');
    }
}
