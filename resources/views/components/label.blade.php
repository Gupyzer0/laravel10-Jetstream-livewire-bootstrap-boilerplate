@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label mb-1']) }}>
    {{ $value ?? $slot }}
</label>
