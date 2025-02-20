@extends('front_layouts.master')
@section('content')

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
                <td style="padding: 8px; border: 1px solid #ddd;">Total Amount Include with GST:</td>
                <td style="padding: 8px; border: 1px solid #ddd;">₹{{ number_format($amount, 2) }}</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="container">
        <form id="paymentForm" action="{{ route('payment.process') }}" method="POST">
            @csrf

            <!-- Hidden Inputs for Package Details -->
            <input type="hidden" name="package_type" value="{{ $packageType }}">
            <input type="hidden" name="package_name" value="{{ $package->package_name }}">
            <input type="hidden" name="base_price" value="{{ number_format($base_amount, 2) }}">
            <input type="hidden" name="payment_term" value="{{ $paymentType }}">
            <input type="hidden" name="gst_amount" value="{{ $gst_amount }}">
            <input type="hidden" name="gst_rate" value="{{ $package->gst_rate }}">
            <input type="hidden" name="total_amount" value="{{ number_format($amount, 2) }}">

            <!-- User Information Form -->
            <div class="form-group">
                <input type="text" id="name" name="vendor_gst" class="form-control" placeholder="Enter your GST No.">
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

            <div class="form-group">
                <input type="file" id="file" name="file" class="form-control" >
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mt-3">Proceed for payment</button>
            </div>
        </form>
    </div>
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop