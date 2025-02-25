<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $categoryData = $request->except('image');

        //upload image
        if ($request->hasFile('image')) {
            $extenstion = $request->image->getClientOriginalExtension();
            $imgName = time() . '.' . $extenstion;

            try {

                $imagePath = $request->image->storeAs('category_images', $imgName, 'public');
                $categoryData['image'] = 'storage/' . $imagePath;
            } catch (Exception $e) {
                return back()->with('error', 'Image upload failed.');
            }
        } else {
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
            'name' => 'required|string|min:3|max:255|regex:/^[a-zA-Z\s]+$/|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $categoryData = $request->except('image');

        //upload image
        if ($request->hasFile('image')) {
            $extenstion = $request->image->getClientOriginalExtension();
            $imgName = time() . '.' . $extenstion;

            try {

                $imagePath = $request->image->storeAs('category_images', $imgName, 'public');
                $categoryData['image'] = 'storage/' . $imagePath;

                //delete old image
                $this->deleteOldImage($category);

            } catch (Exception $e) {
                return back()->with('error', 'Image upload failed.');
            }
        } else {
            $categoryData['image'] = null;
        }

        if ($categoryData['name'] != $category->name) {
            $categoryData['slug'] = strtolower(str_replace(' ', '_', $categoryData['name']));
        }

        $category->update($categoryData);
        
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }












    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        $this->deleteOldImage($category);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
    
    

    protected function deleteOldImage($category)
    {
        if ($category->image) {
            $oldImagePath = str_replace('storage/', '', $category->image);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            };
        }
    }
}
