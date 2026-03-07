@extends('layouts.app')
@section('title', 'JMPSSS | Jaypee Model Senior Secondary School')

@section('content')
<!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <img src="{{ asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Academic Excellence" class="hero-bg">
        <div class="hero-content">
            <h1>ACADEMIC EXCELLENCE</h1>
            <div class="breadcrumbs">
                <a href="#">Home</a> | <a href="#">Learning at JMPSSS</a> | <a href="#" class="active">Academic
                    Excellence</a>
            </div>
        </div>
    </section>

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
                <span class="section-subtitle">About Us</span>
                <h2 class="section-title-alt">Empowering Students Through Holistic Education</h2>
                <p>Jaypee Model Senior Secondary School is dedicated to fostering an environment where academic rigor
                    and holistic commitment go hand-in-hand. We believe in nurturing not just the intellect, but the
                    character of every student.</p>
                <ul class="about-feature-list">
                    <li><i class="fa-solid fa-circle-check"></i> Experienced & Dedicated Faculty</li>
                    <li><i class="fa-solid fa-circle-check"></i> State-of-the-Art Learning Infrastructure</li>
                    <li><i class="fa-solid fa-circle-check"></i> Comprehensive Co-curricular Programs</li>
                </ul>
                <a href="{{ route('about') }}" class="btn-primary mt-30">Discover More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

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
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="Event 1">
                            <div class="event-date">12 <span>Oct</span></div>
                        </div>
                        <div class="event-info">
                            <h3>Transfer of School Grants</h3>
                            <p>Significant progress made in the allocation and transfer of essential school development
                                grants for better facilities.</p>
                        </div>
                    </div>
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="{{ asset('assets/jmpsss/image/img02.jpg') }}" alt="Event 2">
                            <div class="event-date">25 <span>Nov</span></div>
                        </div>
                        <div class="event-info">
                            <h3>Annual Sports Day Excellence</h3>
                            <p>Celebrating the remarkable athletic achievements and sportsmanship demonstrated by our
                                talented students.</p>
                        </div>
                    </div>
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="{{ asset('assets/jmpsss/image/img03.jpg') }}" alt="Event 3">
                            <div class="event-date">05 <span>Dec</span></div>
                        </div>
                        <div class="event-info">
                            <h3>Science Exhibition 2024</h3>
                            <p>Showcasing innovative scientific models and research projects created by our curious
                                young minds.</p>
                        </div>
                    </div>
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="{{ asset('assets/jmpsss/image/img04.jpg') }}" alt="Event 4">
                            <div class="event-date">10 <span>Jan</span></div>
                        </div>
                        <div class="event-info">
                            <h3>Academic Toppers Award</h3>
                            <p>Recognizing the dedication and hard work of our top-performing students in the recent
                                board examinations.</p>
                        </div>
                    </div>
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
                        <!-- Testimonial 1 -->
                        <div class="testimonial-item active">
                            <div class="testimonial-content-area">
                                <h3 class="testimonial-author">Ronald Richards</h3>
                                <p class="testimonial-role">Student Parent</p>
                                <p class="testimonial-quote">The quality of teaching staff and disciplined atmosphere at
                                    JMPSSS helped my child improve academically and personally.</p>
                                <div class="testimonial-stars">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content-area">
                                <h3 class="testimonial-author">Jane Cooper</h3>
                                <p class="testimonial-role">Mother of Grade 5 Student</p>
                                <p class="testimonial-quote">The focus on holistic development and extra-curricular
                                    activities ensured my daughter grew into a confident individual.</p>
                                <div class="testimonial-stars">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 3 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content-area">
                                <h3 class="testimonial-author">Robert Fox</h3>
                                <p class="testimonial-role">Father of Grade 10 Student</p>
                                <p class="testimonial-quote">JMPSSS provides the perfect balance between traditional
                                    values and modern educational technology. Exceptional experience!</p>
                                <div class="testimonial-stars">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-dots-wrapper">
                        <div class="testimonial-dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
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
@endsection


