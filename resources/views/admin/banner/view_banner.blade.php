@include('admin.layouts.head');

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar');

                <div class="midde_cont">
                    <div class="container mt-5">
                        <h1> {{$banner->title }} Banner</h1>
                        <a href="{{ route('banner.page') }}" class="btn btn-danger my-4">Back</a>
                        @if($banner->count())
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/banner/'.$banner->image) }}" alt="{{ $banner->title }}" style="width: 100%;">
                                    </td>
                                    <td><a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></td>
                                    <td>{{ $banner->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $banner->order_index }}</td>
                                
                                       
                                    </td>
                                </tr>
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