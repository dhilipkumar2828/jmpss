@extends('layouts.app')
@section('title', 'Home – Jeeva Memorial Public Senior Secondary School')

@push('styles')
    <style>
        /* Hero Section */
        .hero {
            height: 90vh;
            min-height: 700px;
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url("{{ asset('home/hero_primary.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            /* Parallax effect */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 40px 24px;
            overflow: hidden;
        }

        .hero-content {
            max-width: 900px;
        }

        .hero h1 {
            font-size: clamp(3.5rem, 7vw, 5rem);
            margin-bottom: 24px;
            line-height: 1.1;
            letter-spacing: -0.02em;
            font-weight: 800;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 48px;
            font-weight: 400;
            opacity: 0.95;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        /* About Section */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--gap-lg);
            align-items: center;
        }

        .about-visuals {
            position: relative;
            padding-right: 30px;
            padding-bottom: 30px;
        }

        .about-visuals::before {
            content: '';
            position: absolute;
            top: 60px;
            left: 60px;
            right: 0;
            bottom: 0;
            background: var(--primary);
            opacity: 0.1;
            z-index: 0;
            border-radius: var(--radius);
        }

        .about-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 12px;
            background: white;
            position: relative;
            z-index: 1;
        }

        .about-content {
            padding-left: 50px;
            border-left: 4px solid var(--primary);
        }

        .about-content h2 {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 30px;
            line-height: 1.25;
            letter-spacing: -0.01em;
        }

        .about-content p {
            font-size: 16px;
            color: var(--text-muted);
            margin-bottom: 24px;
            line-height: 1.8;
            font-weight: 400;
        }

        /* Academic Framework */
        .framework-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .framework-card {
            background: white;
            border: 1px solid var(--border);
            padding: 56px 40px;
            text-align: center;
            transition: var(--transition);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        .framework-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-premium);
            border-color: transparent;
        }

        .framework-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: var(--accent);
            transition: width 0.4s var(--ease);
        }

        .framework-card:hover::after {
            width: 100%;
        }

        .framework-card i {
            font-size: 40px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .framework-card h3 {
            font-size: 22px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .framework-card p {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* Achievements */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .stat-box strong {
            display: block;
            font-size: 64px;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            margin-bottom: 12px;
            line-height: 1;
            font-weight: 800;
        }

        .stat-box span {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--text-muted);
            font-weight: 700;
            display: block;
        }

        /* Leadership */
        .leadership-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .leader-card {
            background: white;
            border: 1px solid var(--border);
            padding: 56px;
            display: flex;
            gap: var(--gap-md);
            box-shadow: var(--shadow-subtle);
            transition: var(--transition);
            align-items: center;
            position: relative;
        }

        .leader-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-premium);
            border-color: rgba(20, 90, 50, 0.2);
        }

        .leader-card.principal {
            border-left: 5px solid var(--primary);
            transform: scale(1.02);
            z-index: 2;
        }

        .leader-card.principal:hover {
            transform: scale(1.02) translateY(-10px);
        }

        .leader-img {
            width: 140px;
            height: 180px;
            object-fit: cover;
            border-radius: var(--radius);
            flex-shrink: 0;
            border: 1px solid var(--border);
            padding: 4px;
            background: white;
        }

        .leader-info h3 {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 8px;
            letter-spacing: -0.01em;
        }

        .leader-info .designation {
            font-size: 13px;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
        }

        .leader-info p {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 24px;
            font-style: italic;
            line-height: 1.7;
        }

        .leader-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
        }

        /* Gallery */
        .gallery-2x2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 20px;
        }

        .gallery-box {
            position: relative;
            height: 350px;
            overflow: hidden;
            border-radius: var(--radius);
        }

        .gallery-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(40%);
            transition: var(--transition);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(20, 90, 50, 0.75);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: 0;
            transition: all 0.4s ease;
            backdrop-filter: blur(2px);
        }

        .gallery-overlay h4 {
            font-size: 20px;
            transform: translateY(20px);
            transition: var(--transition);
            font-weight: 500;
        }

        .gallery-box:hover img {
            transform: scale(1.1);
            filter: grayscale(0);
        }

        .gallery-box:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-box:hover .gallery-overlay h4 {
            transform: translateY(0);
        }

        /* Admissions CTA */
        .admissions-cta {
            background: radial-gradient(circle at center, #1a713f 0%, var(--primary) 100%);
            color: white;
            text-align: center;
            padding: 120px 24px;
            position: relative;
            overflow: hidden;
        }

        .admissions-cta h2 {
            font-size: 48px;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        .admissions-cta p {
            font-size: 18px;
            max-width: 650px;
            margin: 0 auto 50px;
            opacity: 0.95;
            line-height: 1.6;
        }

        .cta-btns {
            display: flex;
            justify-content: center;
            gap: 24px;
        }

        @media (max-width: 768px) {

            .about-grid,
            .leadership-grid,
            .gallery-2x2,
            .framework-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .leader-card {
                flex-direction: column;
                text-align: center;
            }

            .leader-img {
                margin: 0 auto;
            }

            .about-content {
                padding-left: 0;
                border-left: none;
                border-top: 4px solid var(--primary);
                padding-top: 20px;
            }
        }
    </style>
@endpush

@section('content')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content reveal reveal-scale" data-reveal-once>
            <h1>Defining the <br>Heritage of Excellence</h1>
            <p>A CBSE Senior Secondary School committed to academic rigor, character development, and shaping global
                leaders since 1985.</p>
            <div class="cta-btns">
                <a href="{{ route('admissions') }}" class="btn-outline-white">Admissions Open 2026</a>
                <a href="{{ route('about') }}" class="btn-outline-white">Our Heritage</a>
            </div>
        </div>
    </section>

    <!-- QUICK ACTIONS (Eduka Style) -->
    <section style="background: var(--bg); padding-bottom: 0;">
        <div class="container action-flex">
            <a href="{{ route('admissions') }}" class="action-card reveal reveal-scale" data-reveal-once
                data-reveal-delay="0">
                <i class="fas fa-file-signature"></i>
                <h4>Apply Now</h4>
            </a>
            <a href="{{ route('disclosure') }}" class="action-card reveal reveal-scale" data-reveal-once
                data-reveal-delay="100">
                <i class="fas fa-search-dollar"></i>
                <h4>Fee Structure</h4>
            </a>
            <a href="{{ route('results') }}" class="action-card reveal reveal-scale" data-reveal-once
                data-reveal-delay="200">
                <i class="fas fa-chart-bar"></i>
                <h4>Results 2024</h4>
            </a>
            <a href="{{ route('contact') }}" class="action-card reveal reveal-scale" data-reveal-once
                data-reveal-delay="300">
                <i class="fas fa-map-marked-alt"></i>
                <h4>Visit Campus</h4>
            </a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="section">
        <div class="container about-grid">
            <div class="about-visuals reveal reveal-left" data-reveal-once>
                <img src="{{ asset('home/about_campus.jpg') }}" alt="JMPSS Campus" class="about-img">
            </div>
            <div class="about-content reveal reveal-right" data-reveal-once>
                <h2>Inspiring Wisdom <br>Across Generations</h2>
                <p>Welcome to Jeeva Memorial Public Senior Secondary School, a premier academic institution where tradition
                    meets modern excellence. Our mission is to provide a structured yet nurturing environment that empowers
                    every child to reach their full potential.</p>
                <p>With a legacy spanning over three decades, we remain steadfast in our commitment to the values of
                    integrity, discipline, and scholarly achievement.</p>
            </div>
        </div>
    </section>

    <!-- ACADEMIC STRUCTURE -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title">
                <h2>Academic Framework</h2>
                <div class="divider-center"></div>
            </div>
            <div class="framework-grid">
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="0">
                    <div class="organic-frame" style="width: 120px; height: 120px; margin-bottom: 25px;">
                        <img src="{{ asset('home/gallery_1.jpg') }}" alt="Primary"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3>Primary Wing</h3>
                    <p>Foundation level education focusing on key literacy, numeracy, and cognitive development in a joyful
                        environment.</p>
                </div>
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="150">
                    <i class="fas fa-book-reader" style="font-size: 40px; margin-bottom: 25px; color: var(--primary);"></i>
                    <h3>Middle School</h3>
                    <p>Building analytical skills and subject-matter expertise while encouraging independence and personal
                        growth.</p>
                </div>
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="300">
                    <i class="fas fa-user-graduate"
                        style="font-size: 40px; margin-bottom: 25px; color: var(--primary);"></i>
                    <h3>Senior Secondary</h3>
                    <p>Advanced curricula designed to prepare students for higher university education and competitive
                        global challenges.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ACHIEVEMENTS SECTION -->
    <section class="section">
        <div class="container stats-grid">
            <div class="stat-box reveal" data-reveal-once data-reveal-delay="0">
                <strong class="stat-number" data-target="1500" data-suffix="+">0</strong>
                <span>Active Students</span>
            </div>
            <div class="stat-box reveal" data-reveal-once data-reveal-delay="100">
                <strong class="stat-number" data-target="85" data-suffix="">0</strong>
                <span>Expert Faculty</span>
            </div>
            <div class="stat-box reveal" data-reveal-once data-reveal-delay="200">
                <strong class="stat-number" data-target="100" data-suffix="%">0</strong>
                <span>Result Rate</span>
            </div>
            <div class="stat-box reveal" data-reveal-once data-reveal-delay="300">
                <strong class="stat-number" data-target="30" data-suffix="+">0</strong>
                <span>National Awards</span>
            </div>
        </div>
    </section>

    <!-- LEADERSHIP SECTION -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Institutional Leadership</h2>
                <div class="divider-center"></div>
            </div>
            <div class="leadership-grid">
                <!-- Principal Card -->
                <div class="leader-card principal reveal reveal-left" data-reveal-once data-reveal-delay="0">
                    <img src="{{ asset('home/hero_primary.jpg') }}" alt="Principal" class="leader-img">
                    <div class="leader-info">
                        <h3>{{ $principal->name ?? 'Dr. Elizabeth George' }}</h3>
                        <div class="designation">Principal, JMPSS</div>
                        <p>{{ Str::limit($principal->content ?? 'Our commitment to academic excellence remains the cornerstone of our identity...', 120) }}
                        </p>
                        <a href="#" class="leader-link">Read Full Message <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Correspondent Card -->
                <div class="leader-card reveal reveal-right" data-reveal-once data-reveal-delay="200">
                    <img src="{{ asset('home/about_campus.jpg') }}" alt="Correspondent" class="leader-img">
                    <div class="leader-info">
                        <h3>{{ $correspondent->name ?? 'Shri. M. Jayakumar' }}</h3>
                        <div class="designation">Correspondent</div>
                        <p>{{ Str::limit($correspondent->content ?? 'JMPSS was founded with a singular vision – to provide world-class education to every child...', 120) }}
                        </p>
                        <a href="#" class="leader-link">Read Full Message <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CAMPUS GALLERY -->
    <section class="section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Campus Infrastructure</h2>
                <div class="divider-center"></div>
            </div>
            <div class="gallery-2x2">
                <div class="gallery-box">
                    <img src="{{ asset('home/gallery_1.jpg') }}" alt="Infrastructure">
                    <div class="gallery-overlay">
                        <h4>Modern Classrooms</h4>
                    </div>
                </div>
                <div class="gallery-box">
                    <img src="{{ asset('home/gallery_2.jpg') }}" alt="Labs">
                    <div class="gallery-overlay">
                        <h4>Science Laboratory</h4>
                    </div>
                </div>
                <div class="gallery-box">
                    <img src="{{ asset('home/gallery_3.jpg') }}" alt="Library">
                    <div class="gallery-overlay">
                        <h4>Central Library</h4>
                    </div>
                </div>
                <div class="gallery-box">
                    <img src="{{ asset('home/gallery_4.jpg') }}" alt="Sports">
                    <div class="gallery-overlay">
                        <h4>Sports Arena</h4>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ route('infrastructure') }}" class="btn-outline-accent">Explore Campus Facilities</a>
            </div>
        </div>
    </section>

    <!-- NEWS & TIMELINE (Valer Influence) -->
    <section class="section section-light">
        <div class="container">
            <div class="grid" style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 80px;">
                <div class="reveal reveal-left" data-reveal-once>
                    <div class="section-title" style="text-align: left; margin-bottom: 50px;">
                        <h2 style="font-size: 32px;">Institutional News</h2>
                        <div class="divider-center" style="margin: 15px 0 0 0;"></div>
                    </div>
                    <div class="info-card"
                        style="padding: 40px; display: flex; gap: 30px; align-items: center; margin-bottom: 30px;">
                        <div class="organic-frame" style="width: 180px; height: 180px; flex-shrink: 0;">
                            <img src="{{ asset('home/about_campus.jpg') }}" alt="Award"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <span class="timeline-date">March 1, 2026</span>
                            <h3 style="margin-top: 0; font-size: 22px; color: var(--primary); margin-bottom: 15px;">
                                Achievement in Scholarly Excellence</h3>
                            <p style="font-size: 15px; margin-bottom: 15px;">JMPSS has been recognized for its outstanding
                                performance in the NCERT 2025 Framework audit.</p>
                            <a href="{{ route('news') }}"
                                style="color: var(--accent); font-weight: 700; font-size: 13px; text-transform: uppercase;">Read
                                Story</a>
                        </div>
                    </div>
                </div>

                <div class="reveal reveal-right" data-reveal-once>
                    <div class="section-title" style="text-align: left; margin-bottom: 50px;">
                        <h2 style="font-size: 32px;">Upcoming Events</h2>
                        <div class="divider-center" style="margin: 15px 0 0 0;"></div>
                    </div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <span class="timeline-date">Mar 15, 2026</span>
                            <h4 style="color: var(--primary); margin-bottom: 5px;">Annual Academic Exhibition</h4>
                            <p style="font-size: 14px; margin-bottom: 0;">Showcasing student research projects and
                                scientific models.</p>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-date">Apr 02, 2026</span>
                            <h4 style="color: var(--primary); margin-bottom: 5px;">Inter-School Sports Meet</h4>
                            <p style="font-size: 14px; margin-bottom: 0;">Hosted at the JMPSS Arena with over 20
                                participating institutions.</p>
                        </div>
                        <div class="timeline-item" style="margin-bottom: 0;">
                            <span class="timeline-date">Apr 10, 2026</span>
                            <h4 style="color: var(--primary); margin-bottom: 5px;">Founder's Day Celebration</h4>
                            <p style="font-size: 14px; margin-bottom: 0;">Celebrating 41 years of academic and cultural
                                heritage.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CBSE DISCLOSURE PREVIEW -->
    <section class="section">
        <div class="container">
            <div class="info-card reveal reveal-scale" data-reveal-once
                style="background: var(--primary); color: white; display: flex; justify-content: space-between; align-items: center; padding: 60px;">
                <div style="max-width: 600px;">
                    <h2 style="color: white; margin-bottom: 15px;">Mandatory Public Disclosure</h2>
                    <p style="color: rgba(255,255,255,0.8); margin-bottom: 0;">In compliance with CBSE regulatory
                        requirements, JMPSS provides transparent access to statutory certificates, infrastructure details,
                        and academic results.</p>
                </div>
                <a href="{{ route('disclosure') }}" class="btn-outline-white">View Full Disclosure</a>
            </div>
        </div>
    </section>

    <!-- ADMISSIONS CTA SECTION -->
    <section class="admissions-cta">
        <div class="container">
            <h2>Admissions Open for 2026–27</h2>
            <p>Secure your child's seat in an environment dedicated to scholarly growth and ethical values. Limited seats
                available for the upcoming academic year.</p>
            <div class="cta-btns">
                <a href="{{ route('admissions') }}" class="btn-outline-white">Admission Process</a>
                <a href="{{ route('contact') }}" class="btn-outline-white">Enquire Now</a>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Parallax Hero Effect
            const hero = document.querySelector('.hero');
            window.addEventListener('scroll', () => {
                const scrollPos = window.scrollY;
                if (scrollPos < window.innerHeight) {
                    hero.style.backgroundPositionY = `${scrollPos * 0.5}px`;
                }
            }, {
                passive: true
            });
            const countUp = (el) => {
                const target = parseInt(el.getAttribute('data-target'));
                const suffix = el.getAttribute('data-suffix') || '';
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        clearInterval(timer);
                        el.innerText = target + suffix;
                    } else {
                        el.innerText = Math.floor(current) + suffix;
                    }
                }, 16);
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        countUp(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            document.querySelectorAll('.stat-number').forEach(num => observer.observe(num));
        </script>
    @endpush
@endsection
