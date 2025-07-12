@extends('lara-landing.admin.layouts.bootstrap')

@section('title', 'Landing Pages')

@section('content')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.85em;
    }
    /* Make sure dropdown isn't hidden */
    .table-responsive {
        overflow: visible !important;
    }
    /* Optional: give dropdown some shadow & visibility */
    .dropdown-menu {
        z-index: 1050;
        min-width: 180px;
    }
    </style>

<div class="container-fluid px-4">
    <h1 class="mt-4">Landing Pages</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                All Landing Pages
            </div>
            <a href="{{ route('lara-landing.landing.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Create New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Sectoins</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <span class="badge bg-{{ $page->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($page->status) }}
                                </span>
                            </td>
                            <td>{{ $page->sections->count() }}</td>
                            <td>{{ $page->created_at->format('M d, Y H:i') }}</td>
                            <td class="position-relative">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary" type="button" id="actionsDropdown{{ $page->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="actionsDropdown{{ $page->id }}">
                                        <li>
                                            <a class="dropdown-item" href="{{ route("lara-landing.landing.sections",$page->id) }}">
                                                <i class="fas fa-external-link-alt me-2"></i> Sections
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('lara-landing.landing.edit', $page->id) }}">
                                                <i class="fas fa-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" target="_blank" href="#"><i class="fas fa-external-link-alt me-2"></i> Open Live</a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('lara-landing.landing.delete', $page->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this page?')">
                                                    <i class="fas fa-trash me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No landing pages found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</div>
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.85em;
    }
</style>
@endsection
