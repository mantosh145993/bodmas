@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container">
                        <h1>Edit Category</h1> <br>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form id="categoryForm" method="POST" enctype="multipart/form-data" action="{{ route('update_category.update', $category->id) }}">
                            @csrf
                            @method('PUT') <!-- Indicate that this is a PUT request -->

                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/" >
                                <small class="text-danger" id="imageError" style="display:none;"></small>
                                @if($category->image)
                                <div>
                                    <strong>Current Image:</strong>
                                    <img src="{{ asset('images/category/' . $category->image) }}" alt="Current Category Image" style="max-width: 150px; margin-top: 10px;">
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">Select Parent Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label"> Category Type</label>
                                <select class="form-select" id="" name="type" require>
                                    <option value="">Select Type Category</option>
                                    <option value="1">Predictor</option>
                                    <option value="2">Cut-off</option>
                                    <option value="3">Mock Test</option>
                                    <option value="3">Blog Post</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('list_category.list') }}" class="btn btn-danger">Cancel</a>
                        </form>

                    </div>
                </div>
                <!-- footer -->
                @include('admin.layouts.footer')
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
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
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('update_category.update', $category->id) }}", // Adjust the URL to match your update route
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message); // Show success message
                        window.location.href = "{{ route('list_category.list') }}"; // Redirect to the list page
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessage += errors[key].join(', ') + '\n';
                        }
                    }
                    alert('Error:\n' + errorMessage);
                }
            });
        });
    });
</script>