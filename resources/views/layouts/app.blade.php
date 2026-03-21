<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Jeeva Memorial Senior Secondary School - CBSE curriculum, holistic learning and student development.">
    <title>@yield('title', 'Jeeva Memorial Senior Secondary School')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/JMPSSS/image/tab.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/JMPSSS/style.css') }}">

    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/JMPSSS/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        :root {
            --logo-green-900: #002800 !important;
            --logo-green-700: #004800 !important;
            --logo-green-500: #006400 !important;
            --logo-orange: #e14c1e !important;
            --logo-gold: #c5a059 !important;
            --logo-gold-light: #e5c079 !important;
            
            --primary-color: #e14c1e !important;
            --secondary-color: #004800 !important;
            --bg-dark: #002800 !important;
        }

        /* ── Global Premium Pagination (Fixes Bullets & Design) ── */
        .pagination, .pagination ul {
            display: flex !important;
            list-style: none !important;
            list-style-type: none !important;
            padding: 0 !important;
            gap: 10px !important;
            justify-content: center !important;
            align-items: center !important;
            margin: 30px 0 !important;
        }
        .pagination li, .page-item {
            list-style: none !important;
            list-style-type: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .pagination li::before, .pagination li::after {
            content: none !important;
            display: none !important;
        }
        .page-item .page-link, .pagination a, .pagination span {
            width: 42px !important;
            height: 42px !important;
            display: grid !important;
            place-items: center !important;
            border-radius: 50% !important;
            border: 1px solid #eee !important;
            background: #fff !important;
            color: var(--secondary-color) !important;
            font-size: 15px !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05) !important;
        }
        .page-item.active .page-link, .pagination .active span {
            background: var(--primary-color) !important;
            color: #fff !important;
            border-color: var(--primary-color) !important;
            box-shadow: 0 4px 12px rgba(225, 76, 30, 0.3) !important;
        }
        .page-item.disabled .page-link, .pagination .disabled span {
            color: #ccc !important;
            opacity: 0.6 !important;
            cursor: not-allowed !important;
        }
        .page-item:hover:not(.active):not(.disabled) .page-link {
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
            background: #fff !important;
            transform: translateY(-3px) !important;
        }
        .pagination svg, nav svg {
            width: 1.2rem !important;
            height: 1.2rem !important;
            display: inline-block !important;
            vertical-align: middle !important;
        }
        /* Hide redundant mobile arrows */
        nav div.flex.justify-between.flex-1.sm\:hidden { display: none !important; }
        nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
            display: flex !important;
            flex-direction: column !important;
            gap: 20px !important;
        }
        .pagination-meta, nav p.text-sm {
            text-align: center !important;
            font-size: 14px !important;
            color: #777 !important;
            margin-bottom: 0 !important;
        }
    </style>
</head>
@php
    $hideChrome = trim($__env->yieldContent('hide_chrome')) === '1';
    $siteSettings = []; // Hardcoded values used in components directly or fallback logic
@endphp

<body class="@yield('body_class')">
    @unless ($hideChrome)
        <x-ui.navbar :settings="$siteSettings" />
    @endunless


    <div id="page-content">
        @yield('content')
    </div>

    @unless ($hideChrome)
        <x-ui.footer :settings="$siteSettings" />
    @endunless

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        }
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    <script src="{{ asset('assets/JMPSSS/nav-active.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.bottom-header');
            if (header) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                });
            }

            const container = document.querySelector('.slider-container');
            const nextBtn = document.querySelector('.next');
            const prevBtn = document.querySelector('.prev');

            if (nextBtn && prevBtn && container) {
                nextBtn.addEventListener('click', () => {
                    const scrollAmount = container.clientWidth + 20; // Container width + gap
                    container.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                });

                prevBtn.addEventListener('click', () => {
                    const scrollAmount = container.clientWidth + 20;
                    container.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                });
            }

            const testimonials = document.querySelectorAll('.testimonial-item');
            const dots = document.querySelectorAll('.dot');
            let currentTestimonial = 0;

            function showTestimonial(index) {
                testimonials.forEach(item => item.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                if (testimonials[index]) {
                    testimonials[index].classList.add('active');
                }
                if (dots[index]) {
                    dots[index].classList.add('active');
                }
            }

            function nextTestimonial() {
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                showTestimonial(currentTestimonial);
            }

            if (testimonials.length > 0 && dots.length > 0) {
                setInterval(nextTestimonial, 7000);

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        currentTestimonial = index;
                        showTestimonial(currentTestimonial);
                    });
                });
            }

            const popup = document.getElementById('admissionPopup');
            const closeBtn = document.getElementById('closePopup');
            const floatingBtn = document.getElementById('floatingAdmissionBtn');

            if (popup && closeBtn) {
                if (!sessionStorage.getItem('admissionPopupShown')) {
                    setTimeout(() => {
                        popup.classList.add('active');
                        sessionStorage.setItem('admissionPopupShown', 'true');
                    }, 1000);
                }

                closeBtn.addEventListener('click', () => {
                    popup.classList.remove('active');
                });

                popup.addEventListener('click', (e) => {
                    if (e.target === popup) {
                        popup.classList.remove('active');
                    }
                });

                if (floatingBtn) {
                    floatingBtn.addEventListener('click', () => {
                        popup.classList.add('active');
                    });
                }
            }

            const path = window.location.pathname.replace(/\/+$/, '') || '/';
            const activeMap = {
                '/': 'Home',
                '/about': 'About Us',
                '/chairman-desk': 'About Us',
                '/correspondent-desk': 'About Us',
                '/academics': 'Academics',
                '/admissions': 'Academics',
                '/awards': 'Academics',
                '/gallery': 'Gallery',
                '/videos': 'Gallery',
                '/events': 'Campus Life',
                '/careers': 'Careers',
                '/contact': 'Contact',
            };

            const activeLabel = activeMap[path] || '';
            if (activeLabel) {
                document.querySelectorAll('.nav-links > li > a').forEach(function(link) {
                    link.classList.remove('active');
                });

                document.querySelectorAll('.nav-links > li > a').forEach(function(link) {
                    const text = Array.from(link.childNodes)
                        .filter(node => node.nodeType === 3)
                        .map(node => node.textContent.trim())
                        .join('');

                    if (text === activeLabel) {
                        link.classList.add('active');
                    }
                });
            }

            const bottomHeader = document.querySelector('.bottom-header');
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileSubmenuToggles = document.querySelectorAll('.mobile-submenu-toggle');

            function setMobileToggleIcon(isOpen) {
                if (!mobileMenuToggle) return;
                const icon = mobileMenuToggle.querySelector('i');
                if (!icon) return;
                icon.className = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
            }

            function closeMobileMenu() {
                if (!bottomHeader) return;
                bottomHeader.classList.remove('mobile-open');
                document.body.classList.remove('mobile-menu-open');
                if (mobileMenuToggle) {
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                }
                setMobileToggleIcon(false);
                document.querySelectorAll('.has-dropdown.mobile-submenu-open').forEach(function(item) {
                    item.classList.remove('mobile-submenu-open');
                });
            }

            function openMobileMenu() {
                if (!bottomHeader) return;
                bottomHeader.classList.add('mobile-open');
                document.body.classList.add('mobile-menu-open');
                if (mobileMenuToggle) {
                    mobileMenuToggle.setAttribute('aria-expanded', 'true');
                }
                setMobileToggleIcon(true);
            }

            if (mobileMenuToggle && bottomHeader) {
                mobileMenuToggle.addEventListener('click', function() {
                    if (bottomHeader.classList.contains('mobile-open')) {
                        closeMobileMenu();
                        return;
                    }
                    openMobileMenu();
                });
            }

            if (mobileMenuOverlay) {
                mobileMenuOverlay.addEventListener('click', closeMobileMenu);
            }

            mobileSubmenuToggles.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const parent = button.closest('.has-dropdown');
                    if (!parent) return;

                    const willOpen = !parent.classList.contains('mobile-submenu-open');
                    document.querySelectorAll('.has-dropdown.mobile-submenu-open').forEach(function(item) {
                        if (item !== parent) {
                            item.classList.remove('mobile-submenu-open');
                        }
                    });
                    parent.classList.toggle('mobile-submenu-open', willOpen);
                });
            });

            document.querySelectorAll('.main-nav a').forEach(function(link) {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        closeMobileMenu();
                    }
                });
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    closeMobileMenu();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeMobileMenu();
                }
            });

            setTimeout(function() {
                const flashWrap = document.getElementById('flash-wrap');
                if (!flashWrap) return;
                flashWrap.style.transition = 'opacity 0.3s ease';
                flashWrap.style.opacity = '0';
                setTimeout(function() {
                    flashWrap.remove();
                }, 320);
            }, 3500);
        });
    </script>

    @stack('scripts')
</body>

</html>
