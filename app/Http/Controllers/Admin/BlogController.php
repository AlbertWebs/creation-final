<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with('category');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $blogs = $query->latest()->paginate(15);
        $categories = Category::all();
        
        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/blogs', $filename);
            $validated['image'] = $filename;
        }

        $validated['slung'] = Str::slug($validated['title']);

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }
            
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/blogs', $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = $blog->image;
        }

        $validated['slung'] = Str::slug($validated['title']);

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete image if exists
        if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
            unlink(public_path('uploads/blogs/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Blog deleted successfully.');
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

