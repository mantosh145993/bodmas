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
                <div class="midde_cont">
                    <div class="container mt-5">
                        <h2>Add Latest YouTube Video</h2>
                        <form action="{{ route('youtube.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Video Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">YouTube Video ID</label>
                                <input type="text" name="video_id" class="form-control" required placeholder="Enter YouTube Video ID">
                                <small class="text-muted">Example: For `https://www.youtube.com/watch?v=abc123`, enter `abc123`</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description (Optional)</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Video</button>
                        </form>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>