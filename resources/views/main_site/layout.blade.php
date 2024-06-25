<!DOCTYPE html>
<html lang="en">

@include('main_site.partials.head')

<body class="animsition">

    @include('main_site.partials.header')

    @include('main_site.partials.cart')

    @yield('content')

    @include('main_site.partials.footer')

    @include('main_site.partials.back_to_top')

    @stack('modals')

    @include('main_site.partials.scripts')

    @stack('scripts')
</body>

</html>
