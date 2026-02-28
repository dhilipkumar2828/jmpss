@extends('layouts.app')
@section('title', 'Events – JMPSS School')

@section('content')
<div class="page-header">
    <h1>📅 School Events</h1>
    <p>Celebrate learning, sports, culture, and milestones with the JMPSS community</p>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="sep">/</span>
        <span>Events</span>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($events->count() > 0)
        <div class="grid-3">
            @foreach($events as $event)
            <div class="card">
                <div style="background:var(--gradient);padding:32px;display:flex;justify-content:center;gap:12px;align-items:center;position:relative;">
                    <div style="text-align:center;">
                        <div style="font-size:3rem;font-weight:800;color:var(--accent);line-height:1;">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                        <div style="font-size:14px;color:rgba(255,255,255,0.9);font-weight:600;text-transform:uppercase;">{{ \Carbon\Carbon::parse($event->event_date)->format('M Y') }}</div>
                    </div>
                    @if($event->is_featured)
                    <span style="position:absolute;top:12px;right:12px;background:var(--accent);color:var(--primary);font-size:11px;font-weight:700;padding:4px 10px;border-radius:50px;">⭐ Featured</span>
                    @endif
                </div>
                <div class="card-body">
                    @if($event->category)<span class="card-badge">{{ $event->category }}</span>@endif
                    <div class="card-title">{{ $event->title }}</div>
                    <div class="card-text">{{ Str::limit($event->description, 120) }}</div>
                    <div style="display:flex;flex-direction:column;gap:6px;margin-top:16px;">
                        @if($event->venue)
                        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text-muted);">
                            <i class="fas fa-map-marker-alt" style="color:var(--primary);width:16px;"></i>{{ $event->venue }}
                        </div>
                        @endif
                        @if($event->event_time)
                        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text-muted);">
                            <i class="fas fa-clock" style="color:var(--primary);width:16px;"></i>{{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination">
            @for($i=1; $i<=$events->lastPage(); $i++)
            <a href="{{ $events->url($i) }}" class="page-link {{ $events->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
        </div>
        @else
        <div style="text-align:center;padding:100px 20px;color:var(--text-muted);">
            <div style="font-size:64px;margin-bottom:16px;">📅</div>
            <h3 style="font-size:22px;margin-bottom:10px;color:var(--text);">No Events Scheduled</h3>
            <p>Check back soon for upcoming events!</p>
        </div>
        @endif
    </div>
</section>
@endsection
