<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>@yield('title','Dashboard')</title>
</head>
<body>
    @include('layouts.partials.auth')
    <div>
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        @yield('content')
    </div>
    @include('layouts.partials.footer')
    @include('layouts.partials.script')
    @include('layouts.partials.modals')
</body>
</html>