<div>
    <!-- Generate API Token -->
    <x-form-section submit="createApiToken">
        <x-slot name="title">
            {{ __('Create API Token') }}
        </x-slot>

        <x-slot name="description">
            {{ __('API tokens allow third-party services to authenticate with our application on your behalf.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Token Name -->
            <div>
                <x-label for="name" value="{{ __('Token Name') }}" />
                <x-input id="name" type="text" wire:model.defer="createApiTokenForm.name" autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>

            <!-- Token Permissions -->
            @if (Laravel\Jetstream\Jetstream::hasPermissions())
                <div class="col-span-6">
                    <x-label for="permissions" value="{{ __('Permissions') }}" />

                    <div class="mt-2 row">

                        @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)

                            <div class="col-6 mt-3">
                                <label class="flex items-center">
                                    <x-checkbox wire:model.defer="createApiTokenForm.permissions" :value="$permission"/>
                                    <span class="ml-2">{{ $permission }}</span>
                                </label>
                            </div>
                            
                        @endforeach

                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="me-3" on="created">
                {{ __('Created.') }}
            </x-action-message>

            <x-button class="btn-primary">
                {{ __('Create') }}
            </x-button>
        </x-slot>
    </x-form-section>

    

    @if ($this->user->tokens->isNotEmpty())
        <hr>

        <!-- Manage API Tokens -->
        <div class="mt-10">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Manage API Tokens') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('You may delete any of your existing tokens if they are no longer needed.') }}
                </x-slot>

                <!-- API Token List -->
                <x-slot name="content">
                    <div class="">
                        @foreach ($this->user->tokens->sortBy('name') as $token)
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                
                                <div class="fw-semibold fs-5">
                                    {{ $token->name }}
                                </div>

                                <div class="d-flex align-items-center ml-2">
                                    @if ($token->last_used_at)
                                        <div class="text-sm">
                                            {{ __('Last used') }} {{ $token->last_used_at->diffForHumans() }}
                                        </div>
                                    @endif

                                    @if (Laravel\Jetstream\Jetstream::hasPermissions())
                                        <button class="btn btn-light me-2" wire:click="manageApiTokenPermissions({{ $token->id }})">
                                            {{ __('Permissions') }}
                                        </button>
                                    @endif

                                    <button class="btn btn-danger" wire:click="confirmApiTokenDeletion({{ $token->id }})">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    <!-- Token Value Modal -->
    <x-dialog-modal wire:model="displayingToken">
        <x-slot name="title">
            {{ __('API Token') }}
        </x-slot>

        <x-slot name="content">
            <div>
                {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
            </div>

            <x-input x-ref="plaintextToken" type="text" readonly :value="$plainTextToken"
                class="mt-4 py-2 text-sm w-100"
                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            />
        </x-slot>

        <x-slot name="footer">
            <x-button class="btn-light" wire:click="$set('displayingToken', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- API Token Permissions Modal -->
    <x-dialog-modal wire:model="managingApiTokenPermissions" id="modal-api-token-permissions">
        
        <x-slot name="title">
            {{ __('API Token Permissions') }}
        </x-slot>

        <x-slot name="content">

            <div class="row">
            
            @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
                
                <div class="col-6 mt-3">
            
                    <label class="flex items-center">
                        <x-checkbox wire:model.defer="updateApiTokenForm.permissions" :value="$permission"/>
                        <span class="">{{ $permission }}</span>
                    </label>

                </div>
            @endforeach

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button class="btn-light" wire:click="$set('managingApiTokenPermissions', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>

            <x-button class="btn-primary" wire:click="updateApiToken" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Delete Token Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingApiTokenDeletion">
        <x-slot name="title">
            {{ __('Delete API Token') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this API token?') }}
        </x-slot>

        <x-slot name="footer">
            <x-button class="btn-light" wire:click="$toggle('confirmingApiTokenDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>

            <x-button class="btn-danger ms-1" wire:click="deleteApiToken" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-button>
        </x-slot>
    </x-confirmation-modal>
</div>
