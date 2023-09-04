@props([
    'href',
])

<li>
    <a href="{{ $href }}" class="dropdown-item" href="{{ route('profile.show') }}" {{ $attributes }}>{{ $slot }}</a>
</li>
