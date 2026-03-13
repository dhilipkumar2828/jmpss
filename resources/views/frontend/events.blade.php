@extends('layouts.app')
@section('title', 'Events & Achievements | JMPSSS')

@push('styles')
<style>
    .events-grid-heading {
        margin-bottom: 42px;
    }

    #events-grid-view .event-card-page .event-date {
        top: 15px;
        left: 15px;
        right: auto;
        bottom: auto;
        padding: 8px 12px;
        font-size: 18px;
        line-height: 1;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    #events-grid-view .event-card-page .event-date span {
        font-size: 12px;
        font-weight: 600;
        margin-top: 2px;
    }

    @media (max-width: 767px) {
        .events-grid-heading {
            margin-bottom: 28px;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
    <section class="hero contact-hero">
        <div class="hero-overlay"></div>
        <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="Events" class="hero-bg" id="hero-bg-img">
        <div class="hero-content">
            <h1 id="page-title">EVENTS & ACHIEVEMENTS</h1>
            <div class="breadcrumbs" id="page-breadcrumbs">
                <a href="{{ route('home') }}">Home</a> <span>›</span> <a href="{{ route('events') }}" class="active">Events</a>
            </div>
        </div>
    </section>

    <!-- Events Main Container -->
    <main id="events-container">
        <!-- Events Grid Section -->
        <section class="events-page-section" id="events-grid-view">
            <div class="container" style="padding: 40px 0;">
                <div class="text-center events-grid-heading">
                    <span class="section-subtitle">What's Happening</span>
                    <h2 class="section-title">EVENTS & ACHIEVEMENTS</h2>
                </div>

                <div class="events-page-grid">
                    @forelse($events as $event)
                    <div class="event-card-page" onclick="showEventDetails(event, '{{ $event->id }}')" style="cursor: pointer;">
                        <div class="event-img-wrapper">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="{{ $event->title }}">
                            @endif
                            <div class="event-date">{{ $event->event_date->format('d') }} <span>{{ $event->event_date->format('M') }}</span></div>
                        </div>
                        <div class="event-info">
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit($event->description, 120) }}</p>
                            <a href="#" class="btn-read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        {{-- Hidden data for JS --}}
                        <div class="event-full-data" style="display:none;" 
                             data-id="{{ $event->id }}"
                             data-title="{{ $event->title }}"
                             data-date="{{ $event->event_date->format('d F Y') }}"
                             data-venue="{{ $event->venue ?? 'School Campus' }}"
                             data-desc="{{ $event->description }}"
                             data-img="{{ $event->image ? asset('storage/'.$event->image) : asset('assets/jmpsss/image/new/slider1.jpg') }}"
                             data-cat="{{ $event->is_featured ? 'Featured Event' : 'School Event' }}">
                        </div>
                    </div>
                    @empty
                        <div style="grid-column: 1/-1; text-align: center; padding: 60px 0;">
                            <p>No events found.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper mt-50" style="display:flex; justify-content:center;">
                    {{ $events->links() }}
                </div>
            </div>
        </section>

        <!-- Event Details Section -->
        <section class="event-detail-section" id="event-detail-view" style="display: none; padding: 40px 0 0 0;">
            <div class="container">
                <div class="mb-30">
                    <a href="#" onclick="showEventsGrid(event)" class="btn-read-more"><i
                            class="fa-solid fa-arrow-left"></i> Back to All Events</a>
                </div>
                <div class="event-detail-wrapper">
                    <!-- Main Content -->
                    <div class="event-detail-main">
                        <div class="detail-featured-img">
                            <img id="detail-img" src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="Event Image">
                        </div>

                        <div class="detail-meta">
                            <span id="detail-category"><i class="fa-solid fa-folder-open"></i> School Development</span>
                            <span><i class="fa-solid fa-tag"></i> Academic Excellence</span>
                        </div>

                        <h2 class="detail-title" id="detail-title">Significant Progress in Transfer of School Grants
                        </h2>

                        <div class="detail-text" id="detail-content">
                            <!-- Content will be injected by JavaScript -->
                        </div>

                        <div class="detail-gallery">
                            <h4 class="gallery-title">Event Highlights</h4>
                            <div class="gallery-grid-detail" id="detail-gallery-grid">
                                <!-- Images will be injected here -->
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="event-detail-sidebar">
                        <div class="sidebar-widget search-widget">
                            <h3>Search Events</h3>
                            <div class="search-box">
                                <input type="text" placeholder="keywords...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>

                        <div class="sidebar-widget recent-events-widget">
                            <h3>Recent Events</h3>
                            <div class="recent-event-list">
                                <div class="recent-item">
                                    <img src="{{ asset('assets/jmpsss/image/img02.jpg') }}" alt="Sports Day"
                                        onclick="showEventDetails(event, 'sports')">
                                    <div class="recent-info">
                                        <a href="#" onclick="showEventDetails(event, 'sports')">Annual Sports Day
                                            2024</a>
                                        <span>Nov 25, 2024</span>
                                    </div>
                                </div>
                                <div class="recent-item">
                                    <img src="{{ asset('assets/jmpsss/image/img03.jpg') }}" alt="Science Exhibition"
                                        onclick="showEventDetails(event, 'science')">
                                    <div class="recent-info">
                                        <a href="#" onclick="showEventDetails(event, 'science')">Science Exhibition</a>
                                        <span>Dec 05, 2024</span>
                                    </div>
                                </div>
                                <div class="recent-item">
                                    <img src="{{ asset('assets/jmpsss/image/img04.jpg') }}" alt="Academic Award"
                                        onclick="showEventDetails(event, 'academic')">
                                    <div class="recent-info">
                                        <a href="#" onclick="showEventDetails(event, 'academic')">Academic Toppers
                                            2024</a>
                                        <span>Jan 10, 2025</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget category-widget">
                            <h3>Categories</h3>
                            <ul>
                                <li><a href="#">Admissions <span>(12)</span></a></li>
                                <li><a href="#">Sports <span>(08)</span></a></li>
                                <li><a href="#">Academics <span>(24)</span></a></li>
                                <li><a href="#">Cultural <span>(15)</span></a></li>
                            </ul>
                        </div>

                        <a href="{{ route('admissions') }}" class="sidebar-simple-btn">Enroll Now In JMPSSS <i
                                class="fa-solid fa-arrow-right"></i></a>

                    </aside>
                </div>
            </div>
        </section>

        <!-- Campus Visit Section (Hidden by default) -->
        <section class="campus-visit-section section-padding" id="campus-visit-view" style="display: none;">
            <div class="container">
                <div class="campus-visit-wrapper">
                    <div class="visit-content-left">
                        <span class="section-subtitle">Experience JMPSSS</span>
                        <h2 class="section-title">Schedule a Campus Visit</h2>
                        <p class="visit-desc">We invite prospective students and their families to visit our campus and
                            experience the vibrant life at JMPSSS first-hand. During your visit, you'll have the chance
                            to tour our state-of-the-art facilities, meet our dedicated faculty, and see our students in
                            action.</p>

                        <div class="visit-info-grid">
                            <div class="visit-info-card">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <h4>Visiting Hours</h4>
                                <p>Mon - Fri: 9:00 AM - 4:00 PM<br>Sat: 9:00 AM - 1:00 PM</p>
                            </div>
                            <div class="visit-info-card">
                                <i class="fa-solid fa-map-location-dot"></i>
                                <h4>Location</h4>
                                <p>Thirukazhukundram, Kancheepuram Dist.</p>
                            </div>
                        </div>

                        <div class="tour-highlights">
                            <h4>What's included in the tour:</h4>
                            <ul class="visit-checklist">
                                <li><i class="fa-solid fa-circle-check"></i> Interactive Classroom Tours</li>
                                <li><i class="fa-solid fa-circle-check"></i> Science & Computer Lab Visits</li>
                                <li><i class="fa-solid fa-circle-check"></i> Library & Resource Center Walkthrough</li>
                                <li><i class="fa-solid fa-circle-check"></i> Meeting with Admission Counselors</li>
                            </ul>
                        </div>
                    </div>

                    <div class="visit-form-right">
                        <div class="booking-card">
                            <h3>Book Your Tour</h3>
                            <form class="visit-form" method="POST" action="{{ route('visit.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="mobile" placeholder="Enter phone number" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Date of Visit</label>
                                        <input type="date" name="visit_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Preferred Time</label>
                                        <div class="custom-select-wrapper">
                                            <select name="visit_time">
                                                <option value="10 AM">Morning (10 AM)</option>
                                                <option value="12 PM">Midday (12 PM)</option>
                                                <option value="2 PM">Afternoon (2 PM)</option>
                                            </select>
                                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Purpose of Visit</label>
                                    <textarea name="purpose" placeholder="Tell us about your interest..."></textarea>
                                </div>
                                <button type="submit" class="btn-primary w-100">Schedule Visit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Admission CTA Section -->
        <section class="admission-cta-section">
            <div class="container">
                <div class="admission-cta-box">
                    <h2>Admission Open 2026-27</h2>
                    <p>Empowering the next generation with excellence in education. Secure your child's future today.
                        Join the JMPSSS family and experience holistic learning at its best.</p>
                    <div class="admission-cta-btns">
                        <a href="{{ route('admissions') }}" class="btn-enroll-main">Enroll Now</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
@endsection

@push('scripts')
<script>
    const eventAssetRoot = @json(asset('assets/jmpsss'));
    const homeUrl = @json(route('home'));
    const eventsUrl = @json(route('events'));

    function eventAsset(path) {
        return `${eventAssetRoot}/${path}`;
    }

    function updateEventsUrl(nextView = null, nextEvent = null, nextHash = '') {
        const url = new URL(window.location.href);

        if (nextView) {
            url.searchParams.set('view', nextView);
        } else {
            url.searchParams.delete('view');
        }

        if (nextEvent) {
            url.searchParams.set('event', nextEvent);
        } else {
            url.searchParams.delete('event');
        }

        url.hash = nextHash || '';
        window.history.replaceState({}, '', `${url.pathname}${url.search}${url.hash}`);
    }

    const eventData = {
        grant: {
            title: 'Significant Progress in Transfer of School Grants',
            date: '12 October 2024',
            category: 'School Development',
            img: 'image/new/slider3.jpg',
            content: `<p>We are proud to announce major milestones in the allocation and transfer of essential school development grants. This funding is dedicated to enhancing our campus facilities, upgrading classroom technology, and providing more resources for our students' holistic growth.</p>
                    <p>The grant will be primarily used for the modernization of our science laboratories and the expansion of our digital library system. This initiative aligns with our commitment to providing a state-of-the-art learning environment that prepares students for the challenges of the 21st century.</p>
                    <blockquote>"Investing in our infrastructure is investing in our children's future. These grants represent a significant step forward for the JMPSSS community."</blockquote>
                    <p>In addition to physical upgrades, a portion of the grant is earmarked for teacher training programs and curriculum development workshops. We believe that empowering our faculty is the key to maintaining our high standards of academic excellence.</p>`,
            highlights: ['image/new/slider3.jpg', 'image/new/school22.jpg', 'image/new/env1.png', 'image/new/env2.png',
                'image/new/env3.png'
            ]
        },
        sports: {
            title: 'Annual Sports Day Excellence 2024',
            date: '25 November 2024',
            category: 'Sports',
            img: 'image/img02.jpg',
            content: `<p>Our Annual Sports Day was a grand success, celebrating the remarkable athletic achievements and sportsmanship of our students. From track events to team sports, the energy on the field was truly inspiring.</p>
                    <p>Students from all houses participated with great enthusiasm, demonstrating not just physical prowess but also the spirit of collaboration and healthy competition.</p>
                    <blockquote>"Sport is not just about winning; it's about character, discipline, and the will to persevere."</blockquote>
                    <p>We congratulate all the winners and participants for their dedication. Special thanks to our physical education department and the student volunteers for their seamless organization of the event.</p>`,
            highlights: ['image/img02.jpg', 'image/new/env2.png', 'image/new/env1.png', 'image/new/env3.png', 'image/img03.jpg']
        },
        science: {
            title: 'Innovative Science Exhibition 2024',
            date: '05 December 2024',
            category: 'Academics',
            img: 'image/img03.jpg',
            content: `<p>The Science Exhibition 2024 showcased the innovative scientific models and research projects created by our curious young minds. The event highlighted the importance of practical learning and scientific inquiry.</p>
                    <p>Projects ranged from sustainable energy solutions to robotics and environmental conservation. The level of detail and understanding shown by the students was exceptional.</p>
                    <blockquote>"Science is a way of thinking much more than it is a body of knowledge."</blockquote>
                    <p>We are grateful to the judges and visitors who encouraged our students. This exhibition continues to be a cornerstone of our academic calendar, fostering a love for science and technology.</p>`,
            highlights: ['image/img03.jpg', 'image/new/env3.png', 'image/new/env1.png', 'image/new/env2.png', 'image/img04.jpg']
        },
        academic: {
            title: 'Academic Toppers Award Ceremony',
            date: '10 January 2025',
            category: 'Academics',
            img: 'image/img04.jpg',
            content: `<p>We recently held a ceremony to recognize the dedication and hard work of our top-performing students in the board examinations. It was a proud moment for the students, parents, and the school.</p>
                    <p>Academic excellence is a result of consistent effort and a structured approach to learning. Our toppers have set a high benchmark for their peers.</p>
                    <blockquote>"Success is the sum of small efforts, repeated day-in and day-out."</blockquote>
                    <p>We wish all our students continued success in their future endeavors. Their achievements are a testament to the quality of education and mentorship at JMPSSS.</p>`,
            highlights: ['image/img04.jpg', 'image/new/slider1.jpg', 'image/new/school22.jpg', 'image/new/env1.png',
                'image/new/env2.png'
            ]
        },
        cultural: {
            title: 'Cultural Fest 2025: A Celebration of Arts',
            date: '15 February 2025',
            category: 'Cultural',
            img: 'image/new/env1.png',
            content: `<p>The Cultural Fest 2025 was a vibrant celebration of art, music, and dance. It brought together a diverse range of talents from across the school, showcasing our rich heritage and creative spirit.</p>
                    <p>From classical dance performances to modern music bands, the stage was alive with creativity. The event provided a platform for students to express themselves beyond the classroom.</p>
                    <blockquote>"Art is the most intense mode of individualism that the world has known."</blockquote>
                    <p>We thank the cultural committee and the performers for their hard work. The fest was a beautiful reminder of the importance of arts in a well-rounded education.</p>`,
            highlights: ['image/new/env1.png', 'image/new/school22.jpg', 'image/new/env2.png', 'image/new/env3.png',
                'image/new/slider2.jpg'
            ]
        },
        ptm: {
            title: 'Productive Parent-Teacher Meeting',
            date: '20 March 2025',
            category: 'General',
            img: 'image/new/env2.png',
            content: `<p>Our recent Parent-Teacher Meeting was a productive session focused on the continued progress and development of our students. It was heartening to see the collaborative effort between parents and teachers.</p>
                    <p>Discussion points included academic performance, behavioral growth, and suggestions for improvement. These meetings are crucial for ensuring that every student receives the support they need.</p>
                    <blockquote>"The beautiful thing about learning is that no one can take it away from you."</blockquote>
                    <p>We appreciate the active participation of all parents. Together, we can ensure a bright and successful future for our children.</p>`,
            highlights: ['image/new/env2.png', 'image/img02.jpg', 'image/new/env1.png', 'image/new/env3.png', 'image/img03.jpg']
        },
        library: {
            title: 'State-of-the-Art Digital Library Launch',
            date: '10 April 2025',
            category: 'Academics',
            img: 'image/new/env3.png',
            content: `<p>We are thrilled to announce the opening of our new digital library, a major leap forward in our educational resources. This facility provides students access to over 10,000 digital books, research journals, and interactive learning materials.</p>
                    <p>Equipped with high-speed computers and a user-friendly interface, the digital library is designed to foster a culture of research and independent learning among our students.</p>
                    <blockquote>"A library is not a luxury but one of the necessities of life."</blockquote>
                    <p>The library expansion project is part of our commitment to provide our students with the best possible educational resources.</p>`,
            highlights: ['image/new/env3.png', 'image/img03.jpg', 'image/new/env1.png', 'image/new/env2.png', 'image/img04.jpg']
        },
        yoga: {
            title: 'International Yoga Day Celebration',
            date: '21 June 2025',
            category: 'Health',
            img: 'image/new/slider2.jpg',
            content: `<p>JMPSSS celebrated International Yoga Day with active participation from students, staff, and even some parents. The morning session included various asanas and breathing exercises aimed at promoting mental and physical health.</p>
                    <p>The day began with a collective Surya Namaskar session, followed by talks on the benefits of integrating yoga into the daily life of students to improve concentration and reduce stress.</p>
                    <blockquote>"Yoga is the journey of the self, through the self, to the self."</blockquote>
                    <p>We believe such activities are essential for the holistic development of our students, helping them maintain a balanced lifestyle amid their academic pursuits.</p>`,
            highlights: ['image/new/slider2.jpg', 'image/new/env1.png', 'image/new/school22.jpg', 'image/new/env2.png',
                'image/new/env3.png'
            ]
        }
    };

    function showEventDetails(e, eventId) {
        if (e) e.preventDefault();
        
        // Find the data container in the clicked element or its parent
        const card = e.currentTarget || document.querySelector(`.event-card-page[onclick*="'${eventId}'"]`);
        if (!card) return;
        
        const dataWrap = card.querySelector('.event-full-data');
        if (!dataWrap) return;

        const data = {
            title: dataWrap.getAttribute('data-title'),
            date: dataWrap.getAttribute('data-date'),
            venue: dataWrap.getAttribute('data-venue'),
            content: dataWrap.getAttribute('data-desc'),
            img: dataWrap.getAttribute('data-img'),
            category: dataWrap.getAttribute('data-cat')
        };

        document.getElementById('detail-title').innerText = data.title;
        document.getElementById('detail-category').innerHTML = `<i class="fa-solid fa-folder-open"></i> ${data.category}`;
        document.getElementById('detail-img').src = data.img;
        document.getElementById('detail-content').innerHTML = `<p>${data.content.replace(/\n\n/g, '</p><p>').replace(/\n/g, '<br>')}</p>`;

        const galleryGrid = document.getElementById('detail-gallery-grid');
        if (galleryGrid) {
            galleryGrid.innerHTML = ''; // Clear for now or handle dynamic highlights if added to DB
        }

        document.getElementById('events-grid-view').style.display = 'none';
        document.getElementById('campus-visit-view').style.display = 'none';
        document.getElementById('event-detail-view').style.display = 'block';

        document.getElementById('page-title').innerText = 'EVENT DETAILS';
        document.getElementById('page-breadcrumbs').innerHTML =
            `<a href="${homeUrl}">Home</a> <span>›</span> <a href="#" onclick="showEventsGrid(event)">Events</a> <span>›</span> <a href="#" class="active">Details</a>`;
        document.getElementById('hero-bg-img').src = data.img;

        updateEventsUrl(null, eventId, eventId);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function showEventsGrid(e) {
        if (e) e.preventDefault();

        document.getElementById('event-detail-view').style.display = 'none';
        document.getElementById('campus-visit-view').style.display = 'none';
        document.getElementById('events-grid-view').style.display = 'block';

        document.getElementById('page-title').innerText = 'EVENTS & ACHIEVEMENTS';
        document.getElementById('page-breadcrumbs').innerHTML =
            `<a href="${homeUrl}">Home</a> <span>›</span> <a href="${eventsUrl}" class="active">Events</a>`;
        document.getElementById('hero-bg-img').src = eventAsset('image/new/slider1.jpg');

        updateEventsUrl(null, null, '');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function showCampusVisit(e) {
        if (e) e.preventDefault();

        document.getElementById('events-grid-view').style.display = 'none';
        document.getElementById('event-detail-view').style.display = 'none';
        document.getElementById('campus-visit-view').style.display = 'block';

        document.getElementById('page-title').innerText = 'CAMPUS VISIT';
        document.getElementById('page-breadcrumbs').innerHTML =
            `<a href="${homeUrl}">Home</a> <span>›</span> <a href="#" onclick="showEventsGrid(event)">Campus Life</a> <span>›</span> <a href="#" class="active">Campus Visit</a>`;
        document.getElementById('hero-bg-img').src = eventAsset('image/new/slider3.jpg');

        updateEventsUrl('visit', null, 'visit');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const view = params.get('view');
        const eventId = params.get('event');
        const hash = window.location.hash.replace('#', '');

        if (view === 'visit' || hash === 'visit' || hash === 'campus-visit') {
            showCampusVisit();
            return;
        }

        if (eventId && eventData[eventId]) {
            showEventDetails(null, eventId);
            return;
        }

        if (hash && eventData[hash]) {
            showEventDetails(null, hash);
            return;
        }

        showEventsGrid();
    });
</script>
@endpush
