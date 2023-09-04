@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'alert alert-danger', 'role' => 'alert']) !!}>
        {{ __('Whoops! Something went wrong.') }}
        <hr>
        <ul class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif