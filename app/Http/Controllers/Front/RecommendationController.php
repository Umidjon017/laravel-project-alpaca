<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreRecommendationRequest;
use App\Http\Requests\Front\UpdateRecommendationRequest;
use App\Models\Front\Recommendation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::with('translations')->get();

        return view('front.recommendations.index', compact('recommendations'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.recommendations.create', compact('localizations'));
    }

    public function store(StoreRecommendationRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $recommendation = Recommendation::create($data);

                foreach($request->translations as $key=>$value) {
                    $recommendation->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.recommendations.index')->with('success', 'Recommendation added successfully!');
    }

    public function edit(Recommendation $recommendation)
    {
        $localizations = Cache::get('localizations');

        return view('front.recommendations.edit', compact('recommendation', 'localizations'));
    }

    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        try {
            DB::transaction(function() use ($request, $recommendation){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $recommendation->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $recommendation->update($data);

                foreach($request->translations as $key => $value){
                    $recommendation->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.recommendations.index')->with('success', 'Recommendation edited successfully!');
    }

    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
        $recommendation->deleteImage();

        return redirect()->back()->with('success', 'Recommendation deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Recommendation::FILE_PATH), $filename);
        return $filename;
    }
}
