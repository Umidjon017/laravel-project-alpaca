<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
        Artisan::call('optimize:clear');

        return back()->with('success', 'Added new language successfully!');
    }

    public function update(Request $request, Localization $localization): RedirectResponse
    {
        $localization->update($request->all());
        Artisan::call('optimize:clear');

        return back()->with('success', 'Edited successfully!');
    }

    public function destroy(Localization $localization): RedirectResponse
    {
        $localization->delete();
        Artisan::call('optimize:clear');

        return back()->with('success', 'Deleted successfully!');
    }
}
