@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'class' => '',
])

@php
    $variantClass = match ($variant) {
        'secondary' => 'secondary',
        'outline' => 'outline',
        'gold' => 'gold',
        'navy' => 'navy',
        default => 'primary',
    };

    $sizeClass = match ($size) {
        'sm' => 'sm',
        'lg' => 'lg',
        default => 'md',
    };

    $classes = trim("ui-btn {$variantClass} {$sizeClass} {$class}");
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
