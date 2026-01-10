<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Desa Laweyan')</title>

    <link href="/assets/img/logoL.png" rel="icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />

    <!-- Vendor CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Main CSS -->
    <link href="/assets/css/header-fix.css" rel="stylesheet" />
    <link href="/assets/css/main.css" rel="stylesheet" />

    <style> 
        /* ============== FIX HEADER SPACING ============== */
        /* Hilangkan jarak berlebih setelah header */
        body {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        .main {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        /* Adjust section pertama agar tidak terlalu jauh dari header */
        .main > section:first-child,
        .main > div:first-child {
            margin-top: 0 !important;
            padding-top: 40px !important;
        }

        /* Header sticky adjustment */
        .header.sticked + .main,
        .header.sticky-top + .main {
            margin-top: 0 !important;
        }

        @media (max-width: 768px) {
            .main > section:first-child,
            .main > div:first-child {
                padding-top: 30px !important;
            }
        }

        @media (max-width: 576px) {
            .main > section:first-child,
            .main > div:first-child {
                padding-top: 20px !important;
            }
        }

        /* ============== RESPONSIVE STYLES ============== */
        
        /* Prevent zoom on input focus (iOS) */
        input, select, textarea {
            font-size: 16px !important;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Container responsive */
        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Images responsive */
        img {
            max-width: 100%;
            height: auto;
        }

        /* ============== HEADER RESPONSIVE ============== */
        .header {
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        .header .logo-img {
            height: 45px;
            width: auto;
        }

        .header .sitename {
            font-size: 1.2rem;
            margin-left: 10px;
            white-space: nowrap;
        }

        /* Mobile Navigation */
        @media (max-width: 1199px) {
            .header .sitename {
                font-size: 1rem;
            }

            .navmenu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: #fff;
                box-shadow: -5px 0 15px rgba(0,0,0,0.1);
                transition: right 0.3s ease;
                z-index: 9999;
                overflow-y: auto;
                padding: 80px 20px 30px 20px;
            }

            .navmenu.mobile-nav-active {
                right: 0;
            }

            .navmenu ul {
                flex-direction: column;
                padding: 0;
                margin: 0;
            }

            .navmenu ul li {
                padding: 10px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .navmenu ul li a {
                display: block;
                padding: 10px 15px;
                font-size: 15px;
            }

            .navmenu .dropdown ul {
                position: static;
                box-shadow: none;
                padding-left: 20px;
                background: #f8f9fa;
            }

            .mobile-nav-toggle {
                font-size: 28px;
                cursor: pointer;
                color: #333;
                z-index: 10001;
            }

            .btn-getstarted {
                padding: 8px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .header .logo-img {
                height: 35px;
            }

            .header .sitename {
                font-size: 0.9rem;
            }

            .btn-getstarted {
                padding: 6px 15px;
                font-size: 13px;
            }
        }

        /* ============== FOOTER RESPONSIVE ============== */
        footer.footer {
            background-color: #b1880dff !important;
            color: #ffffff !important;
            padding: 40px 0 20px;
        }

        footer.footer p,
        footer.footer span,
        footer.footer h4,
        footer.footer li,
        footer.footer a,
        footer.footer strong,
        footer.footer .credits {
            color: #ffffff !important;
        }

        footer.footer a:hover {
            color: #e2e8f5 !important;
        }

        footer.footer .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }

        footer.footer .social-links a i {
            color: #ffffff !important;
            font-size: 18px;
        }

        footer.footer .social-links a:hover {
            background-color: #ffffff;
            transform: translateY(-3px);
        }

        footer.footer .social-links a:hover i {
            color: #b1880dff !important;
        }

        footer.footer .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.25) !important;
            padding-top: 20px;
            margin-top: 30px;
        }

        /* Footer Responsive */
        @media (max-width: 991px) {
            footer.footer .footer-about,
            footer.footer .col-lg-4 {
                margin-bottom: 30px;
            }

            footer.footer h4 {
                font-size: 1.1rem;
                margin-bottom: 15px;
            }

            footer.footer iframe {
                height: 200px !important;
            }
        }

        @media (max-width: 576px) {
            footer.footer {
                padding: 30px 0 15px;
            }

            footer.footer .sitename {
                font-size: 1.2rem;
            }

            footer.footer .footer-contact p {
                font-size: 14px;
            }

            footer.footer h4 {
                font-size: 1rem;
            }

            footer.footer .social-links a {
                width: 36px;
                height: 36px;
            }

            footer.footer .social-links a i {
                font-size: 16px;
            }

            footer.footer iframe {
                height: 180px !important;
            }

            footer.footer .copyright {
                font-size: 13px;
            }
        }

        /* ============== CONTENT RESPONSIVE ============== */
        /* Section spacing */
        section {
            padding: 60px 0;
        }

        @media (max-width: 768px) {
            section {
                padding: 40px 0;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            section {
                padding: 30px 0;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }

        /* Card responsive */
        .card {
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }
        }

        /* Button responsive */
        .btn {
            padding: 10px 24px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        @media (max-width: 576px) {
            .btn {
                padding: 8px 20px;
                font-size: 14px;
                width: 100%;
                margin-bottom: 10px;
            }

            .btn-group {
                display: flex;
                flex-direction: column;
            }
        }

        /* Table responsive */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }

            .table th,
            .table td {
                padding: 8px;
            }
        }

        /* Grid responsive */
        @media (max-width: 768px) {
            .row > [class*="col-"] {
                margin-bottom: 20px;
            }
        }

        /* Isotope container responsive */
        .isotope-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        @media (max-width: 768px) {
            .isotope-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .isotope-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        /* Isotope filters responsive */
        .isotope-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }

        @media (max-width: 576px) {
            .isotope-filters {
                gap: 8px;
                margin-bottom: 20px;
            }

            .isotope-filters li {
                font-size: 14px;
                padding: 8px 15px;
            }
        }

        /* Mobile overlay for navigation */
        .mobile-nav-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 9998;
        }

        .mobile-nav-overlay.active {
            display: block;
        }

        /* Typography responsive */
        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; }
        h3 { font-size: 1.75rem; }
        h4 { font-size: 1.5rem; }
        h5 { font-size: 1.25rem; }
        h6 { font-size: 1rem; }

        @media (max-width: 768px) {
            h1 { font-size: 2rem; }
            h2 { font-size: 1.75rem; }
            h3 { font-size: 1.5rem; }
            h4 { font-size: 1.25rem; }
            h5 { font-size: 1.1rem; }
            h6 { font-size: 1rem; }
        }

        @media (max-width: 576px) {
            h1 { font-size: 1.75rem; }
            h2 { font-size: 1.5rem; }
            h3 { font-size: 1.25rem; }
            h4 { font-size: 1.1rem; }
            h5 { font-size: 1rem; }
            h6 { font-size: 0.9rem; }
        }

        /* Utility classes */
        @media (max-width: 576px) {
            .text-sm-center { text-align: center !important; }
            .px-sm-0 { padding-left: 0 !important; padding-right: 0 !important; }
            .py-sm-3 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
        }

        /* Loading performance */
        img[loading="lazy"] {
            opacity: 0;
            transition: opacity 0.3s;
        }

        img[loading="lazy"].loaded {
            opacity: 1;
        }
    </style>
</head>

<body class="index-page">

    @include('layout.navbar')

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay"></div>

    <main class="main">
        @yield('content')
    </main>

    @include('layout.footer')

    <!-- Vendor JS -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- ISOTOPE -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

    {{-- Custom Scripts - Semua dalam satu DOMContentLoaded --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ============ MOBILE NAVIGATION ============
            const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
            const navMenu = document.querySelector('.navmenu');
            const overlay = document.querySelector('.mobile-nav-overlay');
            const body = document.body;

            // Toggle mobile navigation
            if (mobileNavToggle) {
                mobileNavToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    navMenu.classList.toggle('mobile-nav-active');
                    overlay.classList.toggle('active');
                    body.style.overflow = navMenu.classList.contains('mobile-nav-active') ? 'hidden' : '';
                    
                    // Change icon
                    if (navMenu.classList.contains('mobile-nav-active')) {
                        this.classList.remove('bi-list');
                        this.classList.add('bi-x');
                    } else {
                        this.classList.remove('bi-x');
                        this.classList.add('bi-list');
                    }
                });
            }

            // Close mobile nav when clicking overlay
            if (overlay) {
                overlay.addEventListener('click', function() {
                    navMenu.classList.remove('mobile-nav-active');
                    overlay.classList.remove('active');
                    body.style.overflow = '';
                    if (mobileNavToggle) {
                        mobileNavToggle.classList.remove('bi-x');
                        mobileNavToggle.classList.add('bi-list');
                    }
                });
            }

            // ============ MOBILE DROPDOWN TOGGLE ============
            const dropdownToggles = document.querySelectorAll('.navmenu .dropdown > a');
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth < 1200) {
                        e.preventDefault();
                        const parent = this.parentElement;
                        
                        // Toggle dropdown
                        parent.classList.toggle('dropdown-active');
                        
                        // Close other dropdowns
                        dropdownToggles.forEach(other => {
                            if (other !== toggle && other.parentElement.classList.contains('dropdown-active')) {
                                other.parentElement.classList.remove('dropdown-active');
                            }
                        });
                    }
                });
            });

            // Close mobile nav when clicking a link (except dropdown toggles)
            const navLinks = document.querySelectorAll('.navmenu a:not(.dropdown > a)');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1200) {
                        navMenu.classList.remove('mobile-nav-active');
                        overlay.classList.remove('active');
                        body.style.overflow = '';
                        if (mobileNavToggle) {
                            mobileNavToggle.classList.remove('bi-x');
                            mobileNavToggle.classList.add('bi-list');
                        }
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1200) {
                    navMenu.classList.remove('mobile-nav-active');
                    overlay.classList.remove('active');
                    body.style.overflow = '';
                    if (mobileNavToggle) {
                        mobileNavToggle.classList.remove('bi-x');
                        mobileNavToggle.classList.add('bi-list');
                    }
                    // Close all dropdowns on desktop
                    dropdownToggles.forEach(toggle => {
                        toggle.parentElement.classList.remove('dropdown-active');
                    });
                }
            });

            // ============ ISOTOPE ============
            const container = document.querySelector('.isotope-container');
            if (container) {
                const iso = new Isotope(container, {
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true
                });

                const filters = document.querySelectorAll('.isotope-filters li');

                filters.forEach(filter => {
                    filter.addEventListener('click', function() {
                        filters.forEach(el => el.classList.remove('filter-active'));
                        this.classList.add('filter-active');

                        const filterValue = this.getAttribute('data-filter');
                        iso.arrange({ filter: filterValue });
                    });
                });

                // Relayout after images load
                if (typeof imagesLoaded !== 'undefined') {
                    imagesLoaded(container, function() {
                        iso.layout();
                    });
                }
            }

            // ============ LAZY LOADING IMAGES ============
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.classList.add('loaded');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            }

            // ============ INITIALIZE AOS ============
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true,
                    mirror: false
                });
            }
        });
    </script>

    {{-- TEMPAT SCRIPT HALAMAN --}}
    @stack('scripts')

</body>
</html>