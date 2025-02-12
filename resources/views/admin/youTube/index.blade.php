@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- End Sidebar -->
            <div id="content">
                <!-- Topbar -->
                @include('admin.layouts.topbar')
                <!-- Add Package Button -->
                <div class="midde_cont">
                    <div class="container mt-5">
                        <h2>YouTube Videos</h2>
                        <!-- Display Success or Error Message -->
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <!-- Link to Add New Video -->
                        <a href="{{ route('youtube.add') }}" class="btn btn-primary mb-3">Add New Video</a>
                        <div class="row">
                            @foreach($videos as $video)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $video->title }}</h5>
                                        <iframe width="100%" height="200"
                                            src="https://www.youtube.com/embed/{{ $video->video_id }}"
                                            frameborder="0" allowfullscreen>
                                        </iframe>
                                        <p class="card-text">{{ $video->description }}</p>

                                        <!-- Edit and Delete Buttons -->
                                        <div class="d-flex justify-content-between">
                                            <!-- Edit Button -->
                                            <a href="{{ route('youtube.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('youtube.destroy', $video->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
</body>

</html>