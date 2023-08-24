<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreForDoctorRequest;
use App\Http\Requests\Front\UpdateForDoctorRequest;
use App\Models\Front\ForDoctor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ForDoctorController extends Controller
{
    public function index()
    {
        $doctors = ForDoctor::with('translations')->get();

        return view('front.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');

        return view('front.doctors.create', compact('localizations'));
    }

    public function store(StoreForDoctorRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $doctor = ForDoctor::create($data);

                foreach($request->translations as $key=>$value) {
                    $doctor->translations()->create([
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.doctors.index')->with('success', 'For doctor added successfully!');
    }

    public function edit(ForDoctor $doctor)
    {
        $localizations = Cache::get('localizations');

        return view('front.doctors.edit', compact('doctor', 'localizations'));
    }

    public function update(UpdateForDoctorRequest $request, ForDoctor $doctor)
    {
        try {
            DB::transaction(function() use ($request, $doctor){
                $data = $request->all();

                if ($request->hasFile('image')) {
                    $doctor->deleteImage();
                    $data['image'] = $this->fileUpload($request->file('image'));
                }

                $doctor->update($data);

                foreach($request->translations as $key => $value){
                    $doctor->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'title'=>$value['title'],
                        'description'=>$value['description'],
                        'body'=>$value['body'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.doctors.index')->with('success', 'For doctor edited successfully!');
    }

    public function destroy(ForDoctor $doctor)
    {
        $doctor->delete();
        $doctor->deleteImage();

        return redirect()->back()->with('success', 'For doctor deleted successfully!');
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(ForDoctor::FILE_PATH), $filename);
        return $filename;
    }
}
