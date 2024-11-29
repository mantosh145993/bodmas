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
                    <h1 class="mt-2 mb-2 center">Update Guidance Packages</h1>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="container mt-5">
                        <div class="row justify-content-center">

                            <div class="col-md-8">
                                <div class="card shadow-lg p-4">
                                    <form id="noticeForm" enctype="multipart/form-data" method="post" action="{{ route('guidance.update', $package->id) }}">

                                        @csrf
                                        <!-- Package Name -->
                                        <div class="form-group">
                                            <label for="package_name">Package Name</label>
                                            <input type="text" class="form-control" id="package_name" name="package_name" value="{{$package->package_name}}" required>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" id="description" name="description" value="{{$package->description}}">
                                        </div>

                                        <!-- Base Price (₹) -->
                                        <div class="form-group">
                                            <label for="base_price">Base Price (₹)</label>
                                            <input type="number" class="form-control" id="base_price" name="base_price" value="{{$package->base_price}}">
                                        </div>

                                        <!-- GST Rate (%): -->
                                        <div class="form-group">
                                            <label for="gst_rate">GST Rate (%):</label>
                                            <input type="number" class="form-control" id="gst_rate" name="gst_rate" value="{{$package->gst_rate}}">
                                        </div>

                                        <!-- Package Image -->
                                        <div class="form-group">
                                            <label for="image">Package Image</label>
                                            @if($package->image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('images/paid_package/' . $package->image) }}" 
                                                        alt="{{ $package->package_name }}" 
                                                        class="img-fluid" 
                                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group row">
                                            <!-- Submit Button -->
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>

                                            <!-- Go Back Button -->
                                            <div class="col-6">
                                                <a href="{{ route('guidance.list') }}" class="btn btn-danger btn-block">Go Back</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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