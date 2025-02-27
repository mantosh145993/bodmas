@extends('front_layouts.master')

@section('content')
<style>
    /* Heading styling */
    h3 {
        color: #1f2937;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }



    /* Table styling */
    .table {
        margin-top: 20px;
    }

    .table th {
        background-color: #f9fafb;
        font-weight: bold;
        color: #1f2937;
    }

    .table th,
    .table td {
        /* padding: 12px; */
        border: 1px solid #e5e7eb;
        /* font-size: large; */
    }

    .table td {
        color: #000;
    }

    /* Button styling */
    .btn-primary {
        display: inline-block;
        margin-top: 20px;
        background-color: #2563eb;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    /* CSS */
    .large-font-list li {
        font-size: 1.2rem;
        /* Adjust as needed */
        color: #000;
    }

    .checkmark {
        color: green;
        /* Set the color to green */
        margin-right: 8px;
        /* Space between the checkmark and text */
    }


    /* CSS for Success Circle Icon */
    .success-circle {
        background-color: #28a745;
        /* Green background for success */
        border-radius: 50%;
        /* Circular shape */
        color: white;
        font-size: 50px;
        display: inline-block;
        padding: 20px;
        width: 80px;
        height: 80px;
    }

    .success-circle i {
        line-height: 40px;
        /* Center the checkmark icon vertically */
    }



    .large-font-list li {
        font-size: 1.2rem;
    }

    .table {
        margin-top: 20px;
    }

    .table th {
        background-color: #f8f9fa;
        /* Light gray for table headers */
    }

    .table td {
        font-size: 1.1rem;
    }

    .table tr:nth-child(even) {
        background-color: #f1f1f1;
        /* Alternate row color */
    }

    .btn-success {
        background-color: #28a745;
        /* Green button */
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    p {
        font-size: 1.1rem;
    }
</style>

<section>
    <div id="payment-receipt" class="container">
        <div class="row text-center mb-3">
            <!-- Logo -->
            <div class="col-12 mt-5">
                <h2>Bodmas Education Services Pvt. Ltd.</h2>
                <p style="color: #000;">Z -169 Ground Floor, Sector 12, Noida, Uttar Pradesh 201301</p>
            </div>
            <!-- Text -->
            <div class="col-12">
                <h3 style="margin-top: 10px; color: #000;">Payment Receipt!</h3>
            </div>
        </div>

        <table class="table table-bordered" id="payment-table">
            <div class="row container">
                <div class="col-sm-4">
                    <h6 style="color: #000;" class="ml-20">From</h6>
                    <h6 style="font-weight: bold; color: #000;" class="ml-20">BESPL</h6>
                    <ul class="large-font-list">
                        <li>Mo: 9511626721</li>
                        <li>Email: educationbodmas@gmail.com</li>
                        <li>Transaction Mode: Online</li>
                        <li>GSTIN: 09AAHCB9234H1ZG</li>
                        <li>Transaction Amount: INR {{ number_format($payment->amount, 2) }}</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h6 style="color: #000;" class="ml-20">To</h6>
                    <h6 style="font-weight: bold; color: #000;" class="ml-20">{{ $payment->customer_name }}</h6>
                    <ul class="large-font-list">
                        <li>Receipt No. {{ $payment->id }}</li>
                        <li>Date: {{ $payment->created_at->format('d-m-Y H:i:s') }}</li>
                        <li>GSTIN: {{ $payment->vendor_gst ? $payment->vendor_gst : 'N/A' }}</li>
                        <li>Bill To: {{ $payment->customer_name ? $payment->customer_name : 'N/A' }}</li>
                        <li>Mo: {{ $payment->number ? $payment->number : 'N/A' }}</li>
                    </ul>
                </div>
                <!-- Logo Section -->
                <div class="col-sm-4 d-flex justify-content-center align-items-center">
                    <img style="width: 200px; height: 200px;" src="{{asset('assets/img/logo1.png')}}" alt="Bodmas">
                </div>
            </div>
            @if(isset($payment->product_name ) && $payment->product_name )
            <tr>
                <th style="background-color: #f8f9fa;">Product (Course/Paid Guidance/Paid CutOff/Mentorship Program)</th>
                <td>{{ $payment->product_name }}</td>
            </tr>
            @endif
            @if(isset($payment->package_type ) && $payment->package_type )
            <tr>
                <th style="background-color: #f8f9fa;">Package Type</th>
                <td>{{ $payment->package_type }}</td>
            </tr>
            @endif
            @if(isset($payment->payment_type ) && $payment->payment_type )
            <tr>
                <th style="background-color: #f8f9fa;">Payment Term</th>
                <td>{{ $payment->payment_type }}</td>
            </tr>
            @endif
            @if(isset($payment->payment_id ) && $payment->payment_id )
            <tr>
                <th style="background-color: #f8f9fa;">Payment ID</th>
                <td>{{ $payment->payment_id }}</td>
            </tr>
            @endif
            @if(isset($payment->order_id ) && $payment->order_id )
            <tr>
                <th style="background-color: #f8f9fa;">Order ID</th>
                <td>{{ $payment->order_id }}</td>
            </tr>
            @endif
            @if(isset($payment->price ) && $payment->price )
            <tr>
                <th style="background-color: #f8f9fa;">Base Price</th>
                <td>INR {{ number_format($payment->price) }}</td>
            </tr>
            @endif
            @if(isset($payment->gst ) && $payment->gst )
            <tr>
                <th style="background-color: #f8f9fa;">GST</th>
                <td>{{ number_format($payment->gst) }} %</td>
            </tr>
            @endif
            @if(isset($payment->gst_amount ) && $payment->gst_amount )
            <tr>
                <th style="background-color: #f8f9fa;">GST Amount</th>
                <td>INR {{ number_format($payment->gst_amount, 2) }}</td>
            </tr>
            @endif
            @if(isset($payment->amount ) && $payment->amount )
            <tr>
                <th style="background-color: #f8f9fa;">Amount</th>
                <td>INR {{ number_format($payment->amount, 2) }}</td>
            </tr>
            @endif
            @if(isset($payment->payment_status ) && $payment->payment_status )
            <tr>
                <th style="background-color: #f8f9fa;">Status</th>
                <td style="color: #28a745; font-weight: bold;">{{ ucfirst($payment->payment_status) }}</td>
            </tr>
            @endif
            @if(isset($payment->file) && $payment->file)
            @php
            $filePath = asset('images/discount/' . $payment->file);
            $fileExists = file_exists(public_path('images/discount/' . $payment->file));
            @endphp

            <tr>
                <th style="background-color: #f8f9fa;">Discount Certificate</th>
                @if($fileExists)
                <td style="color: #28a745; font-weight: bold;">
                    @if(Str::endsWith($payment->file, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ $filePath }}" alt="Discount Certificate" style="width: 150px; height: 50px; object-fit: cover; border-radius: 5px;">
                    @elseif(Str::endsWith($payment->file, ['pdf']))
                    <a href="{{ $filePath }}" target="_blank" style="color: blue; font-weight: bold;">View PDF</a>
                    @else
                    <a href="{{ $filePath }}" download style="color: green; font-weight: bold;">Download File</a>
                    @endif
                </td>
                @else
                <td style="color: red; font-weight: bold;">File Not Found</td>
                @endif
            </tr>
            @else
            <tr>
                <th style="background-color: #f8f9fa;">Discount Certificate</th>
                <td style="color: red; font-weight: bold;">No file uploaded</td>
            </tr>
            @endif

            @if(isset($payment->created_at ) && $payment->created_at )
            <tr>
                <th style="background-color: #f8f9fa;">Date</th>
                <td>{{ $payment->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            @endif
            @if(isset($cutOffData) && $cutOffData)
            <tr>
                <th style="background-color: #f8f9fa;">Paid Cutoff</th>
                <td style="color: #28a745; font-weight: bold;">
                    <a href="{{ asset('images/package/package_pdf/' . $cutOffData->file) }}" download="{{ $cutOffData->file }}">
                        Download CutOff
                    </a>
                </td>
            </tr>
            @endif

        </table>
        <!-- Success Circle Logo -->
        <!-- Success Circle Logo and Text -->
        <div class="col-12 mt-3 text-center ">
            <div class="success-circle">
                <i class="fa fa-check-circle"></i>
            </div>
            <h4 class="mt-2" style="color: #28a745;">Payment Successful</h4>
            <p style="color: #000; font-weight: bold;">
                <strong>Note: </strong>This is a computer-generated payment receipt and does not require a signature.
            </p>
        </div>

        <button class="btn btn-success" onclick="downloadPDF()">Download PDF</button>
    </div>


</section>
<!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script>
    function downloadPDF() {
        const container = document.getElementById('payment-receipt');
        const downloadButton = container.querySelector('button'); // Select the button

        // Temporarily hide the button
        if (downloadButton) {
            downloadButton.style.display = 'none';
        }

        // Generate the PDF
        html2canvas(container, {
            scale: 2
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const {
                jsPDF
            } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');

            // Calculate the width and height of the image to fit the page
            const imgWidth = 190; // PDF width (A4) minus margins
            const pageHeight = 297; // A4 page height
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Add the image to the PDF
            let position = 0;
            pdf.addImage(imgData, 'PNG', 10, position + 10, imgWidth, imgHeight);

            // Save the PDF
            pdf.save('payment_receipt.pdf');
        }).finally(() => {
            // Restore the button visibility
            if (downloadButton) {
                downloadButton.style.display = '';
            }
        });
    }
</script>
@stop