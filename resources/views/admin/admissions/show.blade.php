@extends('layouts.admin')

@section('title', 'Admission Detail')
@section('page-title', 'Admission Inquiry Detail')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Inquiry from: {{ $admission->student_name }}</h3>
        <a href="{{ route('admin.admissions.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <div class="detail-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Student Name</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $admission->student_name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Date of Birth</label>
                <p style="font-size: 16px; font-weight: 600; color: var(--text);">{{ $admission->dob ? \Carbon\Carbon::parse($admission->dob)->format('d-m-Y') : 'Not provided' }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Grade Applying For</label>
                <div style="display:inline-block; background: var(--primary); color: white; padding: 6px 16px; border-radius: 50px; font-weight: 800; font-size: 14px; text-transform: uppercase; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    {{ $admission->grade_applying }}
                </div>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Parent/Guardian Name</label>
                <p style="font-size: 16px; color: var(--text);">{{ $admission->parent_name }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Email Address</label>
                <p style="font-size: 16px; color: var(--text);">{{ $admission->email }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Mobile Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $admission->mobile }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Whatsapp Number</label>
                <p style="font-size: 16px; color: var(--text);">{{ $admission->whatsapp ?? 'Not provided' }}</p>
            </div>
            <div class="detail-group">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Submission Date</label>
                <p style="font-size: 16px; color: var(--text);">{{ $admission->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="detail-group" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border);">
            <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 10px; font-weight: 600; text-transform: uppercase;">Residential Address</label>
            <p style="font-size: 16px; color: var(--text); line-height: 1.6;">{{ $admission->address ?? 'Not provided' }}</p>
        </div>

        <div style="margin-top: 40px; border-top: 1px solid var(--border); padding-top: 40px;">
            <h4 style="color: var(--primary); margin-bottom: 20px; font-weight: 700;">
                <i class="fas fa-reply"></i> Send Reply to Customer
            </h4>
            
            {{-- Reply Form --}}
            <form action="{{ route('admin.admissions.reply', $admission->id) }}" method="POST">
                @csrf
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600; text-transform: uppercase;">Message Body</label>
                    <textarea name="message" rows="5" class="form-control" style="width: 100%; border-radius: 12px; border: 1px solid var(--border); padding: 15px; font-size: 15px;" placeholder="Type your response here..." required></textarea>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <button type="submit" class="btn btn-primary" style="background: var(--primary); color: white; padding: 12px 30px; border-radius: 30px; border: none; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 72, 0, 0.2);">
                        <i class="fas fa-paper-plane"></i> Send Reply
                    </button>
                    
                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()" style="border-radius: 30px; padding: 12px 25px;">
                        <i class="fas fa-trash"></i> Delete Inquiry
                    </button>
                </div>
            </form>

            {{-- Separate Delete Form --}}
            <form action="{{ route('admin.admissions.destroy', $admission->id) }}" method="POST" id="delete-form" style="display: none;">
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
