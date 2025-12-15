@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Message Details</h2>
            <p class="text-gray-600 mt-1">View message information</p>
        </div>
        <div class="flex items-center space-x-3">
            @if($message->isUnread())
                <form action="{{ route('admin.messages.mark-read', $message) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="admin-btn-secondary">Mark as Read</button>
                </form>
            @else
                <form action="{{ route('admin.messages.mark-unread', $message) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="admin-btn-secondary">Mark as Unread</button>
                </form>
            @endif
            <a href="{{ route('admin.messages.index') }}" class="admin-btn-secondary">
                Back to Messages
            </a>
        </div>
    </div>

    <!-- Message Details -->
    <div class="admin-card">
        <div class="space-y-6">
            <!-- Status Badge -->
            <div>
                @if($message->isUnread())
                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                        Unread
                    </span>
                @else
                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                        Read
                    </span>
                @endif
            </div>

            <!-- Sender Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-gray-200">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">From</label>
                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $message->name }}</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</label>
                    <p class="mt-1 text-lg text-gray-900">
                        <a href="mailto:{{ $message->email }}" class="text-primary-600 hover:text-primary-700">
                            {{ $message->email }}
                        </a>
                    </p>
                </div>
                @if($message->title)
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Title</label>
                        <p class="mt-1 text-lg text-gray-900">{{ $message->title }}</p>
                    </div>
                @endif
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</label>
                    <p class="mt-1 text-lg text-gray-900">
                        @if($message->created_at)
                            {{ $message->created_at->format('F d, Y') }} at {{ $message->created_at->format('h:i A') }}
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>

            <!-- Subject -->
            @if($message->subject)
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Subject</label>
                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $message->subject }}</p>
                </div>
            @endif

            <!-- Content -->
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Message</label>
                <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $message->content }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this message?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="admin-btn-danger">
                Delete Message
            </button>
        </form>
        <a href="{{ route('admin.messages.index') }}" class="admin-btn-secondary">
            Back to Messages
        </a>
    </div>
</div>
@endsection

