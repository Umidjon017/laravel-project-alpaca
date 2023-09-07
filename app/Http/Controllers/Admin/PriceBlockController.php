<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Admin\PriceBlock;
use App\Http\Requests\Admin\StorePriceBlockRequest;
use App\Http\Requests\Admin\UpdatePriceBlockRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PriceBlockController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.price-block.create', compact('localizations', 'id'));
    }

    public function store(StorePriceBlockRequest $request): RedirectResponse
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('icon')) {
                    $data['icon'] = $this->fileUpload($request->file('icon'));
                }

                $data['page_id'] = $request->page_id;
                $price_block = PriceBlock::create($data);

                foreach($request->translations as $key=>$value) {
                    $price_block->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'excepted_options'=>$value['excepted_options'],
                        'ignored_options'=>$value['ignored_options'],
                        'package_period'=>$value['package_period'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Price block added successfully!');
    }

    public function show(Page $id): View
    {
        $prices = PriceBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.price-block.show', compact('prices', 'id'));
    }

    public function edit(PriceBlock $price_block): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.price-block.edit', compact('localizations', 'price_block'));
    }

    public function update(UpdatePriceBlockRequest $request, PriceBlock $price_block): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $price_block){
                $data = $request->all();

                if ($request->hasFile('icon')) {
                    $price_block->deleteImage();
                    $data['icon'] = $this->fileUpload($request->file('icon'));
                }

                $price_block->update($data);

                foreach($request->translations as $key => $value){
                    $price_block->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'excepted_options'=>$value['excepted_options'],
                        'ignored_options'=>$value['ignored_options'],
                        'package_period'=>$value['package_period'],
                        'link_title'=>$value['link_title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$price_block->page_id.'/price-block/show')->with('success', 'Price block edited successfully!');
    }

    public function destroy(PriceBlock $price_block): RedirectResponse
    {
        $price_block->delete();
        $price_block->deleteImage();

        return redirect('admin/pages/'.$price_block->page_id)->with('success', 'Price block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(PriceBlock::FILE_PATH), $filename);
        return $filename;
    }
}
