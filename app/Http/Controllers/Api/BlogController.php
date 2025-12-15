<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with('category');

        // Search
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $blogs = $query->latest()->paginate($perPage);

        return BlogResource::collection($blogs);
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        $blog->load('category');
        return new BlogResource($blog);
    }
}

