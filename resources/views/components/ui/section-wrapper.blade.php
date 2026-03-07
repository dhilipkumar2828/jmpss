@props([
    'id' => null,
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'tone' => null,
    'class' => ''
])

<section @if($id) id="{{ $id }}" @endif class="section-wrap {{ $class }}" @if($tone) data-tone="{{ $tone }}" @endif>
    <div class="site-container">
        @if ($eyebrow || $title || $description)
            <header class="section-head">
                @if ($eyebrow)
                    <p class="section-eyebrow">{{ $eyebrow }}</p>
                @endif
                @if ($title)
                    <h2 class="section-title">{{ $title }}</h2>
                @endif
                @if ($description)
                    <p class="section-desc">{{ $description }}</p>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>
</section>
