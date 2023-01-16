<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tags = Tag::all();
        if (Auth::user()->isAdmin()) {
            $tags = Tag::all();
        } else {


            $tags = Tag::with([
                'projects' => function ($query) {
                    $query->where('user_id', Auth::id());
                }
            ])->get();
            // dd($tags);
        }

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * 
     */
    public function store(StoreTagRequest $request)
    {
        //
        $val = $request->validated();
        $slug = Tag::generateSlug($request->name);
        $val['slug'] = $slug;

        Tag::create($val);

        // redirect
        return redirect()->back()->with('message', "Tag $slug added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * 
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * 
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * 
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
        $val_data = $request->validated();
        $slug = Tag::generateSlug($request->name);
        $val_data['slug'] = $slug;
        $tag->update($val_data);
        return redirect()->back()->with('message', "Tag $slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * 
     */
    public function destroy(Tag $tag)
    {
        //
        // dd($slug);

        $tag->delete();
        return redirect()->back()->with('message', "tag $tag->name removed successfully");
    }
}