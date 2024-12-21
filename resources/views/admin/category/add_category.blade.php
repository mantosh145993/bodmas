@include('admin.layouts.head');

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container">
                        <h1>Add New Category</h1> <br>

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

                        <form id="categoryForm" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-danger" id="imageError" style="display:none;"></small>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">Select Parent Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="state_id" class="form-label">Select State for predictor</label>
                                <select class="form-select" id="" name="state_id">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label"> Category Type *</label>
                                <select class="form-select" id="" name="type" require>
                                    <option value="">Select Type Category</option>
                                    <option value="1">Predictor</option>
                                    <option value="2">Cut-Off</option>
                                    <option value="3">Mock Test</option>
                                    <option value="4">Blog Post</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('list_category.list') }}" class="btn btn-danger">Cancel</a>
                        </form>


                    </div>
                </div>
                <!-- footer -->
                @include('admin.layouts.footer');
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

</body>

</html>

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
            e.preventDefault();

            var formData = new FormData(this);

            // Send the AJAX request
            $.ajax({
                url: "{{ route('store_category.store') }}", // Route for your store method
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('Category created successfully!');
                        window.location.href = "{{ route('list_category.list') }}"; // Redirect after success
                    } else if (response.success === false) {
                        alert(response.message); // Display server-side error message
                    }
                },
                error: function(xhr) {
                    console.log("Error response:", xhr); // Log for debugging

                    let errorMessage = '';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        // Check if 'errors' is a string (single message)
                        if (typeof xhr.responseJSON.errors === 'string') {
                            errorMessage = xhr.responseJSON.errors; // Single error message
                        } else {
                            // Handle Laravel validation error format
                            var errors = xhr.responseJSON.errors;
                            errorMessage = Object.values(errors)
                                .flat()
                                .join('\n');
                        }
                    } else {
                        errorMessage = xhr.statusText || 'An unexpected error occurred.';
                    }

                    alert('Error:\n' + errorMessage);
                }

            });
        });
    });
</script>

<style>
    .mb-3 {
        margin-bottom: 1rem;
        /* Adjust spacing as needed */
    }

    .form-label {
        font-weight: bold;
        /* Makes the label stand out */
        color: #333;
        /* Darker text for better readability */
    }

    .form-select {
        width: 100%;
        /* Full width for better usability */
        padding: 0.5rem;
        /* Adds padding for a more comfortable click area */
        border: 1px solid #ccc;
        /* Light border */
        border-radius: 0.25rem;
        /* Slightly rounded corners */
        transition: border-color 0.2s;
        /* Smooth border transition */
    }

    .form-select:focus {
        border-color: #007bff;
        /* Change border color on focus */
        outline: none;
        /* Removes default outline */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        /* Adds a soft shadow */
    }

    .option {
        color: #555;
        /* Slightly lighter color for options */
    }
</style>