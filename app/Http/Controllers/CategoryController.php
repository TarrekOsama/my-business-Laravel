<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
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
            'name' => 'required|string|min:3|max:255|regex:/^[a-zA-Z\s]+$/|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $categoryData = $request->except('image');

        //upload image
        if ($request->hasFile('image')) {
            $extenstion = $request->image->getClientOriginalExtension();
            $imgName = time() . '.' . $extenstion;

            try {

                $imagePath= $request->image->storeAs('category_images', $imgName, 'public');
                $categoryData['image'] = 'storage/' . $imagePath;
            } catch (Exception $e) {
                return back()->with('error', 'Image upload failed.');
            }
        }else{
            $categoryData['image'] = null;
        }

        $categoryData['slug'] = strtolower(str_replace(' ', '_', $categoryData['name']));

        Category::create($categoryData);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
