@extends('layouts.app')
@section('title', 'Gallery – JMPSS School')

@push('styles')
<style>
.tab-buttons { display: flex; gap: 12px; justify-content: center; margin-bottom: 40px; flex-wrap: wrap; }
.tab-btn { padding: 12px 32px; border-radius: 50px; font-size: 15px; font-weight: 600; cursor: pointer; border: 2px solid var(--border); background: white; color: var(--text); transition: all 0.2s; }
.tab-btn.active,.tab-btn:hover { background: var(--primary); color: white; border-color: var(--primary); }
.tab-content { display: none; }
.tab-content.active { display: block; }
.photo-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px; }
.photo-item { border-radius: 12px; overflow: hidden; background: #dbeafe; aspect-ratio: 4/3; display: grid; place-items: center; font-size: 48px; cursor: pointer; position: relative; box-shadow: var(--shadow-sm); transition: transform 0.3s; }
.photo-item:hover { transform: scale(1.02); }
.photo-item img { width: 100%; height: 100%; object-fit: cover; }
.photo-overlay { position: absolute; inset: 0; background: rgba(26,60,110,0.5); opacity: 0; transition: opacity 0.3s; display: grid; place-items: center; }
.photo-item:hover .photo-overlay { opacity: 1; }
.photo-overlay i { color: white; font-size: 32px; }
.video-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px; }
.video-card { background: white; border-radius: var(--radius); box-shadow: var(--shadow-sm); border: 1px solid var(--border); overflow: hidden; transition: transform 0.3s; }
.video-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
.video-thumb { aspect-ratio: 16/9; background: #1a3c6e; display: grid; place-items: center; font-size: 48px; position: relative; cursor: pointer; }
.video-play { position: absolute; width: 56px; height: 56px; background: var(--accent); border-radius: 50%; display: grid; place-items: center; }
.video-play i { color: var(--primary); font-size: 20px; padding-left: 3px; }
.video-info { padding: 20px; }
.video-info h4 { font-size: 16px; font-weight: 700; margin-bottom: 6px; }
.video-info p { font-size: 13px; color: var(--text-muted); }
</style>
@endpush

@section('content')
<div class="page-header">
    <h1>📸 Photo & Video Gallery</h1>
    <p>A visual journey through the vibrant life at JMPSS</p>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="sep">/</span>
        <span>Gallery</span>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="tab-buttons">
            <button class="tab-btn active" onclick="showTab('photos',this)"><i class="fas fa-images"></i> Photos ({{ $photos->total() }})</button>
            <button class="tab-btn" onclick="showTab('videos',this)"><i class="fas fa-video"></i> Videos ({{ $videos->total() }})</button>
        </div>

        <!-- Photos -->
        <div class="tab-content active" id="tab-photos">
            @if($photos->count() > 0)
            <div class="photo-grid">
                @foreach($photos as $photo)
                <div class="photo-item" title="{{ $photo->title }}">
                    @if($photo->file_path)
                        <img src="{{ asset('storage/'.$photo->file_path) }}" alt="{{ $photo->title }}" loading="lazy">
                    @else
                        🖼️
                    @endif
                    <div class="photo-overlay"><i class="fas fa-expand"></i></div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                @for($i=1; $i<=$photos->lastPage(); $i++)
                <a href="{{ $photos->url($i) }}#tab-photos" class="page-link {{ $photos->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor
            </div>
            @else
            <div style="text-align:center;padding:80px 20px;color:var(--text-muted);">
                <div style="font-size:64px;margin-bottom:16px;">📷</div>
                <h3 style="font-size:20px;margin-bottom:8px;">No Photos Yet</h3>
                <p>Photos will be uploaded by the admin soon.</p>
            </div>
            @endif
        </div>

        <!-- Videos -->
        <div class="tab-content" id="tab-videos">
            @if($videos->count() > 0)
            <div class="video-grid">
                @foreach($videos as $video)
                <div class="video-card">
                    <div class="video-thumb" @if($video->video_url) onclick="window.open('{{ $video->video_url }}','_blank')" @endif>
                        <span>🎥</span>
                        <div class="video-play"><i class="fas fa-play"></i></div>
                    </div>
                    <div class="video-info">
                        <h4>{{ $video->title }}</h4>
                        <p>{{ Str::limit($video->description, 80) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center;padding:80px 20px;color:var(--text-muted);">
                <div style="font-size:64px;margin-bottom:16px;">🎬</div>
                <h3 style="font-size:20px;margin-bottom:8px;">No Videos Yet</h3>
                <p>Videos will be uploaded by the admin soon.</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function showTab(tab, btn) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.add('active');
    btn.classList.add('active');
}
</script>
@endpush
