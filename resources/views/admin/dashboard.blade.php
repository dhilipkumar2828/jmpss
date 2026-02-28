@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Admin Home / Dashboard')

@push('styles')
<style>
.welcome-card {
    background: linear-gradient(135deg, #1a3c6e 0%, #2a5ba0 60%, #1e4d87 100%);
    border-radius: 20px; padding: 32px; color: white;
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 28px; position: relative; overflow: hidden;
}
.welcome-card::after {
    content: '🏫'; position: absolute; right: 32px; font-size: 80px;
    opacity: 0.15;
}
.welcome-card h2 { font-size: 1.6rem; font-weight: 800; margin-bottom: 8px; }
.welcome-card p { color: rgba(255,255,255,0.8); font-size: 15px; }
.welcome-card .time { font-size: 13px; color: rgba(255,255,255,0.6); margin-top: 12px; }
.quick-acts { display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
.quick-act { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: rgba(255,255,255,0.15); border-radius: 8px; color: white; text-decoration: none; font-size: 13px; font-weight: 600; transition: background 0.2s; }
.quick-act:hover { background: var(--accent); color: var(--primary); }
</style>
@endpush

@section('content')

<!-- Welcome Banner -->
<div class="welcome-card">
    <div>
        <h2>Welcome, {{ Auth::guard('admin')->user()->name }}! 👋</h2>
        <p>Here's what's happening with your school website today.</p>
        <div class="time">{{ now()->format('l, d F Y – h:i A') }} IST</div>
        <div class="quick-acts">
            <a href="{{ route('admin.events.create') }}" class="quick-act"><i class="fas fa-plus"></i> Add Event</a>
            <a href="{{ route('admin.gallery.create') }}" class="quick-act"><i class="fas fa-upload"></i> Upload Gallery</a>
            <a href="{{ route('admin.awards.create') }}" class="quick-act"><i class="fas fa-trophy"></i> Add Award</a>
            <a href="{{ route('admin.testimonials.create') }}" class="quick-act"><i class="fas fa-comment-plus"></i> Add Testimonial</a>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:#dbeafe;color:#1d4ed8"><i class="fas fa-home"></i></div>
        <div>
            <div class="stat-value">{{ $stats['home_sections'] }}</div>
            <div class="stat-label">Home Sections</div>
        </div>
        <a href="{{ route('admin.home-sections.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">Manage →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fce7f3;color:#be185d"><i class="fas fa-images"></i></div>
        <div>
            <div class="stat-value">{{ $stats['galleries'] }}</div>
            <div class="stat-label">Gallery Items</div>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">Manage →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#d1fae5;color:#065f46"><i class="fas fa-calendar-alt"></i></div>
        <div>
            <div class="stat-value">{{ $stats['events'] }}</div>
            <div class="stat-label">Events</div>
        </div>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">Manage →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fef3c7;color:#92400e"><i class="fas fa-trophy"></i></div>
        <div>
            <div class="stat-value">{{ $stats['awards'] }}</div>
            <div class="stat-label">Awards</div>
        </div>
        <a href="{{ route('admin.awards.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">Manage →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f3e8ff;color:#6b21a8"><i class="fas fa-comments"></i></div>
        <div>
            <div class="stat-value">{{ $stats['testimonials'] }}</div>
            <div class="stat-label">Testimonials</div>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">Manage →</a>
    </div>
</div>

<!-- Recent Data Grid -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">

    <!-- Recent Events -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-calendar" style="color:var(--success);margin-right:8px;"></i>Recent Events</h3>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body" style="padding:0;">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_events as $event)
                        <tr>
                            <td>
                                <div style="font-weight:600;font-size:13px;">{{ Str::limit($event->title, 30) }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $event->venue }}</div>
                            </td>
                            <td style="font-size:13px;color:var(--text-muted);white-space:nowrap;">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                            <td><span class="badge {{ $event->is_active ? 'badge-success' : 'badge-gray' }}">{{ $event->is_active ? 'Active' : 'Draft' }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" style="text-align:center;color:var(--text-muted);padding:32px;">No events yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Testimonials -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-comments" style="color:#6b21a8;margin-right:8px;"></i>Recent Testimonials</h3>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body" style="padding:0;">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Person</th>
                            <th>Rating</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_testimonials as $t)
                        <tr>
                            <td>
                                <div style="font-weight:600;font-size:13px;">{{ $t->name }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $t->designation }}</div>
                            </td>
                            <td style="font-size:13px;color:#f59e0b;">{{ str_repeat('★', $t->rating) }}</td>
                            <td><span class="badge {{ $t->is_active ? 'badge-success' : 'badge-gray' }}">{{ $t->is_active ? 'Active' : 'Draft' }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" style="text-align:center;color:var(--text-muted);padding:32px;">No testimonials yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
