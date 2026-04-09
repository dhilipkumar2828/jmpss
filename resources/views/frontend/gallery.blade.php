@extends('layouts.app')
@section('title', 'Photo Gallery | JMPSSS')

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
            background: url('{{ $pageBanner ? asset($pageBanner->image_path) : asset('assets/jmpsss/image/new/slider1.jpg') }}') center/cover no-repeat;
            z-index: 0;
        }

        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 72, 0, 0.55);
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



        /* ── Category View ── */
        .category-view {
            padding: 80px 0 100px;
            background: #fdfaf5;
        }

        /* Simple 3-column category cards */
        .cat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            margin-top: 50px;
        }

        .cat-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
            border: 1px solid #eee;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0, 72, 0, 0.12);
        }

        .cat-card-thumb {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .cat-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .cat-card:hover .cat-card-thumb img {
            transform: scale(1.08);
        }

        .cat-card-thumb .cat-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 72, 0, 0.7) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            padding: 18px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .cat-card:hover .cat-overlay {
            opacity: 1;
        }

        .cat-overlay i {
            color: #fff;
            font-size: 28px;
        }

        .cat-card-body {
            padding: 20px 22px;
        }

        .cat-card-body h3 {
            font-size: 18px;
            font-weight: 700;
            color: #004800;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 6px;
        }

        .cat-card-body p {
            font-size: 13px;
            color: #888;
            margin: 0;
        }

        /* ── Gallery Detail View ── */
        .gallery-view {
            display: none;
            padding: 60px 0 100px;
            background: #fff;
        }

        .gallery-view.active {
            display: block;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #004800;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            margin-bottom: 50px;
            transition: 0.3s;
        }

        .back-btn:hover {
            color: #e14c1e;
            transform: translateX(-5px);
        }

        /* ── Year Section Heading ── */
        .year-section {
            margin-bottom: 60px;
        }

        .year-heading {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 28px;
        }

        .year-heading::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(to right, #004800, transparent);
        }

        .year-pill {
            display: inline-block;
            background: #e14c1e;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 14px;
            border-radius: 30px;
        }

        /* ── Photo Grid (uniform card grid, same as video page) ── */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            width: 100%;
        }

        .gallery-item {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
            border: 1px solid #eee;
            cursor: pointer;
            transition: transform 0.35s, box-shadow 0.35s;
        }

        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
        }

        /* Fixed-height image thumb */
        .gallery-item .photo-thumb {
            position: relative;
            height: 210px;
            overflow: hidden;
        }

        .gallery-item .photo-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s;
        }

        .gallery-item:hover .photo-thumb img {
            transform: scale(1.07);
        }

        /* Expand icon overlay on hover */
        .photo-overlay-btn {
            position: absolute;
            inset: 0;
            background: rgba(0, 40, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .gallery-item:hover .photo-overlay-btn {
            background: rgba(0, 40, 0, 0.62);
        }

        .photo-overlay-btn i {
            width: 58px;
            height: 58px;
            background: #fff;
            color: #004800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: transform 0.3s, background 0.3s;
        }

        .gallery-item:hover .photo-overlay-btn i {
            transform: scale(1.1);
            background: #e14c1e;
            color: #fff;
        }

        /* Title below image */
        .photo-details {
            padding: 16px 18px 20px;
        }

        .photo-details h3 {
            font-size: 15px;
            font-weight: 700;
            color: #111;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            line-height: 1.4;
        }

        @media (max-width: 991px) {
            .cat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .cat-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .page-hero-content h1 {
                font-size: 34px;
            }
        }

        /* ── Lightbox ── */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.96);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            position: relative;
        }

        .lightbox-content img {
            max-width: 100%;
            max-height: 50vh;
            border-radius: 8px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.5);
        }

        .lightbox-close {
            position: absolute;
            top: -46px;
            right: 0;
            color: #fff;
            font-size: 28px;
            cursor: pointer;
            transition: 0.3s;
        }

        .lightbox-close:hover {
            color: #e14c1e;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            width: calc(100% + 110px);
            left: -55px;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .lightbox-nav i {
            width: 46px;
            height: 46px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
            pointer-events: auto;
        }

        .lightbox-nav i:hover {
            background: #e14c1e;
        }

        .lightbox-caption {
            color: #fff;
            text-align: center;
            margin-top: 16px;
            font-family: 'Outfit', sans-serif;
        }

        .lightbox-caption h4 {
            font-size: 20px;
            margin-bottom: 4px;
        }

        .lightbox-caption p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.65);
            text-align: center !important;
        }

        /* ── Gallery Tabs ── */
        .filter-container {
            text-align: center;
            margin-bottom: 50px;
        }

        .filter-wrap {
            display: inline-flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
            background: #fff;
            padding: 8px;
            border-radius: 50px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
            border: 1px solid #eee;
        }

        .gallery-tab {
            text-decoration: none !important;
            padding: 10px 26px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
            color: #555;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            border: 1px solid transparent;
        }

        .gallery-tab:hover {
            color: #e14c1e;
            background: rgba(225, 76, 30, 0.05);
        }

        .gallery-tab.active {
            background: #004800;
            color: #fff !important;
            box-shadow: 0 8px 20px rgba(0, 72, 0, 0.2);
        }

        @media (max-width: 991px) {
            .filter-container {
                overflow: visible !important;
            }
            .desktop-tablet-filter {
                display: flex !important;
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                justify-content: center !important;
                padding: 14px 20px !important;
                border-radius: 0 !important;
                border: none !important;
                width: 100vw !important;
                margin: 0 calc(-50vw + 50%) !important;
                scrollbar-width: none !important;
                -webkit-overflow-scrolling: touch !important;
                gap: 12px !important;
                background: transparent !important;
                box-shadow: none !important;
            }

            .desktop-tablet-filter::-webkit-scrollbar {
                display: none !important;
            }

            .gallery-tab {
                flex: 0 0 auto !important;
                padding: 10px 22px !important;
                background: #fff !important;
                border: 1px solid #eee !important;
                color: #555 !important;
                box-shadow: 0 3px 10px rgba(0,0,0,0.04) !important;
            }
            .gallery-tab.active {
                background: #004800 !important;
                color: #fff !important;
                border-color: #004800 !important;
            }
        }

        /* ── Mobile Dropdown Filter (320px - 600px) ── */
        .mobile-filter-wrapper {
            display: none;
            position: relative;
            text-align: left;
            margin-bottom: 35px;
            max-width: 100%;
            overflow: visible !important;
        }

        @media (max-width: 600px) {
            .desktop-tablet-filter { display: none !important; }
            .mobile-filter-wrapper { display: block; }
            
            .mobile-filter-trigger {
                background: #fff;
                padding: 16px 20px;
                border-radius: 12px;
                border: 1px solid #eee;
                display: flex;
                align-items: center;
                gap: 15px;
                cursor: pointer;
                font-weight: 700;
                color: #004800;
                box-shadow: 0 4px 15px rgba(0,0,0,0.05);
                font-size: 15px;
            }

            .mobile-filter-list {
                display: none;
                position: absolute;
                top: calc(100% + 8px);
                left: 0;
                right: 0;
                background: #fff;
                z-index: 150;
                border-radius: 12px;
                box-shadow: 0 10px 35px rgba(0,0,0,0.15);
                padding: 10px 0;
                border: 1px solid #eee;
                opacity: 0;
                transform: translateY(-10px);
                transition: all 0.3s ease;
                pointer-events: none;
            }

            .mobile-filter-wrapper.open .mobile-filter-list {
                display: block;
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }

            .mobile-filter-wrapper.open .mobile-filter-trigger {
                border-color: #e14c1e;
                box-shadow: 0 4px 15px rgba(225, 76, 30, 0.1);
            }

            .mobile-filter-wrapper.open .mobile-filter-trigger i:last-child {
                transform: rotate(180deg);
                opacity: 1;
            }

            .mobile-filter-list a {
                display: block;
                padding: 14px 20px;
                color: #555;
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
                border-bottom: 1px solid #f8f8f8;
                transition: 0.2s;
            }

            .mobile-filter-list a:last-child { border-bottom: none; }
            
            .mobile-filter-list a.active {
                color: #e14c1e;
                background: rgba(225, 76, 30, 0.04);
            }

            .mobile-filter-list a:hover:not(.active) {
                background: #f9f9f9;
                color: #004800;
            }

            .mobile-filter-trigger i:first-child {
                font-size: 18px;
                color: #e14c1e;
            }
        }

        /* ── Section Fade Animation ── */
        @keyframes viewFadeIn {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-enter {
            animation: viewFadeIn 0.5s forwards;
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
            <span class="page-label" style="background: {{ $secondaryColor }}">Gallery</span>
            <h1>{{ $pageBanner->title ?? 'Photo Collections' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px;">{{ $pageBanner->subtitle }}</p>
            @endif
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span>Photos</span>
            </nav>
        </div>
    </section>

    <!-- ── Gallery Detail View ── -->
    <section class="gallery-view active" style="display: block;">
        <div class="container">

            <div class="filter-container">
                {{-- Desktop/Tablet Horizontal Tabs --}}
                <div class="filter-wrap desktop-tablet-filter">
                    <a href="{{ route('gallery') }}" 
                        class="gallery-tab {{ !request('category') ? 'active' : '' }}"
                        style="{{ !request('category') ? 'background:' . $primaryColor : '' }}">All</a>
                    @foreach($categories as $cat)
                        <a href="{{ route('gallery', ['category' => $cat]) }}"
                            class="gallery-tab {{ request('category') == $cat ? 'active' : '' }}"
                            style="{{ request('category') == $cat ? 'background:' . $primaryColor : '' }}">{{ $cat }}</a>
                    @endforeach
                </div>

                {{-- Mobile Dropdown Filter --}}
                <div class="mobile-filter-wrapper" id="mobileFilterWrapper">
                    <div class="mobile-filter-trigger" id="mobileFilterTrigger">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span>{{ request('category') ?? 'Show All Collections' }}</span>
                        <i class="fa-solid fa-chevron-down ms-auto" style="font-size: 13px; opacity: 0.5; transition: 0.3s;"></i>
                    </div>
                    <div class="mobile-filter-list" id="mobileFilterList">
                        <a href="{{ route('gallery') }}" class="{{ !request('category') ? 'active' : '' }}">All</a>
                        @foreach($categories as $cat)
                            <a href="{{ route('gallery', ['category' => $cat]) }}"
                                class="{{ request('category') == $cat ? 'active' : '' }}">{{ $cat }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="gallery-grid">
                @forelse($albums as $album)
                    @php
                        $photos = $album->items->where('item_type', 'photo');
                        $firstPhoto = $photos->first();
                        // Map photos for JS
                        $photoData = $photos->map(fn($item) => ['src' => asset($item->file_path)])->values();
                    @endphp
                    <div class="gallery-item"
                        onclick="openAlbumLightbox({{ json_encode($photoData) }}, '{{ $album->title }}', '{{ $album->category }}')">
                        <div class="photo-thumb">
                            @if($firstPhoto)
                                <img src="{{ asset($firstPhoto->file_path) }}" alt="{{ $album->title }}"
                                    loading="lazy">
                            @endif
                            <div class="photo-overlay-btn">
                                <i class="fa-solid fa-images" style="background: {{ $secondaryColor }}"></i>
                                <span
                                    style="position: absolute; bottom: 10px; right: 10px; background: rgba(0,0,0,0.7); color: #fff; padding: 2px 10px; border-radius: 20px; font-size: 11px;">{{ $photos->count() }}
                                    Photos</span>
                            </div>
                        </div>
                        <div class="photo-details">
                            <h3 style="color: {{ $primaryColor }}">{{ $album->title }}</h3>
                            @if($album->category)
                                <p style="font-size: 12px; color: #888; margin-bottom: 5px;">{{ $album->category }}</p>
                            @endif
                            @if($album->description)
                                <p style="font-size: 13px; color: #555; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $album->description }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                        <i class="fa-solid fa-image" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3>No photos found</h3>
                        <p>We are currently updating our gallery. Please check back later.</p>
                    </div>
                @endforelse
            </div>

            <div class="pagination-wrap" style="margin-top: 60px;">
                {{ $albums->links() }}
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close" onclick="closeLightbox()"><i class="fa-solid fa-xmark"></i></span>

            <div class="lightbox-nav">
                <i class="fa-solid fa-chevron-left" onclick="changePhoto(-1)"></i>
                <i class="fa-solid fa-chevron-right" onclick="changePhoto(1)"></i>
            </div>

            <img src="" alt="Gallery Lightbox" id="lightboxImg">

            <div class="lightbox-caption">
                <h4 id="lightboxTitle"></h4>
                <p id="lightboxCategory" class="para-text"></p>
                <div id="photoCounter"  style="font-size: 11px; margin-top: 5px; opacity: 0.7;"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentAlbumPhotos = [];
        let currentIndex = 0;
        let albumTitle = '';
        let albumCategory = '';

        function openAlbumLightbox(photos, title, category) {
            currentAlbumPhotos = photos;
            currentIndex = 0;
            albumTitle = title;
            albumCategory = category;

            updateLightboxContent();

            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function updateLightboxContent() {
            if (currentAlbumPhotos.length === 0) return;

            const photo = currentAlbumPhotos[currentIndex];
            document.getElementById('lightboxImg').src = photo.src;
            document.getElementById('lightboxTitle').textContent = albumTitle;
            document.getElementById('lightboxCategory').textContent = albumCategory;
            document.getElementById('photoCounter').textContent = `Photo ${currentIndex + 1} of ${currentAlbumPhotos.length}`;

            // Hide nav if only one photo
            const nav = document.querySelector('.lightbox-nav');
            nav.style.display = currentAlbumPhotos.length > 1 ? 'flex' : 'none';
        }

        function changePhoto(step) {
            currentIndex += step;
            if (currentIndex < 0) currentIndex = currentAlbumPhotos.length - 1;
            if (currentIndex >= currentAlbumPhotos.length) currentIndex = 0;
            updateLightboxContent();
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!document.getElementById('lightbox').classList.contains('active')) return;
            if (e.key === 'ArrowLeft') changePhoto(-1);
            if (e.key === 'ArrowRight') changePhoto(1);
            if (e.key === 'Escape') closeLightbox();
        });

        // Mobile Filter Logic
        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('mobileFilterWrapper');
            const trigger = document.getElementById('mobileFilterTrigger');
            
            if(trigger && wrapper) {
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    wrapper.classList.toggle('open');
                });

                document.addEventListener('click', () => {
                    wrapper.classList.remove('open');
                });
            }
        });
    </script>
@endpush
