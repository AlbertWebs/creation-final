<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(Request $request)
    {
        $query = Service::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta', 'like', "%{$search}%");
            });
        }

        // Filter by home status
        if ($request->has('home')) {
            $query->where('home', $request->home === 'yes' ? 1 : 0);
        }

        $services = $query->latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/services', $filename);
            $validated['image'] = $filename;
        }

        $validated['slung'] = Str::slug($validated['title']);
        $validated['home'] = $request->has('home') ? 1 : 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('message', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                unlink(public_path('uploads/services/' . $service->image));
            }
            
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/services', $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = $service->image;
        }

        $validated['slung'] = Str::slug($validated['title']);
        $validated['home'] = $request->has('home') ? 1 : 0;

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('message', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
            unlink(public_path('uploads/services/' . $service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('message', 'Service deleted successfully.');
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

