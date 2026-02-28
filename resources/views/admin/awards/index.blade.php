@extends('layouts.admin')
@section('title', 'Awards')
@section('page-title', 'Awards')
@section('breadcrumb', 'Admin / Awards')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0"><h2>🏆 Awards</h2><p>Manage school awards and achievements</p></div>
    <a href="{{ route('admin.awards.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Award</a>
</div>
<div class="card">
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead><tr><th>#</th><th>Award</th><th>Recipient</th><th>Year</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($awards as $award)
                    <tr>
                        <td style="color:var(--text-muted);font-size:13px;">{{ $loop->iteration }}</td>
                        <td><div style="font-weight:700;font-size:14px;">{{ $award->title }}</div><div style="font-size:12px;color:var(--text-muted);">{{ Str::limit($award->description, 60) }}</div></td>
                        <td><div style="font-size:13px;font-weight:600;">{{ $award->recipient_name ?? '—' }}</div><div style="font-size:12px;color:var(--text-muted);">{{ $award->recipient_class }}</div></td>
                        <td><span class="badge badge-warning">{{ $award->year }}</span></td>
                        <td>@if($award->category)<span class="badge badge-info">{{ $award->category }}</span>@else<span style="color:var(--text-muted)">—</span>@endif</td>
                        <td><span class="badge {{ $award->is_active ? 'badge-success' : 'badge-gray' }}">{{ $award->is_active ? 'Active' : 'Draft' }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.awards.edit', $award) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin.awards.destroy', $award) }}" onsubmit="return confirm('Delete this award?')">@csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align:center;padding:48px;color:var(--text-muted);"><div style="font-size:40px;margin-bottom:12px;">🏆</div>No awards yet. <a href="{{ route('admin.awards.create') }}" style="color:var(--primary);font-weight:600;">Add one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top:20px;">{{ $awards->links() }}</div>
@endsection
