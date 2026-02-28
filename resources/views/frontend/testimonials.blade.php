@extends('layouts.app')
@section('title', 'Testimonials – JMPSS School')

@section('content')
<div class="page-header">
    <h1>💬 Testimonials</h1>
    <p>Hear from our students, parents, and alumni about the JMPSS experience</p>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="sep">/</span>
        <span>Testimonials</span>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($testimonials->count() > 0)
        <div class="grid-3">
            @foreach($testimonials as $t)
            <div class="testimonial-card" style="background:white;border-radius:var(--radius);box-shadow:var(--shadow-sm);border:1px solid var(--border);padding:32px;transition:all 0.3s ease;">
                <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;">
                    <div style="color:#f59e0b;font-size:18px;">
                        @for($i=1;$i<=5;$i++) <i class="fas fa-star{{ $i <= $t->rating ? '' : '' }}" style="{{ $i <= $t->rating ? '' : 'opacity:0.3' }}"></i> @endfor
                    </div>
                    <span style="background:rgba(26,60,110,0.1);color:var(--primary);font-size:11px;font-weight:700;padding:4px 12px;border-radius:50px;text-transform:uppercase;">{{ $t->type }}</span>
                </div>
                <div style="font-size:32px;color:var(--accent);font-family:serif;line-height:1;margin-bottom:12px;">"</div>
                <p style="color:var(--text-muted);font-size:15px;line-height:1.8;font-style:italic;margin-bottom:24px;">{{ $t->content }}</p>
                <div style="display:flex;align-items:center;gap:12px;padding-top:20px;border-top:1px solid var(--border);">
                    <div style="width:48px;height:48px;border-radius:50%;background:var(--gradient);display:grid;place-items:center;font-size:18px;font-weight:700;color:white;flex-shrink:0;">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                    <div>
                        <div style="font-weight:700;color:var(--text);font-size:15px;">{{ $t->name }}</div>
                        <div style="font-size:13px;color:var(--text-muted);">{{ $t->designation }}@if($t->passing_year) – Batch {{ $t->passing_year }}@endif</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination">
            @for($i=1; $i<=$testimonials->lastPage(); $i++)
            <a href="{{ $testimonials->url($i) }}" class="page-link {{ $testimonials->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
        </div>
        @else
        <div style="text-align:center;padding:100px 20px;color:var(--text-muted);">
            <div style="font-size:64px;margin-bottom:16px;">💬</div>
            <h3 style="font-size:22px;margin-bottom:10px;color:var(--text);">No Testimonials Yet</h3>
            <p>Testimonials will be added by the admin soon.</p>
        </div>
        @endif
    </div>
</section>
@endsection
