<!doctype html>

<html>

<head>

    @include('front_layouts.head')

</head>

<body>

    <div class="super_container">

        <header>

            @include('front_layouts.header')

        </header>

        <div id="main">

            @yield('content')

        </div>

        <footer class="row">

            @include('front_layouts.footer')

        </footer>

    </div>

</body>

</html>
<style>
    #main{
        margin-top: 133px;
    }
</style>