@include('admin.layouts.head');

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar');

                <div class="midde_cont">
                    <div class="container">
                        <h1>Category List</h1> <br>

                        <a href="{{ route('create_category.create') }}" class="btn btn-primary mb-3">Add Category</a>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="container mt-5">
                            <h1>All Category List</h1>

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $index = ($data->currentPage() - 1) * $data->perPage();
                                        @endphp
                                        @foreach($data as $category)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <button class="toggle-status" data-id="{{ $category->id }}" data-active="{{ $category->is_active }}">
                                                   {{ $category->is_active ? 'Published' : 'Not Published' }}
                                                </button>
                                          </td>
                                          <td>
                                             <input type="checkbox" class="toggle-active" data-id="{{ $category->id }}" {{ $category->is_active ? 'checked' : '' }}>
                                          </td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $category->id }}">
                                                    <i class="fa fa-eye" style="color:#fff;"></i>
                                                </button>
                                                <a href="{{ route('edit_category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('destroy_category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="viewModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $category->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $category->id }}">{{ $category->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('images/category/'.$category->image) }}" class="img-fluid" alt="Banner Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $data->links() }} 
                            </div>

                        </div>

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
       $('.toggle-active').change(function() {
        var postId = $(this).data('id');
        var isActive = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'category/' + postId + '/update-status', // Adjust the URL to your route
            method: 'POST',
            data: {
                is_active: isActive,
                _token: '{{ csrf_token() }}' // Include CSRF token
            },
            success: function(response) {
                var statusText = isActive ? 'Published' : 'Not Published';
                $('.toggle-status[data-id="' + postId + '"]').text(statusText).data('active', isActive);
                alert('Status updated successfully!');
            },
            error: function(xhr) {
                // Handle error (optional)
                alert('Error updating status. Please try again.');
            }
        });
    });
</script>
<style>
   .toggle-status {
    padding: 5px 5px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    /* transition: background-color 0.3s; */
}

.toggle-status.published {
    background-color: #28a745; /* Green for Published */
}

.toggle-status.not-published {
    background-color: #dc3545; /* Red for Not Published */
}

.toggle-status:hover {
    opacity: 0.8; 
}
</style>