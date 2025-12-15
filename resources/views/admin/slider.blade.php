@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Sliders</h2>
            <p class="text-gray-600 mt-1">Manage homepage slider images</p>
        </div>
        <a href="{{ url('/admin/addSlider') }}" class="admin-btn-primary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Slider
        </a>
    </div>

    <!-- Sliders Table -->
    <div class="admin-card">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead class="admin-table-header">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="admin-table-body">
                    @forelse($Slider as $slider)
                        <tr class="hover:bg-gray-50">
                            <td>{{ $slider->id }}</td>
                            <td class="font-medium">{{ $slider->name ?? 'Untitled' }}</td>
                            <td>
                                @if($slider->image)
                                    <img src="{{ url('/uploads/slider/' . $slider->image) }}" alt="{{ $slider->name }}" class="w-32 h-20 object-cover rounded">
                                @else
                                    <div class="w-32 h-20 bg-gray-200 rounded flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $slider->order ?? 0 }}</td>
                            <td>
                                @if($slider->status == 1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ url('/admin/editSlider/' . $slider->id) }}" class="text-primary-600 hover:text-primary-900">Edit</a>
                                    <a href="{{ url('/admin/deleteSlider/' . $slider->id) }}" 
                                       onclick="return confirm('Are you sure you want to delete this slider?');" 
                                       class="text-red-600 hover:text-red-900">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No sliders found. <a href="{{ url('/admin/addSlider') }}" class="text-primary-600 hover:text-primary-700">Add one now</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
