<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreFeedbackRequest;
use App\Http\Requests\Front\UpdateFeedbackRequest;
use App\Models\Front\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index(): View
    {
        $feedbacks = Feedback::with('translations')->get();

        return view('front.feedback.index', compact('feedbacks'));
    }

    public function create(): View
    {
        $localizations = Cache::get('localizations');

        return view('front.feedback.create', compact('localizations'));
    }

    public function store(StoreFeedbackRequest $request)
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

                $info = Feedback::create($data);

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

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback added successfully!');
    }

    public function edit(Feedback $feedback): View
    {
        $localizations = Cache::get('localizations');

        return view('front.feedback.edit', compact('localizations','feedback'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $feedback){
                $data = $request->all();

                if ($request->hasFile('logo')) {
                    $feedback->deleteFile('logo');
                    $data['logo'] = $this->fileUpload($request->file('logo'));
                }

                if ($request->hasFile('image')) {
                    $feedback->deleteFile('image');
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $feedback->update($data);

                foreach($request->translations as $key => $value){
                    $feedback->translations()->updateOrCreate(['id' => $value['id']], [
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

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback edited successfully!');
    }

    public function destroy(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();
        $feedback->deleteFile('image');
        $feedback->deleteFile('logo');

        return redirect()->back()->with('success', 'Feedback deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Feedback::FILE_PATH), $filename);
        return $filename;
    }
}
