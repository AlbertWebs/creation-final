@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Services</h2>
            <p class="text-gray-600 mt-1">Manage your services</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="admin-btn-primary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Service
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="admin-card">
        <form method="GET" action="{{ route('admin.services.index') }}" class="flex flex-col md:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search services..." 
                       class="admin-input w-full">
            </div>
            
            <!-- Home Filter -->
            <div>
                <select name="home" class="admin-input">
                    <option value="">All Services</option>
                    <option value="yes" {{ request('home') === 'yes' ? 'selected' : '' }}>Show on Home</option>
                    <option value="no" {{ request('home') === 'no' ? 'selected' : '' }}>Not on Home</option>
                </select>
            </div>
            
            <!-- Submit -->
            <button type="submit" class="admin-btn-primary">Filter</button>
            @if(request('search') || request('home'))
                <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">Clear</a>
            @endif
        </form>
    </div>

    <!-- Services Table -->
    <div class="admin-card">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Home</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($services as $service)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($service->image)
                                    <img src="{{ url('/uploads/services/' . $service->image) }}" alt="{{ $service->title }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ Str::limit($service->title, 50) }}</div>
                                @if($service->meta)
                                    <div class="text-sm text-gray-500">{{ Str::limit($service->meta, 40) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ Str::limit($service->slung, 30) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($service->home)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">No</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $service->created_at ? $service->created_at->format('M d, Y') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="text-primary-600 hover:text-primary-900">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No services found. <a href="{{ route('admin.services.create') }}" class="text-primary-600 hover:text-primary-700">Create one now</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($services->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $services->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

