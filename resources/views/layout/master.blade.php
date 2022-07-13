<!DOCTYPE html>
<html lang="en">

@include('admin.element._head')

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
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
