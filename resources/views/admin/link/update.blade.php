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
                <div class="midde_cont">
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Update Link</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('form.update', $form->id) }}" method="POST">
                                    @csrf
                                    <!-- Name Field -->
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{$form->name}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="" disabled {{ empty($form->type) ? 'selected' : '' }}>Select a type</option>
                                            <option value="UG" {{ $form->type == 'UG' ? 'selected' : '' }}>UG</option>
                                            <option value="PG" {{ $form->type == 'PG' ? 'selected' : '' }}>PG</option>
                                            <option value="Engineering" {{ $form->type == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                        </select>
                                    </div>

                                   <!-- State Field -->
                                    <div class="form-group">
                                        <label for="state_id">State</label>
                                        <select id="state_id" name="state_id" class="form-control" required>
                                            <option value="" disabled selected>Select a state</option>
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}" {{$form->state_id==$state->id ? 'selected' : ''}} >{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Link Field -->
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="url" id="link" name="link" class="form-control" value="{{$form->link}}">
                                    </div>
                                    <!-- Status Field -->
                                   <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="active" {{ $form->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $form->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Update Link</button>
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