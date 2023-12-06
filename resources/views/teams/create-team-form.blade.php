<x-form-section class="mt-3" submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="d-flex align-items-center mt-2 mb-2">
                
                <img class="rounded-circle" style="width:3rem; height:3rem;" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                <div class="ms-3 leading-tight">
                    <div>{{ $this->user->name }}</div>
                    <div>{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autofocus />
            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button class="btn-primary">
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>
