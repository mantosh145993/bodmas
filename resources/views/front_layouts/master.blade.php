@include('front_layouts.head')
@include('admin.popup.home')
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

<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">

<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>