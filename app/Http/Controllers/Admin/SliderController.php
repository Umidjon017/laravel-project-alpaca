<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{

  public function index()
  {
    $sliders = Slider::with('translations')->latest()->get();

    return view('admin.sliders.index', compact('sliders'));
  }

  public function create()
  {
      $localizations = Cache::get('localizations');
    return view('admin.sliders.create', compact('localizations'));
  }

  public function store(SliderRequest $request): RedirectResponse
  {
      try {
          DB::transaction(function() use ($request) {
              $slider = Slider::create();

              foreach ($request->translations as $key => $value) {
                  $translatedData = [];
                  $translatedData['localization_id'] = $key;
                  $translatedData['url'] = $value['url'];
                  if (isset($value['image'])) {
                      $translatedData['image'] = $this->fileUpload($value['image']);
                  }

                  $slider->translations()->create($translatedData);
              }
          });
      } catch (\Exception $e) {
          return redirect()->back()->with('error', $e->getMessage());
      }

    return redirect()->route('admin.sliders.index')->with('success', 'Слайдер создан успешно !');
  }

  public function show($id)
  {
    //
  }

  public function edit(Slider $slider)
  {
      $localizations = Cache::get('localizations');
    return view('admin.sliders.edit', compact('slider', 'localizations'));
  }

  public function update(Request $request, Slider $slider)
  {
      $request->validate([
          'translations'=>'required',
      ]);

      try {
          DB::transaction(function() use ($request, $slider) {
              $slider->update();

              foreach ($request->translations as $key => $value) {
                  $translatedData = [];
                  $translatedData['localization_id'] = $key;
                  $translatedData['url'] = $value['url'];
                  if (isset($value['image'])) {
                      $slider->deleteImage();
                      $translatedData['image'] = $this->fileUpload($value['image']);
                  }

                  $slider->translations()->updateOrCreate(
                      ['id' => $value['id']],
                      $translatedData
                  );
              }
          });
      } catch (\Exception $e) {
          return redirect()->back()->with('error', $e->getMessage());
      }

    return redirect()->route('admin.sliders.index')->with('success', 'Слайдер обновлен успешно !');
  }

  public function destroy(Slider $slider)
  {
    $slider->delete();
    return redirect()->route('admin.sliders.index')->with('success', 'Слайдер удален успешно !');
  }

  public function fileUpload($file)
  {
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path(Slider::FILE_PATH), $filename);
    return $filename;
  }
}
