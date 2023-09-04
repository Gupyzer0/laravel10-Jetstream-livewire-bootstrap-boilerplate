@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));
@endphp

    <div
        x-data="{ show: @entangle($attributes->wire('model')).defer }"
        x-on:close.stop="show = false"
        x-on:keydown.escape.window="show = false"
        x-show="show"
        id="{{ $id }}"
        class=""
        style="display: none;"
    >
    
    <div x-show="show" class="modal-backdrop d-flex justify-content-center" x-transition.opacity.duration.500ms >

        <div class="modal">
            <div class="modal-dialog" x-on:click.away="show = false">
                <div class="modal-content">
                    {{ $slot }}
                </div>
            </div>
        </div>
            
    </div>
</div>
