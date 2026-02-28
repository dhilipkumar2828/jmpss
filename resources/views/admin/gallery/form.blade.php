@extends('layouts.admin')
@section('title', isset($gallery) ? 'Edit Gallery Item' : 'Add Gallery Item')
@section('page-title', isset($gallery) ? 'Edit Gallery Item' : 'Add Gallery Item')
@section('breadcrumb', 'Admin / Gallery / ' . (isset($gallery) ? 'Edit' : 'Add'))
@section('content')
<div style="max-width:700px;">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline btn-sm" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header"><h3>🖼️ {{ isset($gallery) ? 'Edit' : 'Add' }} Gallery Item</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ isset($gallery) ? route('admin.gallery.update', $gallery) : route('admin.gallery.store') }}" enctype="multipart/form-data">
                @csrf @if(isset($gallery)) @method('PUT') @endif
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') error-field @enderror" value="{{ old('title', $gallery->title ?? '') }}" required>
                        @error('title')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type *</label>
                        <select name="type" class="form-control" id="type-select" onchange="toggleType(this.value)" required>
                            <option value="photo" {{ old('type', $gallery->type ?? 'photo') == 'photo' ? 'selected' : '' }}>📷 Photo</option>
                            <option value="video" {{ old('type', $gallery->type ?? '') == 'video' ? 'selected' : '' }}>🎥 Video</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $gallery->description ?? '') }}</textarea>
                </div>
                <div id="photo-section">
                    <div class="form-group">
                        <label class="form-label">Upload Photo (max 5MB)</label>
                        <input type="file" name="file" class="form-control" accept="image/*">
                        @if(isset($gallery) && $gallery->file_path)
                        <div style="margin-top:10px;"><img src="{{ asset('storage/'.$gallery->file_path) }}" style="height:80px;border-radius:8px;" alt="current"></div>
                        @endif
                        @error('file')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div id="video-section" style="display:none;">
                    <div class="form-group">
                        <label class="form-label">Video URL (YouTube or direct link)</label>
                        <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $gallery->video_url ?? '') }}" placeholder="https://youtube.com/watch?v=...">
                        @error('video_url')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category ?? '') }}" placeholder="e.g. Sports Day">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $gallery->sort_order ?? 0) }}" min="0">
                    </div>
                </div>
                <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;margin-bottom:24px;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" style="width:18px;height:18px;accent-color:var(--success);" {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}> Active
                </label>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($gallery) ? 'Update' : 'Upload' }}</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
function toggleType(val) {
    document.getElementById('photo-section').style.display = val === 'photo' ? '' : 'none';
    document.getElementById('video-section').style.display = val === 'video' ? '' : 'none';
}
toggleType(document.getElementById('type-select').value);
</script>
@endpush
@endsection
