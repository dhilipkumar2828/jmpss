@extends('layouts.admin')

@section('title', 'Gallery Management')
@section('page-title', 'Gallery Management')

@push('styles')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        margin-top: 20px;
    }

    .gallery-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .gallery-preview {
        height: 200px;
        width: 100%;
        position: relative;
        overflow: hidden;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-preview img {
        transform: scale(1.1);
    }

    .gallery-status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
    }

    .gallery-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .gallery-category {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--accent-dark);
        margin-bottom: 8px;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .gallery-desc {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .gallery-stats {
        display: flex;
        gap: 12px;
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
    }

    .stat-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
    }

    .stat-pill i {
        color: var(--primary);
        font-size: 14px;
    }

    .gallery-actions {
        padding: 15px 20px;
        background: #f8fafc;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        border-top: 1px solid #f1f5f9;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background: #dbeafe;
        color: #1e40af;
    }

    .btn-edit:hover {
        background: #1e40af;
        color: white;
    }

    .btn-delete {
        background: #fee2e2;
        color: #991b1b;
    }

    .btn-delete:hover {
        background: #991b1b;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 20px;
        border: 2px dashed #cbd5e1;
    }

    .pagination-wrapper {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }

    /* Customizing Laravel Pagination Styles to match */
    .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
    }

    .page-item .page-link {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        color: var(--text);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s;
    }

    .page-item.active .page-link {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .page-item:hover:not(.active) .page-link {
        border-color: var(--primary);
        color: var(--primary);
    }

    /* Fix for giant pagination icons */
    .pagination-wrapper svg {
        width: 1.2rem !important;
        height: 1.2rem !important;
        display: inline-block;
        vertical-align: middle;
    }

    /* Clean up Laravel's default pagination metadata text */
    .pagination-wrapper nav > div:first-child {
        display: none !important;
    }

    .pagination-wrapper nav > div:last-child {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .pagination-wrapper .text-sm {
        font-size: 0.9rem !important;
        color: var(--text-muted) !important;
    }
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
    }

    .page-header-info h2 {
        font-weight: 800;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-header-info p {
        color: var(--text-muted);
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-info">
        <h2>🖼️ Media Library</h2>
        <p>Organize and manage your school's photo albums and video galleries.</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-lg shadow-sm">
        <i class="fas fa-plus-circle me-2"></i> Create New Album
    </a>
</div>

<div class="gallery-grid">
    @forelse($galleries as $g)
        <div class="gallery-card">
            <div class="gallery-preview">
                @if($g->is_active)
                    <span class="badge badge-success gallery-status-badge">Active</span>
                @else
                    <span class="badge badge-warning gallery-status-badge">Draft</span>
                @endif
                
                @php 
                    $firstPhoto = $g->items()->where('item_type', 'photo')->first();
                    if($firstPhoto && $firstPhoto->file_path) {
                        $imagePath = asset($firstPhoto->file_path);
                    } else {
                        $imagePath = null;
                    }
                @endphp

                @if($imagePath)
                    <img src="{{ $imagePath }}" alt="{{ $g->title }}" loading="lazy">
                @else
                    <div class="text-center text-muted opacity-50">
                        <i class="fas fa-images fa-4x mb-2"></i>
                        <p class="small mb-0">No Preview Available</p>
                    </div>
                @endif
            </div>

            <div class="gallery-content">
                <div class="gallery-category text-truncate">{{ $g->category ?? 'General Gallery' }}</div>
                <h3 class="gallery-title" title="{{ $g->title }}">{{ $g->title }}</h3>
                <p class="gallery-desc">{{ $g->description ?? 'No description provided for this album.' }}</p>
                
                <div class="gallery-stats">
                    <div class="stat-pill">
                        <i class="fas fa-camera"></i>
                        <span>{{ $g->items()->where('item_type', 'photo')->count() }} Photos</span>
                    </div>
                    <div class="stat-pill">
                        <i class="fas fa-play-circle"></i>
                        <span>{{ $g->items()->where('item_type', 'video')->count() }} Videos</span>
                    </div>
                </div>
            </div>

            <div class="gallery-actions">
                <a href="{{ route('admin.gallery.edit', $g) }}" class="action-btn btn-edit" title="Edit Album">
                    <i class="fas fa-pen"></i>
                </a>
                <form method="POST" action="{{ route('admin.gallery.destroy', $g) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn btn-delete" title="Delete Album" onclick="return confirmDelete('{{ $g->title }} and all its media')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state">
                <i class="fas fa-folder-open fa-4x text-muted mb-3 opacity-20"></i>
                <h3 class="fw-bold">No Albums Found</h3>
                <p class="text-muted mb-4">You haven't created any gallery albums yet. Start by uploading some memories!</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary px-4">
                    <i class="fas fa-plus me-1"></i> Create Your First Album
                </a>
            </div>
        </div>
    @endforelse
</div>

<div class="pagination-wrapper">
    {{ $galleries->links() }}
</div>
@endsection
