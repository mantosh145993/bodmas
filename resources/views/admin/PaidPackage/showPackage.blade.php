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

                        <dl>
                            <dt>Description:</dt>
                            <dd>{{ $paidPackage->description ?? 'No description provided.' }}</dd>

                            <dt>Base Price:</dt>
                            <dd>₹{{ number_format($paidPackage->base_price, 2) }}</dd>

                            <dt>GST Rate:</dt>
                            <dd>{{ number_format($paidPackage->gst_rate, 2) }}%</dd>

                            <dt>GST Amount:</dt>
                            <dd>₹{{ number_format($paidPackage->gst_amount, 2) }}</dd>

                            <dt>Total Price:</dt>
                            <dd>₹{{ number_format($paidPackage->total_price, 2) }}</dd>

                            <dt>Created At:</dt>
                            <dd>{{ $paidPackage->created_at ? $paidPackage->created_at->format('d-m-Y H:i') : 'Not available' }}</dd>
                        </dl>
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