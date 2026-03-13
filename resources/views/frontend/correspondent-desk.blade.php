@extends('layouts.app')
@section('title', 'Correspondent\'s Desk | JMPSSS')

@push('styles')
<style>
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

        .page-label {
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

        .breadcrumb-trail span {
            margin: 0 8px;
            opacity: 0.6;
        }

        /* Correspondent Layout */
        .corr-section {
            padding: 90px 0;
            background: #fff;
        }

        .corr-layout {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 60px;
            align-items: start;
        }

        .corr-message h2 {
            font-size: 36px;
            color: #004800;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            line-height: 1.25;
            margin-bottom: 6px;
        }

        .opening-line {
            font-size: 19px;
            color: #e14c1e;
            font-weight: 600;
            margin-bottom: 26px;
            font-family: 'Playfair Display', serif;
            font-style: italic;
        }

        .corr-message p {
            font-size: 16px;
            color: #555;
            line-height: 1.9;
            margin-bottom: 18px;
        }

        .corr-message blockquote {
            border-left: 4px solid #004800;
            padding: 18px 26px;
            background: #f4f8f4;
            border-radius: 0 12px 12px 0;
            margin: 28px 0;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 19px;
            color: #004800;
            line-height: 1.6;
        }

        .corr-signature {
            margin-top: 34px;
            padding-top: 26px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .sig-icon-red {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sig-icon-red i {
            font-size: 22px;
            color: #fff;
        }

        .sig-text h4 {
            font-size: 17px;
            color: #004800;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
        }

        .sig-text span {
            font-size: 13px;
            color: #888;
        }

        .corr-card {
            background: linear-gradient(160deg, #004800, #002800);
            border-radius: 24px;
            padding: 36px 28px;
            text-align: center;
            color: #fff;
            position: sticky;
            top: 100px;
            box-shadow: 0 20px 50px rgba(0, 72, 0, 0.25);
        }

        .corr-photo {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.25);
            margin: 0 auto 18px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .corr-photo i {
            font-size: 75px;
            color: rgba(255, 255, 255, 0.45);
        }

        .corr-card h3 {
            font-size: 21px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 6px;
        }

        .corr-designation {
            display: inline-block;
            background: #e14c1e;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 22px;
        }

        .corr-details {
            text-align: left;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 18px;
        }

        .cd-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .cd-item i {
            color: #e14c1e;
            margin-top: 3px;
            width: 15px;
            flex-shrink: 0;
        }

        .cd-item span {
            font-size: 13.5px;
            opacity: 0.85;
            line-height: 1.5;
        }

        .c-quote {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 14px;
            margin-top: 18px;
            font-style: italic;
            font-size: 13.5px;
            line-height: 1.7;
            opacity: 0.9;
            border-left: 3px solid #e14c1e;
        }

        /* ── Our Story (Classic Overlap adapted for Correspondent) ── */
        .story-classic {
            padding: 100px 0;
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

        .sc-stats-wrapper {
            margin-top: 60px;
            padding-top: 40px;
            padding-bottom: 20px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            display: flex;
            gap: 60px;
            flex-wrap: wrap;
            justify-content: flex-start;
            grid-column: span 2;
        }

        .sc-stat-item {
            display: flex;
            flex-direction: column;
        }

        .sc-stat-item strong {
            font-size: 38px;
            font-weight: 700;
            color: #004800;
            font-family: 'Outfit', sans-serif;
            line-height: 1;
            margin-bottom: 6px;
        }

        .sc-stat-item span {
            font-size: 14px;
            font-weight: 600;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sc-visual {
            position: relative;
            padding-right: 30px;
            padding-bottom: 30px;
        }

        .sc-img {
            width: 100%;
            border-radius: 12px;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: block;
            border: 8px solid #fff;
        }


        /* Initiatives Redesign */
        .init-section {
            padding: 100px 0;
            background: #f8faf8;
            position: relative;
            overflow: hidden;
        }

        .init-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 10% 20%, rgba(0, 72, 0, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(225, 76, 30, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .init-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 60px;
            position: relative;
            z-index: 1;
        }

        .init-card {
            background: #fff;
            padding: 45px 35px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .init-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            border: 2px solid transparent;
            transition: all 0.4s;
            pointer-events: none;
        }

        .init-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        .init-card:nth-child(1):hover::after {
            border-color: rgba(225, 76, 30, 0.2);
        }

        .init-card:nth-child(2):hover::after {
            border-color: rgba(0, 72, 0, 0.2);
        }

        .init-card:nth-child(3):hover::after {
            border-color: rgba(0, 100, 0, 0.2);
        }

        .init-card .ic-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            font-size: 28px;
            transition: all 0.4s;
        }

        .init-card:nth-child(1) .ic-icon {
            background: #f0f7f0;
            color: #006400;
        }

        .init-card:nth-child(2) .ic-icon {
            background: #fff1ed;
            color: #e14c1e;
        }

        .init-card:nth-child(3) .ic-icon {
            background: #f0f7f0;
            color: #006400;
        }

        .init-card:hover .ic-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .init-card h4 {
            font-size: 22px;
            color: #111;
            font-weight: 700;
            margin-bottom: 18px;
            font-family: 'Outfit', sans-serif;
            line-height: 1.3;
        }

        .init-card p {
            font-size: 15px;
            color: #666;
            line-height: 1.7;
            margin: 0;
        }

        .init-card .ic-num {
            position: absolute;
            top: 35px;
            right: 35px;
            font-size: 40px;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.03);
            font-family: 'Outfit', sans-serif;
            transition: all 0.4s;
        }

        .init-card:hover .ic-num {
            color: rgba(0, 0, 0, 0.05);
            transform: translateY(-5px);
        }

        @media (max-width: 991px) {
            .init-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .init-grid {
                grid-template-columns: 1fr;
            }

            .init-section {
                padding: 70px 0;
            }
        }

        .c-cta {
            padding: 78px 0;
            background: linear-gradient(135deg, #004800, #002800);
            color: #fff;
            text-align: center;
        }

        .c-cta h2 {
            font-size: 36px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 12px;
        }

        .c-cta p {
            font-size: 16px;
            opacity: 0.8;
            margin-bottom: 28px;
        }

        .cta-btns {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-btns a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .cta-btn-white {
            background: #fff;
            color: #004800;
            border: 2px solid #fff;
        }

        .cta-btn-white:hover {
            background: transparent;
            color: #fff;
        }

        .cta-btn-outline {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .cta-btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
        }

        /* ── Responsive Adjustments for Classic Story ── */
        @media (max-width: 991px) {
            .story-classic-grid {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .sc-content {
                padding-right: 0;
                text-align: center;
            }

            .sc-eyebrow {
                justify-content: center;
            }

            .sc-stats-wrapper {
                justify-content: center;
            }

            .sc-visual {
                padding-right: 0;
                padding-bottom: 0;
            }
        }

        @media (max-width: 767px) {
            .sc-title {
                font-size: 36px;
            }
        }
</style>
@endpush

@section('content')
<section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">About Us</span>
            <h1>Correspondent's Desk</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="{{ route('about') }}">About Us</a><span>›</span>
                Correspondent's Desk
            </nav>
        </div>
    </section>

    <!-- Correspondent Message -->
    <section class="corr-section">
        <div class="container">
            <div class="corr-layout">
                <div class="corr-message">
                    <h2>{{ $section->title ?? 'A Message from the Correspondent' }}</h2>
                    <p class="opening-line">Dear Families, Students &amp; Well-Wishers,</p>
                    <div class="message-content-dynamic">
                        @if($section)
                            {!! nl2br(e($section->content)) !!}
                        @else
                            <p>It is a privilege to address you as the Correspondent of Jeeva Memorial Senior Secondary School —
                            an institution I hold close to my heart, born from a purpose far greater than education alone.</p>
                            <p>Since our founding, we have strived to deliver quality education that is both accessible and
                            excellent. Located at Thirukazhukundram, Kancheepuram, our school serves children from Pre.K.G.
                            through XII Std.</p>
                        @endif
                    </div>
                    <p>With blessings and gratitude,</p>
                    <div class="corr-signature">
                        <div class="sig-icon-red"><i class="fa-solid fa-heart"></i></div>
                        <div class="sig-text">
                            <h4>{{ $section->name ?? 'Mr. G.K. Babu' }}</h4>
                            <span>{{ $section->designation ?? 'Correspondent' }}, JMPSSS</span>
                        </div>
                    </div>
                </div>

                <div class="corr-card">
                    <div class="corr-photo"><i class="fa-solid fa-person"></i></div>
                    <h3>{{ $section->name ?? 'Mr. G.K. Babu' }}</h3>
                    <span class="corr-designation">{{ $section->designation ?? 'Correspondent' }}</span>
                    <div class="corr-details">
                        <div class="cd-item"><i class="fa-solid fa-building-columns"></i><span>Founder, Jeeva Memorial
                                Trust</span></div>
                        <div class="cd-item"><i class="fa-solid fa-school"></i><span>Jeeva Memorial Senior Secondary
                                School</span></div>
                        <div class="cd-item"><i class="fa-solid fa-location-dot"></i><span>Thirukazhukundram,
                                Kancheepuram Dist.</span></div>
                        <div class="cd-item"><i
                                class="fa-solid fa-envelope"></i><span>jeevamemorialschool@gmail.com</span></div>
                        <div class="cd-item"><i class="fa-solid fa-phone"></i><span>+91-7373418852</span></div>
                    </div>
                    <div class="c-quote">"{{ $section->quote ?? 'From love and loss came the greatest gift I could give — a school where thousands of children find their future.' }}"</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Foundation Story (Classic Overlap) -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">

                <!-- Left: Content Container -->
                <div class="sc-content">
                    <div class="sc-eyebrow">Our Foundation</div>
                    <h2 class="sc-title">Born from Love,<br><span>Built for the Future</span></h2>

                    <p class="sc-text lead">The Jeeva Memorial Trust was established as a deeply personal tribute to a
                        son dearly missed.</p>

                    <p class="sc-text">Mr. G.K. Babu channelled his profound grief into something timeless — founding an
                        institution designed to uplift, educate, and inspire thousands of children for generations to
                        come. Today, JMPSSS stands tall as a fully established CBSE-affiliated Senior Secondary School,
                        serving passionate young minds in a nurturing, technology-forward environment.</p>
                </div>

                <!-- Right: Visual -->
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="Foundation Campus" class="sc-img">
                </div>

            </div>
        </div>
    </section>

    <!-- Key Initiatives -->
    <section class="init-section">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Our Direction</span>
                <h2 class="section-title">Correspondent's Key Initiatives</h2>
            </div>
            <div class="init-grid">
                <div class="init-card">
                    <span class="ic-num">01</span>
                    <div class="ic-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    <h4>Affordable Quality Education</h4>
                    <p>Our commitment is to make high-quality CBSE education accessible to families across
                        Thirukazhukundram and surrounding districts — without compromise.</p>
                </div>
                <div class="init-card">
                    <span class="ic-num">02</span>
                    <div class="ic-icon"><i class="fa-solid fa-building"></i></div>
                    <h4>World-Class Infrastructure</h4>
                    <p>Continuous investment in classrooms, labs, libraries, and sports facilities ensures students have
                        every resource they need to excel.</p>
                </div>
                <div class="init-card">
                    <span class="ic-num">03</span>
                    <div class="ic-icon"><i class="fa-solid fa-seedling"></i></div>
                    <h4>Community Upliftment</h4>
                    <p>Beyond academics, JMPSSS actively contributes to the social and cultural upliftment of the
                        Thirukazhukundram community through education and outreach.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="c-cta">
        <div class="container">
            <h2>Be Part of the Legacy</h2>
            <p>Admissions are open for 2026–27. Enrol your child in an institution built on love and purpose.</p>
            <div class="cta-btns">
                <a href="{{ route('admissions') }}" class="cta-btn-white"><i class="fa-solid fa-graduation-cap"></i> Apply for Admission</a>
                <a href="{{ route('about') }}" class="cta-btn-outline"><i class="fa-solid fa-school"></i> About Our
                    School</a>
            </div>
        </div>
    </section>
@endsection


