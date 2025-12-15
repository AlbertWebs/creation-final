<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index(Request $request)
    {
        $query = Message::query();

        // Filter by status (read/unread)
        if ($request->has('status')) {
            $status = $request->status === 'read' ? 1 : 0;
            $query->where('status', $status);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $messages = $query->latest()->paginate(20);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified message.
     */
    public function show(Message $message)
    {
        // Mark as read
        if ($message->status == 0) {
            $message->update(['status' => 1]);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Mark message as read.
     */
    public function markAsRead(Message $message)
    {
        $message->update(['status' => 1]);

        return redirect()->route('admin.messages.index')
            ->with('message', 'Message marked as read.');
    }

    /**
     * Mark message as unread.
     */
    public function markAsUnread(Message $message)
    {
        $message->update(['status' => 0]);

        return redirect()->back()
            ->with('message', 'Message marked as unread.');
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('message', 'Message deleted successfully.');
    }

    /**
     * Mark all messages as read.
     */
    public function markAllAsRead()
    {
        Message::where('status', 0)->update(['status' => 1]);

        return redirect()->route('admin.messages.index')
            ->with('message', 'All messages marked as read.');
    }
}

