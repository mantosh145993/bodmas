@include('admin.layouts.head')

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container mt-5">
                        <h2>Edit Banner</h2> <br>
                        <form id="bannerForm" action="{{ route('slider_banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $banner->title) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $banner->description) }}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-danger" id="imageError" style="display:none;"></small>
                                @if ($banner->image)
                                <img src="{{ asset('images/slider_banner/'.$banner->image) }}" alt="Current Banner Image" style="max-width: 200px; display: block; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $banner->link) }}" >
                            </div>
                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    <option value="1" {{ $banner->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$banner->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_index">Order</label>
                                <input type="number" class="form-control" id="order_index" name="order_index" value="{{ old('order_index', $banner->order_index) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                            <a href="{{ route('admin.banners') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>

                </div>
                <!-- end dashboard inner -->
                    <!-- footer -->
                @include('admin.layouts.footer');
                <!-- end dashboard inner -->
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
</script>