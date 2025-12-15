@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Create New Client</h2>
            <p class="text-gray-600 mt-1">Add a new client</p>
        </div>
        <a href="{{ route('admin.clients.index') }}" class="admin-btn-secondary">
            Back to Clients
        </a>
    </div>

    <!-- Form -->
    <div class="admin-card">
        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label for="name" class="admin-label">Client Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                           class="admin-input @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Orders -->
                <div>
                    <label for="orders" class="admin-label">Order/Display Order</label>
                    <input type="number" id="orders" name="orders" value="{{ old('orders', 10) }}" min="0" 
                           class="admin-input @error('orders') border-red-500 @enderror">
                    @error('orders')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                </div>

                <!-- Logo Image -->
                <div>
                    <label for="image" class="admin-label">Client Logo</label>
                    <input type="file" id="image" name="image" accept="image/*" 
                           class="admin-input @error('image') border-red-500 @enderror" 
                           onchange="previewImage(this)">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" src="" alt="Preview" class="w-32 h-32 object-contain rounded-lg bg-gray-100 p-2">
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.clients.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn-primary">Create Client</button>
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

