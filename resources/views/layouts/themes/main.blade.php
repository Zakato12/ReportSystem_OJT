<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>@yield('title','Ticketing System')</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')
     @yield('content')
    @include('layouts.partials.footer')
    @include('layouts.partials.script')
</body>
</html>