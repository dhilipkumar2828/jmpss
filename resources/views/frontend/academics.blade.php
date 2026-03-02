@extends('layouts.app')
@section('title', 'Academic Framework – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Academic Excellence</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Academics</li>
            </ul>
        </div>
    </section>

    <!-- Curricula Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Our Scholarly Tiers</h2>
                <div class="divider-center"></div>
            </div>

            <div class="grid"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; margin-top: 60px;">
                <!-- Primary -->
                <div class="info-card reveal reveal-left" data-reveal-once>
                    <div style="color: var(--accent); font-size: 32px; margin-bottom: 20px;"><i class="fas fa-seedling"></i>
                    </div>
                    <h3 style="margin-top: 0; font-size: 24px;">Primary Foundation</h3>
                    <p>Our primary curriculum emphasizes core literacy and numeracy through experiential learning. We foster
                        a "spirit of inquiry" that serves as the foundation for all future academic pursuits.</p>
                    <ul class="footer-links" style="color: var(--text-muted); padding-left: 0; margin-top: 20px;">
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Language Mastery</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Mathematical Logic</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Value Education</li>
                    </ul>
                </div>

                <!-- Secondary -->
                <div class="info-card reveal reveal-scale" data-reveal-once data-reveal-delay="150">
                    <div style="color: var(--accent); font-size: 32px; margin-bottom: 20px;"><i
                            class="fas fa-microscope"></i></div>
                    <h3 style="margin-top: 0; font-size: 24px;">Middle & Secondary</h3>
                    <p>As students progress, the focus shifts toward analytical rigor and specialized subject knowledge. We
                        follow the NCERT framework, ensuring alignment with national standards.</p>
                    <ul class="footer-links" style="color: var(--text-muted); padding-left: 0; margin-top: 20px;">
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Integrated Sciences</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Social Sciences</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Technological Arts</li>
                    </ul>
                </div>

                <!-- Senior -->
                <div class="info-card reveal reveal-right" data-reveal-once data-reveal-delay="300">
                    <div style="color: var(--accent); font-size: 32px; margin-bottom: 20px;"><i
                            class="fas fa-university"></i></div>
                    <h3 style="margin-top: 0; font-size: 24px;">Senior Secondary</h3>
                    <p>Designed for university readiness, this tier offers specialized streams in Science, Commerce, and
                        Humanities, guided by expert faculty and modern pedagogical tools.</p>
                    <ul class="footer-links" style="color: var(--text-muted); padding-left: 0; margin-top: 20px;">
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Competitive Exam Prep</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Research Projects</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                style="color:var(--accent); margin-right: 10px;"></i> Career Counseling</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
