@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="container">
                    <div class="card mt-5">
                        <h3 class="card-header p-3"><i class="fa fa-star">&nbsp;&nbsp;</i>Cut Off Import-Export Excel</h3>
                        <div class="card-body">

                            <!-- Success Message -->
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            <!-- Error Message -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Import Form -->
                            <form action="{{ route('cutoff.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control" required>
                                <br>
                                <button class="btn btn-success mb-2"><i class="fa fa-file"></i> Import User Data</button>
                            </form>
                            <tr>
                                <th colspan="8">
                                    <a class="btn btn-warning float-end mb-2" href="{{ route('cutoff.export') }}"><i class="fa fa-download"></i> Export User Data</a>
                                </th>
                            </tr>
                            <!-- Users Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered mt-3" id="cutoffTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Fee</th>
                                            <th>Course</th>
                                            <th>Category</th>
                                            <th>Round</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 1; @endphp
                                        @foreach($medicals as $medical)
                                        <tr>
                                            <td>{{ $medical->college_id }}</td>
                                            <td>{{ $medical->college_name }}</td>
                                            <td>{{ $medical->type }}</td>
                                            <td>{{ $medical->fee }}</td>
                                            <td>{{ $medical->course }}</td>
                                            <td>{{ $medical->category }}</td>
                                            <td>{{ $medical->round }}</td>
                                            <td>{{ $medical->rank }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer -->
                @include('admin.layouts.footer');
            </div>

            <!-- DataTables CSS -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

            <!-- jQuery (required for DataTables) -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#cutoffTable').DataTable({
                        "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10
                    });
                });
            </script>