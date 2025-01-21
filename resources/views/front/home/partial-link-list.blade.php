<table class="table table-hover table-bordered">
    <thead class="table-light">
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Links</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($links as $link)
            <tr class="table-row">
                <td>{{ $link->name }}</td>
                <td>{{ $link->type }}</td>
                <td>
                    <a href="{{ $link->link }}" target="_blank" class="text-decoration-none text-primary">
                        Visit Link
                    </a>
                </td>
                <td>{{ $link->state->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No application links found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $links->links() }}
</div>

<style>
    /* Table Rows */
.table-row:nth-child(even) {
    background-color: #f9f9f9; /* Light gray for even rows */
}

.table-row:nth-child(odd) {
    background-color: #ffffff; /* White for odd rows */
}

/* Status Column */
.status-column {
    padding: 10px;
    text-align: center;
    font-weight: bold;
    border-radius: 5px;
}

.active-status {
    background-color: #28a745; /* Green for active */
    color: white;
}

.inactive-status {
    background-color: #dc3545; /* Red for inactive */
    color: white;
}

/* Link Styling */
a.text-primary {
    color: #007bff; /* Professional blue for links */
}

a.text-primary:hover {
    text-decoration: underline;
}

/* Pagination */
.pagination {
    justify-content: center;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
}

.pagination .page-link {
    color: #007bff;
}

.pagination .page-link:hover {
    background-color: #f1f3f5;
    border-color: #007bff;
}

/* Table Borders */
.table-bordered th, .table-bordered td {
    border-color: #dee2e6; /* Subtle border color for a clean look */
}

</style>