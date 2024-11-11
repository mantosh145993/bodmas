@include('admin.layouts.head')

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')

                <div class="midde_cont">
                    <div class="container mt-5">
                        <h1 class="text-center mb-4">URL Shortener</h1>
                        <div class="card p-4 shadow-sm" style="max-width: 500px; margin: auto;">
                            <form id="urlShortenForm" method="POST" class="form-inline">
                                @csrf
                                <div class="form-group w-100 mb-3">
                                    <label for="url" class="sr-only">Enter URL to shorten</label>
                                    <input type="url" name="url" id="url" class="form-control w-100" placeholder="Enter URL" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Shorten URL</button>
                            </form>
                        </div>
                        <!-- Response Message -->
                        <div id="responseMessage" class="mt-3 text-center"></div>
                    </div>
                </div>
                <!-- end dashboard inner -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>

    <script>
        // Send ajax requuest for store data

        $(document).ready(function() {
            $('#urlShortenForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: '{{route("short.store")}}', // The URL to which the request is sent
                    type: 'POST', // The type of request (POST)
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        url: $('#url').val() // URL input data
                    },
                    success: function(response) {
                        // Ensure we access response.short_url, not response.shortened_url or another key
                        if (response.short_url) {
                            $('#responseMessage').html(`<div class="alert alert-success">Shortened URL: <a href="${response.short_url}" target="_blank">${response.short_url}</a></div>`);
                        } else {
                            $('#responseMessage').html(`<div class="alert alert-danger">Unexpected response format</div>`);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error - display error message
                        $('#responseMessage').html(`<div class="alert alert-danger">Error: ${xhr.responseJSON?.message || 'Failed to shorten the URL.'}</div>`);
                    }
                });
            });
        });

        //
    </script>
    <style>
        .container {
            padding-top: 30px;
        }

        .card {
            border: 1px solid #f0f0f0;
            border-radius: 8px;
        }

        .form-control {
            font-size: 16px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        @media (max-width: 768px) {
            .container h1 {
                font-size: 24px;
            }

            .form-control,
            .btn {
                font-size: 14px;
            }
        }
    </style>
</body>

</html>