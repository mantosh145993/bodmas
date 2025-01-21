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
                        <a href="{{ route('form.add') }}" class="btn btn-primary mb-3">Add Offer</a>
                        <div class="card">
                            <h3 class="mt-5 ml-5 mb-5">Seasonal Offers</h3>
                            @if (session('link_success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('link_success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- College Table -->
                            <table id="collegeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>State</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $link->type }}</td>
                                        <!-- Match state_id with state name -->
                                        <td>
                                            {{ $states->firstWhere('id', $link->state_id)?->name ?? 'Unknown' }}
                                        </td>
                                        <td>{{ $link->name }}</td>
                                        <td>{{ $link->link }}</td>
                                         <!-- Status with color coding -->
                                        <td>
                                            <span style="color: {{ $link->status === 'active' ? 'green' : 'red' }};">
                                                {{ ucfirst($link->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">
                                                <a href="{{ route('form.edit', $link->id) }}" style="color: #fff;">Edit</a>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $link->id }}">Delete</button>
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
<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle package deletion
        $('.delete-btn').on('click', function() {
            const packageId = $(this).data('id');

            if (confirm('Are you sure you want to delete this Link?')) {
                $.ajax({
                    url: `{{ route('form.destroy', '') }}/${packageId}`,
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