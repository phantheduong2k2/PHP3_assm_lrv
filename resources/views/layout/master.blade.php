<!DOCTYPE html>
<html lang="en">

@include('admin.element._head')

<body>
    <!-- [ Pre-loader ] start -->

    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('admin.element._navbar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('admin.element._navbar-header')
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->

    @include('admin.element._main')

    <!-- Required Js -->
    @include('admin.element._script')
</body>

</html>
