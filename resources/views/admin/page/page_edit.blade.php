@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container"> <br>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                            <i class="fa fa-id-card" style="font-size:48px;color:red"></i>
                            <h1>{{ 'Edit Page >>>' }}</h1>
                            <a href="{{ route('pages.pages_list') }}" class="btn btn-danger">Go Back</a>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form id="page-form" action="{{ route('pages.update', $page->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Add this line for PUT request -->

                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->title) }}" required>
                            </div>

                            <!-- Content Editor -->
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="editor">{{ old('content', $page->content) }}</textarea>
                            </div>

                            <!-- Published Checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="published" value="1" {{ $page->published ? 'checked' : '' }}> Published
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Page</button>
                            <a href="{{ route('pages.pages_list') }}" class="btn btn-danger">Go Back</a><br><br>
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

</html>

<style>
    .ck-editor__editable_inline {
        height: 450px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#page-form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('pages.update', $page->id) }}", // Use the update route
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Page updated successfully.');
                    window.location.href = "{{ route('pages.pages_list') }}"; // Redirect to pages list
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