@include('admin.layouts.head');

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar');

                <div class="midde_cont">
                    <div class="container">
                        <h1>Slider Banners</h1>

                        <a href="{{ route('slider_banners.create') }}" class="btn btn-primary mb-3">Add New Banner</a>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="row">
                            @foreach($banners as $banner)
                            <div class="col-md-4 mb-4"> <!-- Adjust column size as needed -->
                                <div class="card h-100"> <!-- Use h-100 to make cards the same height -->
                                    <img src="{{ asset('images/slider_banner/'.$banner->image) }}" class="card-img-top" alt="Banner Image" style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column"> <!-- Flex column to keep content structured -->
                                        <h5 class="card-title">{{ $banner->title }}</h5>
                                        <p class="card-text">{{ $banner->description }}</p>
                                        <p class="card-text"><strong>Link:</strong> <a href="{{ $banner->link }}">{{ $banner->link }}</a></p>
                                        <p class="card-text"><strong>Status:</strong> {{ $banner->is_active ? 'Active' : 'Inactive' }}</p>
                                        <p class="card-text"><strong>Order:</strong> {{ $banner->order_index }}</p>
                                        <div class="mt-auto d-flex justify-content-between"> <!-- Push actions to the bottom -->
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $banner->id }}">View</button>
                                            <a href="{{ route('slider_banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('slider_banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="viewModal{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $banner->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $banner->id }}">{{ $banner->title }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('images/slider_banner/'.$banner->image) }}" class="img-fluid" alt="Banner Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- footer -->
                @include('admin.layouts.footer');
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

</body>

</html>
<style>
    .card {
        /* Optional: Set a minimum height for consistency */
        min-height: 400px;
        /* Adjust as needed */
    }
</style>