@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Categories</h2>
            <p class="text-gray-600 mt-1">Manage blog categories</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="admin-btn-primary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Category
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="admin-card hover:shadow-lg transition-shadow duration-200">
                <!-- Image -->
                <div class="aspect-video mb-4 rounded-lg overflow-hidden bg-gray-200">
                    @if($category->image)
                        <img src="{{ url('/uploads/categories/' . $category->image) }}" 
                             alt="{{ $category->title }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $category->title }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ $category->slung }}</p>
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">No categories found.</p>
                    <a href="{{ route('admin.categories.create') }}" class="admin-btn-primary inline-block">
                        Create Your First Category
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($categories->hasPages())
        <div class="admin-card">
            {{ $categories->links() }}
        </div>
    @endif
</div>
@endsection

