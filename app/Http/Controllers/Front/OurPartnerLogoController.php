<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\OurPartnerLogo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OurPartnerLogoController extends Controller
{
    public function create(): View
    {
        return view('front.partner-logos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        OurPartnerLogo::create($data);

        return redirect()->route('admin.main-page.partners.index')->with('success', 'Client added successfully!');
    }

    public function edit(OurPartnerLogo $partner_logo): View
    {
        return view('front.partner-logos.edit', compact('partner_logo'));
    }

    public function update(Request $request, OurPartnerLogo $partner_logo): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $partner_logo->deleteImage();
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        $partner_logo->update($data);

        return redirect()->route('admin.main-page.partners.index')->with('success', 'Client edited successfully!');
    }

    public function destroy(OurPartnerLogo $partner_logo): RedirectResponse
    {
        $partner_logo->delete();
        $partner_logo->deleteImage();

        return back()->with('success', 'Client deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurPartnerLogo::FILE_PATH), $filename);

        return $filename;
    }
}
