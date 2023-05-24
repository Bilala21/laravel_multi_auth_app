@include('comman.head')
@include('user.layout.nav-bar')
<main>
    @yield('content')
</main>
@yield('custom-script')
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
