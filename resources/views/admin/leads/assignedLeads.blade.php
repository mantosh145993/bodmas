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
                        <div class="card p-4 shadow-lg">
                            <h2 class="mb-4 text-center text-danger">C1 {{ Auth::user()->name }}</h2>

                            <!-- Flash Messages -->
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            @endif
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5 class="mb-3">
                                                    📌 🟡 <span class="badge bg-warning text-dark p-2">{{ $assignedLeads }}</span> Assigned
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5>
                                                    📌 ✅ <span class="badge bg-success text-white p-2">{{ $respondedLeads }}</span> Responded
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5>
                                                    📌 👍 <span class="badge bg-primary text-white p-2">{{ $interestedLeads }}</span> Interested
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5>
                                                    📌 👎 <span class="badge bg-danger text-white p-2">{{ $notInterestedLeads }}</span> Not Interested
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5>
                                                    📌 📞 <span class="badge bg-info text-white p-2">{{ $followUpLeads }}</span> Follow-up Required
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body">
                                                <h5>
                                                 <span class="badge bg-success text-white p-2">{{ $convertedLeads }}</span> Converted
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Leads Table -->
                            <div class="table-responsive">
                                <table id="collegeTable" class="table table-bordered text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Course</th>
                                            <th>Source</th>
                                            <th>Assigned</th>
                                            <th>Log's</th>
                                            <th>Status</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partners as $partner)
                                        <tr>
                                            <td class="align-middle">{{ $partner->name }}</td>
                                            <td class="align-middle">{{ $partner->phone }}</td>
                                            <td class="align-middle">{{ $partner->course }}</td>
                                            <td class="align-middle">{{ in_array($partner->type, [1,2]) ? 'Website' : ucfirst($partner->type) }}</td>
                                            <td>{{ $partner->created_at->diffForHumans() }}</td>
                                            <td class="align-middle">
                                                <span class="badge bg-info text-white shadow-sm">
                                                    {{ $partner->updated_at->diffForHumans() }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge px-3 py-2 fw-bold shadow-sm rounded-pill 
                                                    {{ $partner->status == 'responded' ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                                                    {{ ucfirst($partner->status) }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('lead.notes', $partner->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="notes" class="form-control form-control-sm rounded">
                                                        <option value="">-- Select Note --</option>
                                                        <option value="Interested" {{ $partner->notes == 'Interested' ? 'selected' : '' }}>Interested</option>
                                                        <option value="Not Interested" {{ $partner->notes == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
                                                        <option value="Follow-up Required" {{ $partner->notes == 'Follow-up Required' ? 'selected' : '' }}>Follow-up Required</option>
                                                        <option value="Converted" {{ $partner->notes == 'Converted' ? 'selected' : '' }}>Converted</option>
                                                        <option value="Invalid Lead" {{ $partner->notes == 'Invalid Lead' ? 'selected' : '' }}>Invalid Lead</option>
                                                    </select>
                                                    <div class="d-flex justify-content-center mt-2">
                                                        <button type="submit" class="btn btn-primary btn-sm shadow-sm">Save</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="align-middle">
                                                @if($partner->status != 'responded')
                                                <form action="{{ route('lead.respond', $partner->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm shadow-sm">
                                                        Mark as Responded
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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