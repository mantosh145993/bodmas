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
                        <div class="card p-4">
                            <!-- Flash Messages -->
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <!-- Leads Table -->
                            <table id="collegeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Cource</th>
                                        <th>Subject</th>
                                        <th>Source</th>
                                        <th>Assigned To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $partner->email }}</td>
                                        <td>{{ $partner->phone }}</td>
                                        <td>{{ $partner->course }}</td>
                                        <td>{{ $partner->message }}</td>
                                        <td>{{ in_array($partner->type, [1,2]) ? 'Website' : ucfirst($partner->type) }}</td>
                                        <td class="{{ $partner->assignedUser ? 'bg-info text-white' : 'bg-warning text-dark' }}">
                                            {{ $partner->assignedUser ? $partner->assignedUser->name : 'Unassigned' }}
                                        </td>
                                        <td>
                                            <!-- Assign/Reassign Button -->
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#assignModal{{ $partner->id }}">
                                                {{ $partner->assigned_user ? 'Reassign' : 'Assign' }}
                                            </button>

                                            <!-- Assign/Reassign Modal -->
                                            <div class="modal fade" id="assignModal{{ $partner->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ $partner->assigned_user ? 'Reassign' : 'Assign' }} Lead</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('lead.assign', $partner->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="form-group">
                                                                    <label>Select User</label>
                                                                    <select name="assigned_user_id" class="form-control" required>
                                                                        <option value="">-- Select User --</option>
                                                                        @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <button type="submit" class="btn btn-success">
                                                                    {{ $partner->assigned_user ? 'Reassign' : 'Assign' }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
