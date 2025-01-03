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
                    <div class="container mt-4">
                        <div class="card">
                            <h1 class="mt-5 ml-5 mb-5">All enquiries come from Partners & Students</h1>
                            
                            <!-- College Table -->
                            <table id="collegeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Course</th>
                                        <th>Subject</th>
                                        <th>Type</th>
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
                                        <td>{{ $partner->type == 1 ? 'Student' : 'Partner'  }}</td>
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
</body>

</html>
