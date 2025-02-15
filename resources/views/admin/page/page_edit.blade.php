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
                            
                            <div class="form-group">
                                <label for="course_id">Select Course</label>
                                <select class="form-control" id="course_id" name="course_id" >
                                    <option value="">Select Courses</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}" {{ $course->id == $page->course_id ? 'selected' : ''}}>{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state_id">Select State</label>
                                <select class="form-control" id="state_id" name="state_id" >
                                <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}"{{ $state->id == $page->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hierarchy">Select Hierarchy (Only Applicable for state college)</label>
                                <select class="form-control" id="hierarchy" name="hierarchy" >
                                    <option value="">Select Hierarchy</option>
                                    <option value="1" {{ $page->hierarchy == 1 ? 'selected' : '' }}>Parent Page</option>
                                    <option value="2" {{ $page->hierarchy == 2 ? 'selected' : '' }}>Child Page</option>
                                </select>
                            </div>
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
</script>