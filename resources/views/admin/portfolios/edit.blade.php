@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Edit Portfolio</h2>
            <p class="text-gray-600 mt-1">Update portfolio item details</p>
        </div>
        <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-secondary">
            Back to Portfolio
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Basic Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label for="title" class="admin-label">Title *</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required 
                                   class="admin-input @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Client -->
                        <div>
                            <label for="client" class="admin-label">Client</label>
                            <input type="text" id="client" name="client" value="{{ old('client', $portfolio->client) }}" 
                                   class="admin-input @error('client') border-red-500 @enderror">
                            @error('client')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta -->
                        <div>
                            <label for="meta" class="admin-label">Meta Description</label>
                            <input type="text" id="meta" name="meta" value="{{ old('meta', $portfolio->meta) }}" 
                                   class="admin-input @error('meta') border-red-500 @enderror">
                            @error('meta')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="md:col-span-2">
                            <label for="content" class="admin-label">Content</label>
                            <textarea id="content" name="content" rows="6" 
                                      class="admin-input @error('content') border-red-500 @enderror">{{ old('content', $portfolio->content) }}</textarea>
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
                            @if($portfolio->image)
                                <div class="mb-2">
                                    <img src="{{ url('/uploads/portfolios/' . $portfolio->image) }}" alt="Current image" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            @endif
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
                        @php
                            $imageFields = ['image_one', 'image_two', 'image_three', 'image_four', 'image_five',
                                          'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
                            $imageLabels = ['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'];
                        @endphp
                        @foreach($imageFields as $index => $fieldName)
                            <div>
                                <label for="{{ $fieldName }}" class="admin-label">Image {{ $imageLabels[$index] }}</label>
                                @if($portfolio->$fieldName)
                                    <div class="mb-2">
                                        <img src="{{ url('/uploads/portfolios/' . $portfolio->$fieldName) }}" alt="Current image" class="w-full h-32 object-cover rounded-lg">
                                    </div>
                                @endif
                                <input type="file" id="{{ $fieldName }}" name="{{ $fieldName }}" accept="image/*" 
                                       class="admin-input @error($fieldName) border-red-500 @enderror"
                                       onchange="previewImage(this, 'preview-{{ $fieldName }}')">
                                @error($fieldName)
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="preview-{{ $fieldName }}" class="mt-2 hidden">
                                    <img id="preview-{{ $fieldName }}-img" src="" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Update Portfolio</button>
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

