@include('admin.layouts.head');

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-id-card" style="font-size:48px;color:red"></i>
                            <h1 class="">{{ 'Add Message' }}</h1>

                        </div>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form id="chat-form" action="{{ route('chat.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Question</label>
                                <input type="text" class="form-control" id="title" name="question" value="{{ old('title') }}" required>
                            </div>

                            <!-- Content Editor -->
                            <div class="form-group">
                                <label for="content">Reply</label>
                                <textarea name="reply" id="editor"></textarea>
                            </div>



                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Create Chat</button>
                            <a href="{{ route('chat.chat_list') }}" class="btn btn-danger">Cancel</a>
                        </form>
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

<style>
    .ck-editor__editable_inline {
        height: 450px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#chat-form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('chat.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Chat Message created successfully.');
                    window.location.href = "{{route('chat.chat_list')}}";
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