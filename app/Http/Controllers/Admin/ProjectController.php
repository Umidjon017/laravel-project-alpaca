<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Post;
use App\Models\Project;
use App\Models\Region;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    public $projectRepo;

    public function __construct(ProjectRepositoryInterface $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }

    public function index()
    {
        $projects = Project::select('id','card_image','created_at')->with('translations')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $localizations = Cache::get('localizations');
        $regions = Region::with('translations')->get();
        return view('admin.projects.create', compact('localizations','regions'));
    }

    public function store(ProjectStoreRequest $request)
    {
        try{
            $this->projectRepo->store($request);
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.projects.index')->with('success', 'Проект создан успешно !');
    }

    public function show(Project $project)
    {
        $localizations = Cache::get('localizations');
        return view('admin.projects.show', compact('localizations', 'project'));
    }

    public function edit(Project $project)
    {
        $localizations = Cache::get('localizations');
        $regions = Region::with('translations')->get();

        return view('admin.projects.edit', compact('localizations', 'regions', 'project'));
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        try {
            $this->projectRepo->update($request, $project);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.projects.index')->with('success', 'Проект изменен успешно !');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Проект удален успешно !');
    }

}
