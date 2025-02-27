@include('admin.layouts.head');

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container mt-5">
                        <h1>List of Banners</h1>
                        <a href="{{ route('banner.create') }}" class="btn btn-success my-4">Add New Banner</a>
                        @if($banners->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Order Index</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/banner/'.$banner->image) }}" alt="{{ $banner->title }}" style="width: 100px;">
                                    </td>
                                    <td><a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></td>
                                    <td>{{ $banner->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $banner->order_index }}</td>
                                    <td>
                                        <a href="{{ route('banner.view', $banner->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No banners available.</p>
                        @endif

                      
                    </div>
                </div>
                <!-- end dashboard inner -->
                @include('admin.layouts.footer');

            </div>
        </div>
    </div>

</body>

</html>