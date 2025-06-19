<div>
    @if (session('email') === null)
            @include('auth.login')
    @endif
</div>