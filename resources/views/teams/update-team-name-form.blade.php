<x-form-section class="mt-3" submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="d-flex align-items-center mt-2">
                
                <img class="rounded-circle" style="width:3rem; height:3rem;" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">

                <div class="ms-3 leading-tight">
                    <div>{{ $team->owner->name }}</div>
                    <div>{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />

            <x-input id="name"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model="state.name"
                        :disabled="! Gate::check('update', $team)" />

            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-action-message class="ms-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button class="btn-primary">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    @endif
</x-form-section>
