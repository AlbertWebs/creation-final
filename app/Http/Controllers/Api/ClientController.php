<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Client::query()->orderBy('orders', 'asc');
        
        $perPage = $request->get('per_page', 20);
        $clients = $query->paginate($perPage);
        
        return response()->json([
            'data' => $clients->map(function ($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'image' => $client->image ? url('/uploads/clients/' . str_replace(':', '_', $client->image)) : null,
                    'order' => $client->orders,
                ];
            }),
            'pagination' => [
                'current_page' => $clients->currentPage(),
                'last_page' => $clients->lastPage(),
                'per_page' => $clients->perPage(),
                'total' => $clients->total(),
            ]
        ]);
    }
}

