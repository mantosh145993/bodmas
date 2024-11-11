<!doctype html>
<html class="no-js" lang="zxx">

<head>

    @include('front_layouts.head')

</head>

<body>


        <header>

            @include('front_layouts.header')

        </header>

        <div id="main">

            @yield('content')

        </div>

        <footer class="row">
            @include('front_layouts.footer')

        </footer>


</body>

</html>