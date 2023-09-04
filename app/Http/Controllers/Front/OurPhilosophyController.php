<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreOurPhilosophyRequest;
use App\Http\Requests\Front\UpdateOurPhilosophyRequest;
use App\Models\Front\OurPhilosophy;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OurPhilosophyController extends Controller
{
    public function index(): View
    {
        $philosophies = OurPhilosophy::with('translations')->get();

        return view('front.philosophy.index', compact('philosophies'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.philosophy.create', compact('localizations'));
    }

    public function store(StoreOurPhilosophyRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();
                $images = [];

                if ($request->hasFile('icon')) {
                    foreach ($request->file('icon') as $image) {
                        $filename = time().'_'.$image->getClientOriginalName();
                        $image->move(public_path(OurPhilosophy::FILE_PATH), $filename);
                        $images[] = $filename;
                    }
                }
                $data['icon'] = implode(',', $images);

                $philosophy = OurPhilosophy::create($data);

                foreach($request->translations as $key=>$value) {
                    $philosophy->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'additional'=>$value['additional'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.philosophy.index')->with('success', 'Our Philosophy added successfully!');
    }

    public function edit(OurPhilosophy $philosophy)
    {
        $localizations = Cache::get('localizations');

        return view('front.philosophy.edit', compact('philosophy', 'localizations'));
    }

    public function update(UpdateOurPhilosophyRequest $request, OurPhilosophy $philosophy)
    {
        try {
            DB::transaction(function() use ($request, $philosophy){
                $data = $request->all();

                if ($request->hasFile('icon')) {
                    $philosophy->deleteImage();

                    foreach ($request->file('icon') as $image) {
                        $filename = time().'_'.$image->getClientOriginalName();
                        $image->move(public_path(OurPhilosophy::FILE_PATH), $filename);
                        $images[] = $filename;
                    }
                    $data['icon'] = implode(',', $images);
                }

                $philosophy->update($data);

                foreach($request->translations as $key => $value){
                    $philosophy->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'additional'=>$value['additional'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.philosophy.index')->with('success', 'Our Philosophy edited successfully!');
    }

    public function destroy(OurPhilosophy $philosophy)
    {
        $philosophy->delete();

        return redirect()->back()->with('success', 'Our Philosophy deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurPhilosophy::FILE_PATH), $filename);
        return $filename;
    }
}
