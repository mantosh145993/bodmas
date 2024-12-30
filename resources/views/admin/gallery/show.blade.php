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
                    <h1 class="mt-2 mb-2 mt-5 center">View Bodmas Gallery</h1> 
                    <div class="package-details mt-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ $events->title }}</h3>
                            </div>
                            <div class="col-sm-6 text-right mb-4">
                            <a href="{{ route('gallery.gallery_list') }}" class="btn btn-danger">Go Back</a>
                            </div>
                        </div>

                        @if($events->image_url)
                        <img src="{{ asset('images/events/' . $events->image_url) }}" alt="{{ $events->title }}">
                        @endif

                        <dl>
                            <dt>Title:</dt>
                            <dd>{{ $events->title}}</dd>

                            <dt>Description:</dt>
                            <dd>{{ $events->description ?? 'No description provided.' }}</dd>

                            <dt>Location:</dt>
                            <dd>{{ $events->location}}</dd>

                            <dt>Created At:</dt>
                            <dd>{{ $events->created_at ? $events->created_at : 'Not available' }}</dd>
                        </dl>
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
     .package-details {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        .package-details h1 {
            margin-top: 0;
        }
        .package-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .package-details dl {
            margin: 0;
        }
        .package-details dt {
            font-weight: bold;
        }
        .package-details dd {
            margin: 0 0 10px 0;
        }
</style>