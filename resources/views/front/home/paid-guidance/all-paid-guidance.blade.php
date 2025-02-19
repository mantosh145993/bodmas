@extends('front_layouts.master')
@section('content')
<!-- Project Area  -->
<!--==============================
Event Area  
==============================-->
<section class="container">
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/paid.jpg" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="assets/img/bg/breadcumb_shape_1_2.png" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="assets/img/bg/breadcumb_shape_1_3.png" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Bodmas Paid Guidance</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Paid Guidance</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <!-- Section Title -->
        <div class="mb-4 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8 text">
                    <h4>Our All Popular Paid Guidance Packages</h4>
                </div>
            </div>
        </div>
        <!-- Course List -->
        <div class="row">
            @foreach($paidPackages as $package)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="course-box h-100">
                    <!-- Course Image with Link -->
                    <div class="course-img text-center">
                        <a href="{{ url($package['url']) }}">
                            <img src="{{ asset('images/paid_package/' . $package['image']) }}" alt="{{ $package['package_name'] }}" class="img-fluid" style="width: 70%; height: 250px;">
                        </a>
                    </div>


                    <!-- Course Content -->
                    <div class="course-content p-3 text-center">

                        <!-- Course Title -->
                        <h3 class="course-title mb-2">
                            <a href="{{ url($package['url']) }}">{{ $package['package_name'] }}</a>
                        </h3>

                        <!-- Course Description -->
                        {{ $package['description'] }}

                        <!-- Course Price -->
                        <div class="course-price">
                            <span class="base-price">₹{{ number_format($package['base_price'], 2) }}</span> +
                            <span class="gst">(GST ₹{{ number_format($package['gst_amount'], 2) }})</span>
                            <strong class="total-price d-block mt-1">Total: ₹{{ number_format($package['total_price'], 2) }}</strong>
                        </div>
                        <!-- Book Now Button -->
                        <div class="text-left">
                            <a href="{{ url($package['url']) }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <!-- <h5>How to Book Our Paid Counselling Services for Nursing & Pharmacy Admissions</h5>
            <p>At Bodmas Education, we are committed to delivering top-quality services with a 100% success ratio. To maintain this standard, we accept a limited number of bookings on a first-come, first-served basis. We prioritize students whose requirements align with our expertise to ensure that we meet their expectations with complete satisfaction.</p> -->
            <h5>Ways to Apply for Our Counselling Services</h5>
            <ol>
                <li><strong>Apply via the Bodmas Paid Guidance Link on our Website:</strong>
                    <p>Use the unique link shared by our career Advisors or visit our official website to apply directly for our services.</p>
                </li>
                <li><strong>Apply through the Bodmas Education Mobile App:</strong>Download the “Bodmas Education” app on your smartphone for easy and quick access to our services.</li>
                <li><strong>Walk-In Application at Our Noida Office:</strong> Visit our Noida office to meet our team in person. You can fill out the application form on-site and book your service package. </li>
                <li><strong>Fill the Google Form:</strong> Complete the Google form provided by our team and submit it to apply for our counselling services.</li>
                <li><strong>Email Submission:</strong> Email all required documents, along with the duly filled and signed service booking form, as instructed by our counselor. </li>
            </ol>
            <h5>Payment & Service Confirmation</h5>
            <ul>
                <li> <strong>Receive a Payment Receipt: </strong> After making the payment, you will receive an official payment receipt.</li>
                <li><strong>Relax While We Handle Everything:</strong> Once your payment is confirmed, our team will take over the entire counselling process on your behalf, ensuring a smooth and successful admission journey.
                </li>
            </ul>
            <h5>Need Assistance? </h5>
            <p>If you encounter any issues while booking, feel free to <b> contact our support team. </b> We are happy to assist you with any queries or technical difficulties.</p>
            <h5>Get Started with Bodmas Education Today!</h5>
            <p>Choosing the right nursing or pharmacy program can shape your entire career. At Bodmas Education, we simplify the admission process and ensure you receive the <b> best guidance and support </b> to get into the right college.</p>
            <p>With our <b> paid counselling services </b>, you can focus on your education while we take care of the paperwork, form submissions, and counseling procedures. Select the <b> package that suits you best, </b> and let us help you achieve your academic goals effortlessly.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h5>Bodmas Education Services – Payment Details</h5>
                <p>Secure Your Future, Start Today!</p>
                <h6>Bank Payment</h6>
                <ul>
                    <li> <strong>Beneficiary Name : </strong> BODMAS EDUCATION SERVICES PRIVATE LIMITED</li>
                    <li> <strong>Bank Name : </strong> ICICI Bank </li>
                    <li> <strong>Account Type : </strong> Current</li>
                    <li> <strong>Account No : </strong> 157805009329</li>
                    <li> <strong>IFSC Code : </strong> ICIC0001578</li>
                    <li> <strong>Branch Address : </strong> Z-169, Ground Floor Sector-12 Noida Uttar Pradesh – 201301</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h5>UPI Payment Options</h5>
                <ul>
                    <li><strong>Paytm UPI : </strong> 9511626721</li>
                    <li><strong>Paytm QR Code : </strong> (Scan the QR code for instant payment) </li>
                </ul>
                <img src="{{asset('assets/img/icici.jpg')}}" alt="ICICI Guidance" style="width: 400px; height:200px;">
            </div>
        </div>
    </div>
</section>
@stop