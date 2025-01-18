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
                                <h3>Create New Form Link</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('form.store') }}" method="POST">
                                    @csrf
                                    <!-- Name Field -->
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="" disabled selected>Select a type</option>
                                            <option value="UG">UG</option>
                                            <option value="PG">PG</option>
                                            <option value="Engineering">Engineering</option>
                                        </select>
                                    </div>
                                   <!-- State Field -->
                                    <div class="form-group">
                                        <label for="state_id">State</label>
                                        <select id="state_id" name="state_id" class="form-control" required>
                                            <option value="" disabled selected>Select a state</option>
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Link Field -->
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="url" id="link" name="link" class="form-control" required>
                                    </div>
                                    <!-- Status Field -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Create Link</button>
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