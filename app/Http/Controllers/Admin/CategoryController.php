<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:10',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $h)
    {
    $category = $h;
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'slug' => 'required|string',
            'description' => 'nullable|string|min:10',
        ]);
        $upSlug = Str::slug($request->name);
        $filtred = $request->only(['name','description']);
        $filtred['slug'] = $upSlug;
        $category->update($filtred);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }


































































    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'requierd|min:3|max:20',
            
        ]);

        Category::create($validated);
        DB::table('category')->select(DB::raw(''));
    }



}
