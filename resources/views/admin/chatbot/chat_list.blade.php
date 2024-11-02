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
                        <h1 class="mt-2 mb-2">Chat Question List</h1>

                        <a href="{{ route('chat.create') }}" class="btn btn-info">Add Question</a><br><br>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Reply</th>
                                    <th>Created At</th>
                                    <!-- <th>Updated At</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index =1; @endphp
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $message->question }}</td>
                                    <td>{!! $message->reply !!}</td>
                                    <td>{{ $message->created_at }}</td>
                                    <!-- <td>{{ $message->updated_at }}</td> -->
                                    <td>
                                        <a href="{{ route('chat.view', $message->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('chat.edit', $message->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('chat.destroy', $message->id) }}" method="POST" style="display:inline;">
                                            @csrf   
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $messages->links() }} 
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
