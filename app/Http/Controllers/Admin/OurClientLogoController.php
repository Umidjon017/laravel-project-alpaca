<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurClientLogo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OurClientLogoController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            foreach ($request->logo as $image) {
                $logos = $this->fileUpload($image);
                OurClientLogo::create([
                    'page_id' => $request->page_id,
                    'logo' => $logos
                ]);
            }
        }

        return back()->with('success', 'Our Clients Logo block added successfully!');
    }

    public function update(Request $request, OurClientLogo $clients_logo): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $clients_logo->deleteImage();

            foreach ($request->logo as $logo) {
                $ourClientLogos = $this->fileUpload($logo);
                $clients_logo->update([
                    'page_id' => $request->page_id,
                    'logo' => $ourClientLogos
                ]);
            }
        }

        return back()->with('success', 'Our Client Logo block edited successfully!');
    }

    public function destroy(OurClientLogo $clients_logo): RedirectResponse
    {
        $clients_logo->delete();
        $clients_logo->deleteImage();

        return back()->with('success', 'Our Client Logo block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurClientLogo::FILE_PATH), $filename);

        return $filename;
    }
}
