@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Edit Category</h2>
            <p class="text-gray-600 mt-1">Update category details</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="admin-btn-secondary">
            Back to Categories
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="admin-label">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $category->title) }}" required 
                           class="admin-input @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Current slug: <span class="font-mono">{{ $category->slung }}</span></p>
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label for="image" class="admin-label">Image</label>
                    @if($category->image)
                        <div class="mb-2">
                            <img src="{{ url('/uploads/categories/' . $category->image) }}" alt="Current image" class="w-48 h-32 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" 
                           class="admin-input @error('image') border-red-500 @enderror" 
                           onchange="previewImage(this)">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" src="" alt="Preview" class="w-48 h-32 object-cover rounded-lg">
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.categories.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Update Category</button>
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

