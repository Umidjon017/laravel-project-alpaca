<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurClientLogoRequest;
use App\Http\Requests\Admin\UpdateOurClientLogoRequest;
use App\Models\OurClientLogo;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class OurClientLogoController extends Controller
{
    public function create(Page $page)
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.clients.create', compact('localizations', 'page'));
    }

    public function store(StoreOurClientLogoRequest $request)
    {
        dd($request->all());
    }

    public function edit(OurClientLogo $ourClientLogo)
    {
        //
    }

    public function update(UpdateOurClientLogoRequest $request, OurClientLogo $ourClientLogo)
    {
        //
    }

    public function destroy(OurClientLogo $ourClientLogo)
    {
        //
    }
}
