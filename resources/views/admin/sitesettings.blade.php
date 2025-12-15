@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Site Settings</h2>
            <p class="text-gray-600 mt-1">Manage your website configuration</p>
        </div>
    </div>

    @foreach($SiteSettings as $value)
    <form method="POST" action="{{ url('/admin/savesitesettings') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Basic Information -->
        <div class="admin-card">
            <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-3 border-b border-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Basic Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="sitename" class="admin-label">Site Name</label>
                    <input type="text" id="sitename" name="sitename" value="{{ $value->sitename }}" 
                           placeholder="e.g Creation Office Fitouts" class="admin-input" required>
                </div>
                
                <div>
                    <label for="url" class="admin-label">Site URL</label>
                    <input type="url" id="url" name="url" value="{{ $value->url }}" 
                           placeholder="https://www.example.com" class="admin-input">
                </div>
                
                <div>
                    <label for="tagline" class="admin-label">Tagline</label>
                    <input type="text" id="tagline" name="tagline" value="{{ $value->tagline }}" 
                           placeholder="Your company tagline" class="admin-input">
                </div>
                
                
            </div>
           
        </div>

        <div class="admin-card">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-12">
                
                

                
                <div>
                    <label for="welcome" class="admin-label">Welcome Message</label>
                    <textarea id="welcome" name="welcome" rows="4" 
                              placeholder="Welcome message for visitors..." 
                              class="admin-input">{{ $value->welcome }}</textarea>
                </div>
            </div>
            </div>
        </div>
        <br>
        <!-- Contact Information -->
        <div class="admin-card">
            <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-3 border-b border-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Contact Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="admin-label">Primary Email</label>
                    <input type="email" id="email" name="email" value="{{ $value->email }}" 
                           placeholder="info@example.com" class="admin-input">
                </div>
                
                <div>
                    <label for="email_one" class="admin-label">Secondary Email</label>
                    <input type="email" id="email_one" name="email_one" value="{{ $value->email_one }}" 
                           placeholder="contact@example.com" class="admin-input">
                </div>
                
                <div>
                    <label for="mobile" class="admin-label">Mobile One</label>
                    <input type="text" id="mobile" name="mobile" value="{{ $value->mobile }}" 
                           placeholder="+254 723 768 593" class="admin-input">
                </div>
                
                <div>
                    <label for="mobile_one" class="admin-label">Mobile Two</label>
                    <input type="text" id="mobile_one" name="mobile_one" value="{{ $value->mobile_one }}" 
                           placeholder="+254 700 000 000" class="admin-input">
                </div>
                
                <div>
                    <label for="mobile_two" class="admin-label">Mobile Three</label>
                    <input type="text" id="mobile_two" name="mobile_two" value="{{ $value->mobile_two }}" 
                           placeholder="+254 700 000 000" class="admin-input">
                </div>
            </div>
        </div>
        <br>
        <!-- Location Information -->
        <div class="admin-card">
            <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-3 border-b border-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Location Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="location" class="admin-label">Location</label>
                    <input type="text" id="location" name="location" value="{{ $value->location }}" 
                           placeholder="e.g Nas Apartments, Laikipia Rd" class="admin-input">
                </div>
                
                <div>
                    <label for="address" class="admin-label">Address</label>
                    <input type="text" id="address" name="address" value="{{ $value->address }}" 
                           placeholder="P.O Box 0100 100" class="admin-input">
                </div>
            </div>
        </div>
        <br>
        <!-- Social Media Links -->
        <div class="admin-card">
            <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-3 border-b border-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                </svg>
                Social Media Links
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="facebook" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </label>
                    <input type="url" id="facebook" name="facebook" value="{{ $value->facebook }}" 
                           placeholder="https://www.facebook.com/yourpage" class="admin-input">
                </div>
                
                <div>
                    <label for="twitter" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </label>
                    <input type="url" id="twitter" name="twitter" value="{{ $value->twitter }}" 
                           placeholder="https://www.twitter.com/yourhandle" class="admin-input">
                </div>
                
                <div>
                    <label for="linkedin" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        LinkedIn
                    </label>
                    <input type="url" id="linkedin" name="linkedin" value="{{ $value->linkedin }}" 
                           placeholder="https://www.linkedin.com/company/yourcompany" class="admin-input">
                </div>
                
                <div>
                    <label for="instagram" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        Instagram
                    </label>
                    <input type="url" id="instagram" name="instagram" value="{{ $value->instagram }}" 
                           placeholder="https://www.instagram.com/yourhandle" class="admin-input">
                </div>
                
                <div>
                    <label for="youtube" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        YouTube
                    </label>
                    <input type="url" id="youtube" name="youtube" value="{{ $value->youtube }}" 
                           placeholder="https://www.youtube.com/channel/yourchannel" class="admin-input">
                </div>
                
                <div>
                    <label for="google" class="admin-label flex items-center">
                        <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google+
                    </label>
                    <input type="url" id="google" name="google" value="{{ $value->google }}" 
                           placeholder="https://plus.google.com/yourpage" class="admin-input">
                </div>
            </div>
        </div>
        <br>
        <!-- Logo & Favicon -->
        <div class="admin-card">
            <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-3 border-b border-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Branding
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="admin-label">Site Logo</label>
                    <div class="mt-2">
                        @if($value->logo)
                            <img src="{{ url('/uploads/logo/' . $value->logo) }}" alt="Current Logo" 
                                 class="max-w-xs h-auto rounded-lg border border-gray-300 mb-4">
                        @endif
                        <input type="file" name="logo" accept="image/*" 
                               onchange="previewImage(event, 'logo-preview')"
                               class="admin-input">
                        <div class="mt-4">
                            <img id="logo-preview" src="" alt="Preview" 
                                 class="hidden max-w-xs h-auto rounded-lg border border-gray-300">
                        </div>
                    </div>
                    <input type="hidden" name="logo_cheat" value="{{ $value->logo }}">
                </div>
                
                <div>
                    <label class="admin-label">Favicon</label>
                    <div class="mt-2">
                        @if($value->favicon)
                            <img src="{{ url('/uploads/logo/' . $value->favicon) }}" alt="Current Favicon" 
                                 class="w-16 h-16 rounded border border-gray-300 mb-4 object-contain">
                        @endif
                        <input type="file" name="favicon" accept="image/*" 
                               onchange="previewImage(event, 'favicon-preview')"
                               class="admin-input">
                        <div class="mt-4">
                            <img id="favicon-preview" src="" alt="Preview" 
                                 class="hidden w-16 h-16 rounded border border-gray-300 object-contain">
                        </div>
                    </div>
                    <input type="hidden" name="favicon_cheat" value="{{ $value->favicon }}">
                </div>
            </div>
        </div>
        <br>
        <!-- Submit Button -->
        <div class="flex items-center justify-end space-x-4 pt-4">
            <button type="submit" class="admin-btn-primary">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Save All Changes
            </button>
        </div>
        <br>
    </form>
    @endforeach
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
