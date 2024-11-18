@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar');
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Edit Blog</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <!-- table section -->
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Edit Blog</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <form id="blog-form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST') <!-- Use POST method for updates -->
                                                    <input type="hidden" name="id" value="{{ $post->id }}"> <!-- Add hidden input for the post ID -->
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Author</label>
                                                        <input type="text" name="author" id="title" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="feature_image">Feature Image</label>
                                                        <input type="file" name="feature_image" id="feature_image" class="form-control" accept="image/*">
                                                    </div>
                                                    <!-- Display the existing feature image if it exists -->
                                                    @if($post->feature_image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('images/feature/' . $post->feature_image) }}" alt="Current Feature Image" style="max-width: 200px; max-height: 150px; border: 1px solid #ddd; border-radius: 4px;">
                                                    </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <textarea name="content" id="editor">{{ old('content', $post->content) }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <a href="{{ route('admin.blog') }}" class="btn btn-danger ml-2 btn-sm">Cancel</a>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer -->
                    @include('admin.layouts.footer');
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
        <!-- model popup -->
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end model popup -->
    </div>

    <style>
        .ck-editor__editable_inline {
            height: 450px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#blog-form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.update-blog', $post->id) }}", // Change to the update route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Post updated successfully.');
                        window.location.href = "{{ route('admin.blog') }}"; // Redirect after success
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value[0] + '\n';
                        });
                        alert('Error:\n' + errorMessages);
                    }
                });
            });
        });
    </script>
</body>

</html>