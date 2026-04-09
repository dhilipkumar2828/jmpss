@extends('layouts.admin')

@section('title', 'Feedback Details')
@section('page-title', 'Feedback Details')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Feedback from: {{ $feedback->name }}</h3>
        <a href="{{ route('admin.feedback.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <div class="detail-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Customer Name</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $feedback->name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Rating</label>
                <div>
                    @for($i=1; $i<=5; $i++)
                        <i class="fa{{ $i <= $feedback->rating ? 's' : 'r' }} fa-star" style="color: #FFD700; font-size: 18px;"></i>
                    @endfor
                </div>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Email Address</label>
                <p style="font-size: 16px; color: var(--text);">{{ $feedback->email }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Mobile Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $feedback->mobile }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Received Date</label>
                <p style="font-size: 16px; color: var(--text);">{{ $feedback->created_at->format('d M Y, h:i A') }}</p>
            </div>
            @if($feedback->photo_path)
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Profile Photo</label>
                <img src="{{ Str::startsWith($feedback->photo_path, 'uploads/') ? asset($feedback->photo_path) : asset('storage/' . $feedback->photo_path) }}" alt="Profile Photo" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border);">
            </div>
            @endif
        </div>

        <div class="detail-group" style="margin-top: 30px; padding: 25px; border-radius: 12px; border: 1px solid var(--border); background-color: #f8fafc;">
            <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 12px; font-weight: 600; text-transform: uppercase;">Feedback Message</label>
            <p style="font-size: 16px; color: var(--text); line-height: 1.8; white-space: pre-line;">{{ $feedback->message }}</p>
        </div>

        @if($feedback->admin_response)
        <div class="detail-group" style="margin-top: 30px; padding: 25px; border-radius: 12px; border: 1px solid #d1fae5; background-color: #f0fdf4;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <label style="display: block; font-size: 13px; color: #065f46; font-weight: 600; text-transform: uppercase;">Admin Response</label>
                <span style="font-size: 12px; color: #065f46;">{{ $feedback->responded_at->format('d M Y, h:i A') }}</span>
            </div>
            <p style="font-size: 16px; color: #065f46; line-height: 1.8; white-space: pre-line;">{{ $feedback->admin_response }}</p>
        </div>
        @endif

        <div style="margin-top: 40px; border-top: 1px solid var(--border); padding-top: 40px;">
            <h4 style="color: var(--primary); margin-bottom: 20px; font-weight: 700;">
                <i class="fas fa-reply"></i> {{ $feedback->admin_response ? 'Update Response' : 'Send Response to Customer' }}
            </h4>
            <form action="{{ route('admin.feedback.reply', $feedback->id) }}" method="POST">
                @csrf
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600; text-transform: uppercase;">Message Body</label>
                    <textarea name="message" rows="5" class="form-control" style="width: 100%; border-radius: 12px; border: 1px solid var(--border); padding: 15px; font-size: 15px;" placeholder="Type your response here..." required>{{ $feedback->admin_response }}</textarea>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <button type="submit" class="btn btn-primary" style="background: var(--primary); color: white; padding: 12px 30px; border-radius: 30px; border: none; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 72, 0, 0.2);">
                        <i class="fas fa-paper-plane"></i> {{ $feedback->admin_response ? 'Resend Reply' : 'Send Reply' }}
                    </button>
                    
                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()" style="border-radius: 30px; padding: 12px 25px;">
                        <i class="fas fa-trash"></i> Delete Feedback
                    </button>
                </div>
            </form>
            <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" id="delete-form" style="display: none;">
                @csrf
                @method('DELETE')
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
