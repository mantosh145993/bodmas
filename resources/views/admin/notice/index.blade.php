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
                        <button class="btn green_bg mb-2" id="addPackageBtn" data-toggle="modal" data-target="#noticeModal"><h6 style="color:#fff">Add Notice</h6></button>
                        <div class="card">
                               
                            <h1 class="mt-5 ml-5 mb-5">All Notices</h1>
                         
                            <!-- Package List -->
                            <div class="package-list row container ml-1">
                                @foreach ($notices as $notice)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm notice-card">
                                        <div class="card-body">
                                            <p class="card-text"><strong>{{ $notice->description }}</strong></p>
                                            <p>{{ "Type : ".  $notice->type }}</p>
                                            <p>{{"Title : ". $notice->title }}</p>
                                            <!-- Action Buttons -->
                                            <button class="btn green_bg view-btn" data-id="{{ $notice->id }}" data-toggle="modal" data-target="#noticeModal" style="color:#fff">View</button>
                                            <button class="btn btn-warning btn-sm update-btn" data-id="{{ $notice->id }}" data-toggle="modal" data-target="#updatenoticeModal">Update</button>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $notice->id }}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Pagination Links -->
                            <div>
                                {{ $notices->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Model -->
                <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true">
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
                                        <label for="category">Type</label>
                                        <select class="form-control" id="noticeType" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="UG">UG</option>
                                            <option value="PG">PG</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="noticeName">Title Name</label>
                                        <input type="text" class="form-control" id="noticeName" name="title" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="noticeDescription">Description</label>
                                        <input type="text" class="form-control" id="noticeDescription" name="description" >
                                    </div>

                                    <div class="form-group">
                                        <label for="images" id="imglable">Document</label>
                                        <input type="file" class="form-control-file" id="noticeFile" name="file">
                                        <a id="documentShow" href="{{ asset('notice/' . $notice->file) }}" class="mt-2" target="_blank">
                                            {{ $notice->file ? 'View Document' : 'No Document Available' }}
                                        </a>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Update Package Modal -->
                <div class="modal fade" id="updatenoticeModal" tabindex="-1" role="dialog" aria-labelledby="updateNoticeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateNoticeModalLabel">Update Notice</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for updating package -->
                                <form id="updateNoticeForm" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" id="updatenoticeId" data-id="{{ $notice->id }}" name="noticeId">
                                    <div class="form-group">
                                    <label for="category">Type</label>
                                    <select class="form-control" id="noticeUpdateType" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="UG">UG</option>
                                        <option value="PG">PG</option>
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <label for="noticeName">Title Name</label>
                                        <input type="text" class="form-control" id="noticeUpdateName" name="title" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="packagePrice">Description</label>
                                        <input type="text" class="form-control" id="noticeUpdateDescription" name="description" >
                                    </div>

                                    <div class="form-group">
                                        <label for="images" id="imglable">Document</label>
                                        <input type="file" class="form-control-file" id="noticeUpdateFile" name="file">
                                        <a id="documentShow" href="{{ asset('notice/' . $notice->file) }}" class="mt-2" target="_blank">
                                            {{ $notice->file ? 'View Document' : 'No Document Available' }}
                                        </a>

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
            $('#noticeForm').trigger("reset");
            $('#packageModalLabel').text('Add New Notice');
            $('#modalSubmitBtn').text('Create Notice');
            $('#noticeForm').attr('action', "{{ route('notice.store') }}");
            $('#packageId').val('');
            $('#documentShow').hide();
        });

        // Show modal in "View" mode
        $('.view-btn').on('click', function() {
            const noticeId = $(this).data('id');
            $('#noticeForm input, #noticeForm select').prop('disabled', true);
            $('#modalSubmitBtn').hide();

            $.ajax({
                url: `{{ route('notice.show', '') }}/${noticeId}`,
                type: 'GET',
                success: function(response) {
                    $('#noticeModalLabel').text('View Notice');
                    $('#noticeName').val(response.notice.title);
                    $('#noticeDescription').val(response.notice.description);
                    $('#noticeType').val(response.notice.type ? response.notice.type : '');
                    $('#documentShow').val(response.notice.file);
                    $('#noticeFile').hide();
                    const fileUrl = response.notice.file ? `{{ asset('notice') }}/${response.notice.file}` : '';
                    if (fileUrl) {
                        $('#documentShow').attr('href', fileUrl); 
                        $('#documentShow').text('View Document'); 
                    } else {
                        $('#documentShow').attr('href', ''); 
                        $('#documentShow').text('');         
                    }
                },
                error: function() {
                    alert('Could not retrieve Notice details.');
                }
            });
        });

        // Show modal in "Update" mode
        $('.update-btn').on('click', function() {
            const noticeId = $(this).data('id');
            $('#updateNoticeForm input, #updateNoticeForm select').prop('disabled', false);
            $('#modalSubmitBtnUpdate').show().text('Update Notice');
            $('#updateNoticeModalLabel').text('Update Notice');
            $.ajax({
                url: `{{ route('notice.edit', '') }}/${noticeId}`,
                type: 'GET',
                success: function(response) {
                    $('#updateNoticeModalLabel').text('Update Notice');
                    $('#updatenoticeId').val(response.notice.id);
                    $('#noticeUpdateName').val(response.notice.title);
                    $('#noticeUpdateDescription').val(response.notice.description);
                    $('#noticeUpdateType').val(response.notice.type ? response.notice.type : '');
                    $('#documentShow').val(response.notice.file);
                    const fileUrl = response.notice.file ? `{{ asset('notice') }}/${response.notice.file}` : '';
                    if (fileUrl) {
                        $('#documentShow').attr('href', fileUrl); 
                        $('#documentShow').text('View Document'); 
                    } else {
                        $('#documentShow').attr('href', ''); 
                        $('#documentShow').text('');         
                    }
                },
                error: function() {
                    alert('Could not retrieve package details.');
                }
            });
        });

        // Handle form submission for updating package
        $('#updateNoticeForm').on('submit', function(event) {
            event.preventDefault();
            const noticeId = $('#updatenoticeId').val();
            // alert(noticeId);
            let formData = new FormData(this);
            $.ajax({
                url: `{{ route('notice.update', '') }}/${noticeId}`,
                type: 'POST', // POST method for form spoofing
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Notice updated successfully!');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response for debugging
                    alert('Error saving package.');
                }
            });
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
                    alert('Notice saved successfully!');
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
                    url: `{{ route('notice.destroy', '') }}/${packageId}`,
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