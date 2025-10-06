@props([
    'type' => 'button',
])

@php
    // Get all attributes as array
    $attrs = collect($attributes->getAttributes())->keys();

    // Detect the route name (the one containing a dot)
    $route = collect($attrs)->first(fn($a) => str_contains($a, '.'));

    // Detect Bootstrap color (primary, success, danger, etc.)
    $color = collect($attrs)->first(fn($a) => in_array($a, [
        'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'
    ])) ?? 'primary';

    // Detect button size (btn-sm, btn-lg, etc.)
    $size = collect($attrs)->first(fn($a) => str_contains($a, 'btn-')) ?? '';

    $classes = "btn btn-$color $size";

    // Build href if route detected
    $href = $route ? route($route) : null;
@endphp

@if ($href)
    <a href="{{ $href }}" class="{{ $classes }}">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class="{{ $classes }}">
        {{ $slot }}
    </button>
@endif
