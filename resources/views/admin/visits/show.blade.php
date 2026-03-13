@extends('layouts.admin')

@section('title', 'Visit Request Detail')
@section('page-title', 'Campus Visit Request Detail')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Request from: {{ $visit->name }}</h3>
        <a href="{{ route('admin.visit-requests.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <div class="detail-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Name</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $visit->name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Visit Date</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--primary-color);">{{ \Carbon\Carbon::parse($visit->visit_date)->format('d M Y') }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Visit Time</label>
                <div class="badge badge-info">{{ $visit->visit_time ?? 'Not specified' }}</div>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Email Address</label>
                <p style="font-size: 16px; color: var(--text);">{{ $visit->email }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Mobile Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $visit->mobile }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Submission Date</label>
                <p style="font-size: 16px; color: var(--text);">{{ $visit->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="detail-group" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border);">
            <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 10px; font-weight: 600; text-transform: uppercase;">Purpose of Visit</label>
            <p style="font-size: 16px; color: var(--text); line-height: 1.6;">{{ $visit->purpose ?? 'No purpose mentioned' }}</p>
        </div>

        <div style="margin-top: 40px; display: flex; gap: 15px;">
            <form action="{{ route('admin.visit-requests.destroy', $visit->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i> Delete Request
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form').submit();
        }
    })
}
</script>
@endsection
