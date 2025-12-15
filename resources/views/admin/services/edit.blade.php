@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Edit Service</h2>
            <p class="text-gray-600 mt-1">Update service details</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">
            Back to Services
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="admin-label">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required class="admin-input @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta -->
                <div class="md:col-span-2">
                    <label for="meta" class="admin-label">Meta Description</label>
                    <textarea id="meta" name="meta" rows="2" class="admin-input @error('meta') border-red-500 @enderror">{{ old('meta', $service->meta) }}</textarea>
                    @error('meta')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="admin-label">Image</label>
                    @if($service->image)
                        <div class="mb-2">
                            <img src="{{ url('/uploads/services/' . $service->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" class="admin-input @error('image') border-red-500 @enderror" 
                           onchange="previewImage(this)">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="admin-label">Icon Class</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" 
                           placeholder="flaticon flaticon-interior-design" 
                           class="admin-input @error('icon') border-red-500 @enderror">
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">CSS class for icon (optional)</p>
                </div>

                <!-- Show on Home -->
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="home" value="1" {{ old('home', $service->home) ? 'checked' : '' }} 
                               class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="ml-2 text-sm text-gray-700">Show on Homepage</span>
                    </label>
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="admin-label">Content *</label>
                    <textarea id="content" name="content" rows="8" required class="admin-input @error('content') border-red-500 @enderror">{{ old('content', $service->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content Extra -->
                <div class="md:col-span-2">
                    <label for="content_extra" class="admin-label">Extra Content</label>
                    <textarea id="content_extra" name="content_extra" rows="6" class="admin-input @error('content_extra') border-red-500 @enderror">{{ old('content_extra', $service->content_extra) }}</textarea>
                    @error('content_extra')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Update Service</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}
</script>
@endsection

