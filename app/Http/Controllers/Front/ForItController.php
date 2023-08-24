<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreForItRequest;
use App\Http\Requests\Front\UpdateForItRequest;
use App\Models\Front\ForIt;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ForItController extends Controller
{
    public function index(): View
    {
        $its = ForIt::with('translations')->get();

        return view('front.it.index', compact('its'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.it.create', compact('localizations'));
    }

    public function store(StoreForItRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $it = ForIt::create($data);

                foreach($request->translations as $key=>$value) {
                    $it->translations()->create([
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

        return redirect()->route('admin.it.index')->with('success', 'For IT added successfully!');
    }

    public function edit(ForIt $it)
    {
        $localizations = Cache::get('localizations');

        return view('front.it.edit', compact('it', 'localizations'));
    }

    public function update(UpdateForItRequest $request, ForIt $it)
    {
        try {
            DB::transaction(function() use ($request, $it){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $it->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $it->update($data);

                foreach($request->translations as $key => $value){
                    $it->translations()->updateOrCreate(['id' => $value['id']], [
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

        return redirect()->route('admin.it.index')->with('success', 'For IT edited successfully!');
    }

    public function destroy(ForIt $it)
    {
        $it->delete();
        $it->deleteImage();

        return redirect()->back()->with('success', 'For IT deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(ForIt::FILE_PATH), $filename);
        return $filename;
    }
}
