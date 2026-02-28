<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JMPSS – A School of Excellence. Quality Education, Strong Values, Bright Future.">
    <title>@yield('title', 'JMPSS – School of Excellence')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #1a3c6e;
            --primary-light: #2a5ba0;
            --accent: #f59e0b;
            --accent-dark: #d97706;
            --text: #1e293b;
            --text-muted: #64748b;
            --bg: #f8fafc;
            --white: #ffffff;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --gradient: linear-gradient(135deg, #1a3c6e 0%, #2a5ba0 50%, #1e4d87 100%);
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow: 0 8px 30px rgba(0,0,0,0.1);
            --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
            --radius: 16px;
            --radius-sm: 8px;
        }

        html { scroll-behavior: smooth; }
        body { font-family: 'Outfit', sans-serif; color: var(--text); background: var(--bg); overflow-x: hidden; }

        /* Navbar */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            background: rgba(26, 60, 110, 0.95); backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .navbar.scrolled { background: rgba(26, 60, 110, 0.99); box-shadow: var(--shadow); }
        .nav-container { max-width: 1280px; margin: 0 auto; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; height: 72px; }
        .nav-logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .nav-logo-icon { width: 48px; height: 48px; background: var(--accent); border-radius: 12px; display: grid; place-items: center; font-size: 22px; font-weight: 800; color: var(--primary); }
        .nav-logo-text { display: flex; flex-direction: column; }
        .nav-logo-name { font-size: 20px; font-weight: 700; color: white; line-height: 1; }
        .nav-logo-sub { font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 400; letter-spacing: 0.5px; }
        .nav-links { display: flex; align-items: center; gap: 4px; list-style: none; }
        .nav-links a { color: rgba(255,255,255,0.85); text-decoration: none; font-size: 15px; font-weight: 500; padding: 8px 16px; border-radius: 8px; transition: all 0.2s ease; }
        .nav-links a:hover, .nav-links a.active { color: white; background: rgba(255,255,255,0.15); }
        .nav-cta { background: var(--accent); color: var(--primary) !important; font-weight: 600 !important; padding: 10px 20px !important; border-radius: 10px !important; }
        .nav-cta:hover { background: var(--accent-dark) !important; color: var(--primary) !important; transform: translateY(-1px); }
        .hamburger { display: none; background: none; border: none; cursor: pointer; color: white; font-size: 24px; }
        .mobile-menu { display: none; }

        /* Page header */
        .page-header {
            padding: 140px 24px 80px;
            background: var(--gradient);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-header::before {
            content: ''; position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 5vw, 3.5rem); color: white; margin-bottom: 16px; position: relative; }
        .page-header p { font-size: 18px; color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto; position: relative; }
        .breadcrumb { display: flex; justify-content: center; gap: 8px; margin-top: 20px; position: relative; }
        .breadcrumb a, .breadcrumb span { color: rgba(255,255,255,0.7); font-size: 14px; text-decoration: none; }
        .breadcrumb a:hover { color: var(--accent); }
        .breadcrumb .sep { color: var(--accent); }

        /* Section */
        .section { padding: 80px 24px; }
        .section-alt { background: #f1f5f9; }
        .container { max-width: 1280px; margin: 0 auto; }
        .section-title { text-align: center; margin-bottom: 60px; }
        .section-title .badge { display: inline-block; background: rgba(26,60,110,0.1); color: var(--primary-light); font-size: 13px; font-weight: 600; padding: 6px 16px; border-radius: 50px; margin-bottom: 12px; letter-spacing: 1px; text-transform: uppercase; }
        .section-title h2 { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 4vw, 3rem); color: var(--text); margin-bottom: 16px; }
        .section-title p { color: var(--text-muted); font-size: 17px; max-width: 600px; margin: 0 auto; }
        .divider { width: 60px; height: 4px; background: var(--accent); border-radius: 2px; margin: 16px auto 0; }

        /* Cards */
        .card { background: white; border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
        .card-img { width: 100%; height: 220px; object-fit: cover; }
        .card-body { padding: 24px; }
        .card-badge { display: inline-block; background: rgba(26,60,110,0.1); color: var(--primary); font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 50px; margin-bottom: 12px; }
        .card-title { font-size: 18px; font-weight: 700; color: var(--text); margin-bottom: 8px; }
        .card-text { font-size: 14px; color: var(--text-muted); line-height: 1.7; }

        /* Grid */
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 28px; }
        .grid-4 { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px; border-radius: 10px; font-size: 15px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s ease; border: none; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-light); transform: translateY(-2px); box-shadow: 0 8px 25px rgba(26,60,110,0.3); }
        .btn-accent { background: var(--accent); color: var(--primary); }
        .btn-accent:hover { background: var(--accent-dark); transform: translateY(-2px); }
        .btn-outline { border: 2px solid var(--primary); color: var(--primary); background: transparent; }
        .btn-outline:hover { background: var(--primary); color: white; }

        /* Pagination */
        .pagination { display: flex; justify-content: center; gap: 8px; margin-top: 48px; flex-wrap: wrap; }
        .pagination .page-link { display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 15px; border: 2px solid var(--border); color: var(--text); transition: all 0.2s ease; }
        .pagination .page-link:hover, .pagination .page-link.active { background: var(--primary); color: white; border-color: var(--primary); }

        /* Footer */
        .footer { background: #0f2447; color: rgba(255,255,255,0.8); padding: 64px 24px 0; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; max-width: 1280px; margin: 0 auto; }
        .footer h4 { color: white; font-size: 17px; font-weight: 700; margin-bottom: 20px; }
        .footer p { font-size: 14px; line-height: 1.8; }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 14px; transition: color 0.2s; display: flex; align-items: center; gap: 8px; }
        .footer-links a:hover { color: var(--accent); }
        .footer-contact li { display: flex; gap: 10px; margin-bottom: 14px; font-size: 14px; align-items: flex-start; }
        .footer-contact i { color: var(--accent); margin-top: 3px; min-width: 16px; }
        .footer-social { display: flex; gap: 12px; margin-top: 20px; }
        .footer-social a { width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 10px; display: grid; place-items: center; color: white; text-decoration: none; transition: all 0.2s ease; font-size: 16px; }
        .footer-social a:hover { background: var(--accent); color: var(--primary); transform: translateY(-3px); }
        .footer-bottom { max-width: 1280px; margin: 0 auto; border-top: 1px solid rgba(255,255,255,0.1); padding: 24px 0; margin-top: 48px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
        .footer-bottom p { font-size: 13px; }

        /* Flash messages */
        .alert { padding: 14px 20px; border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 14px; font-weight: 500; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }

        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) {
            .nav-links { display: none; position: fixed; top: 72px; left: 0; right: 0; background: var(--primary); flex-direction: column; padding: 20px; gap: 4px; border-top: 1px solid rgba(255,255,255,0.1); }
            .nav-links.open { display: flex; }
            .hamburger { display: block; }
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="nav-logo-icon">J</div>
            <div class="nav-logo-text">
                <span class="nav-logo-name">JMPSS</span>
                <span class="nav-logo-sub">School of Excellence</span>
            </div>
        </a>
        <ul class="nav-links" id="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
            <li><a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'active' : '' }}">Events</a></li>
            <li><a href="{{ route('awards') }}" class="{{ request()->routeIs('awards') ? 'active' : '' }}">Awards</a></li>
            <li><a href="{{ route('testimonials') }}" class="{{ request()->routeIs('testimonials') ? 'active' : '' }}">Testimonials</a></li>
            <li><a href="{{ route('admin.login') }}" class="nav-cta">Admin Login</a></li>
        </ul>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <i class="fa fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Flash Messages -->
@if(session('success') || session('error'))
<div style="position:fixed;top:80px;right:20px;z-index:9999;min-width:300px;">
    @if(session('success'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
    @endif
</div>
@endif

@yield('content')

<!-- Footer -->
<footer class="footer">
    <div class="footer-grid">
        <div>
            <h4>🏫 JMPSS School</h4>
            <p>Jayamatha Polytechnic & Secondary School – Nurturing excellence in academics, sports, and character since 1985. Building leaders of tomorrow.</p>
            <div class="footer-social">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Twitter/X"><i class="fab fa-x-twitter"></i></a>
            </div>
        </div>
        <div>
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                <li><a href="{{ route('gallery') }}"><i class="fas fa-chevron-right"></i> Gallery</a></li>
                <li><a href="{{ route('events') }}"><i class="fas fa-chevron-right"></i> Events</a></li>
                <li><a href="{{ route('awards') }}"><i class="fas fa-chevron-right"></i> Awards</a></li>
                <li><a href="{{ route('testimonials') }}"><i class="fas fa-chevron-right"></i> Testimonials</a></li>
            </ul>
        </div>
        <div>
            <h4>Academics</h4>
            <ul class="footer-links">
                <li><a href="#"><i class="fas fa-chevron-right"></i> Admission Info</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Curriculum</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Exam Results</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Fee Structure</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> School Calendar</a></li>
            </ul>
        </div>
        <div>
            <h4>Contact Us</h4>
            <ul class="footer-contact footer-links">
                <li><i class="fas fa-map-marker-alt"></i> 123, School Road, Chennai – 600 001, Tamil Nadu</li>
                <li><i class="fas fa-phone"></i> +91 44 2345 6789</li>
                <li><i class="fas fa-envelope"></i> info@jmpss.edu.in</li>
                <li><i class="fas fa-clock"></i> Mon–Sat: 8:00 AM – 4:00 PM</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} JMPSS School. All rights reserved.</p>
        <p>Designed with ❤️ for Excellence in Education</p>
    </div>
</footer>

<script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Hamburger toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');
    hamburger?.addEventListener('click', () => {
        navLinks.classList.toggle('open');
        const icon = hamburger.querySelector('i');
        icon.className = navLinks.classList.contains('open') ? 'fa fa-xmark' : 'fa fa-bars';
    });

    // Auto-hide flash messages
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => {
            el.style.transition = 'opacity 0.5s ease';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 4000);
</script>
@stack('scripts')
</body>
</html>
