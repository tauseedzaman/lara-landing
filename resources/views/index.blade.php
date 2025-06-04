<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Awesome Product</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #2e59d9;
            --dark-color: #2c3e50;
            --light-color: #f8f9fc;
            --accent-color: #f6c23e;
        }

        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .features-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .testimonial-card {
            border-left: 4px solid var(--primary-color);
        }

        .pricing-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2);
        }

        .pricing-card.popular {
            border-top: 4px solid var(--accent-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .bg-light-custom {
            background-color: var(--light-color);
        }

        .navbar {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--dark-color) 0%, #1a2b3c 100%);
            color: white;
        }

        .footer {
            background-color: var(--dark-color);
            color: white;
        }

        .social-icon {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }
        .py-7{
            padding-block: 40px !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" style="color: var(--primary-color);">
                <i class="fas fa-rocket me-2"></i>BrandName
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a class="btn btn-primary rounded-pill px-4" href="#contact">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Awesome Product That Solves Your Problems</h1>
                    <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#pricing" class="btn btn-light btn-lg rounded-pill px-4">Get Started</a>
                        <a href="#how-it-works" class="btn btn-outline-light btn-lg rounded-pill px-4">Learn More</a>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <div class="d-flex">
                            <img src="https://placehold.co/40x40" class="rounded-circle border border-2 border-white" alt="User">
                            <img src="https://placehold.co/40x40" class="rounded-circle border border-2 border-white ms-n2" alt="User">
                            <img src="https://placehold.co/40x40" class="rounded-circle border border-2 border-white ms-n2" alt="User">
                        </div>
                        <div class="ms-3">
                            <p class="mb-0 fw-bold">Trusted by 10,000+ customers</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-white ms-1">4.8/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://placehold.co/600x400" alt="Hero Image" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Clients/Logos Section -->
    <section class="py-5 bg-light-custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 col-md-2 text-center mb-4 mb-md-0">
                    <img src="https://placehold.co/120x60" alt="Client Logo" class="img-fluid grayscale" style="opacity: 0.7;">
                </div>
                <div class="col-6 col-md-2 text-center mb-4 mb-md-0">
                    <img src="https://placehold.co/120x60" alt="Client Logo" class="img-fluid grayscale" style="opacity: 0.7;">
                </div>
                <div class="col-6 col-md-2 text-center mb-4 mb-md-0">
                    <img src="https://placehold.co/120x60" alt="Client Logo" class="img-fluid grayscale" style="opacity: 0.7;">
                </div>
                <div class="col-6 col-md-2 text-center mb-4 mb-md-0">
                    <img src="https://placehold.co/120x60" alt="Client Logo" class="img-fluid grayscale" style="opacity: 0.7;">
                </div>
                <div class="col-6 col-md-2 text-center">
                    <img src="https://placehold.co/120x60" alt="Client Logo" class="img-fluid grayscale" style="opacity: 0.7;">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-7" id="features">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Amazing Features</h2>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h4 class="mb-3">Lightning Fast</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h4 class="mb-3">Secure & Reliable</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <h4 class="mb-3">Easy to Customize</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4 class="mb-3">Analytics Dashboard</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <h4 class="mb-3">24/7 Support</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="features-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4 class="mb-3">Mobile Friendly</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-7 bg-light-custom" id="how-it-works">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://placehold.co/600x400" alt="How It Works" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">How It Works</h2>
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="fw-bold">1</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-2">Sign Up</h4>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="fw-bold">2</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-2">Configure</h4>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="fw-bold">3</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-2">Enjoy Results</h4>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-4 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h2 class="fw-bold display-4">10K+</h2>
                    <p class="mb-0">Happy Customers</p>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h2 class="fw-bold display-4">99.9%</h2>
                    <p class="mb-0">Uptime</p>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h2 class="fw-bold display-4">24/7</h2>
                    <p class="mb-0">Support</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-bold display-4">5M+</h2>
                    <p class="mb-0">Processed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-7" id="pricing">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Simple, Transparent Pricing</h2>
                    <p class="lead text-muted">No hidden fees. No contracts. Cancel anytime.</p>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary active">Monthly</button>
                            <button type="button" class="btn btn-outline-primary">Yearly <span class="badge bg-success ms-1">20% Off</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body p-4 text-center">
                            <h4 class="my-3">Starter</h4>
                            <h2 class="fw-bold mb-3">$19<span class="text-muted fs-6 fw-normal">/mo</span></h2>
                            <p class="text-muted mb-4">Perfect for small teams</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 10 Projects</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 5 GB Storage</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Basic Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Email Support</li>
                                <li class="mb-2 text-muted"><i class="fas fa-times me-2"></i> API Access</li>
                                <li class="text-muted"><i class="fas fa-times me-2"></i> Priority Support</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pricing-card h-100 popular">
                        <div class="card-body p-4 text-center">
                            <span class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle mt-3 py-2 px-3">Most Popular</span>
                            <h4 class="my-3">Professional</h4>
                            <h2 class="fw-bold mb-3">$49<span class="text-muted fs-6 fw-normal">/mo</span></h2>
                            <p class="text-muted mb-4">For growing businesses</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Unlimited Projects</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 50 GB Storage</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Advanced Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Email & Chat Support</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> API Access</li>
                                <li class="text-muted"><i class="fas fa-times me-2"></i> Priority Support</li>
                            </ul>
                            <a href="#" class="btn btn-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body p-4 text-center">
                            <h4 class="my-3">Enterprise</h4>
                            <h2 class="fw-bold mb-3">$99<span class="text-muted fs-6 fw-normal">/mo</span></h2>
                            <p class="text-muted mb-4">For large organizations</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Unlimited Projects</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 500 GB Storage</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Advanced Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 24/7 Support</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> API Access</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Priority Support</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="mb-0">Need a custom plan? <a href="#contact" class="text-primary">Contact us</a> for enterprise solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-7 bg-light-custom" id="testimonials">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">What Our Customers Say</h2>
                    <p class="lead text-muted">Don't just take our word for it. Here's what our customers have to say.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <img src="https://placehold.co/60" alt="User" class="rounded-circle">
                                </div>
                                <div>
                                    <h5 class="mb-0">John Doe</h5>
                                    <p class="text-muted mb-0">CEO, Company Inc.</p>
                                    <div class="text-warning mt-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <img src="https://placehold.co/60" alt="User" class="rounded-circle">
                                </div>
                                <div>
                                    <h5 class="mb-0">Jane Smith</h5>
                                    <p class="text-muted mb-0">Marketing Director</p>
                                    <div class="text-warning mt-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <img src="https://placehold.co/60" alt="User" class="rounded-circle">
                                </div>
                                <div>
                                    <h5 class="mb-0">Robert Johnson</h5>
                                    <p class="text-muted mb-0">CTO, Tech Corp</p>
                                    <div class="text-warning mt-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-7" id="faq">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                    <p class="lead text-muted">Can't find the answer you're looking for? Reach out to our <a href="#contact" class="text-primary">customer support</a> team.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How do I get started?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for annual plans.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Can I cancel my subscription anytime?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, you can cancel your subscription anytime. There are no cancellation fees, and you'll continue to have access to the service until the end of your billing period.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    Do you offer discounts for non-profits?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, we offer a 20% discount for registered non-profit organizations. Please contact our sales team with proof of your non-profit status to get this discount applied to your account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    How do I contact support?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>You can contact our support team 24/7 via email at support@yourcompany.com or through the live chat feature in your account dashboard. Our average response time is under 30 minutes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-7 cta-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold text-white mb-4">Ready to get started?</h2>
                    <p class="lead text-white-50 mb-5">Join thousands of satisfied customers who are already using our product.</p>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                        <a href="#pricing" class="btn btn-light btn-lg rounded-pill px-4">Get Started Now</a>
                        <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-4">Schedule a Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="fw-bold mb-4">Get In Touch</h2>
                    <p class="text-muted mb-5">Have questions or want to discuss your project? Fill out the form and we'll get back to you within 24 hours.</p>
                    <div class="d-flex mb-4">
                        <div class="me-4 text-primary">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Address</h5>
                            <p class="text-muted mb-0">123 Business Ave, Suite 456<br>San Francisco, CA 94107</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-4 text-primary">
                            <i class="fas fa-phone-alt fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Phone</h5>
                            <p class="text-muted mb-0">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Email</h5>
                            <p class="text-muted mb-0">info@yourcompany.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="john@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="How can we help?">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Your message here..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="text-white mb-4">
                        <i class="fas fa-rocket me-2"></i>BrandName
                    </h4>
                    <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Product</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Features</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">API</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Integrations</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Updates</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Company</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Press</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Resources</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Documentation</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Guides</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Support</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Community</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Status</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-white mb-4">Legal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Security</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Cookie Policy</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">GDPR</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-5 bg-white-10">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-white-50 mb-0">© 2025 BrandName. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white-50 text-decoration-none me-3">Privacy Policy</a>
                    <a href="#" class="text-white-50 text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Change navbar style on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled', 'shadow-sm');
            } else {
                navbar.classList.remove('navbar-scrolled', 'shadow-sm');
            }
        });
    </script>
</body>
</html>
