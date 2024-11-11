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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <i class="fa fa-id-card" style="font-size:48px;color:red"></i>
                            <h1>{{ 'Add Page >>>' }}</h1>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form id="page-form" action="{{ route('pages.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="published" value="1"> Published
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Page</button>
                            <a href="{{ route('pages.pages_list') }}" class="btn btn-danger">Go Back</a>
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
        $('#page-form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('pages.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Page created successfully.');
                    window.location.href = "{{route('pages.pages_list')}}";
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