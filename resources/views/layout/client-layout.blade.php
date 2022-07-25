<!DOCTYPE html>
<html lang="en">
@include('client.element_client._head')
<body class="animsition">

    @include('client.element_client.header')

     @yield('main')


    @include('client.element_client.footer')
    @include('client.element_client.script')

</body>

</html>
