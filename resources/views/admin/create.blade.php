@extends('lara-landing.admin.layouts.bootstrap')

@section('title', 'Create Landing Page')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create New Landing Page</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Page Details
        </div>
        <div class="card-body">
            <form action="{{ route('lara-landing.landing.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Page Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <div class="input-group">
                                <span class="input-group-text">{{ url('') }}/</span>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug') }}" required>
                            </div>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to auto-generate from title</small>
                        </div>

                        <div class="mb-3">
                            <label for="template" class="form-label">Template</label>
                            <select class="form-select @error('template') is-invalid @enderror"
                                    id="template" name="template">
                                <option value="">Default Template</option>
                                <option value="template1" {{ old('template') == 'template1' ? 'selected' : '' }}>Template 1</option>
                                <option value="template2" {{ old('template') == 'template2' ? 'selected' : '' }}>Template 2</option>
                                <option value="template3" {{ old('template') == 'template3' ? 'selected' : '' }}>Template 3</option>
                            </select>
                            @error('template')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                        id="status" name="status" required>
                                    <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="language" class="form-label">Language *</label>
                                <select class="form-select @error('language') is-invalid @enderror"
                                        id="language" name="language" required>
                                    <option value="en" {{ old('language', 'en') == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="es" {{ old('language') == 'es' ? 'selected' : '' }}>Spanish</option>
                                    <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>French</option>
                                    <option value="de" {{ old('language') == 'de' ? 'selected' : '' }}>German</option>
                                </select>
                                @error('language')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="layout" class="form-label">Layout</label>
                            <select class="form-select @error('layout') is-invalid @enderror"
                                    id="layout" name="layout">
                                <option value="default" {{ old('layout', 'default') == 'default' ? 'selected' : '' }}>Default</option>
                                <option value="full-width" {{ old('layout') == 'full-width' ? 'selected' : '' }}>Full Width</option>
                                <option value="boxed" {{ old('layout') == 'boxed' ? 'selected' : '' }}>Boxed</option>
                            </select>
                            @error('layout')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_header"
                                           name="show_header" value="1" {{ old('show_header', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_header">Show Header</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_footer"
                                           name="show_footer" value="1" {{ old('show_footer', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_footer">Show Footer</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Section -->
                    <div class="col-md-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Preview</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Meta Image Preview</label>
                                    <div class="border p-2 text-center" id="metaImagePreview" style="min-height: 150px;">
                                        <img src="#" id="metaImagePreviewImg" class="img-fluid d-none" alt="Preview">
                                        <span class="text-muted">No image selected</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-search me-1"></i>
                        SEO Settings
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                   id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Recommended: 50-60 characters</small>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                      id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Recommended: 150-160 characters</small>
                        </div>

                        <div class="mb-3">
                            <label for="meta_image" class="form-label">Meta Image (Open Graph)</label>
                            <input type="file" class="form-control @error('meta_image') is-invalid @enderror"
                                   id="meta_image" name="meta_image" accept="image/*">
                            @error('meta_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Recommended size: 1200×630 pixels</small>
                        </div>
                    </div>
                </div>

                <!-- Advanced Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-cog me-1"></i>
                        Advanced Settings
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tracking_scripts" class="form-label">Tracking Scripts</label>
                            <textarea class="form-control @error('tracking_scripts') is-invalid @enderror"
                                      id="tracking_scripts" name="tracking_scripts" rows="3" placeholder=''>{{ old('tracking_scripts') }}</textarea>
                            @error('tracking_scripts')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_css" class="form-label">Custom CSS</label>
                            <textarea class="form-control @error('custom_css') is-invalid @enderror"
                                      id="custom_css" name="custom_css" rows="3">{{ old('custom_css') }}</textarea>
                            @error('custom_css')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_js" class="form-label">Custom JavaScript</label>
                            <textarea class="form-control @error('custom_js') is-invalid @enderror"
                                      id="custom_js" name="custom_js" rows="3">{{ old('custom_js') }}</textarea>
                            @error('custom_js')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('lara-landing.landing.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Create Landing Page
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slugInput = document.getElementById('slug');

        if (slugInput.value === '' || slugInput.value === slugify(title)) {
            slugInput.value = slugify(title);
        }
    });

    // Preview meta image
    document.getElementById('meta_image').addEventListener('change', function(e) {
        const preview = document.getElementById('metaImagePreviewImg');
        const previewContainer = document.getElementById('metaImagePreview');

        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                previewContainer.querySelector('span').classList.add('d-none');
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    // Helper function to slugify text
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }
</script>
@endpush
