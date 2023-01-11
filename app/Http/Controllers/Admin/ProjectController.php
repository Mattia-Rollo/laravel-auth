<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        // if($request->hasFile('cover_image')){
        //     $path = Storage::disk('public')->put('post_images', $request->cover_image);
        //     $data['cover_image'] = $path;
        // }

        $new_project = Project::create($data);
        return redirect()->route('admin.projects.show', $new_project->slug);
        //
        // return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        // dd($slug);

        // $project = Project::where('slug', $slug)->toSql();

        // dd($project);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        // if($request->hasFile('cover_image')){
        //     if ($post->cover_image) {
        //         Storage::delete($post->cover_image);
        //     }

        //     $path = Storage::disk('public')->put('post_images', $request->cover_image);
        //     $data['cover_image'] = $path;
        // }
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('message', "$project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully");

    }
}