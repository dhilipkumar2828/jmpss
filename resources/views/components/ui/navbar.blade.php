<div class="top-header">
        <div class="container top-header-wrapper">
            <!-- Left: Social Icons -->
            <div class="top-header-left">
                <div class="social-icons-top">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Center: Logo -->
            <div class="top-header-center">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/jmpsss/logo.png') }}" alt="JMPSSS Logo">
                </a>
            </div>

            <!-- Right: Login & Admission Buttons -->
            <div class="top-header-right">
                <a href="{{ route('login') }}" class="top-btn login-btn {{ request()->routeIs('login') ? 'active' : '' }}"><i class="fa-solid fa-user"></i> Login</a>
                <a href="{{ route('admissions') }}" class="top-btn admission-btn" id="headerAdmissionBtn"><i
                        class="fa-solid fa-graduation-cap"></i> Admission</a>
            </div>
        </div>
    </div>

    <!-- Bottom Header Nav -->
    <header class="bottom-header">
        <div class="container header-content">
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle navigation menu"
                aria-controls="mainNav" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>

            <nav class="main-nav" id="mainNav">
                <ul class="nav-links">
                    <li class="mobile-nav-logo-item">
                        <a href="{{ route('home') }}" aria-label="JMPSSS Home">
                            <img src="{{ asset('assets/jmpsss/logo.png') }}" alt="JMPSSS Logo">
                        </a>
                    </li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-dropdown">
                        <a href="{{ route('about') }}">About Us <i class="fa-solid fa-chevron-down nav-arrow"></i></a>
                        <button type="button" class="mobile-submenu-toggle" aria-label="Toggle About Us submenu">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('principal-desk') }}"><i class="fa-solid fa-user-tie"></i> Principal's Desk</a>
                            </li>
                            <li><a href="{{ route('correspondent-desk') }}"><i class="fa-solid fa-briefcase"></i> Correspondent's
                                    Desk</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">Academics <i class="fa-solid fa-chevron-down nav-arrow"></i></a>
                        <button type="button" class="mobile-submenu-toggle" aria-label="Toggle Academics submenu">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('academics') }}"><i class="fa-solid fa-book-open"></i> Curriculum</a></li>
                            <li><a href="{{ route('admissions') }}"><i class="fa-solid fa-graduation-cap"></i> Admissions</a></li>
                            <li><a href="{{ route('awards') }}"><i class="fa-solid fa-trophy"></i> Awards</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">Gallery <i class="fa-solid fa-chevron-down nav-arrow"></i></a>
                        <button type="button" class="mobile-submenu-toggle" aria-label="Toggle Gallery submenu">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('gallery') }}"><i class="fa-solid fa-images"></i> Photos</a></li>
                            <li><a href="{{ route('videos') }}"><i class="fa-solid fa-video"></i> Videos</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="{{ route('events') }}">Campus Life <i class="fa-solid fa-chevron-down nav-arrow"></i></a>
                        <button type="button" class="mobile-submenu-toggle" aria-label="Toggle Campus Life submenu">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('events') }}"><i class="fa-solid fa-calendar-days"></i> Events</a></li>
                            <li><a href="{{ route('events', ['view' => 'visit']) }}"><i class="fa-solid fa-map-location-dot"></i> Campus Visit</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('careers') }}">Careers</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div class="sticky-logo">
                <img src="{{ asset('assets/jmpsss/logo.png') }}" alt="JMPSSS Logo">
            </div>
        </div>
        <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
    </header>

