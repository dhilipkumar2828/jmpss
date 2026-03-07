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

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label" id="pageLabel">Gallery</span>
            <h1 id="pageTitle">Videos</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="{{ route('videos') }}">Gallery</a>
                <span id="bcSep" style="display:none;">›</span>
                <span id="bcCurrent" style="display:none;"></span>
            </nav>
        </div>
    </section>

    <!-- ── Category Selection View ── -->
    <section class="category-view" id="categoryView">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Visual Journey</span>
                <h2 class="section-title">Video Collections</h2>
                <p style="color:#666; margin-top:12px;">Select a category to explore our video archives by year.</p>
            </div>

            <div class="cat-grid">
                <!-- Category 1 -->
                <div class="cat-card" onclick="openCategory('institutional', 'Institutional Events')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="Institutional Events">
                        <div class="cat-overlay"><i class="fa-solid fa-video"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Institutional Events</h3>
                        <p>Annual days, school functions and special ceremonies</p>
                    </div>
                </div>

                <!-- Category 2 -->
                <div class="cat-card" onclick="openCategory('cultural', 'Cultural Programs')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img03.jpg') }}" alt="Cultural Programs">
                        <div class="cat-overlay"><i class="fa-solid fa-masks-theater"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Cultural Programs</h3>
                        <p>Dance, drama, music and creative arts performances</p>
                    </div>
                </div>

                <!-- Category 3 -->
                <div class="cat-card" onclick="openCategory('sports', 'Sports & Athletics')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img08.jpg') }}" alt="Sports & Athletics">
                        <div class="cat-overlay"><i class="fa-solid fa-running"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Sports &amp; Athletics</h3>
                        <p>Sports meets, tournaments and athletic achievements</p>
                    </div>
                </div>

                <!-- Category 4 -->
                <div class="cat-card" onclick="openCategory('academic', 'Academic Excellence')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider2.jpg') }}" alt="Academic Excellence">
                        <div class="cat-overlay"><i class="fa-solid fa-graduation-cap"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Academic Excellence</h3>
                        <p>Science fairs, olympiads and academic achievements</p>
                    </div>
                </div>

                <!-- Category 5 -->
                <div class="cat-card" onclick="openCategory('campus', 'Campus Tour')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Campus Tour">
                        <div class="cat-overlay"><i class="fa-solid fa-school"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Campus Tour</h3>
                        <p>Explore our vibrant campus and modern facilities</p>
                    </div>
                </div>

                <!-- Category 6 -->
                <div class="cat-card" onclick="openCategory('highlights', 'School Highlights')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img07.jpg') }}" alt="School Highlights">
                        <div class="cat-overlay"><i class="fa-solid fa-star"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>School Highlights</h3>
                        <p>Best moments and memorable milestones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Video Detail View ── -->
    <section class="gallery-view" id="galleryView">
        <div class="container">
            <div class="back-btn" onclick="closeCategory()">
                <i class="fa-solid fa-arrow-left"></i> Back to Categories
            </div>
            <!-- Content injected by JS -->
            <div id="galleryContent"></div>
        </div>
    </section>

    <!-- Video Modal -->
    <div class="video-modal-v3" id="videoModal">
        <div class="video-modal-content">
            <span class="close-video-modal" id="closeVideo">&times;</span>
            <div class="video-player-container">
                <div id="videoPlaceholder"></div>
            </div>
        </div>
    </div>

    <!-- Footer -->
@endsection

@push('scripts')
<script>
    const videoAssetRoot = @json(asset('assets/jmpsss'));

    function videoAsset(path) {
        return `${videoAssetRoot}/${path}`;
    }

    function updateVideosUrl(category = null) {
        const url = new URL(window.location.href);
        if (category) {
            url.searchParams.set('category', category);
            url.hash = category;
        } else {
            url.searchParams.delete('category');
            url.hash = '';
        }
        window.history.replaceState({}, '', `${url.pathname}${url.search}${url.hash}`);
    }

    const videoData = {
        institutional: {
            label: 'Institutional Events',
            years: {
                '2024-25': [{
                        type: 'local',
                        src: 'image/School_Admission_Cinematic_Background_Video.mp4',
                        thumb: 'image/new/slider3.jpg',
                        cat: 'Institutional',
                        title: 'Cinematic Campus Tour 2024',
                        desc: 'A journey through the architectural and academic heart of our school.'
                    },
                    {
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img08.jpg',
                        cat: 'Institutional',
                        title: 'Annual Day 2024',
                        desc: 'A grand celebration of achievements, talents and milestones.'
                    }
                ],
                '2023-24': [{
                        type: 'local',
                        src: 'image/Video_Generation_From_Logo_Name.mp4',
                        thumb: 'image/new/slider1.jpg',
                        cat: 'Institutional',
                        title: 'The Crest Heritage 2023',
                        desc: 'The story of our foundation and the vision that guides us today.'
                    },
                    {
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/new/slider2.jpg',
                        cat: 'Institutional',
                        title: 'Independence Day 2023',
                        desc: 'Patriotic celebrations and flag hoisting ceremony highlights.'
                    }
                ]
            }
        },
        cultural: {
            label: 'Cultural Programs',
            years: {
                '2024-25': [{
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img03.jpg',
                        cat: 'Cultural',
                        title: 'Annual Arts Festival 2024',
                        desc: 'Showcasing the creative spirit and talent of our vibrant student body.'
                    },
                    {
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img06.jpg',
                        cat: 'Cultural',
                        title: 'Traditional Dance Showcase',
                        desc: 'A mesmerizing classical and folk dance performance by our students.'
                    }
                ],
                '2023-24': [{
                    type: 'youtube',
                    src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                    thumb: 'image/img12.jpg',
                    cat: 'Cultural',
                    title: 'Drama Day 2023',
                    desc: 'Original theatrical performances written and performed by students.'
                }]
            }
        },
        sports: {
            label: 'Sports & Athletics',
            years: {
                '2024-25': [{
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img08.jpg',
                        cat: 'Athletics',
                        title: 'Inter-School Sports Meet 2024',
                        desc: 'Relive the grit, passion, and sportsmanship on the school field.'
                    },
                    {
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img04.jpg',
                        cat: 'Athletics',
                        title: 'Basketball Tournament Finals',
                        desc: 'An intense final match that went down to the wire.'
                    }
                ],
                '2023-24': [{
                    type: 'youtube',
                    src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                    thumb: 'image/img07.jpg',
                    cat: 'Athletics',
                    title: 'District Kabaddi Championship 2023',
                    desc: 'Our team brought home the district championship trophy.'
                }]
            }
        },
        academic: {
            label: 'Academic Excellence',
            years: {
                '2024-25': [{
                    type: 'youtube',
                    src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                    thumb: 'image/img02.jpg',
                    cat: 'Academic',
                    title: 'Science Innovation Fair 2024',
                    desc: 'Brilliant student projects and scientific innovations on display.'
                }],
                '2023-24': [{
                    type: 'youtube',
                    src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                    thumb: 'image/img10.jpg',
                    cat: 'Academic',
                    title: 'Mathematics Olympiad 2023',
                    desc: 'State-level winners share their winning strategies and experiences.'
                }]
            }
        },
        campus: {
            label: 'Campus Tour',
            years: {
                '2024-25': [{
                        type: 'local',
                        src: 'image/School_Admission_Cinematic_Background_Video.mp4',
                        thumb: 'image/new/slider3.jpg',
                        cat: 'Campus',
                        title: 'Full Campus Walkthrough 2024',
                        desc: 'A complete tour of our state-of-the-art facilities.'
                    },
                    {
                        type: 'youtube',
                        src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                        thumb: 'image/img05.jpg',
                        cat: 'Campus',
                        title: 'Library & Learning Center',
                        desc: 'Explore our modern library with thousands of books and digital resources.'
                    }
                ]
            }
        },
        highlights: {
            label: 'School Highlights',
            years: {
                '2024-25': [{
                    type: 'local',
                    src: 'image/Video_Generation_From_Logo_Name.mp4',
                    thumb: 'image/new/slider1.jpg',
                    cat: 'Highlights',
                    title: 'JMPSSS - Year in Review 2024',
                    desc: 'A beautiful montage of our best moments through the academic year.'
                }],
                '2023-24': [{
                    type: 'youtube',
                    src: 'https://www.youtube.com/embed/ScMzIvxBSi4',
                    thumb: 'image/new/slider2.jpg',
                    cat: 'Highlights',
                    title: 'Best of JMPSSS 2023',
                    desc: 'Top memories and proudest achievements from 2022-23.'
                }]
            }
        }
    };

    function openCategory(catKey) {
        const categoryView = document.getElementById('categoryView');
        const galleryView = document.getElementById('galleryView');
        const content = document.getElementById('galleryContent');
        const pageTitle = document.getElementById('pageTitle');
        const bcSep = document.getElementById('bcSep');
        const bcCurrent = document.getElementById('bcCurrent');

        const data = videoData[catKey];
        if (!data) return;

        pageTitle.textContent = data.label;
        bcSep.style.display = 'inline';
        bcCurrent.textContent = data.label;
        bcCurrent.style.display = 'inline';

        let html = '';
        const years = Object.keys(data.years).sort().reverse();

        years.forEach((year) => {
            const videos = data.years[year];
            html += `
                <div class="year-section">
                    <div class="year-heading">
                        <span class="year-pill">${year}</span>
                    </div>
                    <div class="video-year-grid">
            `;

            videos.forEach((video) => {
                html += `
                    <div class="video-item-card"
                         data-video-type="${video.type}"
                         data-video-src="${video.src}"
                         onclick="openVideo(this)">
                        <div class="video-thumb">
                            <img src="${videoAsset(video.thumb)}" alt="${video.title}" loading="lazy">
                            <div class="video-overlay-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>
                            <span class="video-cat-badge">${video.cat}</span>
                        </div>
                        <div class="video-details">
                            <h3>${video.title}</h3>
                            <p>${video.desc}</p>
                        </div>
                    </div>
                `;
            });

            html += `</div></div>`;
        });

        content.innerHTML = html;

        categoryView.style.display = 'none';
        galleryView.classList.add('active', 'fade-enter');
        setTimeout(() => galleryView.classList.remove('fade-enter'), 600);

        updateVideosUrl(catKey);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function closeCategory() {
        const categoryView = document.getElementById('categoryView');
        const galleryView = document.getElementById('galleryView');
        const pageTitle = document.getElementById('pageTitle');
        const bcSep = document.getElementById('bcSep');
        const bcCurrent = document.getElementById('bcCurrent');

        galleryView.classList.remove('active');
        categoryView.style.display = 'block';
        pageTitle.textContent = 'Videos';
        bcSep.style.display = 'none';
        bcCurrent.style.display = 'none';

        updateVideosUrl(null);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function openVideo(card) {
        const type = card.getAttribute('data-video-type');
        const src = card.getAttribute('data-video-src');
        const modal = document.getElementById('videoModal');
        const placeholder = document.getElementById('videoPlaceholder');

        if (type === 'local') {
            placeholder.innerHTML =
                `<video controls autoplay><source src="${videoAsset(src)}" type="video/mp4"></video>`;
        } else {
            placeholder.innerHTML =
                `<iframe src="${src}?autoplay=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
        }

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const placeholder = document.getElementById('videoPlaceholder');
        modal.classList.remove('active');
        placeholder.innerHTML = '';
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const categoryParam = new URLSearchParams(window.location.search).get('category');
        const hashCategory = window.location.hash.replace('#', '');
        const initialCategory = categoryParam || hashCategory;

        if (initialCategory && videoData[initialCategory]) {
            openCategory(initialCategory);
        }

        window.addEventListener('hashchange', () => {
            const currentHash = window.location.hash.replace('#', '');
            if (currentHash && videoData[currentHash]) {
                openCategory(currentHash);
            } else {
                closeCategory();
            }
        });

        const videoModal = document.getElementById('videoModal');
        document.getElementById('closeVideo').addEventListener('click', closeVideoModal);
        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) closeVideoModal();
        });
    });
</script>
@endpush


