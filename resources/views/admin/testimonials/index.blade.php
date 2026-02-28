@extends('layouts.admin')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials')
@section('breadcrumb', 'Admin / Testimonials')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0"><h2>💬 Testimonials</h2><p>Manage community testimonials</p></div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
</div>
<div class="card">
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead><tr><th>#</th><th>Name</th><th>Type</th><th>Rating</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($testimonials as $t)
                    <tr>
                        <td style="color:var(--text-muted);font-size:13px;">{{ $loop->iteration }}</td>
                        <td><div style="font-weight:700;font-size:14px;">{{ $t->name }}</div><div style="font-size:12px;color:var(--text-muted);">{{ $t->designation }}</div></td>
                        <td><span class="badge badge-info">{{ ucfirst($t->type) }}</span></td>
                        <td style="color:#f59e0b;">{{ str_repeat('★', $t->rating) }}</td>
                        <td>@if($t->is_featured)<span class="badge badge-warning">⭐ Yes</span>@else<span class="badge badge-gray">No</span>@endif</td>
                        <td><span class="badge {{ $t->is_active ? 'badge-success' : 'badge-gray' }}">{{ $t->is_active ? 'Active' : 'Draft' }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align:center;padding:48px;color:var(--text-muted);"><div style="font-size:40px;margin-bottom:12px;">💬</div>No testimonials yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top:20px;">{{ $testimonials->links() }}</div>
@endsection
