<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreForLeaderRequest;
use App\Http\Requests\Front\UpdateForLeaderRequest;
use App\Models\Front\ForLeader;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ForLeaderController extends Controller
{
    public function index()
    {
        $leaders = ForLeader::with('translations')->get();

        return view('front.leaders.index', compact('leaders'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.leaders.create', compact('localizations'));
    }

    public function store(StoreForLeaderRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $leader = ForLeader::create($data);

                foreach($request->translations as $key=>$value) {
                    $leader->translations()->create([
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

        return redirect()->route('admin.main-page.leaders.index')->with('success', 'For leader added successfully!');
    }

    public function edit(ForLeader $leader)
    {
        $localizations = Cache::get('localizations');

        return view('front.leaders.edit', compact('leader', 'localizations'));
    }

    public function update(UpdateForLeaderRequest $request, ForLeader $leader)
    {
        try {
            DB::transaction(function() use ($request, $leader){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $leader->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $leader->update($data);

                foreach($request->translations as $key => $value){
                    $leader->translations()->updateOrCreate(['id' => $value['id']], [
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

        return redirect()->route('admin.main-page.leaders.index')->with('success', 'For leader edited successfully!');
    }

    public function destroy(ForLeader $leader)
    {
        $leader->delete();
        $leader->deleteImage();

        return redirect()->back()->with('success', 'For leader deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(ForLeader::FILE_PATH), $filename);
        return $filename;
    }
}
