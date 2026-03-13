@extends('layouts.admin')

@section('title', 'Contact Message Detail')
@section('page-title', 'Contact Message Detail')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Message from: {{ $message->name }}</h3>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <div class="detail-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Sender Name</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $message->name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Subject</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--primary-color);">{{ $message->subject ?? 'No Subject' }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Email Address</label>
                <p style="font-size: 16px; color: var(--text);">{{ $message->email }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Mobile Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $message->mobile }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Received Date</label>
                <p style="font-size: 16px; color: var(--text);">{{ $message->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="detail-group" style="margin-top: 30px; padding: 25px; border-radius: 12px; border: 1px solid var(--border); background-color: #f8fafc;">
            <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 12px; font-weight: 600; text-transform: uppercase;">Message Content</label>
            <p style="font-size: 16px; color: var(--text); line-height: 1.8; white-space: pre-line;">{{ $message->message }}</p>
        </div>

        <div style="margin-top: 40px; display: flex; gap: 15px;">
            <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> Reply via Email
            </a>
            <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i> Delete Message
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
