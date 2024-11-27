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
                @include('admin.layouts.topbar')
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
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Post Category *</label>
                                                        <select class="form-select" id="" name="category_id" require>
                                                            <option selected>Select Post Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{$category->id==$post->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Meta Title</label>
                                                        <input type="text" class="form-control" name="meta_title" value="{{ old('title', $post->meta_title) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Meta Description</label>
                                                        <input type="text" class="form-control" name="meta_description" value="{{ old('title', $post->meta_description) }}" required>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="title">Meta Keywords</label>
                                                        <input type="text" class="form-control" name="meta_keywords" value="{{ old('title', $post->meta_keywords) }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title">Tags</label>
                                                        <input type="text" class="form-control" name="tags" value="{{ old('title', $post->tags) }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title" class="form-label fw-bold">Author</label>
                                                        <input type="text" name="author" id="title" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                                    </div>


                                                    <!-- About Author Column -->

                                                    <div class="form-group">
                                                        <label for="author_description" class="form-label fw-bold">About Author</label>
                                                        <textarea
                                                            name="author_description"
                                                            id="description"
                                                            class="form-control"
                                                            rows="5"
                                                            readonly
                                                            style="height: 50px;">{{ Auth::user()->description }}</textarea>
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
                                                        <label for="feature_description" class="form-label fw-bold">Fature Description</label>
                                                        <textarea
                                                            name="feature_description"
                                                            id="feature_description"
                                                            class="form-control"
                                                            rows="2"
                                                            
                                                            placeholder="Enter feature description"
                                                            style="height: 50px;">{{$post->feature_description}}</textarea>
                                                    </div>

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