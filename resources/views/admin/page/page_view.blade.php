@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container"><br>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <i class="fa fa-id-card" style="font-size:48px;color:red"></i>
                        <h1>{{ 'Page >>>' }}</h1>
                        <a href="{{ route('pages.pages_list') }}" class="btn btn-danger">Go Back</a>
                    </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Title as List Item -->
                        <ul>
                            <li><h4> {{ $page->title }}</h4></li>
                        </ul>

                        <!-- Content Display -->
                        <div class="page-content">
                            <div>
                                {!! $page->content !!} <!-- Render content as HTML -->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- footer -->
                @include('admin.layouts.footer')
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

</body>

</html>

<style>
    /* Set a fixed size for images within the page content */
    .page-content img {
        width: 100%;  /* Set desired width */
        height: 300px; /* Set desired height */
        object-fit: cover; /* Maintain aspect ratio, crop if necessary */
    }
</style>