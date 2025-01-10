@extends('front_layouts.master')
@section('content')
    <div class="container">
        <h3>Proceed to Pay</h3>
         <!-- Package Details in a Table -->
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
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $packageType }} </td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">Package:</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $package->package_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">Base Price:</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($base_amount, 2) }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">Payment Term:</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $paymentType }} </td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">GST:</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $package->gst_rate }} %</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">Total Amount:</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($amount, 2) }}</td>
                </tr>
            </tbody>
        </table>
        
        <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
            @csrf
            
            <input type="hidden" name="order_id" value="{{ $razorpayOrder->id }}">
            <input type="hidden" name="product_name" value="{{ $package->package_name }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="gst" value="{{ $package->gst_rate }}">
            <input type="hidden" name="gst_amount" value="{{ $package->gst_amount }}">
            <input type="hidden" name="price" value="{{ $amount }}">

              <!-- GST Field -->
              <div class="form-group">
                <!-- <label for="name">GST Number <span style="color: red;">Optional</span></label> -->
                <input type="text" name="vendor_gst" id="name" class="form-control" placeholder="Enter your GST Number">
            </div>

              <!-- Name Field -->
            <div class="form-group">
                <!-- <label for="name">Full Name <span style="color: red;">*</span></label> -->
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <!-- Number Field -->
            <div class="form-group">
                <!-- <label for="number">Mobile Number <span style="color: red;">*</span></label> -->
                <input type="tel" name="number" id="number" class="form-control" placeholder="Enter your mobile number" pattern="[0-9]{10}" maxlength="10" required>
            </div>
         
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ $key }}"
                data-amount="{{$razorpayOrder->amount}}"
                data-currency="INR"
                data-order_id="{{ $razorpayOrder->id }}"
                data-buttontext="Pay Now"
                data-name="{{ $package->package_name }}"
                data-description="Payment for {{ $package->package_name }}"
                data-image="{{ asset('assets/img/Logo.jpg') }}"
                data-prefill.name="Bodmas"
                data-prefill.email="bodmaseducation@gmail.com"
                data-theme.color="#F37254">
            </script>
        </form>
    </div>
    <style>
        /* Custom styles for Razorpay button */
        .razorpay-payment-button {
            background-color: #0D5EF4 !important;  /* Set background color */
            color: white !important;  /* Text color */
            width: 200px;
            margin-top: 10px;
        }

        /* Hover effect */
        .razorpay-payment-button:hover {
            background-color: #F14F3E !important;  /* Darker shade for hover */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);  /* Add subtle shadow on hover */
        }
    </style>
@stop
