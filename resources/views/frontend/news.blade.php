@extends('layouts.app')
@section('title', 'Institutional Announcements – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Scholarly Announcements</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>News & Circulars</li>
            </ul>
        </div>
    </section>

    <!-- News & Circulars -->
    <section class="content-section">
        <div class="container">
            <div class="grid" style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 80px;">
                <!-- News Column -->
                <div class="reveal reveal-left" data-reveal-once>
                    <div class="section-title" style="text-align: left; margin-bottom: 40px;">
                        <h2 style="font-size: 32px;">Institutional News</h2>
                        <div class="divider-center" style="margin: 15px 0 0 0;"></div>
                    </div>

                    <!-- News Item 1 -->
                    <div class="info-card"
                        style="margin-bottom: 30px; display: flex; gap: 30px; padding: 30px; align-items: center;">
                        <div style="width: 250px; height: 180px; flex-shrink: 0;">
                            <img src="{{ asset('home/about_campus.jpg') }}" alt="News" class="about-img"
                                style="height: 100%;">
                        </div>
                        <div>
                            <small
                                style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1.5px; margin-bottom: 10px; display: block;">March
                                1, 2026</small>
                            <h3 style="margin-top: 0; font-size: 20px; color: var(--primary); margin-bottom: 15px;">JMPSS
                                Awarded "School of Scholarly Excellence" 2026</h3>
                            <p style="font-size: 14px; margin-bottom: 15px;">We are honored to receive the prestigious
                                national award for scholarly discipline and academic contribution to the NCERT community.
                            </p>
                            <a href="#"
                                style="color:var(--accent); font-weight: 700; font-size: 13px; text-transform: uppercase; text-decoration: none; letter-spacing: 0.5px;">Read
                                Full Article <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Circulars Column -->
                <div class="reveal reveal-right" data-reveal-once data-reveal-delay="200">
                    <div class="section-title" style="text-align: left; margin-bottom: 40px;">
                        <h2 style="font-size: 32px;">Official Circulars</h2>
                        <div class="divider-center" style="margin: 15px 0 0 0;"></div>
                    </div>

                    <div class="info-card" style="padding: 40px;">
                        <ul class="footer-links" style="color: var(--text); padding-left: 0;">
                            <li
                                style="margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <small
                                        style="display: block; font-size: 12px; color: var(--accent); font-weight: 700;">MAR
                                        15</small>
                                    <h4 style="margin: 5px 0 0 0; font-size: 16px; color: var(--primary);">Annual
                                        Examination Schedule 2026</h4>
                                </div>
                                <a href="#" style="color:var(--primary); font-size: 20px;"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                            <li
                                style="margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <small
                                        style="display: block; font-size: 12px; color: var(--accent); font-weight: 700;">MAR
                                        10</small>
                                    <h4 style="margin: 5px 0 0 0; font-size: 16px; color: var(--primary);">Inter-School
                                        Scholarly Debate Invitation</h4>
                                </div>
                                <a href="#" style="color:var(--primary); font-size: 20px;"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                            <li
                                style="margin-bottom: 0; padding-bottom: 0; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <small
                                        style="display: block; font-size: 12px; color: var(--accent); font-weight: 700;">MAR
                                        05</small>
                                    <h4 style="margin: 5px 0 0 0; font-size: 16px; color: var(--primary);">Scholarly
                                        Parent-Teacher Meeting Guide</h4>
                                </div>
                                <a href="#" style="color:var(--primary); font-size: 20px;"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div style="margin-top: 30px; text-align: center;">
                        <a href="#" class="btn-outline-accent"
                            style="width: 100%; text-align: center; border-width: 1px; padding: 12px 0;">View Archive</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
