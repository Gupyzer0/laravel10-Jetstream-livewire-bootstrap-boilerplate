<div {{ $attributes->merge(['class' => 'row mb-5']) }}>

    <div class="col-lg-3 col-md-12">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="col-lg-9 col-md-12">
        <x-card>
            <div class="px-4 py-1">
                {{ $content }}
            </div>
        </x-card>
    </div>
</div>
