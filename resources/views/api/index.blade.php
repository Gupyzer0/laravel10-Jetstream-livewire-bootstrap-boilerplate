<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('API Tokens') }}
        </h3>
    </x-slot>

    <div>
        <div class="w-100">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>
