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
                        <a href="{{ route('college.add') }}" class="btn btn-primary mb-3">Add College</a>
                        <div class="card">
                            <h1 class="mt-5 ml-5 mb-5">All Colleges</h1>
                            
                            <!-- Search Input -->
                            <div class="mb-3">
                                <input type="text" id="customSearch" class="form-control" placeholder="Search Colleges">
                            </div>
                            
                            <!-- College Table -->
                            <table id="collegeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colleges as $college)
                                    <tr>
                                        <td><img src="{{ asset('college/'.$college->image) }}" alt="{{ $college->title }}" style="width: 100px;"></td>
                                        <td>{{ $college->name }}</td>
                                        <td>{{ $college->type }}</td>
                                        <td>{{ $college->address }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">
                                                <a href="{{ route('college.edit', $college->id) }}" style="color: #fff;">Edit</a>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $college->id }}">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    
    $(document).ready(function() {
        // Show modal in "Create" mode
        $('#addPackageBtn').on('click', function() {
            $('#noticeForm').trigger("reset");
            $('#packageModalLabel').text('Add New College');
            $('#modalSubmitBtn').text('Create College');
            $('#noticeForm').attr('action', "{{ route('college.store') }}");
            $('#packageId').val('');
            $('#documentShow').hide();
        });

        // Handle form submission for Create package
        $('#noticeForm').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let url = $('#noticeForm').attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('College saved successfully!');
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

            if (confirm('Are you sure you want to delete this College?')) {
                $.ajax({
                    url: `{{ route('college.destroy', '') }}/${packageId}`,
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

         // Initialize DataTable
         const table = $('#collegeTable').DataTable({
            pageLength: 10, // Number of rows per page
            order: [[1, 'asc']], // Initial ordering by "Name" column
            columnDefs: [
                { orderable: false, targets: [0, 4] } // Disable ordering for "Image" and "Actions"
            ]
        });

        // Link custom search input to DataTable's search function
        $('#customSearch').on('keyup', function () {
            table.search(this.value).draw();
        });

    });
</script>

<style>
    
    .package-card {
        border-radius: 10px;
        overflow: hidden;
        background-color: #f8f9fa;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .package-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .package-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .package-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .package-card .card-text {
        color: #6c757d;
        font-size: 1rem;
        flex-grow: 1;
    }

    .package-card .card-text strong {
        font-weight: 600;
        color: #28a745;
    }

    @media (max-width: 767px) {
        .package-list {
            margin-top: 20px;
        }

        .package-card {
            padding: 20px;
        }

        .package-card .card-title {
            font-size: 1.1rem;
        }

        .package-card .card-text {
            font-size: 0.95rem;
        }
    }

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