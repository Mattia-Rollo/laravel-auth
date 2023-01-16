<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        //file log per controllare le chiamate al db
        // DB::listen(function ($query) {
        //     logger($query->sql, $query->bindings);
        // });

        if (Auth::user()->isAdmin()) {
            $categories = Category::all();
        } else {

            // $categories = DB::table('categories')
            //     ->join('projects', 'categories.id', '=', 'project.category_id')
            //     ->select('*')
            //     ->where('user_id', Auth::id())
            //     ->get();

            $categories = Category::with([
                'projects' => function ($query) {
                    $query->where('user_id', Auth::id());
                }
            ])->get();
            // dd($categories);
        }


        // $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $data = $request->validated();
        $slug = Category::generateSlug($request->name);
        $data['slug'] = $slug;
        $new_category = Category::create($data);
        return redirect()->route('admin.categories.show', $new_category->slug);
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show($slug)
    {
        //
        if (Auth::user()->isAdmin()) {
            $category = Category::where('slug', $slug)->first();
        } else {
            $category = Category::where('slug', $slug)->with([
                'projects' => function ($query) {
                    $query->where('user_id', Auth::id());
                }
            ])->first();
        }
        //dd($category);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $data = $request->validated();
        $slug = Category::generateSlug($request->name);
        $data['slug'] = $slug;
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('message', "$category->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', "$category->name deleted successfully");
    }
}