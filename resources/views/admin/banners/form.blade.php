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
        <form action="{{ isset($banner) ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" novalidate id="banner-form">
            @csrf
            @if(isset($banner))
                @method('PUT')
            @endif

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Target Page <span class="required-asterisk">*</span></label>
                    <select name="page" class="form-control" required>
                        <option value="">Select Target Page</option>
                        <option value="home" {{ old('page', $banner->page ?? '') == 'home' ? 'selected' : '' }}>Home Page</option>
                        <option value="about" {{ old('page', $banner->page ?? '') == 'about' ? 'selected' : '' }}>About Us</option>
                        <option value="academics" {{ old('page', $banner->page ?? '') == 'academics' ? 'selected' : '' }}>Academics</option>
                        <option value="gallery" {{ old('page', $banner->page ?? '') == 'gallery' ? 'selected' : '' }}>Gallery</option>
                        <option value="events" {{ old('page', $banner->page ?? '') == 'events' ? 'selected' : '' }}>Campus Life</option>
                        <option value="careers" {{ old('page', $banner->page ?? '') == 'careers' ? 'selected' : '' }}>Careers</option>
                        <option value="contact" {{ old('page', $banner->page ?? '') == 'contact' ? 'selected' : '' }}>Contact Us</option>
                    </select>
                    <p class="form-text" style="font-size: 12px; color: var(--text-muted); margin-top: 5px;">
                        <i class="fas fa-info-circle"></i> Only the <strong>Home Page</strong> can have multiple banners (slider). All other pages only support <strong>one</strong> banner.
                    </p>
                    @error('page')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control @error('sort_order') error-field @enderror" value="{{ old('sort_order', $banner->sort_order ?? 0) }}" min="0">
                    @error('sort_order')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Banner Image (Slider: 1920x800, Header: 1920x400) {!! isset($banner) ? '' : '<span class="required-asterisk">*</span>' !!}</label>
                    <input type="file" name="image" class="form-control @error('image') error-field @enderror" {{ isset($banner) ? '' : 'required' }} onchange="previewFile(this)">
                    @error('image')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                    @if(isset($banner))
                        <div style="margin-top: 10px;">
                            <img src="{{ asset($banner->image_path) }}" id="preview-img" style="width: 240px; border-radius: 8px;">
                        </div>
                    @else
                        <div id="preview-wrap" style="margin-top: 10px; display: none;">
                            <img id="preview-img" style="width: 240px; border-radius: 8px;">
                        </div>
                    @endif
                </div>

                <div class="form-group" style="display: flex; align-items: flex-end; padding-bottom: 30px;">
                    <label class="form-checkbox" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                        Active Banner
                    </label>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Main Heading / Title</label>
                    <input type="text" name="title" class="form-control @error('title') error-field @enderror" value="{{ old('title', $banner->title ?? '') }}" placeholder="e.g. ACADEMIC EXCELLENCE">
                    @error('title')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control @error('subtitle') error-field @enderror" value="{{ old('subtitle', $banner->subtitle ?? '') }}" placeholder="e.g. Empowering Students for a Brighter Future">
                    @error('subtitle')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control @error('button_text') error-field @enderror" value="{{ old('button_text', $banner->button_text ?? '') }}" placeholder="e.g. Learn More">
                    @error('button_text')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control @error('button_link') error-field @enderror" value="{{ old('button_link', $banner->button_link ?? '') }}" placeholder="e.g. #admissions">
                    @error('button_link')
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
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
    // Check banner availability on page selection
    $('select[name="page"]').on('change', function() {
        const page = $(this).val();
        const bannerId = "{{ $banner->id ?? '' }}";
        
        if (page && page !== 'home') {
            $.get("{{ route('admin.banners.check-availability') }}", { page: page, id: bannerId }, function(response) {
                if (response.exists) {
                    toastr.error('This page already has an active banner. Only one banner is allowed per page (except Home).', 'Duplicate Banner');
                    $('select[name="page"]').addClass('error-field');
                    if ($('#duplicate-msg').length === 0) {
                        $('select[name="page"]').after('<div id="duplicate-msg" class="error-msg"><i class="fas fa-exclamation-triangle"></i> This page already has a banner image!</div>');
                    }
                } else {
                    $('select[name="page"]').removeClass('error-field');
                    $('#duplicate-msg').remove();
                }
            });
        } else {
            $('select[name="page"]').removeClass('error-field');
            $('#duplicate-msg').remove();
        }
    });

    $('#banner-form').validate({
        rules: {
            page: { required: true },
            @if(!isset($banner))
            image: { required: true }
            @endif
        },
        messages: {
            page: { required: "<i class='fas fa-exclamation-circle'></i> Please select a target page." },
            @if(!isset($banner))
            image: { required: "<i class='fas fa-exclamation-circle'></i> Please upload a banner image." }
            @endif
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.addClass('error-msg');
            error.insertAfter(element);
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
