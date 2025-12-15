@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Clients</h2>
            <p class="text-gray-600 mt-1">Manage client logos and information</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="admin-btn-primary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Client
        </a>
    </div>

    <!-- Clients Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($clients as $client)
            <div class="admin-card hover:shadow-lg transition-shadow duration-200">
                <!-- Logo -->
                <div class="aspect-square mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center p-4">
                    @if($client->image)
                        <img src="{{ url('/uploads/clients/' . $client->image) }}" 
                             alt="{{ $client->name }}" 
                             class="w-full h-full object-contain">
                    @else
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    @endif
                </div>
                
                <!-- Content -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1 text-center">{{ Str::limit($client->name, 30) }}</h3>
                    @if($client->orders)
                        <p class="text-xs text-gray-500 text-center mb-4">Orders: {{ $client->orders }}</p>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-center space-x-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.clients.edit', $client) }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this client?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="admin-card text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">No clients found.</p>
                    <a href="{{ route('admin.clients.create') }}" class="admin-btn-primary inline-block">
                        Add Your First Client
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($clients->hasPages())
        <div class="admin-card">
            {{ $clients->links() }}
        </div>
    @endif
</div>
@endsection

