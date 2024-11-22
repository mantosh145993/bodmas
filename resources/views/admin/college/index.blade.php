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
                         
                            <!-- Package List -->
                            <div class="package-list row container ml-1">
                                @foreach ($colleges as $college)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm notice-card">
                                        <div class="card-body">
                                        <td>
                                        <img src="{{ asset('college/'.$college->image) }}" alt="{{ $college->title }}" style="width: 100px;">
                                         </td>
                                            <p class="card-text"><strong>{{ $college->name }}</strong></p>
                                            <p>{{ "Type : ".  $college->type }}</p>
                                            <p>{{"Address : ". $college->address }}</p>
                                            <!-- Action Buttons -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $college->id }}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Pagination Links -->
                            <div>
                                {{ $colleges->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Model -->
                <!-- <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="noticeModalLabel">Notice</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="noticeForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category">Select State</label>
                                        <select class="form-control" id="noticeType" name="state_id" required>
                                            @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Quota Type</label>
                                        <select class="form-control" id="noticeType" name="type" required>
                                            <option value="Government">Government</option>
                                            <option value="Private">Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Course Type</label>
                                        <select class="form-control" id="noticeType" name="course_id" required>
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="noticeName">College Name</label>
                                        <input type="text" class="form-control" id="noticeName" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="noticeDescription">Address</label>
                                        <input type="text" class="form-control" id="noticeDescription" name="address" >
                                    </div>
                                    <div class="form-group">
                                        <label for="images" id="imglable">College image</label>
                                        <input type="file" class="form-control-file" id="noticeFile" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
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