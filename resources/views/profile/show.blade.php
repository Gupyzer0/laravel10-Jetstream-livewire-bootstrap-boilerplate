<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Profile') }}
        </h3>
    </x-slot>

    <div>
        <div class="py-10">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <hr>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10">
                    @livewire('profile.update-password-form')
                </div>

                <hr>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <hr>
            @endif

            <div class="mt-10">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr>

                <div class="mt-10">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
