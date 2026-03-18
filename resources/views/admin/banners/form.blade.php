@extends('layouts.admin')

@section('title', isset($banner) ? 'Edit Banner' : 'Add Banner')
@section('page-title', isset($banner) ? 'Edit Banner' : 'Add Banner')

@push('styles')
<style>
    .required-asterisk { color: #e14c1e; margin-left: 3px; }
    .error-msg { color: #ef4444; font-size: 13px; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
    .error-field { border-color: #ef4444 !important; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ isset($banner) ? 'Modify Banner Details' : 'Create New Banner' }}</h3>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form action="{{ isset($banner) ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($banner))
                @method('PUT')
            @endif

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Target Page <span class="required-asterisk">*</span></label>
                    <select name="page" class="form-control" required>
                        <option value="home" {{ old('page', $banner->page ?? '') == 'home' ? 'selected' : '' }}>Home Page</option>
                        <option value="about" {{ old('page', $banner->page ?? '') == 'about' ? 'selected' : '' }}>About Us</option>
                        <option value="academics" {{ old('page', $banner->page ?? '') == 'academics' ? 'selected' : '' }}>Academics</option>
                        <option value="admissions" {{ old('page', $banner->page ?? '') == 'admissions' ? 'selected' : '' }}>Admissions</option>
                        <option value="gallery" {{ old('page', $banner->page ?? '') == 'gallery' ? 'selected' : '' }}>Gallery</option>
                        <option value="videos" {{ old('page', $banner->page ?? '') == 'videos' ? 'selected' : '' }}>Videos</option>
                        <option value="events" {{ old('page', $banner->page ?? '') == 'events' ? 'selected' : '' }}>Campus Life/Events</option>
                        <option value="awards" {{ old('page', $banner->page ?? '') == 'awards' ? 'selected' : '' }}>Awards</option>
                        <option value="careers" {{ old('page', $banner->page ?? '') == 'careers' ? 'selected' : '' }}>Careers</option>
                        <option value="contact" {{ old('page', $banner->page ?? '') == 'contact' ? 'selected' : '' }}>Contact Us</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Display Type <span class="required-asterisk">*</span></label>
                    <select name="banner_type" class="form-control" required>
                        <option value="slider" {{ old('banner_type', $banner->banner_type ?? '') == 'slider' ? 'selected' : '' }}>Home Slider</option>
                        <option value="page_header" {{ old('banner_type', $banner->banner_type ?? '') == 'page_header' ? 'selected' : '' }}>Inner Page Header</option>
                    </select>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Banner Image (Slider: 1920x800, Header: 1920x400) {!! isset($banner) ? '' : '<span class="required-asterisk">*</span>' !!}</label>
                    <input type="file" name="image" class="form-control" {{ isset($banner) ? '' : 'required' }} onchange="previewFile(this)">
                    @if(isset($banner))
                        <div style="margin-top: 10px;">
                            <img src="{{ asset('storage/' . $banner->image_path) }}" id="preview-img" style="width: 240px; border-radius: 8px;">
                        </div>
                    @else
                        <div id="preview-wrap" style="margin-top: 10px; display: none;">
                            <img id="preview-img" style="width: 240px; border-radius: 8px;">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label">Main Heading / Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title ?? '') }}" placeholder="e.g. ACADEMIC EXCELLENCE">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Subtitle</label>
                <textarea name="subtitle" class="form-control" rows="2" placeholder="e.g. Empowering Students for a Brighter Future">{{ old('subtitle', $banner->subtitle ?? '') }}</textarea>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $banner->button_text ?? '') }}" placeholder="e.g. Learn More">
                </div>
                <div class="form-group">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $banner->button_link ?? '') }}" placeholder="e.g. #admissions">
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $banner->sort_order ?? 0) }}" min="0">
                </div>
                <div class="form-group" style="display: flex; align-items: flex-end; padding-bottom: 20px;">
                    <label class="form-checkbox" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                        Active Banner
                    </label>
                </div>
            </div>

            <div style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary" style="padding: 12px 30px;">
                    <i class="fas fa-save"></i> {{ isset($banner) ? 'Update Banner' : 'Save Banner' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            const wrap = document.getElementById('preview-wrap');
            const preview = document.getElementById('preview-img');
            if(wrap) wrap.style.display = 'block';
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $('form').validate({
        rules: {
            page: { required: true },
            banner_type: { required: true },
            @if(!isset($banner))
            image: { required: true }
            @endif
        },
        messages: {
            page: { required: "<i class='fas fa-exclamation-circle'></i> Please select a target page." },
            banner_type: { required: "<i class='fas fa-exclamation-circle'></i> Please select a display type." },
            @if(!isset($banner))
            image: { required: "<i class='fas fa-exclamation-circle'></i> Please upload a banner image." }
            @endif
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
