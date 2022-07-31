<!DOCTYPE html>
<html lang="en">
@include('client.element_client._head')
<body class="animsition">
<header>
    @yield('header')
</header>
     @yield('main')


    @include('client.element_client.footer')
    @include('client.element_client.script')



</body>

</html>
