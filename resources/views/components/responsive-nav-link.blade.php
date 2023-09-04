@props(['active'])

@php
$classes = ($active ?? false)
            ? 'navbar-link h-4r active'
            : 'navbar-link h-4r';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
