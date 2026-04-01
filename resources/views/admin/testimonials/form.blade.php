@extends('layouts.admin')
@section('title', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')
@section('page-title', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')
@section('breadcrumb', 'Admin / Testimonials / ' . (isset($testimonial) ? 'Edit' : 'Add'))

@push('styles')
<style>
    .required-asterisk { color: #e14c1e; margin-left: 3px; }
    .error-msg { color: #ef4444; font-size: 13px; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
    .error-field { border-color: #ef4444 !important; }
</style>
@endpush

@section('content')
<div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline btn-sm" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header"><h3>💬 {{ isset($testimonial) ? 'Edit Testimonial' : 'Add New Testimonial' }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
                @csrf @if(isset($testimonial)) @method('PUT') @endif
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Full Name <span class="required-asterisk">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') error-field @enderror" value="{{ old('name', $testimonial->name ?? '') }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" required>
                        @error('name')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Designation / Role</label>
                        <input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation ?? '') }}" placeholder="e.g. Parent of Grade X student">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Avatar / Photo</label>
                    <div style="display: flex; gap: 20px; align-items: start;">
                        @if(isset($testimonial) && $testimonial->avatar)
                            <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 1px solid var(--border);">
                                <img src="{{ asset($testimonial->avatar) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        @endif
                        <div style="flex: 1;">
                            <input type="file" name="avatar" class="form-control @error('avatar') error-field @enderror" accept="image/*">
                            <p class="form-text">Optional. Profile photo. Max: 2MB.</p>
                            @error('avatar') <div class="error-msg">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Testimonial Content <span class="required-asterisk">*</span></label>
                    <textarea name="content" class="form-control @error('content') error-field @enderror" rows="5" placeholder="What they said about JMPSSSS..." required>{{ old('content', $testimonial->content ?? '') }}</textarea>
                    @error('content')<div class="error-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-grid-3">
                    <div class="form-group">
                        <label class="form-label">Type <span class="required-asterisk">*</span></label>
                        <select name="type" class="form-control" required>
                            @foreach(['student','parent','alumni','staff'] as $type)
                            <option value="{{ $type }}" {{ old('type', $testimonial->type ?? '') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rating (1-5) <span class="required-asterisk">*</span></label>
                        <select name="rating" class="form-control" required>
                            @for($i=5;$i>=1;$i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} ★ {{ $i == 5 ? '(Excellent)' : ($i == 4 ? '(Good)' : '') }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Passing Year (Alumni)</label>
                        <input type="number" name="passing_year" class="form-control" value="{{ old('passing_year', $testimonial->passing_year ?? '') }}" min="1990" max="{{ date('Y') }}" placeholder="e.g. 2020">
                    </div>
                </div>
                <div style="display:flex;gap:32px;margin-bottom:24px;">
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" style="width:18px;height:18px;accent-color:var(--accent);" {{ old('is_featured', $testimonial->is_featured ?? false) ? 'checked' : '' }}> Feature on Homepage
                    </label>
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" style="width:18px;height:18px;accent-color:var(--success);" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}> Active
                    </label>
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($testimonial) ? 'Update' : 'Save' }} Testimonial</button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $('form').validate({
        rules: {
            name: { required: true, minlength: 2 },
            content: { required: true, minlength: 10 },
            type: { required: true },
            rating: { required: true }
        },
        messages: {
            name: { 
                required: "<i class='fas fa-exclamation-circle'></i> Please enter the full name.",
                minlength: "<i class='fas fa-exclamation-circle'></i> Name must be at least 2 characters."
            },
            content: { 
                required: "<i class='fas fa-exclamation-circle'></i> Please enter the testimonial content.",
                minlength: "<i class='fas fa-exclamation-circle'></i> Content must be at least 10 characters."
            },
            type: { required: "<i class='fas fa-exclamation-circle'></i> Please select a type." },
            rating: { required: "<i class='fas fa-exclamation-circle'></i> Please select a rating." }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.addClass('error-msg');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('error-field');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('error-field');
        }
    });
});
</script>
@endpush
