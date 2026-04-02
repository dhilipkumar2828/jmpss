@extends('layouts.app')
@section('title', 'JMPSSS | Jaypee Model Senior Secondary School')
@section('body_class', 'home-page')

@push('styles')
<style>
    /* Hero Slider Styles */
    .hero-slider {
        position: relative;
        height: 100vh;
        min-height: 600px;
        overflow: hidden;
    }
    .slider-wrapper {
        height: 100%;
        width: 100%;
        position: relative;
    }
    .hero-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: opacity 1.2s ease, visibility 1.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .hero-item.active {
        opacity: 1;
        visibility: visible;
        z-index: 10;
    }
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.1);
        transition: transform 8s ease;
    }
    .hero-item.active .hero-bg {
        transform: scale(1);
    }
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6));
        z-index: 1;
    }
    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        padding: 0 20px;
        max-width: 900px;
    }
    .hero-content h1 {
        font-size: clamp(32px, 8vw, 72px);
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.8s 0.5s ease;
    }
    .banner-subtitle {
        font-size: clamp(18px, 3vw, 24px);
        margin-bottom: 30px;
        opacity: 0.9;
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.8s 0.8s ease;
    }
    .hero-actions {
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.8s 1.1s ease;
    }
    .hero-item.active h1,
    .hero-item.active .banner-subtitle,
    .hero-item.active .hero-actions {
        transform: translateY(0);
        opacity: 1;
    }
    
    .slider-controls {
        position: absolute;
        bottom: 50px;
        right: 50px;
        z-index: 20;
        display: flex;
        gap: 15px;
    }
    .slider-prev, .slider-next {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        backdrop-filter: blur(5px);
    }
    .slider-prev:hover, .slider-next:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    /* Why Choose Us Centering */
    .feature-card {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
        transition: all 0.3s ease;
    }
    .icon-circle {
        margin: 0 auto 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Testimonial Swipe Scroller */
    .testimonial-slider-track {
        display: flex !important;
        overflow-x: auto !important;
        scroll-snap-type: x mandatory !important;
        scroll-behavior: smooth !important;
        -webkit-overflow-scrolling: touch !important;
        scrollbar-width: none !important; /* Firefox */
        -ms-overflow-style: none !important;  /* IE/Edge */
        gap: 0 !important;
        padding-bottom: 10px !important;
    }
    .testimonial-slider-track::-webkit-scrollbar {
        display: none !important; /* Chrome/Safari */
    }
    .testimonial-item {
        flex: 0 0 100% !important;
        width: 100% !important;
        scroll-snap-align: center !important;
        scroll-snap-stop: always !important; /* Force snapping to each card */
        opacity: 1 !important; /* Always visible in track */
        visibility: visible !important;
        position: relative !important;
        transition: transform 0.3s ease !important;
    }
    .testimonial-content-area {
        max-width: 100% !important;
        margin: 0 auto !important;
    }
    .testimonial-dots {
        display: flex !important;
        justify-content: center !important;
        gap: 8px !important;
        margin-top: 20px !important;
    }
    .testimonial-dots .dot {
        width: 10px !important;
        height: 10px !important;
        border-radius: 50% !important;
        background: #ddd !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }
    .testimonial-dots .dot.active {
        background: var(--primary-color) !important;
        width: 25px !important;
        border-radius: 5px !important;
    }

    @media (max-width: 767px) {
        .hero-slider {
            height: 70vh;
            min-height: 400px;
        }
        .hero-content {
            padding: 0 15px;
        }
        .hero-content h1 {
            font-size: clamp(24px, 10vw, 32px);
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        .banner-subtitle {
            font-size: clamp(14px, 4vw, 16px);
            margin-bottom: 20px;
            line-height: 1.4;
        }
        .slider-controls {
            bottom: 25px;
            right: 50%;
            transform: translateX(50%);
            gap: 10px;
        }
        .slider-prev, .slider-next {
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 240px) {
        .hero-slider {
            height: 60vh;
            min-height: 320px;
        }
        .hero-content h1 {
            font-size: 20px;
        }
        .banner-subtitle {
            font-size: 13px;
        }
        .slider-controls {
            bottom: 15px;
        }
    }
</style>
@endpush

@section('content')
<!-- Dynamic Hero Slider -->
    @if($banners->isNotEmpty())
    <section class="hero-slider">
        <div class="slider-wrapper">
            @foreach($banners as $index => $banner)
            <div class="hero-item {{ $index == 0 ? 'active' : '' }}">
                <div class="hero-overlay"></div>
                <img src="{{ asset($banner->image_path) }}" alt="{{ $banner->title }}" class="hero-bg">
                <div class="hero-content">
                    <h1>{{ $banner->title ?? 'ACADEMIC EXCELLENCE' }}</h1>
                    @if($banner->subtitle)
                        <p class="banner-subtitle">{{ $banner->subtitle }}</p>
                    @endif
                    <div class="hero-actions">
                        @if($banner->button_text)
                            <a href="{{ $banner->button_link ?? '#' }}" class="btn-primary" style="margin-top:20px;">{{ $banner->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($banners->count() > 1)
        <div class="slider-controls">
            <button class="slider-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-next"><i class="fas fa-chevron-right"></i></button>
        </div>
        @endif
    </section>
    @else
    <section class="hero">
        <div class="hero-overlay"></div>
        <img src="{{ asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Academic Excellence" class="hero-bg">
        <div class="hero-content">
            <h1>{{ $sections['hero']->title ?? 'ACADEMIC EXCELLENCE' }}</h1>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> | <a href="{{ route('about') }}">About JMPSSS</a>
            </div>
        </div>
    </section>
    @endif

    <!-- About Section -->
    <section class="about section-padding">
        <div class="container grid-2 about-grid">
            <div class="about-images-wrapper">
                <div class="about-img-1">
                    <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="School Building">
                </div>
                <div class="about-img-2">
                    <img src="{{ asset('assets/jmpsss/image/new/slider2.jpg') }}" alt="Students Learning">
                </div>
            </div>
            <div class="about-text">
                {{-- <span class="section-subtitle">Welcome to JMPSSS</span> --}}
                <h2 class="section-title-alt">{{ $sections['about']->title ?? 'Welcome to JMPSSS' }}</h2>
                <div class="about-content-dynamic">
                    @if($sections['about'])
                        {!! nl2br(e($sections['about']->content)) !!}
                    @else
                        <p>JEEVA MEMORIAL PUBLIC SCHOOL, the faculty and the Management welcome you to our school community.
                            At JEEVA MEMORIAL PUBLIC SCHOOL, we give students a wide range of options in their education and career. As a not-for-profit organisation, we devote our resources to delivering high-quality educational programmes that can unlock learners' potential.
                            Our programmes and qualifications set the global standard for international education. They are created by subject experts,
                            rooted in academic rigour and reflect the latest educational
                            research.
                            They provide a strong platform for learners to progress from
                            one stage to the next and are well supported by teaching and
                            learning resources.
                            Together with schools, we develop confident, responsible,
                            reflective, innovative and engaged equipped for success in the
                            fast-changing modern world.
                            This is an initiative by the JEEVA MEMORIAL TRUST to give
                            value based education to all segments of the society.
                        </p>
                    @endif
                </div>
                <ul class="about-feature-list" style="margin-top: 20px;">
                    <li><i class="fa-solid fa-circle-check"></i> Experienced & Dedicated Faculty</li>
                    <li><i class="fa-solid fa-circle-check"></i> State-of-the-Art Learning Infrastructure</li>
                    <li><i class="fa-solid fa-circle-check"></i> Comprehensive Co-curricular Programs</li>
                </ul>
                <a href="{{ route('about') }}" class="btn-primary mt-30">Discover More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Leadership Messages -->
    @if($sections['principal'] || $sections['correspondent'])
    <section class="leadership-section section-padding" style="background:#f8fafc;">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">Our Leadership</span>
                <h2 class="section-title">Messages from our Leaders</h2>
            </div>
            <div class="grid-2" style="gap:40px;">
                <div class="message-card" style="background:white; padding:40px; border-radius:30px; box-shadow:0 15px 45px rgba(0,0,0,0.05); border-left:6px solid var(--primary);">
                    <div style="display:flex; align-items:center; gap:20px; margin-bottom:25px;">
                        <div style="width:70px; height:70px; background:var(--accent); border-radius:20px; overflow:hidden;"><img src="{{ asset('images/chairman.jpeg') }}" alt="Mr. G.K. Babu" style="width: 100%; height: 100%; object-fit: cover;"></div>
                        <div>
                            <h3 style="font-size:20px; color:var(--primary);">Mr. G.K. Babu</h3>
                            <p style="font-size:14px; color:var(--text-muted); font-weight:600;">Founder & Chairman</p>
                        </div>
                    </div>
                    <p style="font-style:italic; color:#444; line-height:1.7; margin-bottom:20px;">“It gives me immense pleasure to welcome you to JMPSSS. JMPSSS stands as a symbol of excellence, dedication, and holistic development. We believe that education is not just about academic achievement, but also about shaping character, building confidence....”</p>
                    <a href="{{ route('chairman-desk') }}" style="color:var(--primary); font-weight:700; text-decoration:none; font-size:14px; display:inline-flex; align-items:center; gap:8px;">Read Full Message <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="message-card" style="background:white; padding:40px; border-radius:30px; box-shadow:0 15px 45px rgba(0,0,0,0.05); border-left:6px solid var(--accent);">
                    <div style="display:flex; align-items:center; gap:20px; margin-bottom:25px;">
                        <div style="width:70px; height:70px; background:var(--accent); border-radius:20px; overflow:hidden;"><img src="{{ asset('images/manager.jpeg') }}" alt="Mrs. B.Komalavathi" style="width: 100%; height: 100%; object-fit: cover;"></div>
                        <div>
                            <h3 style="font-size:20px; color:var(--primary);">Mrs. B.Komalavathi</h3>
                            <p style="font-size:14px; color:var(--text-muted); font-weight:600;">Managing Director</p>
                        </div>
                    </div>
                    <p style="font-style:italic; color:#444; line-height:1.7; margin-bottom:20px;">"Welcome to JMPSSS, where education is not just about learning from books, but about shaping character, values, and future leaders. At JMPSSS, we are committed to providing a safe, supportive, and stimulating environment where every child is encouraged to explore their potential..."</p>
                    <a href="{{ route('correspondent-desk') }}" style="color:var(--primary); font-weight:700; text-decoration:none; font-size:14px; display:inline-flex; align-items:center; gap:8px;">Read Full Message <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">Why Choose Us</span>
                <h2 class="section-title">Why JMPSSS is the Best Choice</h2>
            </div>
            <div class="features-grid zig-zag">
                <div class="feature-card">
                    <div class="icon-circle"><i class="fa-solid fa-file-signature"></i></div>
                    <h3>Online Certificates</h3>
                    <p>Aliquam at elit vitae dui sagittis vita maximus Luctus. Curabitur nibh at justo imperdiet non.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="icon-circle"><i class="fa-solid fa-chalkboard-user"></i></div>
                    <h3>Top Instructors</h3>
                    <p>Aliquam at elit vitae dui sagittis vita maximus Luctus. Curabitur nibh at justo imperdiet non.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="icon-circle"><i class="fa-solid fa-user-check"></i></div>
                    <h3>6000k+ Members</h3>
                    <p>Aliquam at elit vitae dui sagittis vita maximus Luctus. Curabitur nibh at justo imperdiet non.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="icon-circle"><i class="fa-solid fa-display"></i></div>
                    <h3>80+ Online Courses</h3>
                    <p>Aliquam at elit vitae dui sagittis vita maximus Luctus. Curabitur nibh at justo imperdiet non.
                    </p>
                </div>
            </div>
            <!-- Pagination Dots for Mobile -->
            <div class="features-dots-wrapper mobile-only-dots">
                <div class="features-dots">
                    <span class="feature-dot active" onclick="scrollToFeature(0)"></span>
                    <span class="feature-dot" onclick="scrollToFeature(1)"></span>
                    <span class="feature-dot" onclick="scrollToFeature(2)"></span>
                    <span class="feature-dot" onclick="scrollToFeature(3)"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Overview -->
    <section class="academic-overview section-padding">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Academic Overview</span>
                <h2 class="section-title">Inspired by a Holistic Approach</h2>
            </div>

            <div class="grid-2 mt-50 academic-content">
                <div class="edu-column">
                    <div class="edu-icon-header">
                        <i class="fa-solid fa-book-open"></i>
                        <h4>CBSE Curriculum</h4>
                    </div>
                    <p>We follow a rigorous and structured CBSE Curriculum designed to build strong academic foundations
                        and encourage critical thinking.</p>
                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check"></i> Standardized academic excellence from Grades 1-12.
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> Focus on analytical skills and conceptual clarity.
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> Comprehensive preparation for higher educational
                            challenges.</li>
                    </ul>
                </div>
                <div class="edu-column">
                    <div class="edu-icon-header">
                        <i class="fa-solid fa-users-gear"></i>
                        <h4>Holistic Development</h4>
                    </div>
                    <p>Beyond academics, we emphasize a well-rounded education through diverse co-curricular programs
                        and community service.</p>
                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check"></i> Integrated sports, performing arts, and creative
                            clubs.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Focus on essential life skills and leadership
                            qualities.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Fostering a sense of social responsibility and
                            ethics.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Events & Achievements -->
    <section class="events-achievements section-padding dark-bg">
        <div class="container">
            <h2 class="section-title text-center light-text">Events & Achievements</h2>
            <div class="events-slider">
                <button class="slider-btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                <div class="slider-container">
                    @forelse($events as $event)
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            @if($event->image)
                                <img src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="{{ $event->title }}">
                            @endif
                            <div class="event-date">{{ $event->event_date->format('d') }} <span>{{ $event->event_date->format('M') }}</span></div>
                        </div>
                        <div class="event-info">
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit($event->description, 100) }}</p>
                        </div>
                    </div>
                    @empty
                        <p style="color:white; text-align:center; grid-column: 1/-1;">No events available at the moment.</p>
                    @endforelse
                </div>
                <button class="slider-btn next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials section-padding">
        <div class="container new-testimonial-wrapper">
            <div class="testimonial-left">
                <span class="testimonial-subtitle">Testimonials</span>
                <h2 class="testimonial-main-title">What Parents Have to<br>Say About Us</h2>
            </div>
            <div class="testimonial-right">
                <div class="testimonial-avatar-wrapper">
                    <img src="{{ asset('assets/jmpsss/logo.png') }}" alt="JMPSSS Logo" class="testimonial-avatar">
                </div>
                <div class="testimonial-main-content">
                    <div class="testimonial-slider-track">
                        @forelse($testimonials as $testimonial)
                        <div class="testimonial-item {{ $loop->first ? 'active' : '' }}">
                            <div class="testimonial-content-area">
                                <h3 class="testimonial-author">{{ $testimonial->name }}</h3>
                                <p class="testimonial-role">{{ $testimonial->designation ?? $testimonial->type }}</p>
                                <p class="testimonial-quote">"{{ $testimonial->content }}"</p>
                                <div class="testimonial-stars">
                                    @for($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="testimonial-item active">
                                <p class="testimonial-quote">No testimonials available yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="testimonial-dots-wrapper">
                        <div class="testimonial-dots">
                            @foreach($testimonials as $testimonial)
                                <span class="dot {{ $loop->first ? 'active' : '' }}"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admission CTA
    <section class="admission-neat-section">
        <div class="container">
            <div class="admission-neat-bar">
                <div class="admission-neat-content">
                    <span class="admission-label-slim">Admissions 2024-25 is Open</span>
                    <h3>Secure Your Child's Future at JMPSSS</h3>
                </div>
                <div class="admission-neat-actions">
                    <a href="#" class="admission-btn-primary">Enroll Now <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#" class="admission-btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- New Video Admission Section -->
    <!-- <section class="video-admission-section">
        <video autoplay muted loop id="admission-bg-video" class="admission-video-bg">
            <source src="{{ asset('assets/jmpsss/image/Video_Generation_From_Logo_Name.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
        <div class="video-content-wrapper">
            <div class="video-admission-text">
                <span class="animated-label">Admissions 2026-27</span>
                <h1>Admission Open</h1>
                <p>Empowering the next generation with excellence in education.</p>
                <div class="video-cta-btns">
                    <a href="#" class="btn-enroll">Enroll Now</a>
                    <a href="#" class="btn-contact-video">Contact Us</a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Gradient Admission Section (removed - replaced by popup)
    <section class="admission-gradient-section">...</section>
    -->

    <!-- Footer -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle Logic
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mainNav = document.getElementById('mainNav');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const body = document.body;

    if (mobileMenuToggle && mainNav && mobileMenuOverlay) {
        mobileMenuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');
            body.classList.toggle('no-scroll');
            
            // Toggle hamburger icon if needed
            const icon = mobileMenuToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-xmark');
            }
        });

        mobileMenuOverlay.addEventListener('click', function() {
            mainNav.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            body.classList.remove('no-scroll');
            const icon = mobileMenuToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-xmark');
            }
        });
    }

    // Mobile Submenu Toggle
    const submenuToggles = document.querySelectorAll('.mobile-submenu-toggle');
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const parentLi = this.closest('.has-dropdown');
            if (parentLi) {
                parentLi.classList.toggle('active');
            }
        });
    });

    // Header Scroll Effect
    const bottomHeader = document.querySelector('.bottom-header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            bottomHeader.classList.add('scrolled');
        } else {
            bottomHeader.classList.remove('scrolled');
        }
    }, { passive: true });


    const items = document.querySelectorAll('.hero-item');
    if(items.length <= 1) return;

    let current = 0;
    const interval = 6000;

    function showSlide(index) {
        items.forEach(item => item.classList.remove('active'));
        items[index].classList.add('active');
        current = index;
    }

    function nextSlide() {
        let next = (current + 1) % items.length;
        showSlide(next);
    }

    function prevSlide() {
        let prev = (current - 1 + items.length) % items.length;
        showSlide(prev);
    }

    let slideTimer = setInterval(nextSlide, interval);

    const nextBtn = document.querySelector('.slider-next');
    const prevBtn = document.querySelector('.slider-prev');

    if(nextBtn) {
        nextBtn.addEventListener('click', () => {
            clearInterval(slideTimer);
            nextSlide();
            slideTimer = setInterval(nextSlide, interval);
        });
    }

    if(prevBtn) {
        prevBtn.addEventListener('click', () => {
            clearInterval(slideTimer);
            prevSlide();
            slideTimer = setInterval(nextSlide, interval);
        });
    }

    // Testimonial Scroller Sync
    const testimonialTrack = document.querySelector('.testimonial-slider-track');
    const testimonialDots = document.querySelectorAll('.testimonial-dots .dot');

    if (testimonialTrack && testimonialDots.length > 0) {
        // Dot Click Navigation
        testimonialDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                const width = testimonialTrack.offsetWidth;
                testimonialTrack.scrollTo({
                    left: index * width,
                    behavior: 'smooth'
                });
            });
        });

        // Scroll Sync
        testimonialTrack.addEventListener('scroll', () => {
            const width = testimonialTrack.offsetWidth;
            const scrollLeft = testimonialTrack.scrollLeft;
            const index = Math.round(scrollLeft / width);

            testimonialDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }, { passive: true });

        // Auto slide for Testimonials
        let testimonialInterval = setInterval(() => {
            const width = testimonialTrack.offsetWidth;
            const scrollLeft = testimonialTrack.scrollLeft;
            const maxScroll = testimonialTrack.scrollWidth - width;

            if (scrollLeft + 10 >= maxScroll) {
                testimonialTrack.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                testimonialTrack.scrollBy({ left: width, behavior: 'smooth' });
            }
        }, 8000);

        testimonialTrack.addEventListener('touchstart', () => clearInterval(testimonialInterval));
    }

    // Events Slider Logic (Mobile)
    const eventContainer = document.querySelector('.slider-container');
    const eventPrevBtn = document.querySelector('.slider-btn.prev');
    const eventNextBtn = document.querySelector('.slider-btn.next');

    if (eventContainer && eventPrevBtn && eventNextBtn) {
        // Calculate dynamic width of one card + gap
        const getCardWidth = () => {
            const card = eventContainer.querySelector('.event-card');
            return card ? card.offsetWidth + 15 : 300;
        };

        eventNextBtn.addEventListener('click', () => {
            eventContainer.scrollBy({ left: getCardWidth(), behavior: 'smooth' });
        });

        eventPrevBtn.addEventListener('click', () => {
            eventContainer.scrollBy({ left: -getCardWidth(), behavior: 'smooth' });
        });
    }

    // Features Slider Logic (Mobile)
    const featuresGrid = document.querySelector('.features-grid');
    const featureDots = document.querySelectorAll('.feature-dot');

    if (featuresGrid && featureDots.length > 0) {
        window.scrollToFeature = (index) => {
            const card = featuresGrid.querySelector('.feature-card');
            if(!card) return;
            const cardWidth = card.offsetWidth;
            featuresGrid.scrollTo({
                left: index * cardWidth,
                behavior: 'smooth'
            });
        };

        featuresGrid.addEventListener('scroll', () => {
            const card = featuresGrid.querySelector('.feature-card');
            if(!card) return;
            const cardWidth = card.offsetWidth;
            const scrollLeft = featuresGrid.scrollLeft;
            const index = Math.round(scrollLeft / cardWidth);

            featureDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }, { passive: true });

        // Auto slide for Why Choose Us (Mobile)
        let featureInterval;
        function startFeatureAuto() {
            if(window.innerWidth <= 480) {
                featureInterval = setInterval(() => {
                    const card = featuresGrid.querySelector('.feature-card');
                    if(!card) return;
                    const cardWidth = card.offsetWidth;
                    const scrollLeft = featuresGrid.scrollLeft;
                    const totalWidth = featuresGrid.scrollWidth;
                    
                    if (scrollLeft + cardWidth >= totalWidth - 5) {
                        featuresGrid.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        featuresGrid.scrollBy({ left: cardWidth, behavior: 'smooth' });
                    }
                }, 5000);
            }
        }
        startFeatureAuto();
        
        // Pause on touch
        featuresGrid.addEventListener('touchstart', () => clearInterval(featureInterval));
        featuresGrid.addEventListener('touchend', () => {
            clearInterval(featureInterval);
            startFeatureAuto();
        });
    }
});
</script>
@endpush
@endsection
