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
                    <h1 class="mt-2 mb-2 mt-5 center">View Guidance Packages</h1> 
                    <div class="package-details mt-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ $paidPackage->package_name }}</h3>
                            </div>
                            <div class="col-sm-6 text-right mb-4">
                            <a href="{{ route('guidance.list') }}" class="btn btn-danger">Go Back</a>
                            </div>
                        </div>

                        @if($paidPackage->image)
                        <img src="{{ asset('images/paid_package/' . $paidPackage->image) }}" alt="{{ $paidPackage->package_name }}">
                        @endif

                        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Description</td>
            <td>{{ $paidPackage->description ?? 'No description provided.' }}</td>
        </tr>
        <tr>
            <td>Base Price</td>
            <td>₹{{ number_format($paidPackage->base_price, 2) }}</td>
        </tr>
        
        <tr>
            <td>Basic Price</td>
            <td>₹{{ number_format($paidPackage->basic_fee, 2) }}</td>
        </tr>
        <tr>
            <td>Premium Price</td>
            <td>₹{{ number_format($paidPackage->premium_fee, 2) }}</td>
        </tr>
        <tr>
            <td>First Installment Premium</td>
            <td>₹{{ number_format($paidPackage->first_installment, 2) }}</td>
        </tr>
        <tr>
            <td>Second Installment Premium</td>
            <td>₹{{ number_format($paidPackage->second_installment, 2) }}</td>
        </tr>
        <tr>
            <td>NRI Price</td>
            <td>₹{{ number_format($paidPackage->nri_fee, 2) }}</td>
        </tr>
        <tr>
            <td>First Installment NRI</td>
            <td>₹{{ number_format($paidPackage->first_installment_premium, 2) }}</td>
        </tr>
        <tr>
            <td>Second Installment NRI</td>
            <td>₹{{ number_format($paidPackage->second_installment_premium, 2) }}</td>
        </tr>

        <tr>
            <td>GST Rate</td>
            <td>{{ number_format($paidPackage->gst_rate, 2) }}%</td>
        </tr>
        <tr>
            <td>GST Amount</td>
            <td>₹{{ number_format($paidPackage->gst_amount, 2) }}</td>
        </tr>
        <tr>
            <td>Total Price</td>
            <td>₹{{ number_format($paidPackage->total_price, 2) }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $paidPackage->created_at ? $paidPackage->created_at->format('d-m-Y H:i') : 'Not available' }}</td>
        </tr>
    </tbody>
</table>

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
     .package-details {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        .package-details h1 {
            margin-top: 0;
        }
        .package-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .package-details dl {
            margin: 0;
        }
        .package-details dt {
            font-weight: bold;
        }
        .package-details dd {
            margin: 0 0 10px 0;
        }
</style>