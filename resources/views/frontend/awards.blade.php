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

@php
    $siteSettings = \App\Models\Setting::pluck('value', 'key')->toArray();
    $primaryColor = $siteSettings['logo_green_900'] ?? '#004800';
    $secondaryColor = $siteSettings['secondary_color'] ?? '#e14c1e';
@endphp

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label" style="background: {{ $secondaryColor }}">Academics</span>
            <h1>Awards & Achievements</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span style="color: {{ $secondaryColor }}">Awards</span>
            </nav>
        </div>
    </section>

    <!-- Intro Content -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">
                <div class="sc-content">
                    <div class="sc-eyebrow" style="color: {{ $secondaryColor }}">Celebrating Excellence</div>
                    <h2 class="sc-title">A Legacy of <span style="color: {{ $primaryColor }}">Achievements</span></h2>
                    <p class="sc-text lead" style="border-left-color: {{ $secondaryColor }}">At JMPSSS, we believe in recognizing and nurturing the unique talents of every student.</p>
                    <p class="sc-text">Our journey is marked by numerous accolades in academics, sports, arts, and community service. These awards are a testament to the combined efforts of our students, teachers, and parents.</p>
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
                @forelse($awards as $award)
                <div class="award-gallery-card">
                    <div class="award-img-wrapper">
                        @if($award->image)
                            <img src="{{ asset('storage/'.$award->image) }}" alt="{{ $award->title }}">
                        @else
                            <img src="{{ asset('assets/jmpsss/image/new/award1.jpg') }}" alt="{{ $award->title }}">
                        @endif
                        <div class="award-overlay" style="background: rgba(0, 72, 0, 0.7);">
                            <i class="fa-solid fa-trophy popup-icon"></i>
                        </div>
                    </div>
                    <div class="award-gallery-info">
                        <span class="award-gallery-year" style="background: {{ $secondaryColor }}">{{ $award->year }}</span>
                        <h3 style="color: {{ $primaryColor }}">{{ $award->title }}</h3>
                        <p>{{ $award->description }}</p>
                        @if($award->recipient_name)
                           <div style="font-size: 13px; font-weight: 600; margin-top: 8px; color: #666;">
                               <i class="fa-solid fa-user-graduate"></i> Recipient: {{ $award->recipient_name }}
                           </div>
                        @endif
                    </div>
                </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                        <i class="fa-solid fa-award" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3>Updates incoming</h3>
                        <p>We are currently documenting our latest achievements. Check back soon!</p>
                    </div>
                @endforelse
            </div>

            <div class="pagination-wrap" style="margin-top: 60px; display: flex; justify-content: center;">
                {{ $awards->links() }}
            </div>
        </div>
    </section>
@endsection


