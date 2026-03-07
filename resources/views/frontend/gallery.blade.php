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

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label" id="pageLabel">Gallery</span>
            <h1 id="pageTitle">Photos</h1>
            <nav class="breadcrumb-trail" id="breadcrumbTrail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="{{ route('gallery') }}">Gallery</a>
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
                <h2 class="section-title">Photo Collections</h2>
                <p style="color:#666; margin-top:12px;">Select a category to explore our photo archives by year.</p>
            </div>

            <div class="cat-grid">
                <!-- Category 1 -->
                <div class="cat-card" onclick="openCategory('celebrations', 'Institutional Events')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="Institutional Events">
                        <div class="cat-overlay"><i class="fa-solid fa-camera"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Institutional Events</h3>
                        <p>Annual days, cultural festivals and celebrations</p>
                    </div>
                </div>

                <!-- Category 2 -->
                <div class="cat-card" onclick="openCategory('academic', 'Academic Excellence')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider2.jpg') }}" alt="Academic Excellence">
                        <div class="cat-overlay"><i class="fa-solid fa-graduation-cap"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Academic Excellence</h3>
                        <p>Classroom learning and academic milestones</p>
                    </div>
                </div>

                <!-- Category 3 -->
                <div class="cat-card" onclick="openCategory('cultural', 'Cultural Resonance')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img03.jpg') }}" alt="Cultural Resonance">
                        <div class="cat-overlay"><i class="fa-solid fa-palette"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Cultural Resonance</h3>
                        <p>Traditional dance, arts and creative workshops</p>
                    </div>
                </div>

                <!-- Category 4 -->
                <div class="cat-card" onclick="openCategory('sports', 'Athletic Spirit')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img07.jpg') }}" alt="Athletic Spirit">
                        <div class="cat-overlay"><i class="fa-solid fa-trophy"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Athletic Spirit</h3>
                        <p>Zonal sports meets and playground action</p>
                    </div>
                </div>

                <!-- Category 5 -->
                <div class="cat-card" onclick="openCategory('environment', 'Campus Landscapes')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Campus Landscapes">
                        <div class="cat-overlay"><i class="fa-solid fa-leaf"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Campus Landscapes</h3>
                        <p>Lush green environment and school infrastructure</p>
                    </div>
                </div>

                <!-- Category 6 -->
                <div class="cat-card" onclick="openCategory('awards', 'Awards & Honors')">
                    <div class="cat-card-thumb">
                        <img src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="Awards & Honors">
                        <div class="cat-overlay"><i class="fa-solid fa-award"></i></div>
                    </div>
                    <div class="cat-card-body">
                        <h3>Awards &amp; Honors</h3>
                        <p>Recognizing the excellence of our students</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Gallery Detail View ── -->
    <section class="gallery-view" id="galleryView">
        <div class="container">
            <div class="back-btn" onclick="closeCategory()">
                <i class="fa-solid fa-arrow-left"></i> Back to Categories
            </div>

            <!-- Content injected by JS -->
            <div id="galleryContent"></div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close" id="lightboxClose"><i class="fa-solid fa-xmark"></i></span>
            <img src="" alt="Gallery Lightbox" id="lightboxImg">
            <div class="lightbox-nav">
                <i class="fa-solid fa-chevron-left" id="prevBtn"></i>
                <i class="fa-solid fa-chevron-right" id="nextBtn"></i>
            </div>
            <div class="lightbox-caption">
                <h4 id="lightboxTitle"></h4>
                <p id="lightboxCategory"></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
@endsection

@push('scripts')
<script>
    const galleryAssetRoot = @json(asset('assets/jmpsss'));

    function galleryAsset(path) {
        return `${galleryAssetRoot}/${path}`;
    }

    function updateGalleryUrl(category = null) {
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

    const photoData = {
        celebrations: {
            label: 'Institutional Events',
            years: {
                '2024-25': [{
                        src: 'image/img03.jpg',
                        title: 'Annual Cultural Fest 2024'
                    },
                    {
                        src: 'image/img08.jpg',
                        title: 'Annual Sports Day Celebration'
                    },
                    {
                        src: 'image/img11.jpg',
                        title: 'Graduation Ceremony Highlights'
                    },
                    {
                        src: 'image/new/slider1.jpg',
                        title: 'School Anniversary Celebration'
                    }
                ],
                '2023-24': [{
                        src: 'image/new/slider2.jpg',
                        title: 'Republic Day Parade 2023'
                    },
                    {
                        src: 'image/new/env2.png',
                        title: 'Independence Day Celebration'
                    },
                    {
                        src: 'image/new/env3.png',
                        title: 'Teachers Day Event 2023'
                    }
                ],
                '2022-23': [{
                        src: 'image/new/env1.png',
                        title: 'School Foundation Day 2022'
                    },
                    {
                        src: 'image/new/slider3.jpg',
                        title: "Children's Day Celebration"
                    }
                ]
            }
        },
        academic: {
            label: 'Academic Excellence',
            years: {
                '2024-25': [{
                        src: 'image/img02.jpg',
                        title: 'Advanced Science Laboratory'
                    },
                    {
                        src: 'image/img10.jpg',
                        title: 'Computer Innovation Hub'
                    },
                    {
                        src: 'image/new/school22.jpg',
                        title: 'Interactive Smart Classroom'
                    }
                ],
                '2023-24': [{
                        src: 'image/new/slider2.jpg',
                        title: 'Mathematics Olympiad Winners'
                    },
                    {
                        src: 'image/new/slider1.jpg',
                        title: 'Science Exhibition 2023'
                    }
                ]
            }
        },
        cultural: {
            label: 'Cultural Resonance',
            years: {
                '2024-25': [{
                        src: 'image/img06.jpg',
                        title: 'Digital Art & Creative Studio'
                    },
                    {
                        src: 'image/img12.jpg',
                        title: 'Traditional Dance Performance'
                    },
                    {
                        src: 'image/new/env3.png',
                        title: 'Kolam Art Competition'
                    }
                ],
                '2023-24': [{
                        src: 'image/img03.jpg',
                        title: 'Folk Dance Showcase 2023'
                    },
                    {
                        src: 'image/new/env2.png',
                        title: 'Drama & Theatre Day'
                    }
                ]
            }
        },
        sports: {
            label: 'Athletic Spirit',
            years: {
                '2024-25': [{
                        src: 'image/img04.jpg',
                        title: 'Inter-School Basketball Meet'
                    },
                    {
                        src: 'image/img07.jpg',
                        title: 'Expansive Green Playground'
                    },
                    {
                        src: 'image/img08.jpg',
                        title: 'Sports Day Athletics Track'
                    }
                ],
                '2023-24': [{
                        src: 'image/new/slider3.jpg',
                        title: 'District Kabaddi Champions 2023'
                    },
                    {
                        src: 'image/img04.jpg',
                        title: 'Volleyball Tournament Finals'
                    }
                ]
            }
        },
        environment: {
            label: 'Campus Landscapes',
            years: {
                '2024-25': [{
                        src: 'image/img01.jpg',
                        title: 'Main Building Aerial View'
                    },
                    {
                        src: 'image/img05.jpg',
                        title: 'The Wisdom Center - Library'
                    },
                    {
                        src: 'image/img09.jpg',
                        title: 'Botanical Learning Garden'
                    },
                    {
                        src: 'image/new/slider3.jpg',
                        title: 'School Campus Greenery'
                    }
                ],
                '2023-24': [{
                        src: 'image/new/slider1.jpg',
                        title: 'Main Entrance Gate 2023'
                    },
                    {
                        src: 'image/new/slider2.jpg',
                        title: 'Classroom Wing Renovation'
                    }
                ]
            }
        },
        awards: {
            label: 'Awards & Honors',
            years: {
                '2024-25': [{
                        src: 'image/img01.jpg',
                        title: 'State Level Excellence Award 2024'
                    },
                    {
                        src: 'image/img10.jpg',
                        title: 'Best School Recognition'
                    },
                    {
                        src: 'image/new/award1.jpg',
                        title: 'Trophy Ceremony 2024'
                    }
                ],
                '2023-24': [{
                        src: 'image/img11.jpg',
                        title: 'National Merit Award 2023'
                    },
                    {
                        src: 'image/img02.jpg',
                        title: 'Outstanding Performance Recognition'
                    }
                ]
            }
        }
    };

    let allLightboxItems = [];
    let currentLightboxIndex = 0;

    function openCategory(catKey) {
        const categoryView = document.getElementById('categoryView');
        const galleryView = document.getElementById('galleryView');
        const content = document.getElementById('galleryContent');
        const pageTitle = document.getElementById('pageTitle');
        const bcSep = document.getElementById('bcSep');
        const bcCurrent = document.getElementById('bcCurrent');

        const data = photoData[catKey];
        if (!data) return;

        pageTitle.textContent = data.label;
        bcSep.style.display = 'inline';
        bcCurrent.textContent = data.label;
        bcCurrent.style.display = 'inline';

        allLightboxItems = [];
        let html = '';
        const years = Object.keys(data.years).sort().reverse();

        years.forEach((year) => {
            const photos = data.years[year];
            html += `
                <div class="year-section">
                    <div class="year-heading">
                        <span class="year-pill">${year}</span>
                    </div>
                    <div class="gallery-grid">
            `;

            photos.forEach((photo) => {
                allLightboxItems.push(photo);
                const globalIndex = allLightboxItems.length - 1;
                html += `
                    <div class="gallery-item" onclick="openLightbox(${globalIndex})">
                        <div class="photo-thumb">
                            <img src="${galleryAsset(photo.src)}" alt="${photo.title}" loading="lazy">
                            <div class="photo-overlay-btn">
                                <i class="fa-solid fa-expand"></i>
                            </div>
                        </div>
                        <div class="photo-details">
                            <h3>${photo.title}</h3>
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

        updateGalleryUrl(catKey);
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
        pageTitle.textContent = 'Photos';
        bcSep.style.display = 'none';
        bcCurrent.style.display = 'none';

        updateGalleryUrl(null);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function openLightbox(index) {
        currentLightboxIndex = index;
        const item = allLightboxItems[index];
        if (!item) return;

        document.getElementById('lightboxImg').src = galleryAsset(item.src);
        document.getElementById('lightboxTitle').textContent = item.title;
        document.getElementById('lightboxCategory').textContent = '';
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const categoryParam = new URLSearchParams(window.location.search).get('category');
        const hashCategory = window.location.hash.replace('#', '');
        const initialCategory = categoryParam || hashCategory;

        if (initialCategory && photoData[initialCategory]) {
            openCategory(initialCategory);
        }

        window.addEventListener('hashchange', () => {
            const currentHash = window.location.hash.replace('#', '');
            if (currentHash && photoData[currentHash]) {
                openCategory(currentHash);
            } else {
                closeCategory();
            }
        });

        const lightbox = document.getElementById('lightbox');
        document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        document.getElementById('prevBtn').addEventListener('click', (e) => {
            e.stopPropagation();
            let index = currentLightboxIndex - 1;
            if (index < 0) index = allLightboxItems.length - 1;
            openLightbox(index);
        });

        document.getElementById('nextBtn').addEventListener('click', (e) => {
            e.stopPropagation();
            let index = currentLightboxIndex + 1;
            if (index >= allLightboxItems.length) index = 0;
            openLightbox(index);
        });

        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'ArrowLeft') document.getElementById('prevBtn').click();
            if (e.key === 'ArrowRight') document.getElementById('nextBtn').click();
            if (e.key === 'Escape') closeLightbox();
        });
    });
</script>
@endpush


