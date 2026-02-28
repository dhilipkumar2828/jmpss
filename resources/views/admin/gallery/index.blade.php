@extends('layouts.admin')
@section('title', 'Gallery')
@section('page-title', 'Gallery')
@section('breadcrumb', 'Admin / Gallery')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0"><h2>🖼️ Gallery</h2><p>Manage photos and videos</p></div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Media</a>
</div>
<div class="card">
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead><tr><th>#</th><th>Preview</th><th>Title</th><th>Type</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($galleries as $g)
                    <tr>
                        <td style="color:var(--text-muted);font-size:13px;">{{ $loop->iteration }}</td>
                        <td>
                            @if($g->type == 'photo' && $g->file_path)
                                <img src="{{ asset('storage/'.$g->file_path) }}" style="width:56px;height:40px;object-fit:cover;border-radius:6px;" alt="">
                            @elseif($g->type == 'video')
                                <div style="width:56px;height:40px;background:var(--primary);border-radius:6px;display:grid;place-items:center;color:white;font-size:18px;">▶</div>
                            @else
                                <div style="width:56px;height:40px;background:#f1f5f9;border-radius:6px;display:grid;place-items:center;font-size:20px;">🖼️</div>
                            @endif
                        </td>
                        <td><div style="font-weight:700;font-size:14px;">{{ $g->title }}</div><div style="font-size:12px;color:var(--text-muted);">{{ Str::limit($g->description, 60) }}</div></td>
                        <td><span class="badge {{ $g->type == 'photo' ? 'badge-info' : 'badge-warning' }}">{{ ucfirst($g->type) }}</span></td>
                        <td style="font-size:13px;color:var(--text-muted);">{{ $g->category ?? '—' }}</td>
                        <td><span class="badge {{ $g->is_active ? 'badge-success' : 'badge-gray' }}">{{ $g->is_active ? 'Active' : 'Draft' }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.gallery.edit', $g) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin.gallery.destroy', $g) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align:center;padding:48px;color:var(--text-muted);"><div style="font-size:40px;margin-bottom:12px;">🖼️</div>No gallery items yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top:20px;">{{ $galleries->links() }}</div>
@endsection
