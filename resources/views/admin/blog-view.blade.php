@include('admin.layouts.head');

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">

                            <!-- Table Section -->
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Read Blogs</h2>
                                        </div>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('admin.blog') }}" class="btn btn-danger btn-sm">&nbsp;Back &nbsp;&nbsp;</a>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                        <li class="list-group-item"><strong>Blog Views : </strong>{{ $post->views }}</li>
                                            <ul class="list-group">
                                              <li class="list-group-item"><strong>Post Category:</strong> 
                                             @foreach($categories as $cat)
                                             @if($cat->id == $post->category_id)
                                             {{$cat->name}}
                                             @endif
                                             @endforeach
                                            </li>
                                                <li class="list-group-item"><strong>Title:</strong> {{ $post->title }}</li>
                                                <li class="list-group-item"><strong>Slug:</strong> {{ $post->slug }}</li>
                                                <li class="list-group-item"><strong>Tags:</strong> {{ $post->tags }}</li>
                                                <li class="list-group-item"><strong>Meta Title:</strong> {{ $post->meta_title }}</li>
                                                <li class="list-group-item"><strong>Meta Descriptions:</strong> {{ $post->meta_description }}</li>
                                                <li class="list-group-item"><strong>Meta Keywords:</strong> {{ $post->meta_keywords }}</li>
                                                <li class="list-group-item"><strong>Author:</strong> {{ Auth::user()->name }}</li>
                                                <li class="list-group-item"><strong>About Author:</strong> {{ Auth::user()->description }}</li>
                                                <li class="list-group-item">
                                                    <img src="{{ asset('images/feature/' . $post->feature_image) }}" alt="{{ $post->title }}" style="max-width: 500px; max-height: 150px;">
                                                </li>
                                                <li class="list-group-item"><strong>Feature Description:</strong> {{ $post->feature_description }}</li>
                                                <li class="list-group-item"><strong></strong> {!! $post->content !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- footer -->
                    @include('admin.layouts.footer')
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
        <!-- model popup -->
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end model popup -->
    </div>

</body>

</html>
<style>
    .list-group-item {
        padding: 15px;
        border: 1px solid #dee2e6;
        /* Adds a border around each item */
        margin-bottom: 10px;
        /* Spacing between items */
        border-radius: 0.25rem;
        /* Slightly rounded corners */
        background-color: #f8f9fa;
        /* Light background for better readability */
    }

    .list-group-item strong {
        color: #333;
        /* Dark color for labels */
    }

    .table_section {
        background-color: #ffffff;
        /* White background for the table section */
        border-radius: 0.5rem;
        /* Rounded corners */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
    }
</style>