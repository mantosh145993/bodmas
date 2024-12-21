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
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Update College</h2>
                        <div class="row justify-content-center">

                            <div class="col-md-8">
                                <div class="card shadow-lg p-4">
                                    <form id="collegeUpdate" enctype="multipart/form-data" method="post" action="{{ route('college.update',$colleges->id) }}">

                                        @csrf

                                        <!-- Select State -->
                                        <div class="form-group">
                                            <label for="state_id">Select State</label>
                                            <select class="form-control" id="state_id" name="state_id" required>
                                                @foreach($states as $state)
                                                <option value="{{ $state->id }}"{{ $state->id == $colleges->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Quota Type -->
                                        <div class="form-group">
                                            <label for="type">Quota Type</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="Government" {{ $colleges->type == 'Government' ? 'selected' : '' }}>Government</option>
                                                <option value="Private" {{ $colleges->type == 'Private' ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>

                                        <!-- Course Type -->
                                        <div class="form-group">
                                            <label for="course_id">Course Type</label>
                                            <select class="form-control" id="course_id" name="course_id" required>
                                                @foreach($courses as $course)
                                                <option value="{{$course->id}}" {{ $course->id == $colleges->course_id ? 'selected' : '' }}>{{$course->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- College Name -->
                                        <div class="form-group">
                                            <label for="name">College Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$colleges->name}}" required>
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" value="{{$colleges->address}}" name="address">
                                        </div>

                                        <!-- College Image -->
                                        <div class="form-group">
                                            <label for="image">College Image</label>
                                            @if($colleges->image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('college/' . $colleges->image) }}" 
                                                        alt="{{ $colleges->name }}" 
                                                        class="img-fluid" 
                                                        style="width: 250px; height: 200px; object-fit: cover; border-radius: 5px;">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control-file" id="image" name="image">

                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group row">
                                            <!-- Submit Button -->
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>

                                            <!-- Go Back Button -->
                                            <div class="col-6">
                                                <a href="{{ route('college.college_list') }}" class="btn btn-danger btn-block">Go Back</a>
                                            </div>
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
        // Handle form submission for Create package
        $('#collegeUpdate').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let url = $(this).attr('action'); // Get the action URL

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('College Updated successfully!');
                    location.reload();
                },
                error: function() {
                    alert('Error saving college.');
                }
            });
        });
    });
</script>