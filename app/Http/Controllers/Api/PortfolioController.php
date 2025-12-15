<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Resources\PortfolioResource;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index(Request $request)
    {
        $query = Portfolio::query();

        // Search
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('client', 'like', '%' . $request->search . '%');
            });
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $portfolios = $query->latest()->paginate($perPage);

        return PortfolioResource::collection($portfolios);
    }

    /**
     * Display the specified portfolio.
     */
    public function show(Portfolio $portfolio)
    {
        return new PortfolioResource($portfolio);
    }
}

