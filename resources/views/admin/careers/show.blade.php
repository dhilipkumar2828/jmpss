@extends('layouts.admin')

@section('title', 'Career Application Detail')
@section('page-title', 'Career Application Detail')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Application from: {{ $application->name }}</h3>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <div class="detail-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Full Name</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $application->name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Position Applied For</label>
                <div class="badge badge-primary">{{ $application->position_applied }}</div>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Email Address</label>
                <p style="font-size: 16px; color: var(--text);">{{ $application->email }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Mobile Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $application->mobile }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Experience (Years)</label>
                <p style="font-size: 16px; color: var(--text);">{{ $application->experience ?? 'N/A' }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Submission Date</label>
                <p style="font-size: 16px; color: var(--text);">{{ $application->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="detail-group" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border);">
            <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 10px; font-weight: 600; text-transform: uppercase;">Resume / CV</label>
            @if($application->resume_path)
                <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-pdf"></i> View Resume
                </a>
            @else
                <p style="font-size: 16px; color: var(--text-muted);">No resume uploaded</p>
            @endif
        </div>

        <div style="margin-top: 40px; display: flex; gap: 15px;">
            <form action="{{ route('admin.careers.destroy', $application->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i> Delete Application
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
