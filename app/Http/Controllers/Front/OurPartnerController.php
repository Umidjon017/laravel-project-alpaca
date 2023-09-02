<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreOurPartnerRequest;
use App\Http\Requests\Front\UpdateOurPartnerRequest;
use App\Models\Front\OurPartner;
use App\Models\Front\OurPartnerLogo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OurPartnerController extends Controller
{
    public function index(): View
    {
        $partners = OurPartner::with('translations')->get();
        $partner_logos = OurPartnerLogo::all();

        return view('front.partners.index', compact('partners', 'partner_logos'));
    }

    public function create(): View
    {
        $localizations = Cache::get('localizations');

        return view('front.partners.create', compact('localizations'));
    }

    public function store(StoreOurPartnerRequest $request): RedirectResponse
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();
                $partner = OurPartner::create($data);

                foreach($request->translations as $key=>$value){
                    $partner->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.partners.index')->with('success', 'Our partner block added successfully!');
    }

    public function edit(OurPartner $partner): View
    {
        $localizations = Cache::get('localizations');

        return view('front.partners.edit', compact('localizations', 'partner'));
    }

    public function update(UpdateOurPartnerRequest $request, OurPartner $partner): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $partner){
                $data = $request->all();
                $partner->update($data);

                foreach($request->translations as $key => $value){
                    $partner->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.partners.index')->with('success', 'Our partner block edited successfully!');
    }

    public function destroy(OurPartner $partner): RedirectResponse
    {
        $partner->delete();

        return back()->with('success', 'Our partner block deleted successfully!');
    }
}
