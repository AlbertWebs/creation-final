<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/categories', $filename);
            $validated['image'] = $filename;
        }

        $validated['slung'] = Str::slug($validated['title']);

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('message', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image && file_exists(public_path('uploads/categories/' . $category->image))) {
                unlink(public_path('uploads/categories/' . $category->image));
            }
            
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/categories', $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = $category->image;
        }

        $validated['slung'] = Str::slug($validated['title']);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Delete image if exists
        if ($category->image && file_exists(public_path('uploads/categories/' . $category->image))) {
            unlink(public_path('uploads/categories/' . $category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('message', 'Category deleted successfully.');
    }

    /**
     * Generate a sanitized filename for uploads.
     */
    private function generateFilename($file)
    {
        $timestamp = now()->format('Y-m-d_H-i-s');
        $originalName = str_replace(' ', '', $file->getClientOriginalName());
        return $timestamp . '_' . $originalName;
    }
}

