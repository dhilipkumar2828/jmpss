@extends('layouts.app')
@section('title', 'Curriculum - JMPSSS')

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
            background: url('{{ asset('assets/jmpsss/image/new/slider3.jpg') }}') center/cover no-repeat;
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

        .check-list {
            list-style: none;
            margin-top: 25px;
        }

        .check-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 15.5px;
            color: #555;
            line-height: 1.5;
        }

        .check-list li i {
            color: #e14c1e;
            margin-top: 4px;
            font-size: 14px;
        }
</style>
@endpush

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">Academics</span>
            <h1>Curriculum</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="#">Academics</a><span>›</span>
                Active Curriculum
            </nav>
        </div>
    </section>

    <!-- Overview Content -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">

                <!-- Left: Content -->
                <div class="sc-content">
                    <div class="sc-eyebrow">Our Approach</div>
                    <h2 class="sc-title">Global Standards with <br><span>Local Values</span></h2>

                    <p class="sc-text lead">The School follows the curriculum evolved by the Central Board of Secondary
                        Education.</p>

                    <p class="sc-text">The syllabus is constantly evolving and is hailed as one of the best among the
                        School programs worldwide. English literary club has conducted various competitions and
                        activities to improve skills in listening, speaking, reading and writing.</p>

                    <p class="sc-text">As far as the learning strategies are concerned <strong>‘Learning by
                            doing’</strong> is the principle which forms the basis of the new education policy.</p>

                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check"></i> Sets clear learning objectives in English,
                            Mathematics and Science.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Focuses on developing knowledge and skills in core
                            subjects.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Provides a Natural Progression throughout the years
                            of primary education.</li>
                        <li><i class="fa-solid fa-circle-check"></i> Compatible with other curriculum and
                            internationally relevant.</li>
                    </ul>
                </div>

                <!-- Right: Visual -->
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/new/CURRICULUM.jpg') }}" alt="Students Learning" class="sc-img">
                </div>

            </div>
        </div>
    </section>

    <!-- Interactive Curriculum Details -->
    <section class="curriculum-interactive section-padding bg-light">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">Stages of Development</span>
                <h2 class="section-title">The JMPSSS Academic Plan</h2>
            </div>

            <div class="timeline-container">
                <!-- Kids -->
                <div class="timeline-item">
                    <div class="timeline-dot bg-primary"></div>
                    <div class="timeline-content">
                        <div class="curriculum-stage-card">
                            <div class="stage-icon">
                                <i class="fa-solid fa-child-reaching"></i>
                            </div>
                            <div class="stage-details">
                                <h3>KIDS</h3>
                                <p>A foundational stage focusing on early development, creativity, and soft skills.</p>
                                <ul class="check-list" style="margin-top: 15px;">
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> World Class Curriculum & Quality Education
                                    </li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Child Initiated Learning Methodology</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Effective Soft Skills Programme</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Theme based tablon panel</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Technology Based Learning & CCTV Monitoring
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-image-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/CURRICULUM1.avif') }}" alt="Kids Activity">
                    </div>
                </div>


                <!-- Champs -->
                <div class="timeline-item right-timeline">
                    <div class="timeline-dot bg-secondary"></div>
                    <div class="timeline-content">
                        <div class="curriculum-stage-card">
                            <div class="stage-icon">
                                <i class="fa-solid fa-medal"></i>
                            </div>
                            <div class="stage-details">
                                <h3>CHAMPS</h3>
                                <p>A platform to the young buddies to blossom tomorrow with flying colors of
                                    achievement.</p>
                                <ul class="check-list" style="margin-top: 15px;">
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Curriculum on par with international standards
                                    </li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Student friendly activity-oriented approach
                                    </li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Problem-Solving & Analytical abilities
                                        activities</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Abacus to develop mental arithmetic
                                        capabilities</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Interactive video conference sessions</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-image-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/CURRICULUM2.jpg') }}" alt="Champs Activity">
                    </div>
                </div>


                <!-- IIT & NEET -->
                <div class="timeline-item">
                    <div class="timeline-dot bg-primary"></div>
                    <div class="timeline-content">
                        <div class="curriculum-stage-card">
                            <div class="stage-icon">
                                <i class="fa-solid fa-microscope"></i>
                            </div>
                            <div class="stage-details">
                                <h3>IIT & NEET</h3>
                                <p>Rigorous preparation and systematic analysis to crack the toughest competitive exams.
                                </p>
                                <ul class="check-list" style="margin-top: 15px;">
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> 1:15 teacher-student ratio for core subjects
                                    </li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> 1+1 academic sessions (Teaching + Working)
                                    </li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Common Micro Schedule & Result Analysis</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> CDF Exam & Error Rectification sessions</li>
                                    <li style="font-size: 14.5px;"><i class="fa-solid fa-circle-check"
                                            style="font-size: 13px;"></i> Viva based term wise projects & LSDP</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-image-wrapper">
                        <img src="{{ asset('assets/jmpsss/image/new/CURRICULM3.jpg') }}" alt="IIT NEET Prep">
                    </div>
                </div>


            </div>

            <div class="curriculum-extra-banner mt-50">
                <div class="banner-content">
                    <h3>Beyond The Classroom</h3>
                    <p>Integrative learning approach combining academics with physical education, visual arts,
                        performing arts, and moral science to ensure well-rounded development.</p>
                </div>
                <div class="banner-action">
                    <a href="#" class="btn-primary btn-outline-white"><i class="fa-solid fa-download"></i> Syllabus
                        PDF</a>
                </div>
            </div>
        </div>
    </section>
@endsection


