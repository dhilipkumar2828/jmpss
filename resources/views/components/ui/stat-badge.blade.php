@props([
    'label' => '',
    'value' => '',
    'icon' => null
])

<div class="stat-badge" {{ $attributes }}>
    @if($icon)
        <span>{!! $icon !!}</span>
    @endif
    <span>{{ $label }}</span>
    @if($value)
        <strong>{{ $value }}</strong>
    @endif
</div>
