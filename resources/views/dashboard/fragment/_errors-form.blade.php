{{-- FRAGMENT THAT SHOWS ERRORS OF VALIDATION --}}
@if ($errors->any)
        @foreach ($errors->all() as $error)
            <div class="error">
                {{ $error }}
            </div>
        @endforeach
@endif