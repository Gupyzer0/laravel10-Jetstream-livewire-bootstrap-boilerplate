@props(['submit'])

<div {{ $attributes->merge(['class' => 'row mb-5']) }}>
    <div class="col-lg-3 col-md-12">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="col-lg-9 col-md-12">
        <x-card>
            <form wire:submit.prevent="{{ $submit }}">
                {{ $form }}
                @if (isset($actions))
                    <div class="d-flex align-items-center justify-content-end py-1 mt-2">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </x-card>
    </div>
</div>
