@extends('layouts.admin')

@section('title', isset($gallery) ? 'Edit Album' : 'Create New Album')
@section('page-title', isset($gallery) ? 'Edit Album' : 'Create New Album')

@push('styles')
<style>
    /* Premium Gallery Styles */
    .form-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .premium-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        overflow: hidden;
        margin-bottom: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .premium-card:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }

    .card-header-gradient {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        padding: 24px 30px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-header-gradient h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .card-body-premium {
        padding: 30px;
    }

    .form-section-title {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section-title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    /* Media Grid */
    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 15px;
        margin-bottom: 1.5rem;
    }

    .media-card {
        position: relative;
        aspect-ratio: 1/1;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--border);
        background: #f8fafc;
        transition: all 0.3s ease;
    }

    .media-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .media-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .media-card .video-icon {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #1e293b;
        color: #fff;
        font-size: 2rem;
    }

    .media-delete-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 28px;
        height: 28px;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.2s, transform 0.2s;
        transform: scale(0.8);
    }

    .media-card:hover .media-delete-btn {
        opacity: 1;
        transform: scale(1);
    }

    .media-delete-btn:hover {
        background: #ef4444;
        transform: scale(1.1) !important;
    }

    /* Dropzone Customization */
    .dropzone-container {
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 40px 20px;
        text-align: center;
        background: #f8fafc;
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }

    .dropzone-container:hover {
        border-color: var(--primary);
        background: #f1f5f9;
    }

    .dropzone-container i {
        font-size: 3rem;
        color: #94a3b8;
        margin-bottom: 15px;
    }

    .dropzone-container h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 5px;
    }

    .dropzone-container p {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .file-input-hidden {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* Video Input Group */
    .video-input-item {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn-add-function {
        border: 2px dashed #cbd5e1;
        background: #ffffff;
        padding: 20px;
        width: 100%;
        border-radius: 16px;
        color: var(--text-muted);
        font-weight: 600;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .btn-add-function:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: #f8fafc;
    }

    .preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
        margin-top: 20px;
    }

    .preview-item {
        position: relative;
        aspect-ratio: 1/1;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-remove {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0,0,0,0.5);
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .category-badge {
        font-size: 10px;
        text-transform: uppercase;
        background: var(--accent);
        color: var(--primary);
        padding: 3px 10px;
        border-radius: 50px;
        font-weight: 800;
        display: inline-block;
        margin-bottom: 8px;
    }

    @media (max-width: 768px) {
        .form-grid-2 { grid-template-columns: 1fr; }
    }

    /* Validation Styles */
    .required-asterisk { color: #e14c1e; margin-left: 3px; }
    .error-msg { color: #ef4444; font-size: 13px; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
    .error-field { border-color: #ef4444 !important; }
</style>
@endpush

@section('content')
<div class="form-container">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline">
            <i class="fas fa-chevron-left"></i> Back to Gallery
        </a>
        <div class="d-none d-md-block" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
            <span class="text-muted small">Manage your school albums and media</span>
        </div>
    </div>

    <form id="gallery-form" method="POST" action="{{ isset($gallery) ? route('admin.gallery.update', $gallery) : route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($gallery)) @method('PUT') @endif

        <div id="groups-container">
            @if(isset($gallery))
                <!-- Edit Mode Card -->
                <div class="premium-card">
                    <div class="card-header-gradient">
                        <div>
                            <span class="category-badge">{{ $gallery->category ?? 'General' }}</span>
                            <h3><i class="fas fa-pen-nib me-2"></i> Edit Album: {{ $gallery->title }}</h3>
                        </div>
                        <div class="d-flex gap-2">
                        </div>
                    </div>
                    <div class="card-body-premium">
                        <div class="form-section-title"><i class="fas fa-info-circle"></i> Album Information</div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label class="form-label">Album Title <span class="required-asterisk">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" placeholder="e.g. Annual Sports Day 2025" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category) }}" placeholder="e.g. Sports, Cultural, Academic">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="is_active" class="form-control" required>
                                        <option value="1" {{ $gallery->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$gallery->is_active ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Write a brief overview of the event...">{{ old('description', $gallery->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-title"><i class="fas fa-photo-video"></i> Existing Media ({{ $gallery->items->count() }})</div>
                        <div class="media-grid mb-5">
                            @forelse($gallery->items as $item)
                                <div class="media-card" id="item-{{ $item->id }}">
                                    @if($item->item_type == 'photo')
                                        @php
                                            $imagePath = asset($item->file_path);
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="Gallery Image" loading="lazy">
                                    @else
                                        <div class="video-icon">
                                            <i class="fas fa-play-circle"></i>
                                        </div>
                                    @endif
                                    <button type="button" class="media-delete-btn" onclick="deleteMediaItem({{ $item->id }})" title="Delete this item">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            @empty
                                <div class="col-12 py-5 text-center text-muted border rounded-3 bg-light">
                                    <i class="fas fa-images fa-3x mb-3 opacity-20"></i>
                                    <p>No media found in this album.</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="form-section-title"><i class="fas fa-plus-circle"></i> Add More Photos</div>
                                <div class="dropzone-container">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>Click or Drag Photos</h4>
                                    <p>Select multiple images to add to this album</p>
                                    <input type="file" id="edit-photos-input" name="new_photos[]" class="file-input-hidden" accept="image/*" multiple onchange="previewImages(this, 'edit-preview-grid')">
                                </div>
                                <div id="edit-preview-grid" class="preview-grid"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-section-title"><i class="fas fa-video"></i> Add More Video Links</div>
                                <div id="edit-video-urls-container">
                                    <div class="video-input-item">
                                        <input type="url" name="new_video_urls[]" class="form-control" placeholder="Paste YouTube URL here">
                                        <button type="button" class="btn btn-primary btn-sm rounded-3" onclick="addVideoField('edit-video-urls-container', 'new_video_urls')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="mt-2 small text-muted">
                                    <i class="fas fa-info-circle"></i> Copy the full URL from your browser's address bar.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Create Mode Card -->
                <div class="premium-card function-group" data-index="0">
                    <div class="card-header-gradient">
                        <h3><i class="fas fa-folder-plus me-2"></i> New Album Details</h3>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 border-0 bg-white bg-opacity-20 remove-group-btn" style="display:none;" onclick="removeGroup(0)">
                                <i class="fas fa-times me-1"></i> Remove
                            </button>
                        </div>
                    </div>
                    <div class="card-body-premium">
                        <div class="form-section-title"><i class="fas fa-info-circle"></i> Album Information</div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label class="form-label">Album Title <span class="required-asterisk">*</span></label>
                                    <input type="text" name="groups[0][title]" class="form-control" placeholder="e.g. Diwali Function 2024" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="groups[0][category]" class="form-control" placeholder="e.g. Festivals, Sports">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="groups[0][is_active]" class="form-control">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="groups[0][description]" class="form-control" rows="2" placeholder="Briefly describe this event/album..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="form-section-title"><i class="fas fa-camera"></i> Photos</div>
                                <div class="dropzone-container">
                                    <i class="fas fa-images"></i>
                                    <h4>Drop Photos Here</h4>
                                    <p>Select multiple images (Max 10MB per file)</p>
                                    <input type="file" name="groups[0][photos][]" class="file-input-hidden" accept="image/*" multiple onchange="previewImages(this, 'preview-grid-0')">
                                </div>
                                <div id="preview-grid-0" class="preview-grid"></div>
                            </div>
                            <div class="col-lg-6 border-start-md">
                                <div class="form-section-title"><i class="fas fa-play-circle"></i> Video Links</div>
                                <div id="video-urls-0" class="video-urls-container">
                                    <div class="video-input-item">
                                        <input type="url" name="groups[0][video_urls][]" class="form-control" placeholder="https://youtube.com/watch?v=...">
                                        <button type="button" class="btn btn-primary btn-sm rounded-3" onclick="addVideoField('video-urls-0', 'groups[0][video_urls]')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if(!isset($gallery))
            <div class="mb-5">
                <button type="button" class="btn-add-function" onclick="addGroup()">
                    <i class="fas fa-plus-circle fa-2x"></i>
                    <span>Add Another Album Group</span>
                    <small class="text-muted">Upload multiple distinct albums in one go</small>
                </button>
            </div>
        @endif

        <div class="premium-card sticky-bottom-custom" style="position: sticky; bottom: 20px; z-index: 10;">
            <div class="card-body py-3 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div class="d-none d-md-block" style="margin-bottom: 5px;">
                    <p class="text-muted small mb-0"><i class="fas fa-cloud-upload-alt me-1"></i> Changes will be saved to the database immediately.</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-lg px-5 border-0 shadow-lg" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);">
                        <i class="fas fa-save me-2"></i> {{ isset($gallery) ? 'Update Album' : 'Publish Gallery' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let groupCount = 1;

    function addGroup() {
        const container = document.getElementById('groups-container');
        const newGroup = document.createElement('div');
        newGroup.className = 'premium-card function-group';
        newGroup.setAttribute('data-index', groupCount);
        
        const idx = groupCount;
        
        newGroup.innerHTML = `
            <div class="card-header-gradient" style="background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);">
                <div class="d-flex align-items-center gap-3">
                    <h3 style="color: var(--primary); margin: 0;"><i class="fas fa-folder-plus me-2"></i> Additional Album</h3>
                </div>
                <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 border-0 bg-white bg-opacity-50" onclick="removeGroup(${idx})">
                    <i class="fas fa-times me-1"></i> Remove
                </button>
            </div>
            <div class="card-body-premium">
                <div class="form-section-title"><i class="fas fa-info-circle"></i> Album Information</div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group mb-3">
                            <label class="form-label">Album Title <span class="required-asterisk">*</span></label>
                            <input type="text" name="groups[${idx}][title]" class="form-control" placeholder="Enter title" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="groups[${idx}][category]" class="form-control" placeholder="Enter category">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label class="form-label">Status</label>
                            <select name="groups[${idx}][is_active]" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Short Description</label>
                            <textarea name="groups[${idx}][description]" class="form-control" rows="2" placeholder="Description..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="form-section-title"><i class="fas fa-camera"></i> Photos</div>
                        <div class="dropzone-container">
                            <i class="fas fa-images"></i>
                            <h4>Drop Photos Here</h4>
                            <p>Select multiple images</p>
                            <input type="file" name="groups[${idx}][photos][]" class="file-input-hidden" accept="image/*" multiple onchange="previewImages(this, 'preview-grid-${idx}')">
                        </div>
                        <div id="preview-grid-${idx}" class="preview-grid"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-section-title"><i class="fas fa-play-circle"></i> Video Links</div>
                        <div id="video-urls-${idx}" class="video-urls-container">
                            <div class="video-input-item">
                                <input type="url" name="groups[${idx}][video_urls][]" class="form-control" placeholder="YouTube URL">
                                <button type="button" class="btn btn-primary btn-sm rounded-3" onclick="addVideoField('video-urls-${idx}', 'groups[${idx}][video_urls]')"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Add animation
        newGroup.style.opacity = '0';
        newGroup.style.transform = 'translateY(20px)';
        container.appendChild(newGroup);
        
        setTimeout(() => {
            newGroup.style.transition = 'all 0.5s ease';
            newGroup.style.opacity = '1';
            newGroup.style.transform = 'translateY(0)';
        }, 10);
        
        groupCount++;
    }

    function removeGroup(index) {
        const group = document.querySelector(`.function-group[data-index="${index}"]`);
        if (group) {
            group.style.opacity = '0';
            group.style.transform = 'scale(0.95)';
            setTimeout(() => group.remove(), 300);
        }
    }

    function addVideoField(containerId, inputName) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'video-input-item';
        div.innerHTML = `
            <input type="url" name="${inputName}[]" class="form-control" placeholder="YouTube URL">
            <button type="button" class="btn btn-outline border-danger text-danger btn-sm rounded-3" onclick="this.parentElement.remove()"><i class="fas fa-trash"></i></button>
        `;
        container.appendChild(div);
    }

    function previewImages(input, previewGridId) {
        const previewGrid = document.getElementById(previewGridId);
        previewGrid.innerHTML = '';
        
        if (input.files) {
            [...input.files].forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'preview-item';
                    div.innerHTML = `
                        <img src="${e.target.result}">
                        <button type="button" class="preview-remove" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    previewGrid.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }

    function deleteMediaItem(id) {
        Swal.fire({
            title: 'Delete Media?',
            text: "This item will be permanently removed from the album.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete it!',
            borderRadius: '16px'
        }).then((result) => {
            if (result.isConfirmed) {
                const deleteUrl = '{{ route("admin.gallery.item.destroy", ":id") }}'.replace(':id', id);
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => {
                    if (!res.ok) throw new Error('Server error: ' + res.status);
                    return res.json();
                })
                .then(data => {
                    if (data.success) {
                        const item = document.getElementById(`item-${id}`);
                        item.style.transform = 'scale(0)';
                        item.style.opacity = '0';
                        setTimeout(() => item.remove(), 300);
                        toastr.success('Media item deleted');
                    } else {
                        toastr.error('Error deleting media');
                    }
                })
                .catch(err => {
                    console.error(err);
                    toastr.error('Error deleting media: ' + err.message);
                });
            }
        });
    }

    // Dropzone Visual Feedback
    document.addEventListener('dragover', function(e) {
        if (e.target.closest('.dropzone-container')) {
            e.target.closest('.dropzone-container').style.borderColor = 'var(--primary)';
            e.target.closest('.dropzone-container').style.background = '#f1f5f9';
        }
    });

    document.addEventListener('dragleave', function(e) {
        if (e.target.closest('.dropzone-container')) {
            e.target.closest('.dropzone-container').style.borderColor = '#cbd5e1';
            e.target.closest('.dropzone-container').style.background = '#f8fafc';
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize jQuery Validation
    $('#gallery-form').validate({
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
