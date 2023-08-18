<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurClientRequest;
use App\Http\Requests\Admin\UpdateOurClientRequest;
use App\Models\OurClient;
use App\Models\Page;
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

                if ($request->hasFile('logo')) {
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $data['page_id'] = $request->page_id;
                $info = OurClient::create($data);

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

        return redirect()->route('admin.pages.index')->with('success', 'Our client block added successfully!');
    }

    public function edit(OurClient $client)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.edit', compact('localizations','client'));
    }

    public function update(UpdateOurClientRequest $request, OurClient $client)
    {
        try {
            DB::transaction(function() use ($request, $client){
                $data = $request->all();

                if ($request->hasFile('logo')) {
                    $client->deleteFile('logo');
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $client->deleteFile('image');
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $client->update($data);

                foreach($request->translations as $key => $value){
                    $client->translations()->updateOrCreate(['id' => $value['id']], [
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

        return redirect()->route('admin.pages.index')->with('success', 'Our client block edited successfully!');
    }

    public function destroy(OurClient $client)
    {
        $client->delete();
        $client->deleteFile('logo');
        $client->deleteFile('image');

        return redirect()->back()->with('success', 'Our client block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurClient::FILE_PATH), $filename);
        return $filename;
    }
}
