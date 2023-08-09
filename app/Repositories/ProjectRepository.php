<?php

namespace App\Repositories;

use App\Models\Localization;
use App\Models\Project;
use App\Models\ProjectVideo;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function store($request)
    {
        DB::transaction(function() use ($request) {

            $requestData = $request->all();

            if ($request->hasFile('yard_image')) {
                $requestData['yard_image'] = $this->fileUpload($request->file('yard_image'));
            }
            if ($request->hasFile('hall_image')) {
                $requestData['hall_image'] = $this->fileUpload($request->file('hall_image'));
            }
            if ($request->hasFile('card_image')) {
                $requestData['card_image'] = $this->fileUpload($request->file('card_image'));
            }
            if ($request->hasFile('background_image')) {
                $requestData['background_image'] = $this->fileUpload($request->file('background_image'));
            }
            if ($request->hasFile('logo')) {
                $requestData['logo'] = $this->fileUpload($request->file('logo'));
            }

            $localizationId = Localization::first()->id;

            $requestData['slug'] = \Str::slug($request->translations[$localizationId]['name']);

            $project=Project::create($requestData);

            if ($request->hasFile('image')) {
                foreach ($request->image as $image) {
                    $projectImages = $this->fileUpload($image);
                    $project->images()->create([
                        'image' => $projectImages
                    ]);
                }
            }

            $project->videos()->create([
                'project_id' => $project,
                'link' => $request->link
            ]);

            foreach($request->translations as $key => $value)
            {
                $translatedData = $this->getArr($key, $value);
                if (isset($value['booklet'])) {
                    $translatedData['booklet'] = $this->fileUpload($value['booklet']);
                }

                $project->translations()->create($translatedData);
            }
        });
    }

    public function update($request, $project)
    {
        DB::transaction(function () use ($request, $project) {

            $requestData = $request->all();

            if ($request->hasFile('yard_image')) {
                $project->deleteFile('yard_image');
                $requestData['yard_image'] = $this->fileUpload($request->file('yard_image'));
            }
            if ($request->hasFile('hall_image')) {
                $project->deleteFile('hall_image');
                $requestData['hall_image'] = $this->fileUpload($request->file('hall_image'));
            }
            if ($request->hasFile('card_image')) {
                $project->deleteFile('card_image');
                $requestData['card_image'] = $this->fileUpload($request->file('card_image'));
            }
            if ($request->hasFile('background_image')) {
                $project->deleteFile('background_image');
                $requestData['background_image'] = $this->fileUpload($request->file('background_image'));
            }
            if ($request->hasFile('logo')) {
                $project->deleteFile('logo');
                $requestData['logo'] = $this->fileUpload($request->file('logo'));
            }

            $localizationId = Localization::first()->id;

            $requestData['slug'] = \Str::slug($request->translations[$localizationId]['name']);

            $project->update($requestData);

            if ($request->hasFile('image')) {
                $project->deleteProjectImages();
                foreach ($request->image as $image) {
                    $projectImage = $this->fileUpload($image);
                    $project->images()->updateOrCreate([
                        'project_id' => $project->id,
                        'image' => $projectImage
                    ]);
                }
            }

            $project->videos()->update([
                'project_id' => $project->id,
                'link' => $request->link
            ]);

            foreach($request->translations as $key => $value)
            {
                $translatedData = $this->getArr($key, $value);
                if (isset($value['booklet'])) {
                    $project->deleteBookletImages();
                    $translatedData['booklet'] = $this->fileUpload($value['booklet']);
                }

                $project->translations()->updateOrCreate(
                    ['id' => $value['id']],
                    $translatedData
                );
            }
        });
    }

    public function fileUpload($file): string
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path(Project::FILE_PATH), $filename);
        return $filename;
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function getArr($key, $value): array
    {
        $translatedData = [];
        $translatedData['localization_id'] = $key;
        $translatedData['name'] = $value['name'];
        $translatedData['addres'] = $value['addres'];
        $translatedData['body'] = $value['body'];
        $translatedData['yard_text'] = $value['yard_text'];
        $translatedData['hall_text'] = $value['hall_text'];
        $translatedData['term'] = $value['term'];
        return $translatedData;
    }
}
