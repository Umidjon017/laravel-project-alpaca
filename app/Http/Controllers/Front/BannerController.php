<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreBannerRequest;
use App\Http\Requests\Front\UpdateBannerRequest;
use App\Models\Front\Banner;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index(): View
    {
        $banners = Banner::with('translations')->get();

        return view('front.banners.index', compact('banners'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.banners.create', compact('localizations'));
    }

    public function store(StoreBannerRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $banner = Banner::create($data);

                foreach($request->translations as $key=>$value) {
                    $banner->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('banners.index')->with('success', 'Banner added successfully!');
    }

    public function edit(Banner $banner)
    {
        $localizations = Cache::get('localizations');

        return view('front.banners.edit', compact('banner', 'localizations'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        try {
            DB::transaction(function() use ($request, $banner){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $banner->deleteFile();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $banner->update($data);

                foreach($request->translations as $key => $value){
                    $banner->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('banners.index')->with('success', 'Banner edited successfully!');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        $banner->deleteFile();

        return redirect()->back()->with('success', 'Banner deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Banner::FILE_PATH), $filename);
        return $filename;
    }
}
