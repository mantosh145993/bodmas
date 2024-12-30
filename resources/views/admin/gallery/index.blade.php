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
                        <h1 class="mt-2 mb-2">Bodmas Gallery</h1>
                        <a href="{{ route('gallery.add') }}" class="btn btn-info">Add New Events</a><br><br>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image Title</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Event Images</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1; @endphp
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>
                                            <img src="{{ asset('images/events/' . $event->image_url) }}" alt="{{ $event->title }}" style="width: 250px; height: 50px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.show', $event->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('gallery.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('gallery.destroy', $event->id) }}" method="POST" style="display: inline;">
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
                </div>
                <!-- footer -->
                @include('admin.layouts.footer')
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
</body>

</html>