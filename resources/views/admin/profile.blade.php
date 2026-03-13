@extends('layouts.admin')
@section('title', 'Admin Profile')
@section('page-title', 'Profile Settings')
@section('breadcrumb', 'Admin / Profile')

@section('content')
<div class="profile-page-wrap">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-user-circle"></i> Edit Profile</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid-2" style="grid-template-columns: 200px 1fr; gap: 40px; align-items: start;">
                    <!-- Avatar Section -->
                    <div class="avatar-upload-group" style="text-align: center;">
                        <div class="avatar-preview-box" style="width: 150px; height: 150px; border-radius: 20px; background: #f8fafc; border: 2px dashed var(--border); margin: 0 auto 15px; display: grid; place-items: center; overflow: hidden; position: relative;">
                            @if($user->avatar)
                                <img src="{{ asset('storage/'.$user->avatar) }}" id="preview-img" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <i class="fas fa-user-circle" id="preview-placeholder" style="font-size: 60px; color: #cbd5e1;"></i>
                                <img id="preview-img" style="width:100%; height:100%; object-fit:cover; display:none;">
                            @endif
                        </div>
                        <label class="btn btn-outline btn-sm" style="display: block; cursor: pointer;">
                            <i class="fas fa-camera"></i> Change Photo
                            <input type="file" name="avatar" id="avatar-input" style="display:none;" onchange="previewAvatar(this)">
                        </label>
                        @error('avatar')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <!-- Details Section -->
                    <div class="details-form">
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                @error('name')<span class="error-msg">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                @error('email')<span class="error-msg">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <hr style="margin: 24px 0; border: none; border-top: 1px solid var(--border);">
                        
                        <h4 style="margin-bottom: 20px; font-size: 15px; color: var(--text-muted);">Change Password</h4>
                        
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Leave blank to keep current">
                            @error('current_password')<span class="error-msg">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control">
                                @error('new_password')<span class="error-msg">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div style="margin-top: 24px;">
                            <button type="submit" class="btn btn-primary" style="padding: 12px 30px;">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-img');
            const placeholder = document.getElementById('preview-placeholder');
            if(placeholder) placeholder.style.display = 'none';
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
