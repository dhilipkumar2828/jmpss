@extends('layouts.app')
@section('title', 'Awards - JMPSSS')

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
            background: url('{{ asset('assets/jmpsss/image/new/slider1.jpg') }}') center/cover no-repeat;
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
            <h1>Awards & Achievements</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="#">Academics</a><span>›</span>
                Awards
            </nav>
        </div>
    </section>

    <!-- Intro Content (New Main Section Shape) -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">
                <div class="sc-content">
                    <div class="sc-eyebrow">Celebrating Excellence</div>
                    <h2 class="sc-title">A Legacy of <span>Achievements</span></h2>
                    <p class="sc-text lead">At JMPSSS, we believe in recognizing and nurturing the unique talents of
                        every student, celebrating their hard work and dedication.</p>
                    <p class="sc-text">Our journey is marked by numerous accolades in academics, sports, arts, and
                        community service. These awards are a testament to the combined efforts of our students,
                        teachers, and parents in building a culture of excellence.</p>
                    <p class="sc-text">Explore our 'Wall of Fame' below to see the honors that define our institutional
                        standard and inspire our future generations.</p>
                </div>
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/new/award1.jpg') }}" alt="Awards" class="sc-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Awards Gallery -->
    <section class="awards-details section-padding bg-light" style="padding-top: 60px;">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">Wall of Fame</span>
                <h2 class="section-title">Our Recent Recognition</h2>
            </div>


            <div class="awards-gallery-grid mt-50">
                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/award1.jpg') }}" alt="Best School in District">
                        <div class="award-overlay">
                            <i class="fa-solid fa-trophy popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">2024</span>
                        <h3>Best School in District</h3>
                        <p>Total excellence in academics & infrastructure</p>
                    </div>
                </div>

                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/award2.jpg') }}" alt="Sports Championship">
                        <div class="award-overlay">
                            <i class="fa-solid fa-medal popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">2025</span>
                        <h3>Sports Championship</h3>
                        <p>Inter-School Zonal Athletics Meet Winners</p>
                    </div>
                </div>

                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/school22.jpg') }}" alt="Green Campus Award">
                        <div class="award-overlay">
                            <i class="fa-solid fa-leaf popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">2023</span>
                        <h3>Green Campus Award</h3>
                        <p>Extensive eco-friendly environment practices</p>
                    </div>
                </div>

                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/award2.jpg') }}" alt="100% Board Results">
                        <div class="award-overlay">
                            <i class="fa-solid fa-award popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">Consistent</span>
                        <h3>100% Board Results</h3>
                        <p>Flawless record in Grade 10 & 12 CBSE exams</p>
                    </div>
                </div>

                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/award1.jpg') }}" alt="National Science Fair">
                        <div class="award-overlay">
                            <i class="fa-solid fa-flask popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">2024</span>
                        <h3>National Science Fair</h3>
                        <p>Student Science Innovation Expo runners-up</p>
                    </div>
                </div>

                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/school22.jpg') }}" alt="Cultural Excellence">
                        <div class="award-overlay">
                            <i class="fa-solid fa-palette popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year">2025</span>
                        <h3>Cultural Excellence</h3>
                        <p>Top honors at the State Arts Festival</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


