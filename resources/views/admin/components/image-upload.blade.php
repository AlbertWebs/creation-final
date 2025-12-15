@props(['name', 'label', 'currentImage' => null, 'previewId' => null, 'accept' => 'image/*', 'required' => false])

@php
    $previewId = $previewId ?? 'preview-' . str_replace(['[', ']'], '', $name);
@endphp

<div>
    <label for="{{ $name }}" class="admin-label">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    
    @if($currentImage)
        <div class="mb-2">
            <img src="{{ $currentImage }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
        </div>
    @endif
    
    <input type="file" 
           id="{{ $name }}" 
           name="{{ $name }}" 
           accept="{{ $accept }}" 
           class="admin-input @error($name) border-red-500 @enderror"
           onchange="previewImage(this, '{{ $previewId }}')"
           @if($required) required @endif>
    
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    
    <div id="{{ $previewId }}" class="mt-2 hidden">
        <img id="{{ $previewId }}-img" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
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

