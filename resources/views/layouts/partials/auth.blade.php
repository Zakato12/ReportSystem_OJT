<div>
    @if (session('user_name') === null)
            @include('auth.login')
    @endif
</div>