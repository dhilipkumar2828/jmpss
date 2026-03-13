@extends('layouts.app')
@section('title', 'Admissions - JMPSSS')

@push('styles')
<style>
/* ── Page Hero ── */
        .page-hero {
            position: relative;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .page-hero-bg {
            position: absolute;
            inset: 0;
            background: url('{{ asset('assets/jmpsss/image/new/slider2.jpg') }}') center/cover no-repeat;
            z-index: 0;
        }

        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 72, 0, 0.5);
        }

        .page-hero-content {
            position: relative;
            z-index: 1;
        }

        .page-hero-content .page-label {
            display: inline-block;
            background: rgba(225, 76, 30, 0.9);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 20px;
            border-radius: 30px;
            margin-bottom: 18px;
        }

        .page-hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 16px;
            font-family: 'Outfit', sans-serif;
        }

        .breadcrumb-trail {
            font-size: 14px;
            opacity: 0.85;
        }

        .breadcrumb-trail a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb-trail a:hover {
            color: #e14c1e;
        }

        .breadcrumb-trail span {
            margin: 0 8px;
            opacity: 0.6;
        }

        /* ── Our Story (Classic Overlap) ── */
        .story-classic {
            padding: 100px 0 60px;
            background: #fff;
            position: relative;
        }

        .story-classic-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 70px;
            align-items: center;
        }

        .sc-content {
            padding-right: 20px;
        }

        .sc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 700;
            color: #e14c1e;
            margin-bottom: 20px;
        }

        .sc-eyebrow::before {
            content: '';
            width: 40px;
            height: 2px;
            background: #e14c1e;
        }

        .sc-title {
            font-size: 48px;
            font-weight: 700;
            color: #111;
            font-family: 'Outfit', sans-serif;
            line-height: 1.15;
            margin-bottom: 28px;
        }

        .sc-title span {
            color: #004800;
            position: relative;
        }

        .sc-text {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .sc-text.lead {
            font-size: 18px;
            color: #333;
            font-weight: 500;
            border-left: 3px solid #e14c1e;
            padding-left: 18px;
        }

        .sc-visual {
            position: relative;
            padding-right: 30px;
            padding-bottom: 30px;
        }

        .sc-visual::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 80%;
            height: 90%;
            background: #e6f0e6;
            border-radius: 24px;
            z-index: 0;
        }

        .sc-img {
            width: 100%;
            border-radius: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            display: block;
        }
</style>
@endpush

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">Academics</span>
            <h1>Admissions</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="#">Academics</a><span>›</span>
                Admissions
            </nav>
        </div>
    </section>

    <!-- Intro Content (New Main Section Shape) -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">
                <div class="sc-content">
                    <div class="sc-eyebrow">Join Our Community</div>
                    <h2 class="sc-title">Your Child's <span>Future</span> Starts Here</h2>
                    <p class="sc-text lead">Experience a seamless admission process designed to welcome your family into
                        the JMPSSS community with open arms.</p>
                    <p class="sc-text">We believe in nurturing every child's potential. Our admissions for the 2026-27
                        academic year are now open for Pre-KG through Grade XII. We invite you to explore our campus and
                        meet our dedicated educators.</p>
                    <p class="sc-text">Follow the simple steps below to begin the journey towards academic excellence
                        and holistic growth for your child.</p>
                </div>
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/new/school22.jpg') }}" alt="Students" class="sc-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Admissions Process Steps -->
    <section class="admissions-details section-padding bg-light" style="padding-top: 60px;">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">The Journey</span>
                <h2 class="section-title">Admission Process 2026-27</h2>
            </div>

            <div class="grid-2 admissions-grid mt-50">
                <div class="admission-steps">

                    <h3>How to Apply</h3>
                    <div class="step-card">
                        <div class="step-num">1</div>
                        <div class="step-info">
                            <h4>Apply Online</h4>
                            <p>Fill out our comprehensive online registration form to begin the admission process.</p>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-num">2</div>
                        <div class="step-info">
                            <h4>Visit School Campus</h4>
                            <p>Take a tour of our state-of-the-art facilities and meet with our academic counselors.</p>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-num">3</div>
                        <div class="step-info">
                            <h4>Physical Form & Fees</h4>
                            <p>Submit the signed physical application form along with the required admission fees to
                                secure the seat.</p>
                        </div>
                    </div>
                </div> <!-- Close admission-steps -->

                <div class="admission-form-wrapper">
                    <div class="admission-form-card">
                        <h3>Admission Enquiry</h3>
                        <form method="POST" action="{{ route('admission.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="student_name" placeholder="Child's Name" required>
                            </div>
                            <div class="form-group grid-2" style="gap: 15px;">
                                <input type="text" name="dob" placeholder="Date of Birth (DD/MM/YYYY)" onfocus="(this.type='date')"
                                    required>
                                <select name="grade_applying" required>
                                    <option value="" disabled selected>Applying For</option>
                                    <option value="kg">Kindergarten (KG)</option>
                                    <option value="primary">Primary (1-5)</option>
                                    <option value="middle">Middle (6-8)</option>
                                    <option value="secondary">Secondary (9-10)</option>
                                    <option value="senior">Senior Secondary (11-12)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="parent_name" placeholder="Parent's/Guardian's Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Parent's Email Address" required>
                            </div>
                            <div class="form-group grid-2" style="gap: 15px;">
                                <input type="tel" name="mobile" placeholder="Phone Number" required>
                                <input type="tel" name="whatsapp" placeholder="WhatsApp Number">
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Parent's Note / Full Address" rows="3"
                                    style="width: 100%; padding: 15px; border: 1px solid #e0e6ed; border-radius: 10px; font-family: inherit; font-size: 15px;"></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-100">Apply Now <i class="fa-solid fa-paper-plane"
                                    style="margin-left: 8px;"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose JMPSSS -->
    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle"
                    style="display: block; color: var(--secondary-color); font-weight: 600; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 10px;">Discover
                    the Difference</span>
                <h2 class="section-title" style="margin-bottom: 0;">Why Choose JMPSSS?</h2>
            </div>

            <div class="why-slider-wrapper">
                <button class="why-slider-btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                <div class="why-slider">

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Academic Excellence</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">A rigorous CBSE curriculum designed
                            to foster critical thinking, problem-solving, and a lifelong love of learning.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--secondary-color);">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Modern Facilities</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">State-of-the-art science labs,
                            computer centers, and smartly equipped classrooms for interactive learning.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Holistic Development</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">Emphasis on sports, arts, and
                            extracurricular activities to nurture physical, mental, and emotional growth.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--secondary-color);">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Safe & Secure Campus</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">24/7 CCTV surveillance and dedicated
                            security personnel ensuring complete safety for your child.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-bus"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Extensive Transport</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">A well-maintained fleet of buses
                            covering 40+ routes with trained drivers and attendants.</p>
                    </div>

                </div>
                <button class="why-slider-btn next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
@endsection


