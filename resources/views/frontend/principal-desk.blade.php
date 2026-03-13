@extends('layouts.app')
@section('title', 'Principal\'s Desk | JMPSSS')

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

        .principal-section {
            padding: 90px 0;
            background: #fff;
        }

        .principal-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 60px;
            align-items: start;
        }

        .principal-card {
            background: linear-gradient(160deg, #004800, #002800);
            border-radius: 24px;
            padding: 36px 28px;
            text-align: center;
            color: #fff;
            position: sticky;
            top: 100px;
            box-shadow: 0 20px 50px rgba(0, 72, 0, 0.3);
        }

        .principal-photo {
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

        .principal-photo i {
            font-size: 75px;
            color: rgba(255, 255, 255, 0.45);
        }

        .principal-card h3 {
            font-size: 21px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 6px;
        }

        .designation {
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

        .principal-details {
            text-align: left;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 18px;
        }

        .pd-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .pd-item i {
            color: #e14c1e;
            margin-top: 3px;
            width: 15px;
            flex-shrink: 0;
        }

        .pd-item span {
            font-size: 13.5px;
            opacity: 0.85;
            line-height: 1.5;
        }

        .p-quote {
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

        .principal-message h2 {
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

        .principal-message p {
            font-size: 16px;
            color: #555;
            line-height: 1.9;
            margin-bottom: 18px;
        }

        .principal-message blockquote {
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

        .principal-signature {
            margin-top: 34px;
            padding-top: 26px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .sig-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: linear-gradient(135deg, #004800, #006400);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sig-icon i {
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

        /* ── New Commitment Section (Split Layout) ── */
        .objectives-split-section {
            padding: 100px 0;
            background: #fcfdfc;
            position: relative;
        }

        .obj-split-layout {
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            gap: 70px;
            align-items: center;
        }

        .obj-left-title .section-title {
            font-size: 42px;
            color: #111;
            margin-bottom: 20px;
            line-height: 1.25;
            text-align: left;
        }

        .obj-left-title .section-subtitle {
            text-align: left;
            margin: 0 0 16px 0;
            display: inline-block;
        }

        .obj-left-title p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 35px;
            max-width: 480px;
        }

        .obj-visual-accent {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            max-width: 460px;
        }

        .obj-visual-accent::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0, 72, 0, 0.5) 0%, transparent 60%);
        }

        .obj-visual-accent img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }

        .obj-visual-accent:hover img {
            transform: scale(1.05);
        }

        .obj-right-list {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .obj-list-item {
            display: flex;
            align-items: center;
            gap: 24px;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.04);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border-left: 5px solid transparent;
            cursor: default;
        }

        .obj-list-item:hover {
            transform: translateX(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .obj-item-green {
            border-left-color: #004800;
        }

        .obj-item-orange {
            border-left-color: #e14c1e;
        }

        .obj-item-green-alt {
            border-left-color: #006400;
        }

        .obj-item-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .obj-item-green .obj-item-icon {
            background: #e6f0e6;
            color: #004800;
        }

        .obj-item-orange .obj-item-icon {
            background: #fcece7;
            color: #e14c1e;
        }

        .obj-item-green-alt .obj-item-icon {
            background: #e8f5e9;
            color: #006400;
        }

        .obj-item-text {
            position: relative;
            z-index: 1;
        }

        .obj-item-text h4 {
            font-size: 20px;
            color: #111;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .obj-item-text p {
            font-size: 14.5px;
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        .obj-watermark {
            position: absolute;
            right: -15px;
            bottom: -20px;
            font-size: 110px;
            z-index: 0;
            opacity: 0.04;
            transition: all 0.5s ease;
        }

        .obj-list-item:hover .obj-watermark {
            transform: scale(1.1) rotate(-15deg);
            opacity: 0.08;
        }

        .obj-item-green .obj-watermark {
            color: #004800;
        }

        .obj-item-orange .obj-watermark {
            color: #e14c1e;
        }

        .obj-item-green-alt .obj-watermark {
            color: #006400;
        }

        .p-cta {
            padding: 78px 0;
            background: linear-gradient(135deg, #002800, #004800);
            color: #fff;
            text-align: center;
        }

        .p-cta h2 {
            font-size: 36px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 12px;
        }

        .p-cta p {
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
</style>
@endpush

@section('content')
<section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">About Us</span>
            <h1>Principal's Desk</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="{{ route('about') }}">About Us</a><span>›</span>
                Principal's Desk
            </nav>
        </div>
    </section>

    <section class="principal-section">
        <div class="container">
            <div class="principal-layout">
                <div class="principal-card">
                    <div class="principal-photo"><i class="fa-solid fa-user-tie"></i></div>
                    <h3>{{ $section->name ?? 'School Principal' }}</h3>
                    <span class="designation">{{ $section->designation ?? 'Principal' }}</span>
                    <div class="principal-details">
                        <div class="pd-item"><i class="fa-solid fa-school"></i><span>Jeeva Memorial Senior Secondary
                                School</span></div>
                        <div class="pd-item"><i class="fa-solid fa-certificate"></i><span>CBSE Affiliated — No:
                                1930806</span></div>
                        <div class="pd-item"><i class="fa-solid fa-location-dot"></i><span>Thirukazhukundram,
                                Kancheepuram Dist.</span></div>
                        <div class="pd-item"><i
                                class="fa-solid fa-envelope"></i><span>jeevamemorialschool@gmail.com</span></div>
                    </div>
                    <div class="p-quote">"{{ $section->quote ?? 'Education is not preparation for life — education is life itself.' }}"</div>
                </div>

                <div class="principal-message">
                    <h2>{{ $section->title ?? 'A Warm Welcome from the Principal' }}</h2>
                    <p class="opening-line">Dear Students, Parents &amp; Visitors,</p>
                    <div class="message-content-dynamic">
                        @if($section)
                            {!! nl2br(e($section->content)) !!}
                        @else
                            <p>It is with immense pride and deep sense of responsibility that I welcome you to Jeeva Memorial
                            Senior Secondary School — a place where young minds are nurtured, character is shaped, and
                            futures are built with care and commitment.</p>
                            <p>We are at the heart of the Thirukazhukundram community, and we have continued to succeed in
                            providing local families an excellent education delivered by exceptional teachers in
                            purpose-built, inspiring facilities.</p>
                        @endif
                    </div>
                    <p>With warm regards and every good wish,</p>
                    <div class="principal-signature">
                        <div class="sig-icon"><i class="fa-solid fa-feather-pointed"></i></div>
                        <div class="sig-text">
                            <h4>{{ $section->name ?? 'The Principal' }}</h4>
                            <span>{{ $section->designation ?? 'Principal' }}, JMPSSS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Commitment (Split Stack) -->
    <section class="objectives-split-section">
        <div class="container">
            <div class="obj-split-layout">

                <!-- Left Details -->
                <div class="obj-left-title">
                    <span class="section-subtitle">Our Commitment</span>
                    <h2 class="section-title">Principal's Key Objectives</h2>
                    <p>At JMPSSS, our mission thrives on clear, actionable objectives that put the holistic development
                        and well-being of our students at the forefront.</p>
                    <div class="obj-visual-accent">
                        <img src="{{ asset('assets/jmpsss/image/new/slider2.jpg') }}" alt="Students engaging in activities">
                    </div>
                </div>

                <!-- Right Cards -->
                <div class="obj-right-list">

                    <div class="obj-list-item obj-item-green">
                        <div class="obj-item-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                        <div class="obj-item-text">
                            <h4>Academic Rigour</h4>
                            <p>Upholding the highest standards of the CBSE curriculum while ensuring every student truly
                                understands and enjoys learning.</p>
                        </div>
                        <div class="obj-watermark"><i class="fa-solid fa-graduation-cap"></i></div>
                    </div>

                    <div class="obj-list-item obj-item-orange">
                        <div class="obj-item-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                        <div class="obj-item-text">
                            <h4>Inclusive Environment</h4>
                            <p>Creating a school culture where every student feels valued, safe, and inspired to reach
                                their fullest potential.</p>
                        </div>
                        <div class="obj-watermark"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    </div>

                    <div class="obj-list-item obj-item-green-alt">
                        <div class="obj-item-icon"><i class="fa-solid fa-handshake"></i></div>
                        <div class="obj-item-text">
                            <h4>Parent Partnership</h4>
                            <p>Building strong, transparent relationships with parents — because education is most
                                powerful when home and school work as one.</p>
                        </div>
                        <div class="obj-watermark"><i class="fa-solid fa-handshake"></i></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="p-cta">
        <div class="container">
            <h2>Take the Next Step</h2>
            <p>Admissions are open for 2026–27. Give your child the JMPSSS advantage.</p>
            <div class="cta-btns">
                <a href="{{ route('admissions') }}" class="cta-btn-white"><i class="fa-solid fa-graduation-cap"></i> Apply for Admission</a>
                <a href="{{ route('about') }}" class="cta-btn-outline"><i class="fa-solid fa-school"></i> Learn More About
                    Us</a>
            </div>
        </div>
    </section>
@endsection


