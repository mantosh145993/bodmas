@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            @include('admin.layouts.sidebar')
            <div id="content">
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container">
                        <h1>Pages List</h1> <br>

                        <a href="{{ route('pages.create') }}" class="btn btn-info">Add Page</a><br><br>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table id="pagesTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Published</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->published ? 'Yes' : 'No' }}</td>
                                    <td>{{ $page->created_at ? $page->created_at->format('Y-m-d') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('pages.view', $page->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline;">
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
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#pagesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10
            });
        });
    </script>
</body>
</html>
