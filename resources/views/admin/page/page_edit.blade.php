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
                            <h1>{{ 'Edit Page >>>' }}</h1>
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
                            <input type="hidden" class="form-control" id="" name="slug" value="{{ old('slug', $page->slug) }}">
                            <!-- Published Checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="published" value="1" {{ $page->published ? 'checked' : '' }}> Published
                                </label>
                            </div>
                            <div id="word-count">Word count: 0</div>
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
                    window.location.href = "{{ route('pages.edit',$page->id) }}"; // Redirect to pages list
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
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize CKEditor
        CKEDITOR.replace('editor');

        // Add word count display logic
        const wordCountElement = document.getElementById('word-count');

        // Function to calculate word count
        function calculateWordCount(text) {
            return text.trim().split(/\s+/).filter(word => word.length > 0).length;
        }

        // Listen for changes in CKEditor content
        CKEDITOR.instances.editor.on('change', function() {
            // Get content from CKEditor
            const content = CKEDITOR.instances.editor.getData();

            // Calculate word count
            const wordCount = calculateWordCount(content);

            // Update word count display
            wordCountElement.textContent = `Word count: ${wordCount}`;
        });
    });
</script>