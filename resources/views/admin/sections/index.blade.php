@extends('lara-landing.admin.layouts.bootstrap')

@section('title', $page->title . ' Sections')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">'{{ $page->title }}' Sections</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-layer-group me-1"></i>
                Sections Management
            </div>
            <a href="{{ route('lara-landing.landing.sections.create', $page->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Add New Section
            </a>
        </div>
        <div class="card-body">
            @if($sections->isEmpty())
            <div class="alert alert-info">
                No sections found for this page. Create your first section to get started.
            </div>
            @else
            <!-- Sortable Sections List -->
            <div class="sortable-sections">
                @foreach($sections->sortBy('order') as $section)
                <div class="card mb-3 section-item" data-id="{{ $section->id }}">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-arrows-alt handle me-3" style="cursor: move;"></i>
                            <h5 class="mb-0">{{ $section->title }}</h5>
                            <span class="badge bg-{{ $section->status === 'published' ? 'success' : 'secondary' }} ms-3">
                                {{ ucfirst($section->status) }}
                            </span>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('lara-landing.landing.sections.edit', [$page->id, $section->id]) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-info preview-section" data-bs-toggle="modal" data-bs-target="#previewModal" data-content="{{ $section->content }}">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                            <a href="{{ route('lara-landing.landing.sections.delete', [$page->id, $section->id]) }}" class="btn btn-sm btn-outline-danger delete-item-btn">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Type:</strong> {{ $section->type }}</p>
                                <p><strong>Order:</strong> {{ $section->order }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="section-preview">
                                    {!! Str::limit(strip_tags($section->content), 150) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Save Order Button -->
            <div class="text-end mt-3">
                <button id="saveOrderBtn" class="btn btn-success">
                    <i class="fas fa-save me-1"></i> Save Sections Order
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Section Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="previewModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .sortable-sections .section-item {
        cursor: move;
    }

    .sortable-sections .section-item.placeholder {
        border: 2px dashed #ccc;
        background-color: #f8f9fa;
        height: 100px;
    }

    .sortable-sections .section-item.dragging {
        opacity: 0.5;
        background-color: #e9ecef;
    }

    .handle {
        color: #6c757d;
    }

    .section-preview {
        max-height: 100px;
        overflow: hidden;
        position: relative;
    }

    .section-preview:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 20px;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
    }

</style>


<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    // Initialize sortable
    document.addEventListener('DOMContentLoaded', function() {
        const sortable = new Sortable(document.querySelector('.sortable-sections'), {
            animation: 150
            , handle: '.handle'
            , ghostClass: 'placeholder'
            , dragClass: 'dragging'
            , onEnd: function() {
                // Update order numbers visually
                document.querySelectorAll('.section-item').forEach((item, index) => {
                    const orderElement = item.querySelector('.order-value');
                    if (orderElement) {
                        orderElement.textContent = index + 1;
                    }
                });
            }
        });

        // Save order button
        document.getElementById('saveOrderBtn').addEventListener('click', function() {
            const order = Array.from(document.querySelectorAll('.section-item')).map(item => {
                return item.getAttribute('data-id');
            });

            Swal.fire({
                title: 'Saving...'
                , text: 'Please wait while we save the new section order.'
                , allowOutsideClick: false
                , didOpen: () => {
                    Swal.showLoading(); // show loading spinner

                    // Now trigger the fetch inside the didOpen
                    fetch("{{ route('lara-landing.landing.sections.re-order', $page->id) }}", {
                            method: 'POST'
                            , headers: {
                                'Content-Type': 'application/json'
                                , 'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                            , body: JSON.stringify({
                                order: order
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.close(); // close loading modal
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success'
                                    , title: 'Success'
                                    , text: 'Sections order saved successfully!'
                                    , timer: 2000
                                    , showConfirmButton: false
                                })
                                window.location.href = window.location.href
                            } else {
                                Swal.fire({
                                    icon: 'error'
                                    , title: 'Failed'
                                    , text: 'Error saving sections order.'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.close(); // close loading modal
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error'
                                , title: 'Error'
                                , text: 'Something went wrong while saving the order.'
                            });
                        });
                }
            });
        });


        // Preview modal
        document.querySelectorAll('.preview-section').forEach(button => {
            button.addEventListener('click', function() {
                const content = this.getAttribute('data-content');
                document.getElementById('previewModalBody').innerHTML = content;
            });
        });
    });

</script>
@endsection
