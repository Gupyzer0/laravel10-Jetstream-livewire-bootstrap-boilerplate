<x-guest-layout>

    <div class="d-flex flex-column align-items-center w-100 align-self-start mt-5">

        <a class="navbar-brand" href="#"><x-authentication-card-logo/></a>

        <div class="d-flex flex-row mt-3">

            @auth
                <a class="btn btn-light fs-3 ms-2" href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a class="btn btn-light fs-3 ms-2" href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a class="btn btn-light fs-3 ms-2" href="{{ route('register') }}">Register</a>
                @endif
            @endauth

        </div>
        
    </div>

</x-guest-layout>
