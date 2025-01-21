@include('admin.layouts.head')
<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- End Sidebar -->
            <div id="content">
                <!-- Topbar -->
                @include('admin.layouts.topbar')
                <!-- Add Package Button -->
                <div class="midde_cont">
                    <div class="container mt-4">
                        <div class="card">
                            <h3 class="mt-5 ml-5 mb-5">Payment Dashboard (Report)</h3>
                            <table id="collegeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>P-id</th>
                                        <th>P-name</th>
                                        <th>P-type</th>
                                        <th>P-mode</th>
                                        <th>P-price</th>
                                        <th>P-gst</th>
                                        <th>P-gst ₹</th>
                                        <th>V-gst</th>
                                        <th>Status</th>
                                        <th>Txn-Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $index=1; ?>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$payment->customer_name}}</td>
                                        <td>{{ $payment->payment_id }}</td>
                                        <td>{{ $payment->product_name }}</td>
                                        <td>{{ $payment->package_type }}</td>
                                        <td>{{ $payment->payment_type }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->gst." %" }} </td>
                                        <td>{{ $payment->gst_amount ? $payment->gst_amount : 'N/A' }}</td>
                                        <td>{{ $payment->vendor_gst ? $payment->vendor_gst : 'N/A' }}</td>
                                        <td>{{$payment->payment_status == "SUCCESS" ? $payment->payment_status : 'N/A'}}</td>
                                        <td>{{$payment->txn_date ? $payment->txn_date : 'N/A'}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
</body>
</html>

<style>
    
    .package-card {
        border-radius: 10px;
        overflow: hidden;
        background-color: #f8f9fa;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .package-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .package-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .package-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .package-card .card-text {
        color: #6c757d;
        font-size: 1rem;
        flex-grow: 1;
    }

    .package-card .card-text strong {
        font-weight: 600;
        color: #28a745;
    }

    @media (max-width: 767px) {
        .package-list {
            margin-top: 20px;
        }

        .package-card {
            padding: 20px;
        }

        .package-card .card-title {
            font-size: 1.1rem;
        }

        .package-card .card-text {
            font-size: 0.95rem;
        }
    }

    .pagination {
        margin-top: 30px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    
    .pagination a:hover {
        background-color: #0056b3;
    }
</style>