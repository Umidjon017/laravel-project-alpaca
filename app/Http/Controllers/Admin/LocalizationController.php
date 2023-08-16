<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LocalizationController extends Controller
{
    public function index(): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.localizations.index', compact('localizations'));
    }

    public function store(Request $request): RedirectResponse
    {
        $localization = Localization::create($request->all());

        return back()->with('success', 'Added new language successfully!');
    }

    public function update(Request $request, Localization $locale): RedirectResponse
    {
        $locale->update($request->all());

        return back()->with('success', 'Edited successfully!');
    }

    public function destroy(Localization $locale): RedirectResponse
    {
        $locale->delete();

        return back()->with('success', 'Deleted successfully!');
    }
}
