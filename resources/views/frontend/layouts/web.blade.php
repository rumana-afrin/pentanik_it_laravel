<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    @include('frontend.layouts.style')
    @stack('style')
</head>

<body>
    <!--start header-->
    @include('frontend.layouts.header')
    <!--end header-->
    <main>

        @yield('content')
    </main>

    <!-- start footer -->
    @include('frontend.layouts.footer')
    <!-- end footer -->

    <!-- start back to top -->
    <button id="backToTopBtn" title="Go to top">↑</button>
    <!-- end back to top -->

    <!--script -->
    @include('frontend.layouts.script')
    @stack('script')
    <!--script -->

</body>

</html>
