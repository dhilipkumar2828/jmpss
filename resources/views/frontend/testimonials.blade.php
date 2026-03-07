@extends('layouts.app')
@section('title', 'Testimonials - Jeeva Memorial Senior Secondary School')

@section('content')
<main class="page-shell">
    <div class="site-container">
        <section class="page-hero">
            <h1>Testimonials</h1>
            <p>Testimonials remain linked to existing records from the admin panel.</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Testimonials</span>
            </div>
        </section>
    </div>

    <x-ui.section-wrapper eyebrow="Voices" title="What Our Community Shares">
        @if($testimonials->count() > 0)
            <div class="testimonial-grid">
                @foreach($testimonials as $testimonial)
                    <article class="testimonial-card">
                        <p style="margin:0; color:var(--ink-700); line-height:1.68;">"{{ $testimonial->content }}"</p>
                        <p class="testimonial-meta">
                            <strong>{{ $testimonial->name }}</strong>
                            @if($testimonial->designation)
                                - {{ $testimonial->designation }}
                            @endif
                            @if($testimonial->passing_year)
                                (Batch {{ $testimonial->passing_year }})
                            @endif
                        </p>
                    </article>
                @endforeach
            </div>

            @if($testimonials->lastPage() > 1)
                <div class="pagination">
                    @for($i = 1; $i <= $testimonials->lastPage(); $i++)
                        <a href="{{ $testimonials->url($i) }}" class="{{ $testimonials->currentPage() === $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                </div>
            @endif
        @else
            <div class="empty-state">
                <h3>No testimonials yet</h3>
                <p>Admin can publish testimonials here when available.</p>
            </div>
        @endif
    </x-ui.section-wrapper>
</main>
@endsection
