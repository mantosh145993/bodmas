@extends('front_layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container my-5">
    <h3>Detail Information of Package</h3>

    <!-- Payment Details Table -->
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #F37254; color: white;">
                <th style="padding: 10px; text-align: left;">Details</th>
                <th style="padding: 10px; text-align: left;">Information</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Package Type:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $packageType }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Package:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $package->package_name }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Payment Term:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $paymentType }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Base Price:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($base_amount, 2) }}</td>
            </tr>
            <!-- Display First Installment if available -->
            @if(isset($first_installment) && $first_installment)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">First Installment:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($first_installment, 2) }}</td>
            </tr>
            @endif
            <!-- Display Second Installment if available -->
            @if(isset($second_installment) && $second_installment)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Second Installment:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($second_installment, 2) }}</td>
            </tr>
            @endif
            <!-- Display GST if available -->
            @if(isset($package->gst_rate) && $package->gst_rate)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">GST:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $package->gst_rate }} %</td>
            </tr>
            @endif
            <!-- Display GST Amount if available -->
            @if(isset($gst_amount) && $gst_amount)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">GST Amount:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($gst_amount, 2) }}</td>
            </tr>
            @endif
            <!-- Display Total Amount Include with GST if available -->
            @if(isset($amount) && $amount)
            <tr>
                @if(isset($dicountAmount) && $dicountAmount > 0)
                    <td style="padding: 8px; border: 1px solid #ddd;">Discount Applied (10%):</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($dicountAmount, 2) }}</td>
                @endif
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Total Amount (Incl. GST):</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($amount, 2) }}</td>
            </tr>
            @endif

            <!-- @if(isset($dicountAmount) && $dicountAmount)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">After Discount Amount:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($dicountAmount, 2) }}</td>
            </tr>
            @endif -->
        </tbody>
    </table>
    <div class="container">
        <form id="paymentForm" enctype="multipart/form-data" >
            @csrf
            <!-- Hidden Inputs for Package Details -->
            <input type="hidden" name="package_type" value="{{ $packageType }}">
            <input type="hidden" name="package_name" value="{{ $package->package_name }}">
            <input type="hidden" name="package_id" value="{{ $package->id }}">
            <input type="hidden" name="base_price" value="{{ number_format($base_amount, 2) }}">
            <input type="hidden" name="payment_term" value="{{ $paymentType }}">
            <input type="hidden" name="gst_amount" value="{{ $gst_amount }}">
            <input type="hidden" name="gst_rate" value="{{ $package->gst_rate }}">
            <input type="hidden" name="total_amount" value="{{ number_format($amount, 2) }}">

            <!-- User Information Form -->
            <div class="form-group">
                <input type="text" id="vendor_gst" name="vendor_gst" class="form-control" placeholder="Enter your GST No.">
            </div>
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" pattern="[0-9]{10}" maxlength="10" required>
            </div>
            @if( isset($discount) && $discount)
            <div class="form-group" style="margin-top: 10px;">
                <label for="file" class="form-label" style="color: red; font-weight: bold; font-size: 16px;">
                   10% discount on Upload a document if you have served in the Army, Police, or have a sibling/single parent in service.
                </label>
                <input type="file" id="file" name="file" class="custom-file-upload" accept=".jpg,.jpeg,.png,.pdf">

            </div>
            @endif

            <div class="form-group text-center">
                <button type="button" id="payNowButton" class="btn btn-primary mt-3">Proceed for Payment</button>
            </div>
        </form>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            document.getElementById('payNowButton').addEventListener('click', function(e) {
                e.preventDefault();

                const vendorGst = document.getElementById('vendor_gst').value;
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const mobile = document.getElementById('mobile').value;
                const file = document.getElementById('file').value
                // Validate the form inputs
                if (!name || !email || !mobile || !file) {
                    alert('Please fill out all required fields.');
                    return;
                }

                // const options = {
                //     key: "{{ env('RAZORPAY_KEY') }}", // Razorpay key
                //     amount: "{{ $amount * 100 }}", // Amount in paise
                //     currency: "INR",
                //     name: "Bodmaseducation.com",
                //     description: "Payment for {{ $packageType }} Package",
                //     image: "{{ asset('assets/img/logo1.png') }}",
                //     order_id: "{{ $razorpayOrder->id }}", // Order ID generated in the backend
                //     handler: function(response) {
                //         // Send payment details to the backend for verification
                //         fetch("{{ route('payment.process') }}", {
                //                 method: "POST",
                //                 headers: {
                //                     "Content-Type": "application/json",
                //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                //                 },
                //                 body: JSON.stringify({
                //                     razorpay_order_id: response.razorpay_order_id,
                //                     razorpay_payment_id: response.razorpay_payment_id,
                //                     razorpay_signature: response.razorpay_signature,
                //                     vendor_gst: vendorGst,
                //                     name: name,
                //                     file: file,
                //                     email: email,
                //                     mobile: mobile,
                //                     package_type: "{{ $packageType }}",
                //                     package_name: "{{ $package->package_name }}",
                //                     base_price: "{{ $base_amount }}",
                //                     payment_term: "{{ $paymentType }}",
                //                     gst_amount: "{{ $gst_amount }}",
                //                     gst_rate: "{{ $package->gst_rate }}",
                //                     total_amount: "{{ $amount }}"
                //                 })
                //             })
                //             .then(response => response.json())
                //             .then(data => {
                //                 if (data.status === 'success') {
                //                     // Redirect to the success page
                //                     window.location.href = data.redirect_url;
                //                 } else {
                //                     // Show error message
                //                     alert("Payment failed: " + data.message);
                //                     window.location.href = data.redirect_url;
                //                 }
                //             })
                //             .catch(error => {
                //                 console.error("Error:", error);
                //                 alert("An unexpected error occurred. Please try again.");
                //             });
                //     },
                //     prefill: {
                //         name: name,
                //         email: email,
                //         contact: mobile
                //     },
                //     theme: {
                //         color: "#ff7529"
                //     }
                // };
                const options = {
    key: "{{ env('RAZORPAY_KEY') }}", // Razorpay key
    amount: "{{ $amount * 100 }}", // Amount in paise
    currency: "INR",
    name: "Bodmaseducation.com",
    description: "Payment for {{ $packageType }} Package",
    image: "{{ asset('assets/img/logo1.png') }}",
    order_id: "{{ $razorpayOrder->id }}", // Order ID generated in the backend
    handler: function(response) {
        // Create FormData object to send data including file
        let formData = new FormData();
        formData.append("razorpay_order_id", response.razorpay_order_id);
        formData.append("razorpay_payment_id", response.razorpay_payment_id);
        formData.append("razorpay_signature", response.razorpay_signature);
        formData.append("vendor_gst", vendorGst);
        formData.append("name", name);
        formData.append("email", email);
        formData.append("mobile", mobile);
        formData.append("package_type", "{{ $packageType }}");
        formData.append("package_name", "{{ $package->package_name }}");
        formData.append("base_price", "{{ $base_amount }}");
        formData.append("payment_term", "{{ $paymentType }}");
        formData.append("gst_amount", "{{ $gst_amount }}");
        formData.append("gst_rate", "{{ $package->gst_rate }}");
        formData.append("total_amount", "{{ $amount }}");

        // Get the file from the file input field
        let fileInput = document.getElementById("file");
        if (fileInput && fileInput.files.length > 0) {
            formData.append("file", fileInput.files[0]);  // Append file if selected
        }

        fetch("{{ route('payment.process') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData // Send formData instead of JSON
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Redirect to success page
                window.location.href = data.redirect_url;
            } else {
                // Show error message
                alert("Payment failed: " + data.message);
                window.location.href = data.redirect_url;
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An unexpected error occurred. Please try again.");
        });
    },
    prefill: {
        name: name,
        email: email,
        contact: mobile
    },
    theme: {
        color: "#ff7529"
    }
};

                const rzp = new Razorpay(options);
                rzp.open();
            });
        </script>

    </div>

</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .custom-file-upload {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ff4d4d;
        /* Red button */
        color: white;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }
</style>
@stop