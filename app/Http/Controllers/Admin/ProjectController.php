<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        if (Auth::user()->isAdmin()) {
            $projects = Project::all();
        } else {
            $userId = Auth::id();
            $projects = Project::where('user_id', $userId)->get();
        }
        // $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $userId = Auth::id();
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        $data['user_id'] = $userId;
        if ($request->hasFile('cover_image')) {
            $path = Storage::disk('public')->put('post_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_project = Project::create($data);
        return redirect()->route('admin.projects.show', $new_project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * 
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
     * 
     */
    public function edit(Project $project)
    {
        //
        if (!Auth::user()->isAdmin() && $project->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        if (!Auth::user()->isAdmin() && $project->user_id !== Auth::id()) {
            abort(403);
        }
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::disk('public')->put('post_images', $request->cover_image);
            $data['cover_image'] = $path;
        }
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
        if (!Auth::user()->isAdmin() && $project->user_id !== Auth::id()) {
            abort(403);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully");

    }
}