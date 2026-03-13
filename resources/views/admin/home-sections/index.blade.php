@extends('layouts.admin')
@section('title', 'Home Sections')
@section('page-title', 'Home Sections')
@section('breadcrumb', 'Admin / Home Sections')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0"><h2>🏠 Home Sections</h2><p>Manage homepage content</p></div>
    <a href="{{ route('admin.home-sections.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Section</a>
</div>
<div class="card">
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead><tr><th>#</th><th>Section</th><th>Type</th><th>Person</th><th>Sort</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($sections as $s)
                    <tr>
                        <td style="color:var(--text-muted);font-size:13px;">{{ $loop->iteration }}</td>
                        <td><div style="font-weight:700;font-size:14px;">{{ $s->title }}</div><div style="font-size:12px;color:var(--text-muted);">{{ Str::limit($s->content, 70) }}</div></td>
                        <td><span class="badge badge-info">{{ ucfirst($s->section_type) }}</span></td>
                        <td><div style="font-size:13px;font-weight:600;">{{ $s->name ?? '—' }}</div><div style="font-size:12px;color:var(--text-muted);">{{ $s->designation }}</div></td>
                        <td style="text-align:center;">{{ $s->sort_order }}</td>
                        <td><span class="badge {{ $s->is_active ? 'badge-success' : 'badge-gray' }}">{{ $s->is_active ? 'Active' : 'Draft' }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.home-sections.edit', $s) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin.home-sections.destroy', $s) }}" onsubmit="return confirmDelete('this section')">@csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align:center;padding:48px;color:var(--text-muted);">No sections yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top:20px;">{{ $sections->links() }}</div>
@endsection
