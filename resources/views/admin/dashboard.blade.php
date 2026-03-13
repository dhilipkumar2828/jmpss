@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Admin Home / Dashboard')

@push('styles')
<style>
.welcome-card {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 60%, var(--primary) 100%);
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
.quick-act { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: rgba(255,255,255,0.15); border-radius: 8px; color: white; text-decoration: none; font-size: 13px; font-weight: 600; transition: background 0.2s; border: 1px dashed rgba(255,255,255,0.3); }
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
<div class="stats-grid" style="grid-template-columns: repeat(4, 1fr); margin-bottom: 24px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:#dbeafe;color:#1d4ed8"><i class="fas fa-user-graduate"></i></div>
        <div>
            <div class="stat-value">{{ $stats['admissions'] }}</div>
            <div class="stat-label">Admissions</div>
        </div>
        <a href="{{ route('admin.admissions.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">View Inquiries →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fce7f3;color:#be185d"><i class="fas fa-briefcase"></i></div>
        <div>
            <div class="stat-value">{{ $stats['careers'] }}</div>
            <div class="stat-label">Applications</div>
        </div>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">View Careers →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#d1fae5;color:#065f46"><i class="fas fa-walking"></i></div>
        <div>
            <div class="stat-value">{{ $stats['visits'] }}</div>
            <div class="stat-label">Visit Requests</div>
        </div>
        <a href="{{ route('admin.visit-requests.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">View Visits →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fef3c7;color:#92400e"><i class="fas fa-envelope"></i></div>
        <div>
            <div class="stat-value">{{ $stats['contacts'] }}</div>
            <div class="stat-label">Messages</div>
        </div>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">View Messages →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f3e8ff;color:#6b21a8"><i class="fas fa-users"></i></div>
        <div>
            <div class="stat-value">{{ $stats['users'] }}</div>
            <div class="stat-label">Registered Users</div>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline btn-sm" style="margin-top:auto;">View Users →</a>
    </div>
</div>

<!-- Recent Data Grid -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">

    <!-- Recent Admissions -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-user-graduate" style="color:var(--primary);margin-right:8px;"></i>Recent Admissions</h3>
            <a href="{{ route('admin.admissions.index') }}" class="btn btn-primary btn-sm">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Parent</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_admissions as $adm)
                        <tr>
                            <td>
                                <div style="font-weight:600;font-size:13px;">{{ $adm->student_name }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $adm->created_at->diffForHumans() }}</div>
                            </td>
                            <td style="font-size:13px;">{{ $adm->parent_name }}</td>
                            <td><span class="badge badge-info">{{ strtoupper($adm->grade_applying) }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" style="text-align:center;color:var(--text-muted);padding:32px;">No inquiries yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Contact Messages -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-envelope-open-text" style="color:#6b21a8;margin-right:8px;"></i>Recent Messages</h3>
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-primary btn-sm">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_contacts as $msg)
                        <tr>
                            <td>
                                <div style="font-weight:600;font-size:13px;">{{ $msg->name }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $msg->mobile }}</div>
                            </td>
                            <td style="font-size:13px;">{{ Str::limit($msg->subject, 20) }}</td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $msg->created_at->format('d M') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="3" style="text-align:center;color:var(--text-muted);padding:32px;">No messages yet</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
