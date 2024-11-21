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
                    <div class="container">
                        <h1 class="mt-2 mb-2">Predictor Data</h1>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Rank</th>
                                        <th>State</th>
                                        <th>Course</th>
                                        <th>Budget</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1; @endphp
                                    @foreach($predictors as $predictor)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $predictor->name }}</td>
                                        <td>{{ $predictor->number }}</td>
                                        <td>{{ $predictor->rank }}</td>
                                        <td>{{ $predictor->state }}</td>
                                        <td>{{ $predictor->course }}</td>
                                        <td>{{ $predictor->budget }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $predictors->links() }}
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