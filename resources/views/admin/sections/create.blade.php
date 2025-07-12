@extends('lara-landing.admin.layouts.bootstrap')

@section('title', 'Create New Section')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Create New Section for: {{ $page->title }}</h1>
        <a href="{{ route('lara-landing.landing.sections', $page->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Sections
        </a>
    </div>

    {{-- if error show all o fthme  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4 class="alert-heading">Please fix the following errors:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus-circle me-1"></i>
            Section Details
        </div>
        <div class="card-body">
            <form action="{{ route('lara-landing.landing.sections.store', $page->id) }}" method="POST" id="sectionForm">
                @csrf

                <div class="row">
                    <!-- Basic Settings -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Section Type *</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select Section Type</option>
                                <option value="hero" {{ old('type') == 'hero' ? 'selected' : '' }}>Hero Banner</option>
                                <option value="features" {{ old('type') == 'features' ? 'selected' : '' }}>Features</option>
                                <option value="testimonials" {{ old('type') == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                                <option value="cta" {{ old('type') == 'cta' ? 'selected' : '' }}>Call to Action</option>
                                <option value="contact" {{ old('type') == 'contact' ? 'selected' : '' }}>Contact Form</option>
                                <option value="custom" {{ old('type') == 'custom' ? 'selected' : '' }}>Custom HTML</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">Display Order *</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $page->sections()->count() + 1) }}" required>
                            @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" {{ old('is_visible', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_visible">Visible on Page</label>
                        </div>
                    </div>

                    <!-- Design Settings -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="background_color" class="form-label">Background Color</label>
                            <div class="input-group colorpicker">
                                <input type="color" class="form-control @error('background_color') is-invalid @enderror" id="background_color" name="background_color" value="{{ old('background_color') }}">
                            </div>
                            @error('background_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_class" class="form-label">Custom CSS</label>
                            <input type="text" class="form-control @error('custom_class') is-invalid @enderror" id="custom_class" name="custom_class" value="{{ old('custom_class') }}">
                            @error('custom_class')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Space-separated list of CSS classes</small>
                        </div>

                        <div class="mb-3">
                            <label for="custom_id" class="form-label">Custom HTML ID</label>
                            <input type="text" class="form-control @error('custom_id') is-invalid @enderror" id="custom_id" name="custom_id" value="{{ old('custom_id') }}">
                            @error('custom_id')
                            <div class="valid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Content Editor -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit me-1"></i>
                        Section Content
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="content" class="form-label">Content Structure *</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', '{}') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-cog me-1"></i>
                        Additional Settings (JSON)
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="settings" class="form-label">Settings</label>
                            <textarea class="form-control @error('settings') is-invalid @enderror" id="settings" name="settings" rows="5">{{ old('settings', '{}') }}</textarea>
                            @error('settings')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Additional configuration for this section</small>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Create Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/e6tzus7vdathc9r9dt9xo1ksqnhtjru9bysqprn1f1grcxce/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#content',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount image',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        images_upload_url: '{{ route("lara-landing.upload-image") }}', // Your backend endpoint
        images_upload_credentials: true, // Include cookies (Laravel CSRF)
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, progress) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.open('POST', '{{ route("lara-landing.upload-image") }}');

        xhr.upload.onprogress = function (e) {
            progress(e.loaded / e.total * 100);
        };

        xhr.onload = function () {
            if (xhr.status === 403 || xhr.status === 419) {
                reject('CSRF token missing or invalid');
                return;
            }

            if (xhr.status < 200 || xhr.status >= 300) {
                reject('HTTP Error: ' + xhr.status);
                return;
            }

            const json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location !== 'string') {
                reject('Invalid JSON: ' + xhr.responseText);
                return;
            }

            resolve(json.location);
        };

        xhr.onerror = function () {
            reject('Image upload failed due to a XHR error.');
        };

        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
    });
}

    });


        // Auto-update content structure based on type
        document.getElementById('type').addEventListener('change', function() {
            const type = this.value;
            let contentStructure = {};

            switch (type) {
                case 'hero':
                    contentStructure = {
                        title: ""
                        , subtitle: ""
                        , buttons: []
                        , image: ""
                    };
                    break;
                case 'features':
                    contentStructure = {
                        title: ""
                        , items: [{
                            icon: ""
                            , title: ""
                            , text: ""
                        }]
                    };
                    break;
                case 'testimonials':
                    contentStructure = {
                        title: ""
                        , items: [{
                            name: ""
                            , text: ""
                            , image: ""
                        }]
                    };
                    break;
                case 'cta':
                    contentStructure = {
                        title: ""
                        , text: ""
                        , button: {
                            text: ""
                            , url: ""
                        }
                    };
                    break;
                case 'contact':
                    contentStructure = {
                        title: ""
                        , form_fields: []
                    };
                    break;
                case 'custom':
                    contentStructure = {
                        html: ""
                    };
                    break;
                default:
                    contentStructure = {};
            }

            document.getElementById('content').value = JSON.stringify(contentStructure, null, 2);
    });

</script>
@endsection
