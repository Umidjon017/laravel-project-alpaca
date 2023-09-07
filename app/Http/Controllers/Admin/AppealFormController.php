<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppealFormRequest;
use App\Http\Requests\Admin\UpdateAppealFormRequest;
use App\Models\Admin\AppealForm;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AppealFormController extends Controller
{
    public function index(): View
    {
        $appeals = AppealForm::paginate(10);

        return view('admin.appeal_form.index', compact('appeals'));
    }

    public function create(): View
    {
        return view('admin.appeal_form.create');
    }

    public function store(StoreAppealFormRequest $request): RedirectResponse
    {
        $data = $request->all();

        AppealForm::create($data);

        return redirect()->back()->with('success', 'Appeal Form added successfully!');
    }

    public function edit(AppealForm $appeal_form): View
    {
        return view('admin.appeal_form.edit', compact('appeal_form'));
    }

    public function update(UpdateAppealFormRequest $request, AppealForm $appeal_form): RedirectResponse
    {
        $data = $request->all();
        $appeal_form->update($data);

        return redirect()->route('admin.appeal-form.index')->with('success', 'Appeal Form edited successfully!');
    }

    public function destroy(AppealForm $appeal_form): RedirectResponse
    {
        $appeal_form->delete();

        return back()->with('success', 'Appeal Form deleted successfully!');
    }
}
