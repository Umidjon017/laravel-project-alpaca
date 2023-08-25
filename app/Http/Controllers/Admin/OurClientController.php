<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurClientRequest;
use App\Http\Requests\Admin\UpdateOurClientRequest;
use App\Models\Admin\OurClient;
use App\Models\Admin\OurClientLogo;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OurClientController extends Controller
{
    public function create(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.create', compact('localizations', 'page'));
    }

    public function store(StoreOurClientRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                $data['page_id'] = $request->page_id;
                $info = OurClient::create($data);

                foreach($request->translations as $key=>$value){
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

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Our client block added successfully!');
    }

    public function edit(OurClient $client)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.edit', compact('localizations','client'));
    }

    public function show(Page $page): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.create', compact('localizations', 'page'));
    }


    public function update(UpdateOurClientRequest $request, OurClient $client)
    {
        try {
            DB::transaction(function() use ($request, $client){
                $data = $request->all();

                $client->update($data);

                foreach($request->translations as $key => $value){
                    $client->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pages.index')->with('success', 'Our client block edited successfully!');
    }

    public function destroy(OurClient $client)
    {
        $client->delete();

        return redirect()->back()->with('success', 'Our client block deleted successfully!');
    }
}
