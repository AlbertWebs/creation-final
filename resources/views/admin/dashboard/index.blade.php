@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Welcome Banner -->
    <div class="admin-card bg-gradient-to-r from-primary-600 to-primary-700 text-white overflow-hidden relative">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
        </div>
        <div class="relative z-10">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</h1>
                    <p class="text-primary-100 text-lg">Here's what's happening with your website today.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.blogs.create') }}" class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">New Blog</p>
                    <p class="text-xs text-gray-500">Create post</p>
                </div>
            </div>
        </a>
        
        <a href="{{ route('admin.portfolios.create') }}" class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">New Portfolio</p>
                    <p class="text-xs text-gray-500">Add project</p>
                </div>
            </div>
        </a>
        
        <a href="{{ route('admin.services.create') }}" class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">New Service</p>
                    <p class="text-xs text-gray-500">Add service</p>
                </div>
            </div>
        </a>
        
        <a href="{{ url('/admin/sitesettings') }}" class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Site Settings</p>
                    <p class="text-xs text-gray-500">Configure</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Blogs -->
        <div class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Blogs</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Blog::count() }}</p>
                    <p class="text-xs text-gray-500 mt-2">Content posts</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Total Portfolio -->
        <div class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-600 mb-1">Portfolio Items</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Portfolio::count() }}</p>
                    <p class="text-xs text-gray-500 mt-2">Projects</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Total Services -->
        <div class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-600 mb-1">Services</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Service::count() }}</p>
                    <p class="text-xs text-gray-500 mt-2">Offerings</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Unread Messages -->
        <div class="admin-card hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-600 mb-1">Unread Messages</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Message::where('status', 0)->count() }}</p>
                    <p class="text-xs text-gray-500 mt-2">Require attention</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Messages -->
        <div class="admin-card hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Recent Messages
                </h2>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">View All</a>
            </div>
            <div class="space-y-3">
                @forelse(\App\Models\Message::where('status', 0)->latest()->take(5)->get() as $message)
                    <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 border border-transparent hover:border-gray-200">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center shadow-md">
                                <span class="text-primary-700 font-semibold text-sm">{{ substr($message->name ?? 'U', 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900">{{ $message->name ?? 'Unknown' }}</p>
                            <p class="text-sm text-gray-600 truncate mt-1">{{ $message->subject ?? 'No subject' }}</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message->created_at ? $message->created_at->diffForHumans() : 'N/A' }}
                            </p>
                        </div>
                        <a href="{{ route('admin.messages.show', $message) }}" class="flex-shrink-0 text-primary-600 hover:text-primary-700 text-sm font-medium hover:underline">View</a>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500">No unread messages</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Recent Blogs -->
        <div class="admin-card hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Recent Blogs
                </h2>
                <a href="{{ route('admin.blogs.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">View All</a>
            </div>
            <div class="space-y-3">
                @forelse(\App\Models\Blog::latest()->take(5)->get() as $blog)
                    <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 border border-transparent hover:border-gray-200">
                        <div class="flex-shrink-0">
                            @if($blog->image)
                                <img src="{{ url('/uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-14 h-14 rounded-lg object-cover shadow-md">
                            @else
                                <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-md">
                                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 line-clamp-2">{{ Str::limit($blog->title, 50) }}</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $blog->created_at ? $blog->created_at->diffForHumans() : 'N/A' }}
                            </p>
                        </div>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="flex-shrink-0 text-primary-600 hover:text-primary-700 text-sm font-medium hover:underline">Edit</a>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500">No blogs yet</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

