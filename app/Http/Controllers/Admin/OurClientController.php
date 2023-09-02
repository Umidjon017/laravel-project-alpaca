<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurClientRequest;
use App\Http\Requests\Admin\UpdateOurClientRequest;
use App\Models\Admin\OurClient;
use App\Models\Admin\OurClientLogo;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OurClientController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.create', compact('localizations', 'id'));
    }

    public function store(StoreOurClientRequest $request): RedirectResponse
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

    public function edit(OurClient $client): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.edit', compact('localizations','client'));
    }

    public function show(Page $id): View
    {
        $localizations = Cache::get('localizations');
        $clients = OurClient::where('page_id', $id->id)->with('translations')->get();
        $clientLogos = OurClientLogo::where('page_id', $id->id)->get();

        return view('admin.pages.clients.show', compact('localizations', 'clients', 'clientLogos', 'id'));
    }


    public function update(UpdateOurClientRequest $request, OurClient $client): RedirectResponse
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

        return redirect('admin/'.$client->page_id.'/clients/show')->with('success', 'Our client block edited successfully!');
    }

    public function destroy(OurClient $client): RedirectResponse
    {
        $client->delete();

        return redirect('admin/pages/'.$client->page_id)->with('success', 'Our client block deleted successfully!');
    }
}
