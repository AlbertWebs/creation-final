@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Edit Slider</h2>
            <p class="text-gray-600 mt-1">Update slider information</p>
        </div>
        <a href="{{ url('/admin/slider') }}" class="admin-btn-secondary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Sliders
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form method="POST" action="{{ url('/admin/edit_Slider/' . $Slider->id) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="admin-label">Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $Slider->name) }}" 
                           placeholder="e.g. Welcome to Creation Office Fitouts"
                           class="admin-input"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content/Description -->
                <div>
                    <label for="content" class="admin-label">Description</label>
                    <textarea id="content" 
                              name="content" 
                              rows="5" 
                              class="admin-input"
                              placeholder="Slider description or content...">{{ old('content', $Slider->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($Slider->image)
                <div>
                    <label class="admin-label">Current Image</label>
                    <div class="mt-2">
                        <img src="{{ url('/uploads/slider/' . $Slider->image) }}" 
                             alt="{{ $Slider->name }}" 
                             class="max-w-md h-auto rounded-lg border border-gray-300">
                    </div>
                </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <label for="image" class="admin-label">Change Image (optional)</label>
                    <div class="mt-1">
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="admin-input"
                               onchange="previewImage(event, 'image-preview')">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
                    </div>
                    <div class="mt-4">
                        <img id="image-preview" 
                             src="" 
                             alt="Preview" 
                             class="hidden max-w-md h-auto rounded-lg border border-gray-300">
                    </div>
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="admin-label">Order (optional)</label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           value="{{ old('order', $Slider->order ?? 0) }}" 
                           min="0"
                           class="admin-input"
                           placeholder="Display order (lower numbers appear first)">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first in the slider</p>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="admin-label">Status</label>
                    <select id="status" name="status" class="admin-input">
                        <option value="1" {{ old('status', $Slider->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $Slider->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Hidden field for current image -->
                <input type="hidden" name="image_cheat" value="{{ $Slider->image }}">

                <!-- Submit Button -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                    <a href="{{ url('/admin/slider') }}" class="admin-btn-secondary">Cancel</a>
                    <button type="submit" class="admin-btn-primary">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            if (output) {
                output.src = reader.result;
                output.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
