<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Landing Pages')</title>

    <!-- Bootstrap CSS (v5.x) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Toastr (optional notifications) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Custom Plugin CSS -->
    @stack('styles')
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="sidebar-brand-text mx-3"><i class="fas fa-rocket"></i> Lara Landing</div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPlugin" aria-controls="navbarPlugin" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-grow-1 py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-light py-3 mt-auto border-top">
            <div class="container text-center small text-muted">
                Made With Love by <a target="_blank" href="https://github.com/tauseedzaman">@tauseedzaman</a>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert2 (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Plugin JS -->
    @stack('scripts')
</body>
</html>
