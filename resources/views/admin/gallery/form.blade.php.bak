@extends('layouts.admin')

@section('title', isset($gallery) ? 'Edit Gallery Item' : 'Bulk Gallery Upload')
@section('page-title', isset($gallery) ? 'Edit Gallery Item' : 'Bulk Gallery Upload')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline btn-sm mb-4"><i class="fas fa-arrow-left"></i> Back to Gallery</a>
        
        <form method="POST" action="{{ isset($gallery) ? route('admin.gallery.update', $gallery) : route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($gallery)) @method('PUT') @endif

            <div id="function-groups-container">
                @if(isset($gallery))
                <!-- Edit Mode: Single Album Focus -->
                <div class="card mb-4" style="border-left: 5px solid var(--primary-color);">
                    <div class="card-header">
                        <h3><i class="fas fa-edit"></i> Edit Album: {{ $gallery->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Album Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="description" class="form-control" rows="2">{{ old('description', $gallery->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Existing Media Management -->
                        <div class="mb-4">
                            <h4 class="mb-3"><i class="fas fa-clapperboard"></i> Existing Media</h4>
                            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                @foreach($gallery->items as $item)
                                <div class="media-item-card" id="item-{{ $item->id }}" style="flex: 0 0 200px; max-width: 200px; width: 100%;">
                                    <div class="position-relative" style="border:1px solid #ddd; border-radius:8px; overflow:hidden; background:#f8f9fa;">
                                        @if($item->item_type == 'photo')
                                        <img src="{{ asset('storage/'.$item->file_path) }}" style="width:100%; height:140px; object-fit:cover; display:block;">
                                        @else
                                        <div style="width:100%; height:140px; background:#111; display:flex; align-items:center; justify-content:center; color:#fff; font-size:32px;">
                                            <i class="fas fa-play-circle"></i>
                                        </div>
                                        @endif
                                        <button type="button" class="btn btn-danger btn-sm" style="position:absolute; top:8px; right:8px; width:32px; height:32px; padding:0; display:flex; align-items:center; justify-content:center; border-radius:50%; box-shadow: 0 2px 6px rgba(0,0,0,0.3);" onclick="deleteMediaItem({{ $item->id }})" title="Delete this media">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @if($item->item_type == 'video')
                                        <div style="font-size: 11px; padding: 6px; text-align: center; background:#f1f5f9; border:1px solid #ddd; border-top:none; border-radius:0 0 8px 8px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; color:#64748b;">
                                            <i class="fas fa-video"></i> Video Link Attached
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Add More Section -->
                        <div class="row" style="background: #f0f4f8; padding: 20px; border-radius: 12px; margin: 0;">
                            <div class="col-md-6">
                                <h4 class="mb-3">Add More Photos</h4>
                                <input type="file" name="new_photos[]" class="form-control" accept="image/*" multiple>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-3">Add More Videos</h4>
                                <div id="edit-video-urls-container">
                                    <div class="d-flex gap-2 mb-2">
                                        <input type="url" name="new_video_urls[]" class="form-control" placeholder="YouTube URL">
                                        <button type="button" class="btn btn-outline btn-sm" onclick="addNewVideoField('edit-video-urls-container', 'new_video_urls')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- Create Mode: Bulk Groups -->
                <div class="card function-group mb-4" data-index="0" style="border-left: 5px solid var(--primary-color);">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3><i class="fas fa-folder-open"></i> Function Details</h3>
                        <button type="button" class="btn btn-danger btn-sm remove-group-btn" style="display:none;" onclick="removeGroup(0)">
                            <i class="fas fa-times"></i> Remove Group
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Function Title * (e.g. Diwali Function)</label>
                                    <input type="text" name="groups[0][title]" class="form-control" placeholder="Enter function name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="groups[0][category]" class="form-control" placeholder="e.g. Festivals, Sports">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="groups[0][description]" class="form-control" rows="2" placeholder="Tell something about this event..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="background: #f8fafc; padding: 20px; border-radius: 12px; margin: 0;">
                            <div class="col-md-6" style="border-right: 1px solid #e2e8f0;">
                                <h4 class="mb-3"><i class="fas fa-camera"></i> Photos</h4>
                                <div class="form-group">
                                    <label class="form-label">Select Photos (Multiple allowed)</label>
                                    <input type="file" name="groups[0][photos][]" class="form-control" accept="image/*" multiple>
                                    <small class="text-muted">You can select 10+ images at once.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-3"><i class="fas fa-video"></i> Videos</h4>
                                <div class="video-urls-container" id="video-urls-0">
                                    <div class="d-flex gap-2 mb-2">
                                        <input type="url" name="groups[0][video_urls][]" class="form-control" placeholder="YouTube URL">
                                        <button type="button" class="btn btn-outline btn-sm" onclick="addVideoField(0)"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            @if(!isset($gallery))
            <div class="mb-4">
                <button type="button" class="btn btn-outline w-100" style="border: 2px dashed #cbd5e1; padding: 15px;" onclick="addGroup()">
                    <i class="fas fa-plus-circle"></i> Add Another Function (e.g. Pongal Function)
                </button>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-cloud-upload-alt"></i> {{ isset($gallery) ? 'Save Changes' : 'Start Bulk Upload' }}
                    </button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline btn-lg">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
let groupCount = 1;

function addGroup() {
    const container = document.getElementById('function-groups-container');
    const newGroup = document.createElement('div');
    newGroup.className = 'card function-group mb-4';
    newGroup.setAttribute('data-index', groupCount);
    newGroup.style.borderLeft = '5px solid var(--secondary-color)';
    
    newGroup.innerHTML = `
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><i class="fas fa-folder-open"></i> Function Details</h3>
            <button type="button" class="btn btn-danger btn-sm remove-group-btn" onclick="removeGroup(${groupCount})">
                <i class="fas fa-times"></i> Remove Group
            </button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Function Title *</label>
                        <input type="text" name="groups[${groupCount}][title]" class="form-control" placeholder="Enter function name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="groups[${groupCount}][category]" class="form-control" placeholder="e.g. Festivals">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Short Description</label>
                        <textarea name="groups[${groupCount}][description]" class="form-control" rows="2" placeholder="Tell something about this event..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row" style="background: #f8fafc; padding: 20px; border-radius: 12px; margin: 0;">
                <div class="col-md-6" style="border-right: 1px solid #e2e8f0;">
                    <h4 class="mb-3"><i class="fas fa-camera"></i> Photos</h4>
                    <div class="form-group">
                        <label class="form-label">Select Photos (Multiple allowed)</label>
                        <input type="file" name="groups[${groupCount}][photos][]" class="form-control" accept="image/*" multiple>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3"><i class="fas fa-video"></i> Videos</h4>
                    <div class="video-urls-container" id="video-urls-${groupCount}">
                        <div class="d-flex gap-2 mb-2">
                            <input type="url" name="groups[${groupCount}][video_urls][]" class="form-control" placeholder="YouTube URL">
                            <button type="button" class="btn btn-outline btn-sm" onclick="addVideoField(${groupCount})"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.appendChild(newGroup);
    groupCount++;
}

function removeGroup(index) {
    const group = document.querySelector(`.function-group[data-index="${index}"]`);
    if (group) group.remove();
}

function addVideoField(groupIndex) {
    const container = document.getElementById(`video-urls-${groupIndex}`);
    addNewVideoField(`video-urls-${groupIndex}`, `groups[${groupIndex}][video_urls]`);
}

function addNewVideoField(targetContainerId, inputName) {
    const container = document.getElementById(targetContainerId);
    const div = document.createElement('div');
    div.className = 'd-flex gap-2 mb-2';
    div.innerHTML = `
        <input type="url" name="${inputName}[]" class="form-control" placeholder="YouTube URL">
        <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()"><i class="fas fa-trash"></i></button>
    `;
    container.appendChild(div);
}

function deleteMediaItem(id) {
    if(!confirm('Are you sure you want to delete this specific media item?')) return;
    
    fetch(`/admin/gallery/item/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            document.getElementById(`item-${id}`).remove();
        }
    });
}
</script>
@endpush
@endsection
