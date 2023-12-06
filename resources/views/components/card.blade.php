
<div {{ $attributes->merge(['class' => 'card shadow-sm']) }}>

    @isset($header)
    <div class="card-header">
        {{ $header }}
    </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>
    
</div>

