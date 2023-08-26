<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppealFormRequest;
use App\Http\Requests\UpdateAppealFormRequest;
use App\Models\Admin\AppealForm;

class AppealFormController extends Controller
{
    public function index()
    {
        $appeals = AppealForm::all();

        return view('admin.appeal_form.index', compact('appeals'));
    }

    public function store(StoreAppealFormRequest $request)
    {
        $data = $request->all();

        AppealForm::create($data);

        return redirect()->back()->with('success', 'Appeal Form added successfully!');
    }

    public function edit(AppealForm $appeal_form)
    {
        return view('admin.appeal_form.edit', compact('appeal_form'));
    }

    public function update(UpdateAppealFormRequest $request, AppealForm $appeal_form)
    {
        $data = $request->all();
        $appeal_form->update($data);

        return redirect()->route('admin.appeal_form.index')->with('success', 'Appeal Form edited successfully!');
    }


    public function destroy(AppealForm $appeal_form)
    {
        $appeal_form->delete();

        return back()->with('success', 'Appeal Form deleted successfully!');
    }
}
