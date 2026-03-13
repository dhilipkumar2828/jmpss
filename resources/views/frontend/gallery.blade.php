@extends('layouts.app')
@section('title', 'Photo Gallery | JMPSSS - Jaypee Model Senior Secondary School')

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
            max-height: 80vh;
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
            <h1>Photo Collections</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span style="color: {{ $secondaryColor }}">Photos</span>
            </nav>
        </div>
    </section>

    <!-- ── Gallery Detail View ── -->
    <section class="gallery-view active" style="display: block;">
        <div class="container">
            
            <div class="filter-wrap" style="margin-bottom: 40px; display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
                <a href="{{ route('gallery') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline' }}" style="border-radius: 30px; padding: 8px 25px; {{ !request('category') ? 'background:'.$primaryColor : '' }}">All</a>
                @foreach($categories as $cat)
                    <a href="{{ route('gallery', ['category' => $cat]) }}" class="btn {{ request('category') == $cat ? 'btn-primary' : 'btn-outline' }}" style="border-radius: 30px; padding: 8px 25px; {{ request('category') == $cat ? 'background:'.$primaryColor : '' }}">{{ $cat }}</a>
                @endforeach
            </div>

            <div class="gallery-grid">
                @forelse($albums as $album)
                @php
                    $photos = $album->items->where('item_type', 'photo');
                    $firstPhoto = $photos->first();
                    // Map photos for JS
                    $photoData = $photos->map(fn($item) => ['src' => asset('storage/'.$item->file_path)])->values();
                @endphp
                <div class="gallery-item" onclick="openAlbumLightbox({{ json_encode($photoData) }}, '{{ $album->title }}', '{{ $album->category }}')">
                    <div class="photo-thumb">
                        @if($firstPhoto)
                        <img src="{{ asset('storage/' . $firstPhoto->file_path) }}" alt="{{ $album->title }}" loading="lazy">
                        @endif
                        <div class="photo-overlay-btn">
                            <i class="fa-solid fa-images" style="background: {{ $secondaryColor }}"></i>
                            <span style="position: absolute; bottom: 10px; right: 10px; background: rgba(0,0,0,0.7); color: #fff; padding: 2px 10px; border-radius: 20px; font-size: 11px;">{{ $photos->count() }} Photos</span>
                        </div>
                    </div>
                    <div class="photo-details">
                        <h3 style="color: {{ $primaryColor }}">{{ $album->title }}</h3>
                        @if($album->category)
                            <p style="font-size: 12px; color: #888;">{{ $album->category }}</p>
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

            <div class="pagination-wrap" style="margin-top: 50px; display: justify-content: center;">
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
                <p id="lightboxCategory"></p>
                <div id="photoCounter" style="font-size: 11px; margin-top: 5px; opacity: 0.7;"></div>
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
</script>
@endpush


