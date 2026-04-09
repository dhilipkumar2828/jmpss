@extends('layouts.app')
@section('title', 'Video Gallery')

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

        /* ── Category View & Cards ── */
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
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ── Improved Video Modal ── */
        .video-modal-v3 {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.98);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .video-modal-v3.active {
            display: flex;
            opacity: 1;
        }

        .video-modal-container {
            width: 95%;
            max-width: 1200px;
            background: #111;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0,0,0,0.8);
            display: flex;
            flex-direction: row;
            height: 80vh;
            position: relative;
            transform: scale(0.9);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .video-modal-v3.active .video-modal-container {
            transform: scale(1);
        }

        /* Player Section */
        .modal-main-player {
            flex: 1;
            background: #000;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .video-wrapper {
            flex: 1;
            position: relative;
        }

        #videoPlaceholder {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #videoPlaceholder iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .modal-player-footer {
            padding: 20px 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: #fff;
        }

        .modal-player-footer h2 {
            font-size: 20px;
            margin: 0 0 5px;
            font-family: 'Outfit', sans-serif;
            color: #fff;
        }

        .modal-player-footer p {
            font-size: 14px;
            color: #aaa;
            margin: 0;
        }

        /* Playlist Sidebar */
        .modal-playlist-sidebar {
            width: 350px;
            background: #1a1a1a;
            border-left: 1px solid #333;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .playlist-header {
            padding: 25px;
            border-bottom: 1px solid #333;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .playlist-header h4 {
            font-size: 16px;
            margin: 0;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .playlist-header span {
            background: var(--logo-orange, #e14c1e);
            color: #fff;
            font-size: 12px;
            padding: 2px 10px;
            border-radius: 20px;
            font-weight: 700;
        }

        .playlist-items {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
        }

        .playlist-items::-webkit-scrollbar { width: 4px; }
        .playlist-items::-webkit-scrollbar-track { background: transparent; }
        .playlist-items::-webkit-scrollbar-thumb { background: #444; border-radius: 10px; }

        .playlist-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            margin-bottom: 10px;
            border: 2px solid transparent;
        }

        .playlist-item:hover {
            background: rgba(255,255,255,0.05);
        }

        .playlist-item.active {
            background: rgba(225, 76, 30, 0.15);
            border-color: rgba(225, 76, 30, 0.4);
        }

        .pl-thumb {
            width: 100px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
        }

        .pl-thumb img { width: 100%; height: 100%; object-fit: cover; }

        .pl-thumb .playing-overlay {
            position: absolute;
            inset: 0;
            background: rgba(225, 76, 30, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
        }

        .playlist-item.active .pl-thumb .playing-overlay {
            display: flex;
        }

        .pl-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .pl-info span {
            font-size: 13px;
            color: #fff;
            font-weight: 600;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .close-modal-btn {
            position: absolute;
            top: 5px;
            right: 0px;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border: none;
            color: #fff;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: 0.3s;
        }

        .close-modal-btn:hover {
            background: var(--logo-orange, #e14c1e);
            transform: rotate(90deg);
        }

        /* Navigation Arrows on Player */
        .player-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(0,0,0,0.5);
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            transition: 0.3s;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .player-nav-btn:hover { background: var(--logo-orange, #e14c1e); }
        .player-nav-prev { left: 20px; }
        .player-nav-next { right: 20px; }

        @media (max-width: 991px) {
            .category-view {
                padding: 40px 0 80px;
            }
            .desktop-tablet-filter {
                display: flex !important;
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                justify-content: flex-start !important;
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
                border-radius: 40px !important;
                text-decoration: none !important;
                font-size: 14px !important;
                font-weight: 600 !important;
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
                z-index: 1500;
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

        /* ── Page Fade View ── */
        @keyframes viewFadeIn {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
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
            <h1>{{ $pageBanner->title ?? 'Video Collections' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px;">{{ $pageBanner->subtitle }}</p>
            @endif
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span>Videos</span>
            </nav>
        </div>
    </section>

    <!-- ── Video Gallery View ── -->
    <section class="category-view1" style="display: block; background: #fff; padding-top: 60px;">
        <div class="container">
            
            <div class="filter-container" style="text-align: center; margin-bottom: 50px; overflow: visible !important;">
                {{-- Desktop/Tablet Horizontal Tabs --}}
                <div class="filter-wrap desktop-tablet-filter">
                    <a href="{{ route('videos') }}" 
                        class="gallery-tab {{ !request('category') ? 'active' : '' }}"
                        style="{{ !request('category') ? 'background:' . $primaryColor : '' }}">All</a>
                    @foreach($categories as $cat)
                        <a href="{{ route('videos', ['category' => $cat]) }}"
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
                        <a href="{{ route('videos') }}" class="{{ !request('category') ? 'active' : '' }}">All</a>
                        @foreach($categories as $cat)
                            <a href="{{ route('videos', ['category' => $cat]) }}"
                                class="{{ request('category') == $cat ? 'active' : '' }}">{{ $cat }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="cat-grid">
                @forelse($albums as $album)
                @php
                    $videosList = $album->items->where('item_type', 'video')->values();
                    $videoData = $videosList->map(fn($v) => [
                        'src' => $v->video_url,
                        'title' => $album->title
                    ])->values();
                @endphp
                <div class="video-item-card" 
                     data-videos='{!! json_encode($videoData) !!}' 
                     data-title="{{ $album->title }}" 
                     data-desc="{{ $album->description }}"
                     onclick="initVideoAlbum(this)">
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

            <div class="pagination-wrap" style="margin-top: 60px;">
                {{ $albums->links() }}
            </div>
        </div>
    </section>

    <!-- Refined Video Modal -->
    <div class="video-modal-v3" id="videoModal">
        <div class="video-modal-container">
            <button class="close-modal-btn" onclick="closeVideoModal()">&times;</button>
            
            <!-- Main Player Column -->
            <div class="modal-main-player">
                <div class="video-wrapper">
                    <div id="videoPlaceholder"></div>
                    <button class="player-nav-btn player-nav-prev" onclick="changeVideo(-1)" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
                    <button class="player-nav-btn player-nav-next" onclick="changeVideo(1)" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="modal-player-footer">
                    <h2 id="currentVideoTitle">Video Title</h2>
                    <p id="currentVideoDesc">Description goes here...</p>
                </div>
            </div>

            <!-- Playlist Column (Sidebar) -->
            <div class="modal-playlist-sidebar" id="playlistSidebar">
                <div class="playlist-header">
                    <h4>Video Playlist</h4>
                    <span id="videoCountBadge">0 Videos</span>
                </div>
                <div class="playlist-items" id="playlistItems">
                    <!-- Dynamic Items -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentAlbumVideos = [];
    let currentVideoIndex = 0;
    let currentAlbumTitle = '';
    let currentAlbumDesc = '';

    function initVideoAlbum(element) {
        try {
            currentAlbumVideos = JSON.parse(element.getAttribute('data-videos'));
            currentAlbumTitle = element.getAttribute('data-title');
            currentAlbumDesc = element.getAttribute('data-desc');
            currentVideoIndex = 0;

            renderPlaylist();
            updatePlayer();

            const modal = document.getElementById('videoModal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('active'), 10);
            document.body.style.overflow = 'hidden';
        } catch(e) {
            console.error("Error initializing video album:", e);
        }
    }

    function renderPlaylist() {
        const container = document.getElementById('playlistItems');
        const sidebar = document.getElementById('playlistSidebar');
        const badge = document.getElementById('videoCountBadge');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        container.innerHTML = '';
        badge.innerText = `${currentAlbumVideos.length} Videos`;

        if (currentAlbumVideos.length <= 1) {
            sidebar.style.display = 'none';
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
            return;
        }

        sidebar.style.display = 'flex';
        prevBtn.style.display = 'flex';
        nextBtn.style.display = 'flex';

        currentAlbumVideos.forEach((video, i) => {
            const videoId = extractYoutubeId(video.src);
            const item = document.createElement('div');
            item.className = `playlist-item ${i === currentVideoIndex ? 'active' : ''}`;
            item.onclick = () => { currentVideoIndex = i; updatePlayer(); };
            
            item.innerHTML = `
                <div class="pl-thumb">
                    <img src="https://img.youtube.com/vi/${videoId}/mqdefault.jpg" onerror="this.src='{{ asset('/assets/jmpsss/image/new/slider1.jpg') }}'">
                    <div class="playing-overlay"><i class="fas fa-play"></i></div>
                </div>
                <div class="pl-info">
                    <span>${video.title} - Video ${i+1}</span>
                </div>
            `;
            container.appendChild(item);
        });
    }

    function updatePlayer() {
        if (!currentAlbumVideos[currentVideoIndex]) return;
        
        const video = currentAlbumVideos[currentVideoIndex];
        const placeholder = document.getElementById('videoPlaceholder');
        const videoId = extractYoutubeId(video.src);

        placeholder.innerHTML = videoId 
            ? `<iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>`
            : `<div style="color:#fff;display:flex;align-items:center;justify-content:center;height:100%;padding:40px;text-align:center;">
                <div><i class="fas fa-exclamation-triangle" style="font-size:40px;color:#e14c1e;margin-bottom:15px;"></i><br>Invalid Video URL<br><span style="font-size:12px;opacity:0.6;">${video.src}</span></div>
               </div>`;

        document.getElementById('currentVideoTitle').innerText = `${currentAlbumTitle} (Video ${currentVideoIndex + 1})`;
        document.getElementById('currentVideoDesc').innerText = currentAlbumDesc || 'Student Activity / School Event Video Collection';

        // Update active class in playlist
        document.querySelectorAll('.playlist-item').forEach((el, i) => {
            el.classList.toggle('active', i === currentVideoIndex);
        });
        
        // Auto scroll playlist to active item
        const activeItem = document.querySelector('.playlist-item.active');
        if (activeItem) activeItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function changeVideo(step) {
        currentVideoIndex += step;
        if (currentVideoIndex < 0) currentVideoIndex = currentAlbumVideos.length - 1;
        if (currentVideoIndex >= currentAlbumVideos.length) currentVideoIndex = 0;
        updatePlayer();
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        modal.classList.remove('active');
        setTimeout(() => {
            modal.style.display = 'none';
            document.getElementById('videoPlaceholder').innerHTML = '';
            document.body.style.overflow = 'auto';
        }, 400);
    }

    function extractYoutubeId(url) {
        if (!url) return '';
        if (url.includes('embed/')) return url.split('embed/')[1].split('?')[0];
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : '';
    }

    // Modal Background Click
    document.getElementById('videoModal').addEventListener('click', function(e) {
        if (e.target === this) closeVideoModal();
    });

    // Keyboard controls
    document.addEventListener('keydown', (e) => {
        const modal = document.getElementById('videoModal');
        if (!modal.classList.contains('active')) return;
        if (e.key === 'ArrowLeft') changeVideo(-1);
        if (e.key === 'ArrowRight') changeVideo(1);
        if (e.key === 'Escape') closeVideoModal();
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
