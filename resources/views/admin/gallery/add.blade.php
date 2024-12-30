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
                    <h1 class="mt-2 mb-2 center">Create Bodmas New Events</h1>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="container mt-5">
                        <div class="row justify-content-center">

                            <div class="col-md-8">
                                <div class="card shadow-lg p-4">
                                    <form id="noticeForm" enctype="multipart/form-data" method="post" action="{{ route('gallery.store') }}">

                                        @csrf
                                        <!-- Gallery Name -->
                                        <div class="form-group">
                                            <label for="package_name">Event Title</label>
                                            <input type="text" class="form-control" id="package_name" name="title" required>
                                        </div>

                                         <!-- Gallery Description -->
                                         <div class="form-group">
                                            <label for="package_name">Description</label>
                                            <input type="text" class="form-control" id="package_url" name="description" required>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description">Event Location</label>
                                            <input type="text" class="form-control" id="description" name="location">
                                        </div>

                                        <!-- Gallery Image -->
                                        <div class="form-group">
                                            <label for="image">Event Memory</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group row">
                                            <!-- Submit Button -->
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary btn-block">Create Event</button>
                                            </div>

                                            <!-- Go Back Button -->
                                            <div class="col-6">
                                                <a href="{{ route('gallery.gallery_list') }}" class="btn btn-danger btn-block">Go Back</a>
                                            </div>
                                    </form>
                                </div>
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