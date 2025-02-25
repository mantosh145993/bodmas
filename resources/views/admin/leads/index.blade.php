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
                            <div class="text-center">
                                <h1 class="mt-3">Total Collected Leads</h1>
                                <button class="btn-lead mb-3" data-toggle="modal" data-target="#addLeadModal">
                                    Input Leads
                                </button>
                            </div>
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

                                        <!-- <td>
                                            @if($partner->assigned_user_id)
                                                {{ $partner->assignedUser->name }}
                                            @else
                                                <form action="{{ route('lead.assign', $partner->id) }}" method="POST">
                                                    @csrf
                                                    <select name="assigned_user_id" class="form-control d-inline w-auto">
                                                        <option value="">Select User</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                                                </form>
                                            @endif
                                        </td> -->
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

    <!-- Add Lead Modal -->
    <div class="modal fade" id="addLeadModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lead.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="message" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Source Type</label>
                            <select name="type" class="form-control">
                                <option value="website">Website</option>
                                <option value="referral">Referral</option>
                                <option value="call">Call</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Assign to User</label>
                            <select name="assigned_user_id" class="form-control">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Lead</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-lead {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(45deg, #007bff, #00bfff);
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-lead:hover {
            background: #0056b3;
        }

        .btn-lead:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
        }

        @media (max-width: 768px) {
            .btn-lead {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>

    <!-- Include Bootstrap JS (if not included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>