<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $request->validated();

        $data = $request->all();
        $slug  = Str::slug($request->all()["title"], '-');
        $data += ['slug' => $slug];

        if ($request->has('thumb')) {
            $file_path = Storage::put('projects_previews', $request->thumb);
            $data['thumb'] = $file_path;
        }

        Project::create($data);

        return to_route('admin.projects.index')->with('message', 'Project correctly created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();

        $data = $request->all();
        $slug  = Str::slug($request->all()["title"], '-');
        $data += ['slug' => $slug];

        if ($request->has('thumb')) {
            $file_path = Storage::put('projects_previews', $request->thumb);
            $data['thumb'] = $file_path;

            if ($project->thumb) {
                Storage::delete($project->thumb);
            }
        }

        $project->update($data);

        return to_route('admin.projects.index')->with('message', 'Project correctly updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        if ($project->thumb) {
            Storage::delete($project->thumb);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', 'item successfully deleted');
    }
}
