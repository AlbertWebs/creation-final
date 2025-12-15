<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(Request $request)
    {
        $query = Service::query();

        // Filter by home
        if ($request->has('home')) {
            $query->where('home', $request->home === 'true' ? 1 : 0);
        }

        // Search
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $services = $query->latest()->paginate($perPage);

        return ServiceResource::collection($services);
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }
}

