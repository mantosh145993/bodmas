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
                        <h1 class="mt-2 mb-2">Paid Guidance Packages List</h1>

                        <a href="{{ route('guidance.create') }}" class="btn btn-info">Add Guidance Package</a><br><br>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package Name</th>
                                    <th>Description</th>
                                    <th>Base Price</th>
                                    <th>GST Ratet</th>
                                    <th>GST Amount</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index =1; @endphp
                                @foreach($packages as $package)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $package->package_name }}</td>
                                    <td>{{ $package->description }}</td>
                                    <td>{{ $package->base_price }}</td>
                                    <td>{{ $package->gst_rate }}</td>
                                    <td>{{ $package->gst_amount }}</td>
                                    <td>{{ $package->total_price }}</td>
                                    <td>{{ $package->image }}</td>
                                    <td>
                                        <a href="{{ route('guidance.view', $package->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('guidance.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('guidance.destroy', $package->id) }}" method="POST" style="display:inline;">
                                            @csrf   
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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
