@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Portfolio</h2>
            <p class="text-gray-600 mt-1">Manage your portfolio items</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="admin-btn-primary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Portfolio
        </a>
    </div>

    <!-- Search -->
    <div class="admin-card">
        <form method="GET" action="{{ route('admin.portfolios.index') }}" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search portfolios..." 
                       class="admin-input w-full">
            </div>
            <button type="submit" class="admin-btn-primary">Search</button>
            @if(request('search'))
                <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-secondary">Clear</a>
            @endif
        </form>
    </div>

    <!-- Portfolio Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portfolios as $portfolio)
            <div class="admin-card hover:shadow-lg transition-shadow duration-200">
                <!-- Image -->
                <div class="aspect-video mb-4 rounded-lg overflow-hidden bg-gray-200">
                    @if($portfolio->image)
                        <img src="{{ url('/uploads/portfolios/' . $portfolio->image) }}" 
                             alt="{{ $portfolio->title }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ Str::limit($portfolio->title, 40) }}</h3>
                    @if($portfolio->client)
                        <p class="text-sm text-gray-600 mb-2">Client: {{ $portfolio->client }}</p>
                    @endif
                    <p class="text-xs text-gray-500 mb-4">{{ $portfolio->created_at ? $portfolio->created_at->format('M d, Y') : 'N/A' }}</p>
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this portfolio?');">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">No portfolio items found.</p>
                    <a href="{{ route('admin.portfolios.create') }}" class="admin-btn-primary inline-block">
                        Create Your First Portfolio
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($portfolios->hasPages())
        <div class="admin-card">
            {{ $portfolios->appends(request()->query())->links() }}
        </div>
    @endif
</div>
@endsection

