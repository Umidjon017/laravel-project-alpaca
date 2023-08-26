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
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        OurClientLogo::create([
            'page_id' => $data['page_id'],
            'logo' => $data['logo'],
            'link' => $data['link'],
        ]);

        return redirect('admin/pages/'.$request->page_id)->with('success', 'Our Clients Logo block added successfully!');
    }

    public function update(Request $request, OurClientLogo $clients_logo): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $clients_logo->deleteImage();
            $data['logo'] = $this->fileUpload($request->file('logo'));
        }

        $clients_logo->update($data);

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
