<div class="table-container">
    <div class="search-bar mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search here..." />
    </div>
    <table class="table table-hover table-bordered">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Links</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody id="tableBody">
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
                    <td colspan="4" class="text-center">No application links found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
      <!-- Pagination Controls -->
      <div class="pagination-controls text-center mt-3">
        <button id="prevPage" class="btn btn-primary me-2" disabled>Previous</button>
        <span id="pageInfo">Page 1</span>
        <button id="nextPage" class="btn btn-primary ms-2">Next</button>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.querySelectorAll(".table-row");
        const prevPageBtn = document.getElementById("prevPage");
        const nextPageBtn = document.getElementById("nextPage");
        const pageInfo = document.getElementById("pageInfo");

        let currentPage = 1;
        const rowsPerPage = 5;
        let filteredRows = Array.from(rows);

        function renderTable() {
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach(row => (row.style.display = "none")); // Hide all rows
            filteredRows.slice(start, end).forEach(row => (row.style.display = "")); // Show current page rows

            // Update pagination controls
            pageInfo.textContent = `Page ${currentPage}`;
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = end >= filteredRows.length;
        }

        searchInput.addEventListener("keyup", function () {
            const query = searchInput.value.toLowerCase();
            filteredRows = Array.from(rows).filter(row => {
                const cells = row.querySelectorAll("td");
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(" ");
                return rowText.includes(query);
            });

            currentPage = 1; // Reset to first page on search
            renderTable();
        });

        prevPageBtn.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        nextPageBtn.addEventListener("click", function () {
            if ((currentPage - 1) * rowsPerPage + rowsPerPage < filteredRows.length) {
                currentPage++;
                renderTable();
            }
        });

        // Initial render
        renderTable();
    });
</script>


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