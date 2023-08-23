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

                $philosophy = OurPhilosophy::create($data);

                foreach($request->translations as $key=>$value) {
                    $philosophy->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'additional'=>$value['additional'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('philosophy.index')->with('success', 'Our Philosophy added successfully!');
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

                $philosophy->update($data);

                foreach($request->translations as $key => $value){
                    $philosophy->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'additional'=>$value['additional'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('philosophy.index')->with('success', 'Our Philosophy edited successfully!');
    }

    public function destroy(OurPhilosophy $philosophy)
    {
        $philosophy->delete();

        return redirect()->back()->with('success', 'Our Philosophy deleted successfully!');
    }
}