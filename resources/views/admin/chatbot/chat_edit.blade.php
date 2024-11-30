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
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0" style="color:#fff;">Update Chat Message</h5>
                            </div>
                            <div class="card-body">
                                <form id="chat-update" action="{{ route('chat.update', $chat->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Question Input -->
                                    <div class="form-group">
                                        <label for="title" class="font-weight-bold">Question</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="title"
                                            name="question"
                                            value="{{ old('title', $chat->question) }}"
                                            >
                                    </div>

                                    <div class="form-group">
                                    <label for="content">Reply</label>
                                    <textarea name="reply" id="editor">{{ old('content', $chat->reply) }}</textarea>
                                </div>
                                <div id="word-count">Word count: 0</div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <a href="{{ route('chat.chat_list') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
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
        $('#chat-update').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('chat.update', $chat->id) }}", // Use the update route
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Chat updated successfully.');
                    window.location.href = "{{ route('chat.edit',$chat->id) }}";
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