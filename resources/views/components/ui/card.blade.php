@props([
    'title' => null,
    'subtitle' => null,
    'icon' => null,
    'hover' => true,
    'class' => ''
])

<article {{ $attributes->merge(['class' => 'ui-card' . ($hover ? ' hover ' : ' ') . $class]) }}>
    @if ($icon)
        <div class="ui-card-icon">{!! $icon !!}</div>
    @endif

    @if ($title)
        <h3 class="ui-card-title">{{ $title }}</h3>
    @endif

    @if ($subtitle)
        <p class="ui-card-sub">{{ $subtitle }}</p>
    @endif

    <div class="ui-card-text">
        {{ $slot }}
    </div>
</article>
