@extends(config('lara-landing.frontend.layout'))

{{-- Set Page Title --}}
@section(config('lara-landing.frontend.title_section'), $page->meta_title ?? $page->title)

@php
    $settings = json_decode($page->settings ?? '{}', true);
@endphp

{{-- Main Content Section --}}
@section(config('lara-landing.frontend.content_section'))
    @if (config('lara-landing.frontend.styles_section') == '')
    <style>
        /* Bootstrap-enhanced base styles */
        .landing-page {
            font-family: var(--bs-body-font-family);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            overflow-x: hidden;
        }

        /* Enhanced section styling with Bootstrap utilities */
        .landing-section {
            padding: 5rem 0;
            position: relative;
            transition: all 0.3s ease;
        }

        .landing-section:not(:last-child)::after {
            content: '';
            display: block;
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, rgba(var(--bs-body-color-rgb), 0.1),
                                           rgba(var(--bs-body-color-rgb), 0.3),
                                           rgba(var(--bs-body-color-rgb), 0.1));
            margin: 4rem auto 0;
            border-radius: 2px;
        }

        /* Responsive design using Bootstrap breakpoints */
        @media (max-width: 768px) {
            .landing-section {
                padding: 3rem 0;
            }
        }

        /* Animation - now using Bootstrap's animation classes */
        .animate-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .animate-section.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Background overlay for better readability */
        .bg-image-overlay {
            position: relative;
        }

        .bg-image-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(var(--bs-body-color-rgb), 0.15);
            z-index: 0;
        }

        .bg-image-overlay > .container {
            position: relative;
            z-index: 1;
        }

        /* Custom CSS from page */
        {!! $page->custom_css ?? '' !!}
    </style>
    @endif

    <div class="landing-page">
        {{-- Optional Header --}}
        @if ($page->show_header)
            @includeIf('components.landing-header')
        @endif

        {{-- Sections with Bootstrap container system --}}
        @foreach ($sections as $index => $section)
            @php
                $bgClasses = [];
                if ($section->background_image) {
                    $bgClasses[] = 'bg-image-overlay';
                }
                if ($section->custom_class) {
                    $bgClasses[] = $section->custom_class;
                }
            @endphp

            <section @if ($section->custom_id) id="{{ $section->custom_id }}" @endif
                     class="landing-section animate-section {{ implode(' ', $bgClasses) }}"
                     style="--bs-bg-opacity: 1;
                            background-color: {{ $section->background_color }};
                            @if($section->background_image)
                                background-image: url('{{ asset('storage/' . $section->background_image) }}');
                                background-size: cover;
                                background-position: center;
                            @endif">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            {!! $section->content !!}
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{-- Optional Footer --}}
        @if ($page->show_footer)
            @includeIf('components.landing-footer')
        @endif
    </div>

    {{-- Bootstrap-enhanced JS --}}
    @if (config('lara-landing.frontend.scripts_section') == '')
    <script>
        // Enhanced intersection observer with Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            document.querySelectorAll('.animate-section').forEach(section => {
                observer.observe(section);
            });

            // Initialize Bootstrap tooltips and popovers
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });

            // Custom JS from page
            {!! $page->custom_js ?? '' !!}

            // Tracking scripts
            {!! $page->tracking_scripts ?? '' !!}
        });
    </script>
    @endif
@endsection

{{-- Extra JS pushed into the defined section --}}
@if (config('lara-landing.frontend.scripts_section') != '')
    @section(config('lara-landing.frontend.scripts_section'))
    <script>
        // Enhanced intersection observer with Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            document.querySelectorAll('.animate-section').forEach(section => {
                observer.observe(section);
            });

            // Initialize Bootstrap tooltips and popovers
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });

            // Custom JS from page
            {!! $page->custom_js ?? '' !!}

            // Tracking scripts
            {!! $page->tracking_scripts ?? '' !!}
        });
    </script>
    @endsection
@endif
