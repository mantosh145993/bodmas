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
                    <div class="container mt-4">
                        <button class="btn green_bg mb-2" id="addPackageBtn" data-toggle="modal" data-target="#packageModal">
                            <h6 style="color:#fff">Add New Package</h6>
                        </button>
                        <div class="card">

                            <h1 class="mt-5 ml-5 mb-5">Paid Cutoff Packages</h1>

                            <!-- Package List -->
                            <div class="package-list row container ml-1">
                                @foreach ($packages as $package)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm package-card">
                                        <div class="card-body">
                                            <img src="{{asset('images/package/'.$package->images)}}" alt="Package Image" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">
                                            <h5 class="card-title">{{ $package->product_name }}</h5>
                                            <p class="card-text">{{ $package->description }}</p>
                                            <p><strong>Sale Price:</strong> ₹{{ number_format($package->sale_price, 2) }}</p>
                                            <p><strong>Regular Price:</strong> ₹<del style="color:red">{{ number_format($package->ragular_price, 2) }}</del></p>
                                            <p><strong>PDF:</strong> 
                                                @if($package->file)
                                                    <a href="{{ asset('images/package/package_pdf/' . $package->file) }}" target="_blank">Click here to view PDF</a>
                                                @else
                                                    <span>No PDF available</span>
                                                @endif
                                            </p>
                                            <!-- Action Buttons -->
                                            <button class="btn green_bg view-btn" data-id="{{ $package->id }}" data-toggle="modal" data-target="#packageModal" style="color:#fff">View</button>
                                            <button class="btn btn-warning btn-sm update-btn" data-id="{{ $package->id }}" data-toggle="modal" data-target="#updatePackageModal">Update</button>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $package->id }}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Pagination Links -->
                            <div>
                                {{ $packages->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Model -->
                <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="packageModalLabel">Package</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="packageForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="packageId" name="id">
                                    <div class="form-group">
                                        <label for="packageName">Package Name</label>
                                        <input type="text" class="form-control" id="packageName" name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="images" id="imglable">Package Image</label>
                                        <input type="file" class="form-control-file" id="packageImage" name="images">
                                        <img id="currentImageShow" src="" alt="Current Package Image" class="mt-2" style="max-height: 400px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="file" id="pdflable">Upload PDF Cut Off</label>
                                        <input type="file" class="form-control-file" id="packagePdf" name="file">
                                        <img id="currentPdfShow" src=""  class="mt-2" style="max-height: 400px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="packagePrice">Sale Price</label>
                                        <input type="number" class="form-control" id="packagePrice" name="sale_price" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="regularPrice">Regular Price</label>
                                        <input type="number" class="form-control" id="regularPrice" name="ragular_price" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">State</label>
                                        <select class="form-control" id="categoryShow" name="category" required>
                                            <option value="">Select state</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="packageDescription">Short Description</label>
                                        <textarea class="form-control" id="packageDescription" name="description" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Update Package Modal -->
                <div class="modal fade" id="updatePackageModal" tabindex="-1" role="dialog" aria-labelledby="updatePackageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updatePackageModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for updating package -->
                                <form id="updatePackageForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="updatepackageId" data-id="{{ $package->id }}" name="packageId">

                                    <!-- Package Name -->
                                    <div class="form-group">
                                        <label for="packageName">Package Name</label>
                                        <input type="text" class="form-control" id="updatepackageName" name="product_name" value="{{$package->prodcut_name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="images">Package Image</label>
                                        <input type="file" class="form-control-file" id="updateimages" name="images">
                                        <img id="currentImage" src="" alt="Current Package Image" class="mt-2" style="max-height: 150px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="file" id="pdflable">Upload PDF Cut Off</label>
                                        <input type="file" class="form-control-file" id="updatepackagePdf" name="file">
                                        <img id="currentPdfShow" src=""  class="mt-2" style="max-height: 400px;">
                                    </div>

                                    <!-- Sale Price -->
                                    <div class="form-group">
                                        <label for="packagePrice">Sale Price</label>
                                        <input type="number" class="form-control" id="updatepackagePrice" name="sale_price" step="0.01" required>
                                    </div>

                                    <!-- Regular Price -->
                                    <div class="form-group">
                                        <label for="regularPrice">Regular Price</label>
                                        <input type="number" class="form-control" id="updateregularPrice" name="ragular_price" step="0.01">
                                    </div>

                                    <!-- Category -->
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="updatecategory" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="packageDescription">Description</label>
                                        <textarea class="form-control" id="updatepackageDescription" name="description"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="modalSubmitBtnUpdate">Update Package</button>
                                </form>
                            </div>
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

<script>
    $(document).ready(function() {
        // Show modal in "Create" mode
        $('#addPackageBtn').on('click', function() {
            $('#packageForm').trigger("reset");
            $('#packageModalLabel').text('Add New Package');
            $('#modalSubmitBtn').text('Create Package');
            $('#packageForm').attr('action', "{{ route('package.store') }}");
            $('#packageId').val('');
            $('#currentImageShow').hide();
        });

        // Show modal in "View" mode
        $('.view-btn').on('click', function() {
            const packageId = $(this).data('id');
            $('#packageForm input, #packageForm select, #packageForm textarea').prop('disabled', true);
            $('#modalSubmitBtn').hide();
            $.ajax({
                url: `{{ route('packages.show', '') }}/${packageId}`,
                type: 'GET',
                success: function(response) {
                    $('#packageModalLabel').text('View Package');
                    $('#packageName').val(response.package.product_name);
                    $('#packageDescription').val(response.package.description);
                    $('#packagePrice').val(response.package.sale_price);
                    $('#regularPrice').val(response.package.ragular_price);
                    $('#categoryShow').val(response.package.category ? response.package.category : '');
                    if (response.package.images) {
                        const imageUrl = `{{ asset('images/package/') }}/${response.package.images}`;
                        $('#currentImageShow')
                            .attr('src', imageUrl)
                            .css({
                                text_align: 'cenetr',
                                height: '300px'
                            }) // Set your desired size here
                            .show();
                        $('#packageImage').hide();
                        $('#imglable').hide();
                    } else {
                        $('#currentImageShow').hide(); // Hide image if there's no image URL
                    }
                    if (response.package.file) {
                    const pdfUrl = `{{ asset('images/package/package_pdf') }}/${response.package.file}`;
                    $('#currentPdfShow')
                        .attr('src', pdfUrl)
                        .css({
                            'text-align': 'center',  // Corrected CSS property name
                            'height': '300px'  // Set your desired height for the iframe
                        })
                        .show();  // Show the PDF iframe
                    $('#packagePdf').hide();  // Hide package PDF upload section
                    $('#pdflable').hide();  // Hide the label for the PDF file
                } else {
                    $('#currentPdfShow').hide();  // Hide the iframe if no file exists
                }

                },
                error: function() {
                    alert('Could not retrieve package details.');
                }
            });
        });

        // Show modal in "Update" mode
        $('.update-btn').on('click', function() {
            const packageId = $(this).data('id');
            $('#updatePackageForm input, #updatePackageForm select, #updatePackageForm textarea').prop('disabled', false);
            $('#modalSubmitBtnUpdate').show().text('Update Package');
            $('#updatePackageModalLabel').text('Update Package');
            $.ajax({
                url: `{{ route('package.edit', '') }}/${packageId}`,
                type: 'GET',
                success: function(response) {
                    $('#updatepackageId').val(response.package.id);
                    $('#updatepackageName').val(response.package.product_name);
                    $('#updatepackageDescription').val(response.package.description);
                    $('#updatepackagePrice').val(response.package.sale_price);
                    $('#updateregularPrice').val(response.package.ragular_price);
                    $('#updatecategory').val(response.package.category ? response.package.category : '');
                    if (response.package.images) {
                        const imageUrl = `{{ asset('images/package/') }}/${response.package.images}`;
                        $('#currentImage').attr('src', imageUrl).show();
                    } else {
                        $('#currentImage').hide(); // Hide image if there's no image URL
                    }
                     // Handling the PDF file
                    if (response.package.file) {
                        const pdfUrl = `{{ asset('images/package/') }}/${response.package.file}`;
                        $('#currentPdfShow')
                            .attr('src', pdfUrl)
                            .css({
                                'text-align': 'center',  // Corrected CSS property name
                                'height': '400px',  // Set desired height for the iframe (adjust as needed)
                                'width': '100%'  // Ensure the iframe is responsive
                            })
                            .show();  // Show the PDF iframe
                        $('#packagePdf').hide();  // Hide package PDF upload section
                        $('#pdflable').hide();  // Hide the label for the PDF file
                    } else {
                        $('#currentPdfShow').hide();  // Hide the iframe if no file exists
                    }
                },
                error: function() {
                    alert('Could not retrieve package details.');
                }
            });
        });

        // Handle form submission for updating package
        $('#updatePackageForm').on('submit', function(event) {
            event.preventDefault();
            const packageId = $('#updatepackageId').val();
            // alert(packageId);
            let formData = new FormData(this);
            $.ajax({
                url: `{{ route('package.update', '') }}/${packageId}`,
                type: 'POST', // POST method for form spoofing
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Package updated successfully!');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response for debugging
                    alert('Error saving package.');
                }
            });
        });

        // Handle form submission for Create package
        $('#packageForm').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let url = $('#packageForm').attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Package saved successfully!');
                    location.reload();
                },
                error: function() {
                    alert('Error saving package.');
                }
            });
        });

        // Handle package deletion
        $('.delete-btn').on('click', function() {
            const packageId = $(this).data('id');

            if (confirm('Are you sure you want to delete this package?')) {
                $.ajax({
                    url: `{{ route('package.destroy', '') }}/${packageId}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error deleting package.'); // Show error message
                    }
                });
            }
        });

    });
</script>

<style>
    /* General Card Styles */
    /* General Card Styles */
    .package-card {
        border-radius: 10px;
        /* Rounded corners */
        overflow: hidden;
        /* Prevents content overflow */
        background-color: #f8f9fa;
        /* Light background color */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Smooth animation for hover effect */
        height: 100%;
        /* Ensure the card takes up all available space within the column */
        display: flex;
        flex-direction: column;
        /* To make sure the content is distributed vertically */
    }

    /* Hover Effect on Card */
    .package-card:hover {
        transform: translateY(-5px);
        /* Slight lift effect */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        /* Adding shadow on hover */
    }

    /* Card Body: Flexbox to ensure uniformity */
    .package-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        /* Ensures content is evenly distributed */
    }

    /* Card Title Styling */
    .package-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        /* Dark text color for titles */
        margin-bottom: 15px;
        /* Space between title and description */
    }

    /* Card Text (Description) Styling */
    .package-card .card-text {
        color: #6c757d;
        /* Slightly lighter text color */
        font-size: 1rem;
        flex-grow: 1;
        /* Allow the description to grow and take available space */
    }

    /* Price Styling */
    .package-card .card-text strong {
        font-weight: 600;
        color: #28a745;
        /* Green color for the price */
    }

    /* Responsive Design for Small Screens */
    @media (max-width: 767px) {
        .package-list {
            margin-top: 20px;
        }

        .package-card {
            padding: 20px;
        }

        .package-card .card-title {
            font-size: 1.1rem;
            /* Smaller title on smaller screens */
        }

        .package-card .card-text {
            font-size: 0.95rem;
            /* Smaller text on smaller screens */
        }
    }

    /* Pagination Styling */
    .pagination {
        margin-top: 30px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination a:hover {
        background-color: #0056b3;
    }
</style>