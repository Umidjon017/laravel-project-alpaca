<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRecommendationBlockRequest;
use App\Http\Requests\Admin\UpdateRecommendationBlockRequest;
use App\Models\Admin\Page;
use App\Models\Admin\RecommendationBlock;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RecommendationBlockController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.recommendation-block.create', compact('localizations', 'id'));
    }

    public function store(StoreRecommendationBlockRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $data['page_id'] = $request->page_id;
                $recommendation_block = RecommendationBlock::create($data);

                foreach($request->translations as $key=>$value) {
                    $recommendation_block->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Recommendation block added successfully!');
    }

    public function show(Page $id): View
    {
        $recommendationBlocks = RecommendationBlock::where('page_id', $id->id)->with('translations')->get();

        return view('admin.pages.recommendation-block.show', compact('recommendationBlocks', 'id'));
    }

    public function edit(RecommendationBlock $recommendation_block)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.recommendation-block.edit', compact('recommendation_block', 'localizations'));
    }

    public function update(UpdateRecommendationBlockRequest $request, RecommendationBlock $recommendation_block)
    {
        try {
            DB::transaction(function() use ($request, $recommendation_block){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $recommendation_block->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $recommendation_block->update($data);

                foreach($request->translations as $key => $value){
                    $recommendation_block->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$recommendation_block->page_id.'/recommendation-block/show')->with('success', 'Recommendation edited successfully!');
    }

    public function destroy(RecommendationBlock $recommendation_block)
    {
        $recommendation_block->delete();
        $recommendation_block->deleteImage();

        return redirect('admin/pages/'.$recommendation_block->page_id)->with('success', 'Recommendation deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(RecommendationBlock::FILE_PATH), $filename);
        return $filename;
    }
}
