@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div class="px-3 py-4">

        <div class="modal-header">

            <h4 class="d-flex flex-row align-items-center">
                <div class="rounded-circle d-flex justify-content-center align-items-center me-1 bg-danger bg-opacity-10 me-3" style="width:45px; height:45px">
                    <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" style="width:25px; height:25px" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                {{ $title }}
            </h3>

        </div>

        <div class="modal-body">
            {{ $content }}
        </div>

    </div>

    <div class="modal-footer">
        {{ $footer }}
    </div>
</x-modal>