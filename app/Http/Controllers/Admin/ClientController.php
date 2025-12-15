<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(15);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/clients', $filename);
            $validated['image'] = $filename;
        }

        $validated['orders'] = $validated['orders'] ?? 10;

        Client::create($validated);

        return redirect()->route('admin.clients.index')
            ->with('message', 'Client created successfully.');
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($client->image && file_exists(public_path('uploads/clients/' . $client->image))) {
                unlink(public_path('uploads/clients/' . $client->image));
            }
            
            $file = $request->file('image');
            $filename = $this->generateFilename($file);
            $file->move('uploads/clients', $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = $client->image;
        }

        $validated['orders'] = $validated['orders'] ?? $client->orders ?? 10;

        $client->update($validated);

        return redirect()->route('admin.clients.index')
            ->with('message', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(Client $client)
    {
        // Delete image if exists
        if ($client->image && file_exists(public_path('uploads/clients/' . $client->image))) {
            unlink(public_path('uploads/clients/' . $client->image));
        }

        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('message', 'Client deleted successfully.');
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

