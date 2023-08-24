<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreForMarketologyRequest;
use App\Http\Requests\Front\UpdateForMarketologyRequest;
use App\Models\Front\ForMarketology;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ForMarketologyController extends Controller
{
    public function index()
    {
        $marketologies = ForMarketology ::with('translations')->get();

        return view('front.marketology.index', compact('marketologies'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.marketology.create', compact('localizations'));
    }

    public function store(StoreForMarketologyRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $marketology = ForMarketology ::create($data);

                foreach($request->translations as $key=>$value) {
                    $marketology->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.marketology.index')->with('success', 'For marketology added successfully!');
    }

    public function edit(ForMarketology $marketology)
    {
        $localizations = Cache::get('localizations');

        return view('front.marketology.edit', compact('marketology', 'localizations'));
    }

    public function update(UpdateForMarketologyRequest $request, ForMarketology $marketology)
    {
        try {
            DB::transaction(function() use ($request, $marketology){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $marketology->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $marketology->update($data);

                foreach($request->translations as $key => $value){
                    $marketology->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.marketology.index')->with('success', 'For marketology edited successfully!');
    }

    public function destroy(ForMarketology $marketology)
    {
        $marketology->delete();
        $marketology->deleteImage();

        return redirect()->back()->with('success', 'For marketology deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(ForMarketology::FILE_PATH), $filename);
        return $filename;
    }
}
