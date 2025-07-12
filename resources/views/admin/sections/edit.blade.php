@extends('lara-landing.admin.layouts.bootstrap')

@section('title', 'Edit Section')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Edit Section: {{ $section->title }}</h1>
        <a href="{{ route('lara-landing.landing.sections', $page->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Sections
        </a>
    </div>

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
            <i class="fas fa-pen me-1"></i>
            Section Details
        </div>
        <div class="card-body">
            <form action="{{ route('lara-landing.landing.sections.update', [$page->id, $section->id]) }}" method="POST" id="sectionForm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Section Type *</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select Section Type</option>
                                @foreach(['hero', 'features', 'testimonials', 'cta', 'contact', 'custom'] as $type)
                                    <option value="{{ $type }}" {{ old('type', $section->type) === $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">Display Order *</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $section->order) }}" required>
                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" {{ old('is_visible', $section->is_visible) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_visible">Visible on Page</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="background_color" class="form-label">Background Color</label>
                            <input type="color" class="form-control @error('background_color') is-invalid @enderror" id="background_color" name="background_color" value="{{ old('background_color', $section->background_color) }}">
                            @error('background_color')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_class" class="form-label">Custom CSS</label>
                            <input type="text" class="form-control @error('custom_class') is-invalid @enderror" id="custom_class" name="custom_class" value="{{ old('custom_class', $section->custom_class) }}">
                            @error('custom_class')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted">Space-separated list of CSS classes</small>
                        </div>

                        <div class="mb-3">
                            <label for="custom_id" class="form-label">Custom HTML ID</label>
                            <input type="text" class="form-control @error('custom_id') is-invalid @enderror" id="custom_id" name="custom_id" value="{{ old('custom_id', $section->custom_id) }}">
                            @error('custom_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit me-1"></i> Section Content
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="content" class="form-label">Content Structure *</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $section->content) }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-cog me-1"></i> Additional Settings (JSON)
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="settings" class="form-label">Settings</label>
                            <textarea class="form-control @error('settings') is-invalid @enderror" id="settings" name="settings" rows="5">{{ old('settings', $section->settings) }}</textarea>
                            @error('settings')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted">Additional configuration for this section</small>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('lara-landing.landing.sections', $page->id) }}" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update Section
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
        images_upload_url: '{{ route("lara-landing.upload-image") }}',
        images_upload_credentials: true,
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

    // Optional: Auto-update content template if section type changes (only if it's blank)
    document.getElementById('type').addEventListener('change', function () {
        const type = this.value;
        const currentContent = document.getElementById('content').value.trim();

        // Only overwrite if content is empty
        if (currentContent !== '' && currentContent !== '{}' && currentContent !== '[]') return;

        let structure = {};
        switch (type) {
            case 'hero': structure = { title: "", subtitle: "", buttons: [], image: "" }; break;
            case 'features': structure = { title: "", items: [{ icon: "", title: "", text: "" }] }; break;
            case 'testimonials': structure = { title: "", items: [{ name: "", text: "", image: "" }] }; break;
            case 'cta': structure = { title: "", text: "", button: { text: "", url: "" } }; break;
            case 'contact': structure = { title: "", form_fields: [] }; break;
            case 'custom': structure = { html: "" }; break;
        }
        document.getElementById('content').value = JSON.stringify(structure, null, 2);
    });
</script>
@endsection
