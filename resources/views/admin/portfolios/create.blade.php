@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Create New Portfolio</h2>
            <p class="text-gray-600 mt-1">Add a new portfolio item</p>
        </div>
        <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-secondary">
            Back to Portfolio
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                <!-- Basic Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label for="title" class="admin-label">Title *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required 
                                   class="admin-input @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Client -->
                        <div>
                            <label for="client" class="admin-label">Client</label>
                            <input type="text" id="client" name="client" value="{{ old('client') }}" 
                                   class="admin-input @error('client') border-red-500 @enderror">
                            @error('client')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta -->
                        <div>
                            <label for="meta" class="admin-label">Meta Description</label>
                            <input type="text" id="meta" name="meta" value="{{ old('meta') }}" 
                                   class="admin-input @error('meta') border-red-500 @enderror">
                            @error('meta')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="md:col-span-2">
                            <label for="content" class="admin-label">Content</label>
                            <textarea id="content" name="content" rows="6" 
                                      class="admin-input @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Images</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Main Image -->
                        <div>
                            <label for="image" class="admin-label">Featured Image</label>
                            <input type="file" id="image" name="image" accept="image/*" 
                                   class="admin-input @error('image') border-red-500 @enderror"
                                   onchange="previewImage(this, 'preview-image')">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div id="preview-image" class="mt-2 hidden">
                                <img id="preview-image-img" src="" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                            </div>
                        </div>

                        <!-- Additional Images -->
                        @for($i = 1; $i <= 10; $i++)
                            @php
                                $fieldName = 'image_' . ($i === 1 ? 'one' : ($i === 2 ? 'two' : ($i === 3 ? 'three' : ($i === 4 ? 'four' : ($i === 5 ? 'five' : ($i === 6 ? 'six' : ($i === 7 ? 'seven' : ($i === 8 ? 'eight' : ($i === 9 ? 'nine' : 'ten')))))))));
                                $previewId = 'preview-' . $fieldName;
                            @endphp
                            <div>
                                <label for="{{ $fieldName }}" class="admin-label">Image {{ $i === 1 ? 'One' : ($i === 2 ? 'Two' : ($i === 3 ? 'Three' : ($i === 4 ? 'Four' : ($i === 5 ? 'Five' : ($i === 6 ? 'Six' : ($i === 7 ? 'Seven' : ($i === 8 ? 'Eight' : ($i === 9 ? 'Nine' : 'Ten')))))))) }}</label>
                                <input type="file" id="{{ $fieldName }}" name="{{ $fieldName }}" accept="image/*" 
                                       class="admin-input @error($fieldName) border-red-500 @enderror"
                                       onchange="previewImage(this, '{{ $previewId }}')">
                                @error($fieldName)
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="{{ $previewId }}" class="mt-2 hidden">
                                    <img id="{{ $previewId }}-img" src="" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Create Portfolio</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    const previewImg = document.getElementById(previewId + '-img');
    
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

