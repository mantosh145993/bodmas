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
                                <button class="btn btn-success"><i class="fa fa-file"></i> Import User Data</button>
                            </form>

                            <!-- Users Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered mt-3 table table-bordered">
                                    <tr>
                                        <th colspan="7">
                                            <a class="btn btn-warning float-end" href="{{ route('cutoff.export') }}"><i class="fa fa-download"></i> Export User Data</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Course</th>
                                        <th>Category</th>
                                        <th>Round</th>
                                        <th>Rank</th>
                                    </tr>
                                    @php $index = 1; @endphp
                                    @foreach($medicals as $medical)
                                    <tr>
                                        <td>{{ $medical->college_id }}</td>
                                        <td>{{ $medical->college_name }}</td>
                                        <td>{{ $medical->course }}</td>
                                        <td>{{ $medical->category }}</td>
                                        <td>{{ $medical->round }}</td>
                                        <td>{{ $medical->rank }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    {{ $medicals->links() }}
                </div>
                <!-- footer -->
                @include('admin.layouts.footer');
            </div>

            