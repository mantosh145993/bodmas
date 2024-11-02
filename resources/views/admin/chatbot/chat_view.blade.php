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
                    <div class="container"><br>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <i class="fa fa-id-card" style="font-size:48px;color:red"></i>
                            <h1>{{ 'Message' }}</h1>
                            <a href="{{ route('chat.chat_list') }}" class="btn btn-danger">Go Back</a>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <!-- Content Display -->
                        <div class="page-content">
                            <div class="card mb-3">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0" style="color: #f8f9fa;" >Chat Message</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <strong>Question:</strong>
                                        <p class="mb-0">{{ $message->question }}</p>
                                    </div>
                                    <div>
                                        <strong>Reply:</strong>
                                        <p class="mb-0">{{ $message->reply }}</p>
                                    </div>
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

<style>
    /* Set a fixed size for images within the page content */
    .page-content img {
        width: 100%;
        /* Set desired width */
        height: 300px;
        /* Set desired height */
        object-fit: cover;
        /* Maintain aspect ratio, crop if necessary */
    }
    .page-content {
    padding: 20px;
}

.card {
    border-radius: 10px;
}

.card-header {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    background-color: #f8f9fa;
}

</style>