@php
    $siteSettings = \App\Models\Setting::pluck('value', 'key')->toArray();
    $primaryColor = $siteSettings['logo_green_900'] ?? '#004800';
    $secondaryColor = $siteSettings['secondary_color'] ?? '#e14c1e';
@endphp

@push('styles')
<style>
    .testimonial-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }
    .testimonial-page-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        position: relative;
        border: 1px solid #f0f0f0;
        transition: transform 0.3s ease;
    }
    .testimonial-page-card:hover { transform: translateY(-10px); }
    .testimonial-page-card::before {
        content: '"';
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 80px;
        color: #f0f0f0;
        font-family: serif;
        line-height: 1;
    }
    .testimonial-content { position: relative; z-index: 1; margin-bottom: 25px; color: #555; line-height: 1.8; font-style: italic; }
    .testimonial-user { display: flex; align-items: center; gap: 15px; }
    .testimonial-user img { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; }
    .testimonial-user h4 { margin: 0; font-size: 16px; color: {{ $primaryColor }}; font-weight: 700; }
    .testimonial-user p { margin: 0; font-size: 13px; color: #888; }
    .stars { color: {{ $secondaryColor }}; font-size: 12px; margin-bottom: 10px; }
</style>
@endpush

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label" style="background: {{ $secondaryColor }}">Voices</span>
            <h1>Community Feedback</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span style="color: {{ $secondaryColor }}">Testimonials</span>
            </nav>
        </div>
    </section>

    <section class="testimonials-main section-padding">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Testimonials</span>
                <h2 class="section-title">What Our Community Shares</h2>
            </div>

            <div class="testimonial-details-grid">
                @forelse($testimonials as $testimonial)
                <div class="testimonial-page-card">
                    <div class="stars">
                        @for($i=0; $i<$testimonial->rating; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                    </div>
                    <div class="testimonial-content">
                        {{ $testimonial->content }}
                    </div>
                    <div class="testimonial-user">
                        @if($testimonial->avatar)
                            <img src="{{ asset('storage/'.$testimonial->avatar) }}" alt="{{ $testimonial->name }}">
                        @else
                            <div style="width:50px; height:50px; border-radius:50%; background:#f0f0f0; display:grid; place-items:center; color:{{ $primaryColor }}; font-weight:bold;">
                                {{ substr($testimonial->name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->designation ?? $testimonial->type }}</p>
                        </div>
                    </div>
                </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                        <i class="fa-solid fa-comment-dots" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3>No testimonials yet</h3>
                        <p>We'll be sharing feedback from our community soon!</p>
                    </div>
                @endforelse
            </div>

            <div class="pagination-wrap" style="margin-top: 60px; display: flex; justify-content: center;">
                {{ $testimonials->links() }}
            </div>
        </div>
    </section>
@endsection
