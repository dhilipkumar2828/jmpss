<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JMPSS – A School of Excellence. Quality Education, Strong Values, Bright Future.">
    <title>@yield('title', 'JMPSS – School of Excellence')</title>

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary: #145A32;
            --primary-dark: #0E3E22;
            --primary-light: #E7F0E9;
            --accent: #F58220;
            --accent-soft: #FFF3E9;
            --gold: #C5A059;
            --bg: #FAFAF7;
            --bg-alt: #F3F4F1;
            --text: #1C1C1C;
            --text-muted: #4B5563;
            --border: #E5E5E5;
            --white: #FFFFFF;
            --max-width: 1280px;
            --section-padding: 120px;
            --radius: 8px;
            --radius-lg: 24px;
            --shadow-subtle: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-premium: 0 20px 40px rgba(0, 0, 0, 0.08);
            --ease: cubic-bezier(0.23, 1, 0.32, 1);
            --transition: all 0.5s var(--ease);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background-color: var(--bg);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        :focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 4px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        .font-serif {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary);
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        p {
            color: var(--text-muted);
            line-height: 1.8;
            font-weight: 400;
        }

        .container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--primary);
            color: rgba(255, 255, 255, 0.9);
            padding: 8px 0;
            font-size: 13px;
            font-weight: 400;
        }

        .top-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-right {
            display: flex;
            gap: 20px;
        }

        /* Header */
        .header {
            background-color: var(--white);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .header.scrolled {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: var(--shadow-premium);
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .header .container {
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 58px;
            width: auto;
            display: block;
        }

        .nav-list {
            display: flex;
            list-style: none;
            gap: 36px;
            align-items: center;
        }

        .nav-list a {
            text-decoration: none;
            color: var(--text);
            font-size: 14px;
            font-weight: 500;
            position: relative;
            padding: 8px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-list a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent);
            transition: width 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .nav-list a:hover::after,
        .nav-list a.active::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--primary);
            color: white !important;
            padding: 10px 20px !important;
            border-radius: var(--radius);
        }

        .nav-cta::after {
            display: none !important;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--primary);
        }

        /* Sections */
        /* Modern Reveal System */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 1s var(--ease);
            will-change: transform, opacity;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            transform: translateX(-30px);
        }

        .reveal-right {
            transform: translateX(30px);
        }

        .reveal-scale {
            transform: scale(0.95);
        }

        .reveal-left.active,
        .reveal-right.active,
        .reveal-scale.active {
            transform: translate(0) scale(1);
        }

        .section {
            padding: var(--section-padding) 0;
            overflow: hidden;
            /* Prevent horizontal scroll from reveals */
        }

        .section-light {
            background-color: #F3F4F1;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 38px;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .divider-center {
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary) 50%, var(--accent) 50%);
            margin: 0 auto;
        }

        img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            background-color: #f0f0f0;
            /* Soft placeholder */
            transition: opacity 0.4s ease;
        }

        /* Buttons */
        .btn-outline-accent {
            display: inline-block;
            padding: 14px 32px;
            border: 2px solid var(--accent);
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border-radius: var(--radius);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-outline-accent:hover {
            background-color: var(--accent);
            color: white;
        }

        .btn-outline-white {
            display: inline-block;
            padding: 16px 36px;
            border: 2px solid white;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border-radius: var(--radius);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-outline-white:hover {
            background-color: white;
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Page Headers */
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), var(--primary);
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .page-header h1 {
            color: white;
            font-size: 48px;
            margin-bottom: 15px;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 10px;
            font-size: 14px;
            opacity: 0.8;
        }

        .breadcrumb li::after {
            content: '/';
            margin-left: 10px;
        }

        .breadcrumb li:last-child::after {
            display: none;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        /* Content Sections */
        .content-section {
            padding: 80px 0;
        }

        .rich-text {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.8;
        }

        .rich-text h3 {
            margin: 40px 0 20px;
            color: var(--primary);
        }

        .info-card {
            background: white;
            padding: 40px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-subtle);
            height: 100%;
        }

        .footer {
            background-color: var(--primary);
            color: rgba(255, 255, 255, 0.9);
            /* Improved contrast */
            padding: 90px 0 0;
            /* Balanced top padding */
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 80px;
        }

        .footer-col {
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding-right: 20px;
        }

        .footer-col:last-child {
            border-right: none;
            padding-right: 0;
        }

        .footer h4 {
            color: white;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 12px;
        }

        .footer h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 40px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Flash Messages */
        .alert {
            padding: 15px 25px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Quick Action Grid (Eduka Style) */
        .action-flex {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .action-card {
            background: white;
            padding: 40px 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-premium);
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            border-bottom: 4px solid transparent;
        }

        .action-card:hover {
            transform: translateY(-10px);
            border-bottom-color: var(--accent);
        }

        .action-card i {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 20px;
            display: block;
        }

        .action-card h4 {
            font-size: 16px;
            color: var(--text);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        /* Timeline (Valer Style) */
        .timeline {
            position: relative;
            padding-left: 40px;
            border-left: 2px solid var(--border);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 40px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -49px;
            top: 0;
            width: 16px;
            height: 16px;
            background: var(--accent);
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 0 0 2px var(--accent);
        }

        .timeline-date {
            font-weight: 700;
            color: var(--accent);
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        /* Organic Frames (Toddly Style) */
        .organic-frame {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            overflow: hidden;
            border: 8px solid var(--primary-light);
            transition: var(--transition);
        }

        .organic-frame:hover {
            border-radius: 40% 60% 70% 30% / 30% 60% 40% 70%;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                CBSE Affiliation No: 1930XXX
            </div>
            <div class="top-bar-right">
                <span><i class="fas fa-phone"></i> +91 44 2345 6789</span>
                <span><i class="fas fa-envelope"></i> info@jmpss.edu.in</span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="JMPSS Logo">
            </a>
            <nav>
                <ul class="nav-list" id="nav-list">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('about') }}"
                            class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('academics') }}"
                            class="{{ request()->routeIs('academics') ? 'active' : '' }}">Academics</a></li>
                    <li><a href="{{ route('admissions') }}"
                            class="{{ request()->routeIs('admissions') ? 'active' : '' }}">Admissions</a></li>
                    <li><a href="{{ route('infrastructure') }}"
                            class="{{ request()->routeIs('infrastructure') ? 'active' : '' }}">Infrastructure</a></li>
                    <li><a href="{{ route('results') }}"
                            class="{{ request()->routeIs('results') ? 'active' : '' }}">Results</a></li>
                    <li><a href="{{ route('gallery') }}"
                            class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="{{ route('disclosure') }}"
                            class="{{ request()->routeIs('disclosure') ? 'active' : '' }}">CBSE Disclosure</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
            </nav>
            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Flash Messages -->
    @if (session('success') || session('error'))
        <div style="position:fixed; top:20px; right:20px; z-index:9999;">
            @if (session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
            @endif
        </div>
    @endif

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>About School</h4>
                    <p style="font-size:14px; line-height:1.7;">Jeeva Memorial Public Senior Secondary School is a
                        premier academic institution dedicated to nurturing the next generation of global citizens since
                        1985.</p>
                </div>
                <div class="footer-col" data-reveal-once data-reveal-delay="100">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">About Heritage</a></li>
                        <li><a href="{{ route('infrastructure') }}">Campus Facilities</a></li>
                        <li><a href="{{ route('gallery') }}">Campus Gallery</a></li>
                        <li><a href="{{ route('news') }}">News & Circulars</a></li>
                        <li><a href="{{ route('disclosure') }}">CBSE Disclosure</a></li>
                    </ul>
                </div>
                <div class="footer-col" data-reveal-once data-reveal-delay="200">
                    <h4>Academics</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('academics') }}">Scholarly Framework</a></li>
                        <li><a href="{{ route('admissions') }}">Admission Policy</a></li>
                        <li><a href="{{ route('results') }}">Academic Results</a></li>
                        <li><a href="{{ route('disclosure') }}">Fee Structure</a></li>
                        <li><a href="{{ route('disclosure') }}">School Calendar</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul class="footer-links">
                        <li style="font-size:14px;"><i class="fas fa-map-marker-alt"
                                style="color:var(--accent); margin-right:8px;"></i> 123, School Road, Chennai - 600001
                        </li>
                        <li style="font-size:14px;"><i class="fas fa-phone"
                                style="color:var(--accent); margin-right:8px;"></i> +91 44 2345 6789</li>
                        <li style="font-size:14px;"><i class="fas fa-envelope"
                                style="color:var(--accent); margin-right:8px;"></i> info@jmpss.edu.in</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} JMPSS. All rights reserved. CBSE Affiliation No: 1930XXX</p>
                <p>Designed for Academic Excellence</p>
            </div>
        </div>
    </footer>

    <script>
        // Hamburger Menu
        const hamburger = document.getElementById('hamburger');
        const navList = document.getElementById('nav-list');
        hamburger?.addEventListener('click', () => {
            navList.classList.toggle('open');
            // Simplified mobile menu for now
            if (navList.style.display === 'flex') {
                navList.style.display = 'none';
            } else {
                navList.style.display = 'flex';
                navList.style.flexDirection = 'column';
                navList.style.position = 'absolute';
                navList.style.top = '90px';
                navList.style.left = '0';
                navList.style.right = '0';
                navList.style.backgroundColor = 'white';
                navList.style.padding = '20px';
                navList.style.borderBottom = '1px solid var(--border)';
            }
        });

        // Modern Reveal Engine (Intersection Observer)
        const revealCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-reveal-delay') || 0;
                    setTimeout(() => {
                        entry.target.classList.add('active');
                    }, delay);

                    if (entry.target.hasAttribute('data-reveal-once')) {
                        observer.unobserve(entry.target);
                    }
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealCallback, {
            threshold: 0.15,
            rootMargin: '0px 0px -80px 0px'
        });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        // Header Scroll Effect
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        }, {
            passive: true
        });

        // Auto-hide Flash Messages
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => {
                el.style.opacity = '0';
                el.style.transition = 'opacity 0.5s ease';
                setTimeout(() => el.remove(), 500);
            });
        }, 4000);
    </script>
    @stack('scripts')
</body>

</html>
