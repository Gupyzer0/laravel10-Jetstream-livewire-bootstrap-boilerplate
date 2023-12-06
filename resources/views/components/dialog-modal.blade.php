@props(['id' => null])

<x-modal :id="$id" {{ $attributes }}>
    <div class="px-3 py-4">
        <div class="modal-header">
            <h4>{{ $title }}</h4>
        </div>

        <div class="modal-body">
            {{ $content }}
        </div>
    </div>

    <div class="modal-footer">
        {{ $footer }}
    </div>
</x-modal>
