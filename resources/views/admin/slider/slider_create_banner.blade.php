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
                        <h2>Add New Banner</h2> <br>
                        <form id="bannerForm" action="{{ route('slider_banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <small class="text-danger" id="imageError" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" id="link" name="link" required>
                            </div>
                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_index">Order</label>
                                <input type="number" class="form-control" id="order_index" name="order_index" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Banner</button>
                            <a href="{{ route('admin.banners') }}" class="btn btn-secondary">Cancel</a>
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
    document.getElementById('bannerForm').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image');
        const imageError = document.getElementById('imageError');
        imageError.style.display = 'none'; // Reset the error message

        const file = imageInput.files[0];
        const maxSize = 2 * 1024 * 1024; // 2 MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (file) {
            // Check file size
            if (file.size > maxSize) {
                e.preventDefault(); // Prevent form submission
                imageError.textContent = 'File size must be less than 2 MB.';
                imageError.style.display = 'block';
                return;
            }

            // Check file type
            if (!allowedTypes.includes(file.type)) {
                e.preventDefault(); // Prevent form submission
                imageError.textContent = 'Invalid file type. Only JPEG, PNG, and GIF are allowed.';
                imageError.style.display = 'block';
                return;
            }
        }
    });

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
                    window.location.href = "{{ route('admin.banners') }}";
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


    document.getElementById('bannerForm').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image');
        const imageError = document.getElementById('imageError');
        imageError.style.display = 'none'; // Reset the error message

        const file = imageInput.files[0];
        const maxSize = 2 * 1024 * 1024; // 2 MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (file) {
            // Check file size
            if (file.size > maxSize) {
                e.preventDefault(); // Prevent form submission
                imageError.textContent = 'File size must be less than 2 MB.';
                imageError.style.display = 'block';
                return;
            }

            // Check file type
            if (!allowedTypes.includes(file.type)) {
                e.preventDefault(); // Prevent form submission
                imageError.textContent = 'Invalid file type. Only JPEG, PNG, and GIF are allowed.';
                imageError.style.display = 'block';
                return;
            }
        }
    });
</script>