<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a newly created message.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'],
            'status' => 0, // Unread
        ]);

        return response()->json([
            'message' => 'Message sent successfully',
            'data' => [
                'id' => $message->id,
                'status' => 'success',
            ]
        ], 201);
    }
}

