@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Create New Blog</h2>
            <p class="text-gray-600 mt-1">Add a new blog post</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="admin-btn-secondary">
            Back to Blogs
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="admin-label">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="admin-input @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="admin-label">Category *</label>
                    <select id="category_id" name="category_id" required class="admin-input @error('category_id') border-red-500 @enderror">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="image" class="admin-label">Featured Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="admin-input @error('image') border-red-500 @enderror" 
                           onchange="previewImage(this)">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                </div>

                <!-- Blockquote -->
                <div class="md:col-span-2">
                    <label for="blockquote" class="admin-label">Blockquote</label>
                    <textarea id="blockquote" name="blockquote" rows="3" class="admin-input @error('blockquote') border-red-500 @enderror">{{ old('blockquote') }}</textarea>
                    @error('blockquote')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content Extra -->
                <div class="md:col-span-2">
                    <label for="content_extra" class="admin-label">Content Extra</label>
                    <textarea id="content_extra" name="content_extra" rows="4" class="admin-input @error('content_extra') border-red-500 @enderror">{{ old('content_extra') }}</textarea>
                    @error('content_extra')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="admin-label">Content *</label>
                    <textarea id="content" name="content" rows="10" required class="admin-input @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Credit -->
                <div class="md:col-span-2">
                    <label for="credit" class="admin-label">Credit</label>
                    <input type="text" id="credit" name="credit" value="{{ old('credit') }}" class="admin-input @error('credit') border-red-500 @enderror">
                    @error('credit')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.blogs.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Create Blog</button>
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

