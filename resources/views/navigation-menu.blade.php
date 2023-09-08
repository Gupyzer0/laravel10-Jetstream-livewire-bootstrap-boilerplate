<nav x-data="{ open: false }" class="navbar navbar-expand-lg bg-white border-bottom px-5 py-0 h-4r">
    <div class="container-fluid">
        <a class="flex-shrink-1" href="{{ route('dashboard') }}">
            <!-- Logo -->
            <div class="navbar-brand py-3" style="width:35px">
                <x-application-logo class="block w-auto" style="height: 35px;"/>
            </div>
            <!--Testing -->
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse z-3" id="navbarToggler">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-responsive-nav-link>
                
                <div class="navbar-user-responsive">
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        
                        <hr>
                        <!-- User settings -->

                        <div class="d-flex align-items-center  ms-3">

                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                
                                <button class="d-flex text-sm bg-white border-0">
                                    <img class="rounded-circle object-fit-cover" style="width: 2rem; height: 2rem"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                                
                            @endif

                            <div class="d-flex flex-column">
                                <span class="fw-semibold">{{ Auth::user()->name }}</span>
                                <span class="fw-light">{{ Auth::user()->email }}</span>
                            </div>
                            
                        </div>

                        <p class="my-3">{{ __('Manage Account') }}</p>

                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                        @endif

                        <hr>

                        <!-- Team Settings -->

                        <p>{{ __('Manage Team') }}</p>

                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                        @endcan

                        <hr>

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)

                            <p> {{ __('Switch Teams') }} </p>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                            @endforeach
                        @endif

                    @endif
                </div>

            </ul>

            <div class="d-flex" id="navbar-user">

                <ul class="navbar-nav me-auto">

                    <!-- Teams -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <li class="nav-item dropdown">
                        <button type="button"
                            class="d-inline-flex align-items-center px-3 py-2 dropdown-toggle border-0 rounded bg-white hover-light-gray"
                            id="dropdown_manage_teams" data-bs-toggle="dropdown">
                            {{ Auth::user()->currentTeam->name }}
                        </button>

                        <x-dropdown class="dropdown-menu-lg-end" aria-labelledby="dropdown_manage_teams">

                            <x-slot name="content">

                                <!-- Team Management -->
                                <div class="d-block py-2 px-3 fs-7 text-black-50">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-dropdown-link>
                                @endcan

                                <hr>

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)

                                <div class="d-block px-3 mb-3 fs-7 text-black-50">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" />
                                @endforeach
                                @endif

                            </x-slot>

                        </x-dropdown>
                    </li>
                    <!-- /Teams -->
                    @endif

                    <!-- Account Management -->
                    <li class="nav-item dropdown">

                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="d-flex text-sm bg-white border-0 ms-3" id="dropdown_manage_account"
                                data-bs-toggle="dropdown">
                                <img class="rounded-circle object-fit-cover" style="width: 2rem; height: 2rem"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                        <button class="btn dropdown-toggle" type="button" id="dropdown_manage_account"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        @endif

                        <x-dropdown class="dropdown-menu-lg-end" aria-labelledby="dropdown_manage_account">

                            <x-slot name="content">

                                <div class="d-block py-2 px-3 fs-7 text-black-50">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                                @endif

                                <hr class="my-1">

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>

                        </x-dropdown>
                    </li>
                    <!-- /Account Management -->

                </ul>
            </div>

        </div>

    </div>

</nav>