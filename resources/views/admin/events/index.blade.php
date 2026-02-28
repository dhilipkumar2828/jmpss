@extends('layouts.admin')
@section('title', 'Events')
@section('page-title', 'Events')
@section('breadcrumb', 'Admin / Events')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0">
        <h2>📅 Events</h2>
        <p>Manage all school events</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Event</a>
</div>

<div class="card">
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td style="color:var(--text-muted);font-size:13px;">{{ $loop->iteration }}</td>
                        <td>
                            <div style="font-weight:700;font-size:14px;">{{ $event->title }}</div>
                            <div style="font-size:12px;color:var(--text-muted);">{{ Str::limit($event->description, 60) }}</div>
                        </td>
                        <td style="white-space:nowrap;font-size:13px;">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                        <td style="font-size:13px;color:var(--text-muted);">{{ $event->venue ?? '—' }}</td>
                        <td>@if($event->category)<span class="badge badge-info">{{ $event->category }}</span>@else <span style="color:var(--text-muted)">—</span>@endif</td>
                        <td>@if($event->is_featured)<span class="badge badge-warning">⭐ Yes</span>@else<span class="badge badge-gray">No</span>@endif</td>
                        <td><span class="badge {{ $event->is_active ? 'badge-success' : 'badge-gray' }}">{{ $event->is_active ? 'Active' : 'Draft' }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin.events.destroy', $event) }}" onsubmit="return confirm('Delete this event?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" style="text-align:center;padding:48px;color:var(--text-muted);">
                        <div style="font-size:40px;margin-bottom:12px;">📅</div>
                        No events yet. <a href="{{ route('admin.events.create') }}" style="color:var(--primary);font-weight:600;">Add one now</a>
                    </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top:20px;">{{ $events->links() }}</div>
@endsection
