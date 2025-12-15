<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePortfolioRequest;
use App\Http\Requests\Admin\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index(Request $request)
    {
        $query = Portfolio::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta', 'like', "%{$search}%");
            });
        }

        $portfolios = $query->latest()->paginate(15);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $validated = $request->validated();

        $path = 'uploads/portfolios';

        // Handle main image
        if ($request->hasFile('image')) {
            $validated['image'] = $this->handleImageUpload($request->file('image'), $path);
        }

        // Handle additional images
        for ($i = 1; $i <= 10; $i++) {
            $fieldName = 'image_' . ($i === 1 ? 'one' : ($i === 2 ? 'two' : ($i === 3 ? 'three' : ($i === 4 ? 'four' : ($i === 5 ? 'five' : ($i === 6 ? 'six' : ($i === 7 ? 'seven' : ($i === 8 ? 'eight' : ($i === 9 ? 'nine' : 'ten')))))))));
            if ($request->hasFile($fieldName)) {
                $validated[$fieldName] = $this->handleImageUpload($request->file($fieldName), $path);
            }
        }

        $validated['slung'] = Str::slug($validated['title']);

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('message', 'Portfolio created successfully.');
    }

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $validated = $request->validated();

        $path = 'uploads/portfolios';

        // Handle main image
        if ($request->hasFile('image')) {
            $this->deleteImageIfExists($portfolio->image, $path);
            $validated['image'] = $this->handleImageUpload($request->file('image'), $path);
        } else {
            $validated['image'] = $portfolio->image;
        }

        // Handle additional images
        $imageFields = ['image_one', 'image_two', 'image_three', 'image_four', 'image_five', 
                       'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $this->deleteImageIfExists($portfolio->$field, $path);
                $validated[$field] = $this->handleImageUpload($request->file($field), $path);
            } else {
                $validated[$field] = $portfolio->$field;
            }
        }

        $validated['slung'] = Str::slug($validated['title']);

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('message', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $path = 'uploads/portfolios';
        
        // Delete all images
        $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 'image_five',
                       'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
        
        foreach ($imageFields as $field) {
            $this->deleteImageIfExists($portfolio->$field, $path);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('message', 'Portfolio deleted successfully.');
    }

    /**
     * Handle image upload with sanitized filename.
     */
    private function handleImageUpload($file, $path)
    {
        $filename = str_replace(' ', '', $file->getClientOriginalName());
        $timestamp = now()->format('Y-m-d_H-i-s');
        $imageName = $timestamp . '_' . $filename;
        $file->move($path, $imageName);
        return $imageName;
    }

    /**
     * Delete image if it exists.
     */
    private function deleteImageIfExists($filename, $path)
    {
        if ($filename && file_exists(public_path($path . '/' . $filename))) {
            unlink(public_path($path . '/' . $filename));
        }
    }
}

