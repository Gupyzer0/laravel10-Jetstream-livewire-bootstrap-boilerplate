<x-guest-layout>

    <div class="d-flex flex-column align-items-center w-100 align-self-start mt-5">
        
        <x-authentication-card-logo class="mb-3" />

        <x-card class="card-terms">
            {!! $policy !!}
        </x-card>
    </div>
    
</x-guest-layout>
