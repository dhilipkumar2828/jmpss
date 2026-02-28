@extends('layouts.app')
@section('title', 'Home – JMPSS School of Excellence')

@push('styles')
<style>
    /* Hero */
    .hero {
        min-height: 100vh;
        background: var(--gradient);
        display: flex; align-items: center;
        position: relative; overflow: hidden;
        padding: 100px 24px 60px;
    }
    .hero::before {
        content: ''; position: absolute; top: -50%; right: -20%;
        width: 700px; height: 700px;
        background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 70%);
        border-radius: 50%;
        animation: pulse 6s ease-in-out infinite;
    }
    .hero::after {
        content: ''; position: absolute; bottom: -30%; left: -10%;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(42,91,160,0.3) 0%, transparent 70%);
        border-radius: 50%;
        animation: pulse 8s ease-in-out infinite reverse;
    }
    @keyframes pulse { 0%,100%{transform:scale(1) rotate(0deg);}50%{transform:scale(1.1) rotate(10deg);} }

    .hero-content { max-width: 1280px; margin: 0 auto; position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; width: 100%; }
    .hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(245,158,11,0.2); border: 1px solid rgba(245,158,11,0.4); color: var(--accent); font-size: 13px; font-weight: 600; padding: 8px 16px; border-radius: 50px; margin-bottom: 24px; letter-spacing: 0.5px; }
    .hero-badge i { font-size: 10px; }
    .hero h1 { font-family: 'Playfair Display', serif; font-size: clamp(2.5rem, 5vw, 4rem); color: white; line-height: 1.15; margin-bottom: 20px; }
    .hero h1 span { color: var(--accent); }
    .hero-desc { color: rgba(255,255,255,0.8); font-size: 18px; line-height: 1.8; margin-bottom: 36px; }
    .hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }
    .hero-stats { display: flex; gap: 32px; margin-top: 48px; }
    .hero-stat { text-align: center; }
    .hero-stat strong { display: block; font-size: 32px; font-weight: 800; color: var(--accent); }
    .hero-stat span { font-size: 13px; color: rgba(255,255,255,0.7); font-weight: 400; }
    .hero-img-wrap { position: relative; }
    .hero-img-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.2); border-radius: 24px; padding: 32px; text-align: center; }
    .hero-img-icon { font-size: 80px; margin-bottom: 20px; }
    .hero-img-card h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: white; margin-bottom: 8px; }
    .hero-img-card p { color: rgba(255,255,255,0.7); font-size: 14px; }
    .hero-floating-badge { position: absolute; top: -16px; right: -16px; background: var(--accent); color: var(--primary); padding: 12px 20px; border-radius: 12px; font-weight: 700; font-size: 14px; box-shadow: 0 8px 25px rgba(245,158,11,0.4); animation: float 3s ease-in-out infinite; }
    @keyframes float { 0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);} }

    /* Stats Bar */
    .stats-bar { background: var(--primary); padding: 0; }
    .stats-bar-inner { max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); }
    .stat-item { padding: 32px 24px; text-align: center; border-right: 1px solid rgba(255,255,255,0.1); }
    .stat-item:last-child { border-right: none; }
    .stat-item strong { display: block; font-size: 2.5rem; font-weight: 800; color: var(--accent); }
    .stat-item span { font-size: 14px; color: rgba(255,255,255,0.7); margin-top: 4px; }
    .stat-item i { font-size: 24px; color: rgba(255,255,255,0.4); margin-bottom: 8px; }

    /* Desk Section */
    .desk-section { padding: 80px 24px; }
    .desk-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 1280px; margin: 0 auto; }
    .desk-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow); border: 1px solid var(--border); display: flex; flex-direction: column; transition: transform 0.3s ease; }
    .desk-card:hover { transform: translateY(-6px); }
    .desk-card-header { background: var(--gradient); padding: 40px; text-align: center; }
    .desk-avatar { width: 100px; height: 100px; border-radius: 50%; background: rgba(255,255,255,0.2); border: 4px solid var(--accent); display: grid; place-items: center; margin: 0 auto 16px; font-size: 40px; }
    .desk-card-header h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: white; margin-bottom: 4px; }
    .desk-card-header p { color: rgba(255,255,255,0.8); font-size: 14px; }
    .desk-card-body { padding: 32px; flex: 1; }
    .desk-title { font-size: 22px; font-weight: 700; color: var(--primary); margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
    .desk-content { color: var(--text-muted); font-size: 15px; line-height: 1.9; }
    .desk-quote { margin-top: 24px; padding: 16px 20px; background: rgba(26,60,110,0.06); border-left: 4px solid var(--accent); border-radius: 0 8px 8px 0; }
    .desk-quote p { font-style: italic; color: var(--primary); font-size: 14px; font-weight: 500; }
    .desk-quote span { display: block; font-size: 12px; color: var(--text-muted); margin-top: 4px; font-style: normal; }

    /* Events Preview */
    .event-card { background: white; border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); overflow: hidden; transition: all 0.3s ease; display: flex; }
    .event-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
    .event-date-box { background: var(--gradient); padding: 20px 16px; text-align: center; min-width: 80px; display: flex; flex-direction: column; justify-content: center; }
    .event-date-box .day { font-size: 28px; font-weight: 800; color: var(--accent); line-height: 1; }
    .event-date-box .mon { font-size: 13px; color: rgba(255,255,255,0.9); font-weight: 600; text-transform: uppercase; }
    .event-date-box .year { font-size: 12px; color: rgba(255,255,255,0.6); }
    .event-info { padding: 20px; flex: 1; }
    .event-info h4 { font-size: 16px; font-weight: 700; color: var(--text); margin-bottom: 6px; }
    .event-info p { font-size: 13px; color: var(--text-muted); }
    .event-meta { display: flex; gap: 12px; margin-top: 8px; flex-wrap: wrap; }
    .event-meta span { font-size: 12px; color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
    .event-meta i { color: var(--primary); }

    /* Awards */
    .award-card { background: white; border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); padding: 28px; text-align: center; transition: all 0.3s ease; }
    .award-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
    .award-icon { width: 64px; height: 64px; background: linear-gradient(135deg, #fbbf24, #f59e0b); border-radius: 16px; display: grid; place-items: center; margin: 0 auto 16px; font-size: 28px; box-shadow: 0 4px 15px rgba(245,158,11,0.3); }
    .award-card h4 { font-size: 16px; font-weight: 700; color: var(--text); margin-bottom: 6px; }
    .award-card p { font-size: 13px; color: var(--text-muted); }
    .award-meta { font-size: 12px; color: var(--primary); font-weight: 600; margin-top: 12px; display: flex; justify-content: center; align-items: center; gap: 6px; }

    /* Testimonials */
    .testimonial-card { background: white; border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); padding: 32px; transition: all 0.3s ease; }
    .testimonial-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
    .testimonial-stars { color: #f59e0b; margin-bottom: 16px; font-size: 16px; }
    .testimonial-content { color: var(--text-muted); font-size: 15px; line-height: 1.8; font-style: italic; margin-bottom: 24px; }
    .testimonial-author { display: flex; align-items: center; gap: 12px; }
    .testimonial-avatar { width: 48px; height: 48px; border-radius: 50%; background: var(--gradient); display: grid; place-items: center; font-size: 18px; font-weight: 700; color: white; }
    .testimonial-author-info h5 { font-size: 15px; font-weight: 700; color: var(--text); }
    .testimonial-author-info p { font-size: 13px; color: var(--text-muted); }

    /* Gallery preview */
    .gallery-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; max-width: 1280px; margin: 0 auto; }
    .gallery-item { border-radius: 12px; overflow: hidden; aspect-ratio: 1; background: var(--primary); display: grid; place-items: center; font-size: 40px; cursor: pointer; position: relative; transition: transform 0.3s; }
    .gallery-item:hover { transform: scale(1.03); }
    .gallery-item:first-child { grid-column: span 2; grid-row: span 2; font-size: 64px; }

    @media (max-width: 1024px) {
        .hero-content { grid-template-columns: 1fr; text-align: center; }
        .hero-btns { justify-content: center; }
        .hero-stats { justify-content: center; }
        .hero-img-wrap { display: none; }
        .desk-grid { grid-template-columns: 1fr; }
        .stats-bar-inner { grid-template-columns: repeat(2, 1fr); }
        .gallery-grid { grid-template-columns: repeat(3, 1fr); }
        .gallery-item:first-child { grid-column: span 2; }
    }
    @media (max-width: 640px) {
        .stats-bar-inner { grid-template-columns: 1fr 1fr; }
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    }
</style>
@endpush

@section('content')

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <div>
            <div class="hero-badge">
                <i class="fas fa-star"></i>
                Ranked #1 School in the District
                <i class="fas fa-star"></i>
            </div>
            <h1>Where Knowledge <br>Meets <span>Character</span></h1>
            <p class="hero-desc">Providing quality education with a focus on academics, sports, culture, and values. Empowering students to lead with confidence.</p>
            <div class="hero-btns">
                <a href="{{ route('events') }}" class="btn btn-accent"><i class="fas fa-calendar-alt"></i> Upcoming Events</a>
                <a href="{{ route('gallery') }}" class="btn btn-outline" style="border-color:rgba(255,255,255,0.6);color:white;"><i class="fas fa-images"></i> View Gallery</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat"><strong>38+</strong><span>Years of Excellence</span></div>
                <div class="hero-stat"><strong>2,500+</strong><span>Students</span></div>
                <div class="hero-stat"><strong>120+</strong><span>Expert Faculty</span></div>
                <div class="hero-stat"><strong>95%</strong><span>Pass Rate</span></div>
            </div>
        </div>
        <div class="hero-img-wrap">
            <div class="hero-img-card">
                <div class="hero-img-icon">🏫</div>
                <h3>JMPSS Learning Campus</h3>
                <p>A safe & nurturing environment for holistic growth</p>
            </div>
            <div class="hero-floating-badge">🏆 Best School 2024</div>
        </div>
    </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
    <div class="stats-bar-inner">
        <div class="stat-item">
            <i class="fas fa-user-graduate"></i>
            <strong>{{ $awards->count() + 10 }}+</strong>
            <span>National Awards</span>
        </div>
        <div class="stat-item">
            <i class="fas fa-chalkboard-teacher"></i>
            <strong>120+</strong>
            <span>Qualified Teachers</span>
        </div>
        <div class="stat-item">
            <i class="fas fa-flask"></i>
            <strong>8</strong>
            <span>Modern Laboratories</span>
        </div>
        <div class="stat-item">
            <i class="fas fa-trophy"></i>
            <strong>500+</strong>
            <span>Sports Medals</span>
        </div>
    </div>
</div>

<!-- PRINCIPAL & CORRESPONDENT DESKS -->
<section class="desk-section">
    <div class="section-title" style="margin-bottom:40px;">
        <div class="badge">Leadership</div>
        <h2>From the Desks of Our Leaders</h2>
        <div class="divider"></div>
    </div>
    <div class="desk-grid">
        @if($principal)
        <div class="desk-card">
            <div class="desk-card-header">
                <div class="desk-avatar">👨‍💼</div>
                <h3>{{ $principal->name }}</h3>
                <p>{{ $principal->designation }}</p>
            </div>
            <div class="desk-card-body">
                <div class="desk-title"><i class="fas fa-scroll" style="color:var(--accent)"></i> {{ $principal->title }}</div>
                <div class="desk-content">{{ $principal->content }}</div>
                @if($principal->quote)
                <div class="desk-quote">
                    <p>"{{ $principal->quote }}"</p>
                    <span>— {{ $principal->name }}</span>
                </div>
                @endif
            </div>
        </div>
        @else
        <div class="desk-card">
            <div class="desk-card-header">
                <div class="desk-avatar">👨‍💼</div>
                <h3>Dr. R. Krishnamurthy</h3>
                <p>Principal, JMPSS</p>
            </div>
            <div class="desk-card-body">
                <div class="desk-title"><i class="fas fa-scroll" style="color:var(--accent)"></i> Principal's Desk</div>
                <div class="desk-content">Welcome to JMPSS – a place where knowledge meets character. Our mission is to nurture young minds with values, skills, and vision.</div>
            </div>
        </div>
        @endif

        @if($correspondent)
        <div class="desk-card">
            <div class="desk-card-header" style="background: linear-gradient(135deg, #1e4d87 0%, #2a6bbf 100%)">
                <div class="desk-avatar">👔</div>
                <h3>{{ $correspondent->name }}</h3>
                <p>{{ $correspondent->designation }}</p>
            </div>
            <div class="desk-card-body">
                <div class="desk-title"><i class="fas fa-landmark" style="color:var(--accent)"></i> {{ $correspondent->title }}</div>
                <div class="desk-content">{{ $correspondent->content }}</div>
                @if($correspondent->quote)
                <div class="desk-quote">
                    <p>"{{ $correspondent->quote }}"</p>
                    <span>— {{ $correspondent->name }}</span>
                </div>
                @endif
            </div>
        </div>
        @else
        <div class="desk-card">
            <div class="desk-card-header" style="background: linear-gradient(135deg, #1e4d87 0%, #2a6bbf 100%)">
                <div class="desk-avatar">👔</div>
                <h3>Shri. M. Jayakumar</h3>
                <p>Correspondent, JMPSS</p>
            </div>
            <div class="desk-card-body">
                <div class="desk-title"><i class="fas fa-landmark" style="color:var(--accent)"></i> Correspondent's Desk</div>
                <div class="desk-content">JMPSS was founded with a singular vision – to provide world-class education to every child irrespective of their background.</div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- EVENTS SECTION -->
@if($events->count() > 0)
<section class="section section-alt">
    <div class="container">
        <div class="section-title">
            <div class="badge">What's On</div>
            <h2>Upcoming Events</h2>
            <p>Don't miss these exciting upcoming events and activities at JMPSS.</p>
            <div class="divider"></div>
        </div>
        <div class="grid-3" style="max-width:1000px;margin:0 auto;">
            @foreach($events as $event)
            <div class="event-card">
                <div class="event-date-box">
                    <div class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                    <div class="mon">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                    <div class="year">{{ \Carbon\Carbon::parse($event->event_date)->format('Y') }}</div>
                </div>
                <div class="event-info">
                    @if($event->category)<span class="card-badge">{{ $event->category }}</span>@endif
                    <h4>{{ $event->title }}</h4>
                    <p>{{ Str::limit($event->description, 70) }}</p>
                    <div class="event-meta">
                        @if($event->venue)<span><i class="fas fa-map-marker-alt"></i> {{ $event->venue }}</span>@endif
                        @if($event->event_time)<span><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</span>@endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('events') }}" class="btn btn-primary"><i class="fas fa-calendar"></i> View All Events</a>
        </div>
    </div>
</section>
@endif

<!-- AWARDS SECTION -->
@if($awards->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-title">
            <div class="badge">Achievements</div>
            <h2>Awards & Recognitions</h2>
            <p>Our students and institution have been recognized at state and national levels.</p>
            <div class="divider"></div>
        </div>
        <div class="grid-4">
            @foreach($awards as $award)
            <div class="award-card">
                <div class="award-icon">🏆</div>
                <h4>{{ $award->title }}</h4>
                <p>{{ Str::limit($award->description, 80) }}</p>
                <div class="award-meta">
                    @if($award->recipient_name)<span><i class="fas fa-user"></i> {{ $award->recipient_name }}</span>@endif
                    <span><i class="fas fa-calendar"></i> {{ $award->year }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('awards') }}" class="btn btn-primary"><i class="fas fa-trophy"></i> View All Awards</a>
        </div>
    </div>
</section>
@endif

<!-- TESTIMONIALS -->
@if($testimonials->count() > 0)
<section class="section section-alt">
    <div class="container">
        <div class="section-title">
            <div class="badge">Community Voice</div>
            <h2>What Parents & Alumni Say</h2>
            <p>Real experiences from our school community that inspire us every day.</p>
            <div class="divider"></div>
        </div>
        <div class="grid-3">
            @foreach($testimonials as $t)
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    @for($i=1;$i<=5;$i++) <i class="fas fa-star{{ $i <= $t->rating ? '' : '-o' }}"></i> @endfor
                </div>
                <p class="testimonial-content">"{{ $t->content }}"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                    <div class="testimonial-author-info">
                        <h5>{{ $t->name }}</h5>
                        <p>{{ $t->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('testimonials') }}" class="btn btn-primary"><i class="fas fa-comments"></i> Read More Stories</a>
        </div>
    </div>
</section>
@endif

<!-- Gallery Preview CTA -->
<section class="section" style="background:var(--gradient);text-align:center;">
    <h2 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);color:white;margin-bottom:16px;">Explore Our Gallery</h2>
    <p style="color:rgba(255,255,255,0.8);font-size:18px;max-width:500px;margin:0 auto 32px;">Photos and videos capturing the best moments of JMPSS school life.</p>
    <a href="{{ route('gallery') }}" class="btn btn-accent" style="font-size:16px;padding:14px 36px;"><i class="fas fa-images"></i> Open Gallery</a>
</section>

@endsection
