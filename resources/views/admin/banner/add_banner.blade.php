@include('admin.layouts.head');

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar');

                <div class="midde_cont">
                    <div class="container mt-5">
                        <h1>Add Banners</h1>
                        <form id="bannerForm" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" name="link" id="link" class="form-control" placeholder="https://example.com">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Is Active</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="order_index">Order Index</label>
                                <input type="number" name="order_index" id="order_index" class="form-control" value="0">
                            </div>

                            <div class="form-group">
                            <label for="menuParentId">Select Pages (optional)</label>
                            <select name="page_id" class="form-control">
                                <option value="">-- No Pages --</option>
                                @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>

                            <button type="submit" class="btn btn-primary">Add Banner</button>
                            
                        <a href="{{ route('banner.page') }}" class="btn btn-danger my-4">Cancel</a>
                        </form>


                    </div>
                </div>
                <!-- end dashboard inner -->
                @include('admin.layouts.footer');

            </div>
        </div>
    </div>

</body>

</html>
<script>
      $(document).ready(function() {
        $('#bannerForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Banner added successfully!');
                    window.location.href = "{{ route('banner.page') }}";
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    if (errors) {
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                    } else {
                        errorMessage = 'An error occurred. Please try again.';
                    }
                    alert(errorMessage);
                }
            });
        });
    });

</script>