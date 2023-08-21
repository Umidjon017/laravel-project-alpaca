<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppealRequest;
use App\Http\Requests\Admin\UpdateAppealRequest;
use App\Models\Appeal;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AppealController extends Controller
{
    public function index(): View
    {
        $appeals = Appeal::with('translations')->get();

        return view('admin.pages.appeals.index', compact('appeals'));
    }

    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.appeals.create', compact('localizations', 'page'));
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

        return redirect()->route('admin.pages.index')->with('success', 'Appeal block added successfully!');
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

        return redirect()->route('admin.pages.index')->with('success', 'Appeal block edited successfully!');
    }

    public function destroy(Appeal $appeal)
    {
        $appeal->delete();

        return back()->with('success', 'Appeal block deleted successfully!');
    }
}
