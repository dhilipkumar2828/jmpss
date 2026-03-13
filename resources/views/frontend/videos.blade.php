@extends('layouts.app')
@section('title', 'Video Gallery | JMPSSS - Jaypee Model Senior Secondary School')

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

        /* ── Year Section ── */
        .year-section {
            margin-bottom: 70px;
        }

        .year-heading {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 30px;
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

        /* ── Video Grid ── */
        .video-year-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .video-item-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
            border: 1px solid #eee;
            cursor: pointer;
            transition: transform 0.35s, box-shadow 0.35s;
        }

        .video-item-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
        }

        .video-thumb {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .video-item-card:hover .video-thumb img {
            transform: scale(1.07);
        }

        .video-overlay-btn {
            position: absolute;
            inset: 0;
            background: rgba(0, 40, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .video-item-card:hover .video-overlay-btn {
            background: rgba(0, 40, 0, 0.65);
        }

        .video-overlay-btn i {
            width: 60px;
            height: 60px;
            background: #fff;
            color: #004800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: transform 0.3s, background 0.3s;
            padding-left: 4px;
        }

        .video-item-card:hover .video-overlay-btn i {
            transform: scale(1.1);
            background: #e14c1e;
            color: #fff;
        }

        .video-cat-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(225, 76, 30, 0.92);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .video-details {
            padding: 18px 20px 22px;
        }

        .video-details h3 {
            font-size: 17px;
            font-weight: 700;
            color: #111;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 6px;
        }

        .video-details p {
            font-size: 13px;
            color: #777;
            margin: 0;
            line-height: 1.5;
        }

        /* ── Video Modal ── */
        .video-modal-v3 {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .video-modal-v3.active {
            display: flex;
        }

        .video-modal-content {
            position: relative;
            width: 100%;
            max-width: 900px;
        }

        .video-player-container {
            position: relative;
            padding-bottom: 56.25%;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        #videoPlaceholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #videoPlaceholder iframe,
        #videoPlaceholder video {
            width: 100%;
            height: 100%;
            border: none;
        }

        .close-video-modal {
            position: absolute;
            top: -50px;
            right: 0;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
            transition: 0.3s;
            line-height: 1;
        }

        .close-video-modal:hover {
            color: #e14c1e;
            transform: rotate(90deg);
        }

        @media (max-width: 991px) {
            .cat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .video-year-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .cat-grid {
                grid-template-columns: 1fr;
            }

            .video-year-grid {
                grid-template-columns: 1fr;
            }

            .page-hero-content h1 {
                font-size: 34px;
            }
        }

        /* fade animation */
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
            <h1>Video Collections</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span style="color: {{ $secondaryColor }}">Videos</span>
            </nav>
        </div>
    </section>

    <!-- ── Video Gallery View ── -->
    <section class="category-view" style="display: block; background: #fff; padding-top: 60px;">
        <div class="container">
            
            <div class="filter-wrap" style="margin-bottom: 40px; display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
                <a href="{{ route('videos') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline' }}" style="border-radius: 30px; padding: 8px 25px; {{ !request('category') ? 'background:'.$primaryColor : '' }}">All</a>
                @foreach($categories as $cat)
                    <a href="{{ route('videos', ['category' => $cat]) }}" class="btn {{ request('category') == $cat ? 'btn-primary' : 'btn-outline' }}" style="border-radius: 30px; padding: 8px 25px; {{ request('category') == $cat ? 'background:'.$primaryColor : '' }}">{{ $cat }}</a>
                @endforeach
            </div>

            <div class="cat-grid">
                @forelse($albums as $album)
                @php
                    $videosList = $album->items->where('item_type', 'video');
                    $firstVideo = $videosList->first();
                    $videoData = $videosList->map(fn($v) => [
                        'src' => $v->video_url,
                        'title' => $album->title
                    ])->values();
                @endphp
                <div class="video-item-card" onclick="openAlbumVideos({{ json_encode($videoData) }}, '{{ $album->title }}')">
                    <div class="video-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="{{ $album->title }}">
                        <div class="video-overlay-btn">
                            <i class="fa-solid fa-play" style="background: {{ $secondaryColor }}"></i>
                            <span style="position: absolute; bottom: 10px; right: 10px; background: rgba(0,0,0,0.7); color: #fff; padding: 2px 10px; border-radius: 20px; font-size: 11px;">{{ $videosList->count() }} Videos</span>
                        </div>
                        @if($album->category)
                            <span class="video-cat-badge" style="background: {{ $primaryColor }}">{{ $album->category }}</span>
                        @endif
                    </div>
                    <div class="video-details">
                        <h3 style="color: {{ $primaryColor }}">{{ $album->title }}</h3>
                        <p>{{ Str::limit($album->description, 80) }}</p>
                    </div>
                </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                        <i class="fa-solid fa-video-slash" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3>No videos found</h3>
                        <p>Our video collection is coming soon!</p>
                    </div>
                @endforelse
            </div>

            <div class="pagination-wrap" style="margin-top: 50px; display: justify-content: center;">
                {{ $albums->links() }}
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div class="video-modal-v3" id="videoModal" onclick="closeVideoModal(event)">
        <div class="video-modal-content" onclick="event.stopPropagation()">
            <button class="close-video-modal" id="closeVideo" onclick="closeVideoModal()" type="button">&times;</button>
            <div class="video-player-container">
                <div id="videoPlaceholder"></div>
            </div>

            <!-- Video Playlist / Counter -->
            <div class="video-nav" id="videoNav" style="display:none; align-items:center; justify-content:space-between; margin-top:15px;">
                <button class="btn btn-outline" onclick="changeVideo(-1); return false;" type="button" style="color:#fff; border-color:#fff; padding:8px 16px;">
                    <i class="fas fa-chevron-left"></i> Prev
                </button>
                <div id="videoCounter" style="color:#fff; font-size:14px; font-weight:600; text-align:center;"></div>
                <button class="btn btn-outline" onclick="changeVideo(1); return false;" type="button" style="color:#fff; border-color:#fff; padding:8px 16px;">
                    Next <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- Video Thumbnails List -->
            <div id="videoThumbnails" style="display:none; margin-top:12px; gap:8px; flex-wrap:wrap; justify-content:center;"></div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentAlbumVideos = [];
    let currentVideoIndex = 0;

    function openAlbumVideos(videos, title) {
        currentAlbumVideos = videos;
        currentVideoIndex = 0;

        updateVideoModalContent();
        buildVideoThumbnails();

        const modal = document.getElementById('videoModal');
        modal.classList.add('active');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function updateVideoModalContent() {
        if (currentAlbumVideos.length === 0) return;

        const video = currentAlbumVideos[currentVideoIndex];
        const placeholder = document.getElementById('videoPlaceholder');
        const videoId = extractYoutubeId(video.src);

        placeholder.innerHTML = videoId
            ? `<iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>`
            : `<div style="color:#fff;text-align:center;padding:50px;">Invalid video URL</div>`;

        const counter = document.getElementById('videoCounter');
        counter.innerHTML = `<span style="opacity:0.7;">Playing</span> <strong>${currentVideoIndex + 1}</strong> <span style="opacity:0.7;">of</span> <strong>${currentAlbumVideos.length}</strong>`;

        // Show/hide nav
        const nav = document.getElementById('videoNav');
        nav.style.display = currentAlbumVideos.length > 1 ? 'flex' : 'none';

        // Update active thumbnail
        document.querySelectorAll('.vid-thumb-item').forEach((el, i) => {
            el.style.opacity = i === currentVideoIndex ? '1' : '0.5';
            el.style.border = i === currentVideoIndex ? '2px solid #e14c1e' : '2px solid transparent';
        });
    }

    function buildVideoThumbnails() {
        const container = document.getElementById('videoThumbnails');
        container.innerHTML = '';
        if (currentAlbumVideos.length <= 1) { container.style.display = 'none'; return; }

        currentAlbumVideos.forEach((video, i) => {
            const videoId = extractYoutubeId(video.src);
            const thumb = document.createElement('div');
            thumb.className = 'vid-thumb-item';
            thumb.title = `Video ${i + 1}`;
            thumb.style.cssText = `
                width:80px; height:55px; border-radius:6px; overflow:hidden; cursor:pointer;
                border:2px solid ${i === 0 ? '#e14c1e' : 'transparent'};
                opacity:${i === 0 ? '1' : '0.5'}; transition:all 0.2s;
            `;
            thumb.innerHTML = `<img src="https://img.youtube.com/vi/${videoId}/mqdefault.jpg"
                style="width:100%;height:100%;object-fit:cover;" onerror="this.src='/assets/jmpsss/image/new/slider1.jpg'">`;
            thumb.onclick = (e) => { e.stopPropagation(); currentVideoIndex = i; updateVideoModalContent(); };
            container.appendChild(thumb);
        });
        container.style.display = 'flex';
    }

    function changeVideo(step) {
        currentVideoIndex += step;
        if (currentVideoIndex < 0) currentVideoIndex = currentAlbumVideos.length - 1;
        if (currentVideoIndex >= currentAlbumVideos.length) currentVideoIndex = 0;
        updateVideoModalContent();
    }

    function closeVideoModal(event) {
        // If triggered from backdrop click, event.target must be the modal itself
        if (event && event.target !== document.getElementById('videoModal') && event.type === 'click') {
            if (event.currentTarget === document.getElementById('videoModal') && event.target !== event.currentTarget) {
                return; // clicked inside content, ignore
            }
        }
        const modal = document.getElementById('videoModal');
        modal.classList.remove('active');
        modal.style.display = 'none';
        document.getElementById('videoPlaceholder').innerHTML = '';
        document.body.style.overflow = 'auto';
    }

    // Wire up close button explicitly
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('closeVideo').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            closeVideoModal();
        });

        // Backdrop click
        document.getElementById('videoModal').addEventListener('click', function(e) {
            if (e.target === this) closeVideoModal();
        });
    });

    function extractYoutubeId(url) {
        if (!url) return '';
        if (url.includes('embed/')) return url.split('embed/')[1].split('?')[0];
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : '';
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        const modal = document.getElementById('videoModal');
        if (!modal.classList.contains('active') && modal.style.display !== 'flex') return;
        if (e.key === 'ArrowLeft') { e.preventDefault(); changeVideo(-1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); changeVideo(1); }
        if (e.key === 'Escape') { e.preventDefault(); closeVideoModal(); }
    });
</script>
@endpush
