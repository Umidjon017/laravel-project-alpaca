<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\OurPartnerLogo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OurPartnerLogoController extends Controller
{
    public function index(): View
    {
        $partners = OurPartnerLogo::all();

        return view('front.partners.index', compact('partners'));
    }

    public function create(): View
    {
        return view('front.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        OurPartnerLogo::create($data);

        return redirect()->route('partners.index')->with('success', 'Client added successfully!');
    }

    public function edit(OurPartnerLogo $partner)
    {
        return view('front.partners.edit', compact('partner'));
    }

    public function update(Request $request, OurPartnerLogo $partner)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $partner->deleteImage();
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        $partner->update($data);

        return redirect()->route('partners.index')->with('success', 'Client edited successfully!');
    }

    public function destroy(OurPartnerLogo $partner)
    {
        $partner->delete();
        $partner->deleteImage();

        return back()->with('success', 'Client deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurPartnerLogo::FILE_PATH), $filename);

        return $filename;
    }
}
