@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Messages</h2>
            <p class="text-gray-600 mt-1">Manage contact form messages</p>
        </div>
        <div class="flex items-center space-x-3">
            <form action="{{ route('admin.messages.mark-all-read') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="admin-btn-secondary text-sm">
                    Mark All as Read
                </button>
            </form>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="admin-card">
        <form method="GET" action="{{ route('admin.messages.index') }}" class="flex flex-col md:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by name, email, subject..." 
                       class="admin-input w-full">
            </div>
            
            <!-- Status Filter -->
            <div>
                <select name="status" class="admin-input">
                    <option value="">All Messages</option>
                    <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread</option>
                    <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read</option>
                </select>
            </div>
            
            <!-- Submit -->
            <button type="submit" class="admin-btn-primary">Filter</button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.messages.index') }}" class="admin-btn-secondary">Clear</a>
            @endif
        </form>
    </div>

    <!-- Messages List -->
    <div class="admin-card">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">From</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 {{ $message->isUnread() ? 'bg-blue-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($message->isUnread())
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        New
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Read
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                <div class="text-sm text-gray-500">{{ $message->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $message->subject ?: '(No Subject)' }}
                                </div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">
                                    {{ Str::limit(strip_tags($message->content), 60) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($message->created_at)
                                    {{ $message->created_at->format('M d, Y') }}<br>
                                    <span class="text-xs">{{ $message->created_at->format('h:i A') }}</span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.messages.show', $message) }}" 
                                       class="text-primary-600 hover:text-primary-900">View</a>
                                    @if($message->isUnread())
                                        <form action="{{ route('admin.messages.mark-read', $message) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-gray-600 hover:text-gray-900">Mark Read</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.messages.mark-unread', $message) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-gray-600 hover:text-gray-900">Mark Unread</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $messages->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

