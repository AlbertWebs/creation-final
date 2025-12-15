<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        
        return response()->json([
            'data' => $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'title' => $category->title,
                    'slug' => $category->slung,
                    'image' => $category->image ? url('/uploads/categories/' . $category->image) : null,
                    'blogs_count' => $category->blogs()->count(),
                ];
            })
        ]);
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category): JsonResponse
    {
        $category->load('blogs');
        
        return response()->json([
            'data' => [
                'id' => $category->id,
                'title' => $category->title,
                'slug' => $category->slung,
                'image' => $category->image ? url('/uploads/categories/' . $category->image) : null,
                'blogs' => $category->blogs->map(function ($blog) {
                    return [
                        'id' => $blog->id,
                        'title' => $blog->title,
                        'slug' => $blog->slung,
                    ];
                }),
            ]
        ]);
    }
}

