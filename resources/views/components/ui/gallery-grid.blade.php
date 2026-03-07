@props([
    'photos' => collect(),
    'videos' => collect(),
    'limit' => null,
    'showControls' => true,
    'photoLabel' => 'Photos',
    'videoLabel' => 'Videos'
])

@php
    $photoItems = $photos instanceof \Illuminate\Pagination\AbstractPaginator ? collect($photos->items()) : collect($photos);
    $videoItems = $videos instanceof \Illuminate\Pagination\AbstractPaginator ? collect($videos->items()) : collect($videos);

    if ($limit) {
        $photoItems = $photoItems->take($limit);
        $videoItems = $videoItems->take($limit);
    }

    $photoCount = $photos instanceof \Illuminate\Pagination\AbstractPaginator ? $photos->total() : $photoItems->count();
    $videoCount = $videos instanceof \Illuminate\Pagination\AbstractPaginator ? $videos->total() : $videoItems->count();
@endphp

<div class="gallery-shell js-gallery-tabs">
    @if($showControls)
        <div class="gallery-tabs" role="tablist" aria-label="Gallery tabs">
            <button type="button" class="gallery-tab active" data-gallery-tab="photos">{{ $photoLabel }} ({{ $photoCount }})</button>
            <button type="button" class="gallery-tab" data-gallery-tab="videos">{{ $videoLabel }} ({{ $videoCount }})</button>
        </div>
    @endif

    <div class="gallery-panel active" data-gallery-panel="photos">
        @if($photoItems->count() > 0)
            <div class="photo-grid">
                @foreach($photoItems as $photo)
                    <figure class="photo-card" title="{{ $photo->title ?? 'Gallery photo' }}">
                        @if(!empty($photo->file_path))
                            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title ?? 'Photo' }}" loading="lazy">
                        @else
                            <img src="https://jmpsss.com/wp-content/uploads/2015/11/school.jpg" alt="School gallery" loading="lazy">
                        @endif
                        <figcaption class="photo-title">{{ $photo->title ?? 'Gallery item' }}</figcaption>
                    </figure>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No photos yet</h3>
                <p>Photos will appear once updated through the admin panel.</p>
            </div>
        @endif
    </div>

    <div class="gallery-panel" data-gallery-panel="videos">
        @if($videoItems->count() > 0)
            <div class="video-grid">
                @foreach($videoItems as $video)
                    <article class="video-card">
                        @if(!empty($video->video_url))
                            <a href="{{ $video->video_url }}" target="_blank" class="video-thumb" rel="noopener noreferrer" aria-label="Open {{ $video->title ?? 'video' }}">
                                <span>?</span>
                            </a>
                        @else
                            <div class="video-thumb"><span>?</span></div>
                        @endif
                        <div class="video-info">
                            <h4>{{ $video->title ?? 'Video update' }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($video->description ?? 'Video content available in gallery.', 100) }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No videos yet</h3>
                <p>Videos will appear once uploaded through the admin panel.</p>
            </div>
        @endif
    </div>
</div>
