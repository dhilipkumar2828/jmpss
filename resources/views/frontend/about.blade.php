@extends('layouts.app')
@section('title', 'About Our Heritage – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Our Heritage & Vision</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="content-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-visuals reveal reveal-left" data-reveal-once>
                    <img src="{{ asset('home/about_campus.jpg') }}" alt="Legacy" class="about-img" style="height: 600px;">
                </div>
                <div class="about-content reveal reveal-right" data-reveal-once>
                    <small
                        style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 2px;">Since
                        1985</small>
                    <h2 style="margin-top: 10px;">A Legacy of <br>Academic Prominence</h2>
                    <p>Founded in 1985, Jeeva Memorial Public Senior Secondary School stands as a beacon of scholarly
                        achievement and ethical growth. For nearly four decades, we have dedicated ourselves to the pursuit
                        of excellence, nurturing minds that go on to lead with integrity and wisdom.</p>

                    <div style="margin-top: 40px;">
                        <div class="info-card" style="margin-bottom: 20px;">
                            <h3 style="margin-top: 0; font-size: 20px;">Our Mission</h3>
                            <p style="font-size: 15px; margin-bottom: 0;">To provide a rigorous yet compassionate
                                environment where intellectual curiosity meets disciplined character development.</p>
                        </div>
                        <div class="info-card">
                            <h3 style="margin-top: 0; font-size: 20px;">Our Vision</h3>
                            <p style="font-size: 15px; margin-bottom: 0;">To be a global benchmark in institutional
                                excellence, shaping the future leaders and thinkers of tomorrow.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Institutional Values</h2>
                <div class="divider-center"></div>
            </div>
            <div class="framework-grid">
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="0">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Integrity</h3>
                    <p>Upholding the highest moral standards in every academic and social endeavor.</p>
                </div>
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="150">
                    <i class="fas fa-balance-scale"></i>
                    <h3>Discipline</h3>
                    <p>Fostering a structured environment that encourages self-regulation and focus.</p>
                </div>
                <div class="framework-card reveal reveal-scale" data-reveal-once data-reveal-delay="300">
                    <i class="fas fa-award"></i>
                    <h3>Excellence</h3>
                    <p>Striving for distinguished achievement across all scholarly disciplines.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
