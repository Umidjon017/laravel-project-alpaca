<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBannerBlockRequest;
use App\Http\Requests\Admin\UpdateBannerBlockRequest;
use App\Models\Admin\BannerBlock;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BannerBlockController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.banner-block.create', compact('localizations', 'id'));
    }

    public function store(Request $request): RedirectResponse
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $data['page_id'] = $request->page_id;
                $info = BannerBlock::create($data);

                foreach($request->translations as $key=>$value){
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'try_link_title'=>$value['try_link_title'],
                        'more_link_title'=>$value['more_link_title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Banner block added successfully!');
    }

    public function show(Page $id): View
    {
        $bannerBlocks = BannerBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.banner-block.show', compact('bannerBlocks', 'id'));
    }

    public function edit(BannerBlock $bannerBlock): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.banner-block.edit', compact('localizations', 'bannerBlock'));
    }

    public function update(UpdateBannerBlockRequest $request, BannerBlock $bannerBlock): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $bannerBlock){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $bannerBlock->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $bannerBlock->update($data);

                foreach($request->translations as $key => $value){
                    $bannerBlock->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'try_link_title'=>$value['try_link_title'],
                        'more_link_title'=>$value['more_link_title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$bannerBlock->page_id.'/banner-block/show')->with('success', 'Banner block edited successfully!');
    }

    public function destroy(BannerBlock $bannerBlock): RedirectResponse
    {
        $bannerBlock->delete();
        $bannerBlock->deleteImage();

        return redirect('admin/pages/'.$bannerBlock->page_id)->with('success', 'Banner block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(BannerBlock::FILE_PATH), $filename);
        return $filename;
    }
}
