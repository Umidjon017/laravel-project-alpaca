<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurRule;
use App\Models\Admin\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OurRuleController extends Controller
{
    public function create(Page $id): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.appeals.rules.create', compact('localizations', 'id'));
    }

    public function store(Request $request): RedirectResponse
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('file_personal_data')) {
                    $data['file_personal_data'] = $this->fileUpload($request->file('file_personal_data'));
                }

                if ($request->hasFile('file_personal_data_policy')) {
                    $data['file_personal_data_policy'] = $this->fileUpload($request->file('file_personal_data_policy'));
                }

                $data['page_id'] = $request->page_id;
                $info = OurRule::create($data);

                foreach($request->translations as $key=>$value){
                    $info->translations()->create([
                        'localization_id'=>$key,
                        'agreement_personal_data'=>$value['agreement_personal_data'],
                        'agreement_personal_data_policy'=>$value['agreement_personal_data_policy'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$request->page_id.'/appeals/show')->with('success', 'Rules and Agreement block added successfully!');
    }

    public function edit(OurRule $rule): View
    {
        $localizations = Cache::get('localizations');

        return view('admin.pages.appeals.rules.edit', compact('localizations', 'rule'));
    }

    public function update(Request $request, OurRule $rule): RedirectResponse
    {
        try {
            DB::transaction(function() use ($request, $rule){
                $data = $request->all();

                if ($request->hasFile('file_personal_data')) {
                    $rule->deleteFile('file_personal_data');
                    $data['file_personal_data'] = $this->fileUpload($request->file('file_personal_data'));
                }

                if ($request->hasFile('file_personal_data_policy')) {
                    $rule->deleteFile('file_personal_data_policy');
                    $data['file_personal_data_policy'] = $this->fileUpload($request->file('file_personal_data_policy'));
                }

                $rule->update($data);

                foreach($request->translations as $key => $value){
                    $rule->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'agreement_personal_data'=>$value['agreement_personal_data'],
                        'agreement_personal_data_policy'=>$value['agreement_personal_data_policy'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect('admin/'.$rule->page_id.'/appeals/show')->with('success', 'Rules and Agreement block edited successfully!');
    }

    public function destroy(OurRule $rule): RedirectResponse
    {
        $rule->delete();
        $rule->deleteFile('file_personal_data');
        $rule->deleteFile('file_personal_data_policy');

        return redirect('admin/pages/'.$rule->page_id)->with('success', 'Rules and Agreement block deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(OurRule::FILE_PATH), $filename);

        return $filename;
    }
}
