
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="" />
        <title> @yield('title','Dashboard') | Lara-landing | {{config("app.name")}}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{ asset("lara-landing/assets/css/style.css") }}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Lara-Landing</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{config("app.name")}} {{ now()->year }}</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function () {


        // Select all elements with the "delete-user" class
        const deleteButtons = document.querySelectorAll('.delete-item-btn');

        // Add a click event listener to each delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default link behavior

                // Show a SweetAlert confirmation
                Swal.fire({
                    title: '{{ __('Are you Sure?') }}',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonText: 'No, cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = button.getAttribute('href');
                    }
                });
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success_header') ?? 'Success' }} ',
                text: '{{ session('success') }}',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: '{{ $error }}',
                });
            @endforeach
        @endif
    });

            window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

});
        </script>

    </body>
</html>
