@extends('front_layouts.master')
@section('content')
<!-- Project Area  -->
<!--==============================
Event Area  
==============================-->
<section class="space-top space-extra2-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-lg-8">
                <div class="course-single">
                    <div class="course-single-top">
                        <div class="course-img">
                            <img src="{{asset('assets/img/law.png')}}" alt="law">
                            <!-- <span class="tag"><i class="fas fa-clock"></i> 03 WEEKS</span>
                            <span class="tag bg-theme">BEST SELLER</span> -->
                        </div>
                        <div class="course-meta style2">
                            <!-- <span><i class="fal fa-file"></i>Lesson 8</span> -->
                            <span><i class="fal fa-user"></i>Students 600+</span>
                            <span><i class="fal fa-chart-simple"></i>Premium</span>
                        </div>
                        <h2 class="course-title">Law & Management Counseling & Guidance Services (2025-26).</h2>
                        <h3 class="course-title"> What We Offer:</h3>
                        <p>Our Law & Management Counseling Services are designed to help you navigate the competitive admission processes for top universities and programs. Whether you are pursuing a degree in law or management, our expert guidance ensures you secure a spot in the best-fit program for your career aspirations.</p>
                        <a href="{{route('video-meeting-counselling')}}"> <img class="mb-3" src="{{ asset('assets/img/2.png') }}" alt="#"></a>
                        <strong>Available Courses & Specializations: </strong> <strong>Law Programs: </strong> <strong> Course Specializations</strong>
                        <ul>
                            <li>5-Year Integrated LLB General Law, Corporate Law, Criminal Law, International Law, Human Rights Law</li>
                            <li>3-Year LLB General Law, Criminal Law, Family Law, Civil Law, Taxation Law</li>
                            <li> LLM (Master of Laws) Constitutional Law, Corporate Law, Criminal Law, International Law, Environmental Law</li>
                        </ul>

                        <strong>Management Programs: Course Specializations</strong>
                        <ul>
                            <li>MBA (Master of Business Administration) General Management, Finance, Marketing, HR, Operations, IT Management, Entrepreneurship.</li>
                            <li>PGDM (Post Graduate Diploma in Management) Marketing, Finance, HR, Strategy, Operations, Business Analytics.</li>
                            <li>Executive MBA Leadership, Strategic Management, International Business, Marketing.</li>
                            <li>PhD in Management Business Strategy, Organizational Behavior, Marketing, Finance, HR.</li>
                        </ul>
                        <a href="{{ route('enquiry-form') }}" target="_blank">
                            <img src="{{ asset('assets/img/bg/law.gif') }}" alt="GIF Preview" width="100%" class=" mb-1">
                        </a>
                        <strong>How to Apply for Counseling Services:</strong>

                        <ul>
                            <li> <strong> Online Application: </strong> Apply through the link provided by our counselor or directly on our website.</li>
                            <li><strong>Mobile App: </strong> Use the "Bodmas Education" app for seamless application submission.</li>
                            <li> <strong> Walk-In: </strong> Visit our Noida office to complete the application form in person.</li>
                            <li><strong>Google Form: </strong>Complete the Google form to apply for our Law & Management counseling services.</li>
                            <li> <strong> Email Submission: </strong> Send your required documents and signed service booking form via email.</li>
                        </ul>
                        <p> <strong> Tailored Packages for Your Needs:</strong>
                            We offer a range of packages suited to your requirements and budget. Select the package that best fits your career goals, and our team will assist you throughout the process.
                            <strong> Let Us Help You Achieve Your Career Goals: </strong>
                            With our expert guidance, you can confidently pursue a successful career in Law or Management. Let us manage the complexities while you focus on your academic and professional future.
                            Book your counseling services today and take the first step toward a successful career in Law or Management!
                        </p>


                    </div>
                    <!-- //////////// -->
                    <div class="widget widget_categories style2">
                        <h3 class="widget_title text-center">Talk to Our Expert Counsellor
                        </h3>
                        <form id="enquiryForm" method="POST" class="p-3 shadow rounded bg-white">
                            @csrf
                            <input type="hidden" id="typeEnquiry" name="type" value="2">
                            <div class="mb-3">
                                <input type="text" id="nameEnquiry" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" id="emailEnquiry" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" id="numberEnquiry" name="number" class="form-control" placeholder="Number" required pattern="[0-9]{10}">
                            </div>
                            <div class="mb-3">
                                <select name="subject" id="subject" class="form-select" required>
                                    <option value="" disabled selected hidden>Select Course*</option>
                                    <option value="mbbs">MBBS</option>
                                    <option value="bds">BDS</option>
                                    <option value="bums">BUMS</option>
                                    <option value="bhms">BHMS</option>
                                    <option value="btech">B.Tech</option>
                                    <option value="mba">MBA</option>
                                    <option value="law">LAW</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea id="messageEnquiry" name="message" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                    <div class="course-img" id="section1">
                        <img src="{{asset('assets/img/bg/law.png')}}" alt="law Guidance">
                    </div>
                    <div class="course-single-bottom">
                        <ul class="nav course-tab" id="courseTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#Coursedescription" role="tab" aria-controls="Coursedescription" aria-selected="true"><i class="fa-regular fa-bookmark"></i>Basic Package</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="curriculam-tab" data-bs-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false"><i class="fa-regular fa-book"></i>Premium Package</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="instructor-tab" data-bs-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false"><i class="fa-regular fa-user"></i>NRI Package</a>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"><i class="fa-regular fa-star-sharp"></i>Reviews</a>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="productTabContent">
                            <div class="tab-pane fade show active" id="Coursedescription" role="tabpanel" aria-labelledby="description-tab">
                                <div class="course-description">
                                    <h6> Bodmas Basic Paid Counselling Guidance fee for Law & Management </h6>
                                    <p>AIQ + state government colleges in any two states of your choice</p>
                                    <strong><del style="color:red">30,000 INR + GST </del> &nbsp; {{$package->basic_fee}} INR + GST (@18%)</strong>
                                    <b>Services Included are:</b>

                                    <div class="row mt-25">
                                        <div class="col-lg-6">
                                            <div class="checklist mb-4">
                                                <ul>
                                                    <li>Get 24/7 support via WhatsApp messages for any queries.</li>
                                                    <li>Provide Counselling for two States to choose the best college based on preferences and budget.</li>
                                                    <li> Get personalized advice on choosing colleges based on your rank and budget.</li>
                                                    <li> Receive guidance on procuring necessary certificates like Domicile, EWS, GAP, etc.</li>
                                                    <li>Guidance on Required Certificates such as domicile, category, minority, gap year, EWS, physically challenged, and NRI.</li>
                                                    <li>State-Wise List of Top Colleges for law and management programs.</li>
                                                    <li> We ensure the safety and proper handling of your security deposit.
                                                    <li>Round-Wise Strategy and Counselling to secure your seat.</li>
                                                    <li> Get a clear strategy for each round of the counselling process.</li>
                                                    <li> Expert help with choice filling during every round of counselling.</li>
                                                    <li> Merit list and seat matrix will be discussed with both students and parents.</li>
                                                    <li> Choice Filling Assistance for every round of counselling. </li>
                                                    <li> Guidance for Mop-Up and Stray Vacancy Rounds.</li>
                                                    <li>Clear Explanation of Refund Policy for security deposits.</li>
                                                    <li>Documentation Support during the reporting process at allotted colleges.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checklist">
                                                <ul>
                                                    <li>Safety of security deposit will be our responsibility.</li>
                                                    <li>State wise list of top Government will be provided.</li>
                                                    <li>Round wise Strategy to proceed with the counselling.</li>
                                                    <li>Choice filling support during every round from our experts.</li>
                                                    <li>Merit list and seat matrix will be discussed with parents and student during all round of counselling.</li>
                                                    <li>Choice filling preferences for all rounds will be done under guidance of Ashok Sir.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color: red;"> Registration fees & security deposit (if applicable) will be paid by parent only.
                                        NOTE: 10% off on all services for Army/ Police/ siblings / single parent.</p> <br><br>
                                    <div class="row">
                                        <div class="col-sm-4 package">
                                            <h5>Basic Package</h5>
                                            <p>{{$package->basic_fee}} INR + GST </p><br>
                                            <a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']),'installment'=>'basic'] )}}" class="btn btn-primary th-btn">Book Now</a>
                                        </div>
                                        <div class="col-sm-4"> </div>
                                        <div class="col-sm-4"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="course-curriculam">
                                    <h6>Bodmas Premium Paid Counselling Guidance for Law & Management – </h6>
                                    <del style="color: red;">60000 INR + GST </del> &nbsp; {{$package->premium_fee}} INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                            <li>24/7 Query Support via WhatsApp messages (Calls not included).</li>
                                            <li>Multi-State Counselling Guidance as per candidate preference.</li>
                                            <li>Mock Tests & Preparation Support through our mobile app.</li>
                                            <li>Previous Year Cutoff Data for both Government and Private Colleges, tailored to student requirements.</li>
                                            <li>College Selection Strategy based on score, budget, and career prospects.</li>
                                            <li>Guidance on Essential Documents such as Domicile, Category, Minority, GAP, EWS, Physically Challenged, and NRI certificates.</li>
                                            <li>Detailed College Analysis covering Seat Matrix, Placements, and Fee Structures.</li>
                                            <li>Security Deposit Protection—ensuring transparency and safety.</li>
                                            <li>Court Case Updates related to fees, seats, domicile, or eligibility criteria.</li>
                                            <li>State-wise List of Top Law & Management Colleges for better decision-making.</li>
                                            <li>Round-wise Counselling Strategy to maximize seat allotment chances.</li>
                                            <li>Expert Choice Filling Support during every round.</li>
                                            <li>Regular Merit List & Seat Matrix Discussions with students and parents.</li>
                                            <li>Choice Filling Supervision under the expert guidance of Ashok Sir.</li>
                                            <li>Guidance for Mop-Up & Stray Vacancy Rounds, including physical reporting instructions.</li>
                                            <li>Security Deposit Refund Policies explained in detail.</li>
                                            <li>Documentation Assistance during college reporting.</li>
                                            <li>Expert Video Consultations after every counselling round.</li>
                                        </ul>

                                    </div>
                                    <div class="row mt-5 ">
                                        <!-- <div class="col-sm-4 package">
                                            <h5>First installment </h5>
                                            <p>{{$package->first_installment}} INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-1']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="col-sm-4 package">
                                            <h5>Second Installment</h5>
                                            <p>{{$package->second_installment}} INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-2']) }}" class="btn btn-primary">Book Now</a>
                                        </div> -->
                                        <div class="col-sm-4 package">
                                            <h5>Final Booking</h5>
                                            <p>{{$package->premium_fee}} INR + GST </p><br>
                                            <a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']),'installment' => 'premium']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="course-curriculam">
                                    <h6>Bodmas NRI Paid Counselling Guidance fee for Law & Management</h6>
                                    <p>Our Services offer top notch planning, documentation support, and technical assistance for NRI/ sponsored candidates</p>
                                    <p> <del style="color: red;"> 1,00000 INR + GST </del> &nbsp; {{$package->nri_fee}} INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                            <li>Multi-Channel Communication via SMS, WhatsApp, email, and one-on-one voice/video calls.</li>
                                            <li>Counselling Across Multiple States based on candidate preferences.</li>
                                            <li>24/7 Alerts & Notifications for crucial admission-related updates, deadlines, and notices.</li>
                                            <li>Timely Updates on Law & Management Counselling Notifications.</li>
                                            <li>Guidance on Admission Procedures for multiple state-level and university-specific counselling processes.</li>
                                            <li>Guaranteed Refund Policy if admission is not secured by the final deadline.</li>
                                            <li>Most Affordable Fee Packages for Management Quota, NRI, and other reserved quota seats.</li>
                                            <li>Comprehensive Score-Based Analysis to identify the best-fit colleges within the candidate's budget.</li>
                                            <li>Personalized Counselling Support with a dedicated expert and a 3-level assistance system.</li>
                                            <li>Exclusive Seat Availability Updates for Mop-Up, Offline, and Stray Vacancy Rounds.</li>
                                            <li>Expert Assistance for NRI Candidates in ensuring proper documentation, understanding NRI fee structures, and compliance with regulations.</li>
                                            <li>Guidance on the Least Expensive Admission Options for NRI and Management Quota seats.</li>
                                        </ul>

                                        <p style="color: red;">10% off on all services for Army/ Police/ siblings / single parent.</p>
                                        <div class="row">
                                            <div class="col-sm-4 package">
                                                <h5>First installment </h5>
                                                <p>{{$package->first_installment_premium}} INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri-1']) }}" class="btn btn-primary">Book Now</a>
                                            </div>
                                            <div class="col-sm-4 package">
                                                <h5>Second Installment</h5>
                                                <p>{{$package->second_installment_premium}}INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri-2']) }}" class="btn btn-primary">Book Now</a>
                                            </div>
                                            <div class="col-sm-4 package">
                                                <h5>Final Booking</h5>
                                                <p>{{$package->nri_fee}} INR + GST </p><br>
                                                <a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri']) }}" class="btn btn-primary">Book Now</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_info">
                        <!-- <div class="th-video">
                            <img src="assets/img/widget/video_1.jpg" alt="video">
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                        </div> -->
                        <span class="h4 course-price">{{$package->basic_fee}} <span class="tag"></span></span>
                        <a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']),'installment'=>'basic'] )}}" class="btn btn-primary th-btn">Buy Now</a>
                        <h3 class="widget_title">Package Information</h3>
                        <div class="info-list">
                            <ul>
                                <li>
                                    <i class="fa-light fa-user"></i>
                                    <strong>Instructor: </strong>
                                    <span>Ashok Singh</span>
                                </li>
                            </ul>
                            <a href="{{route('contact')}}"> <img class="mt-5 mb-5" src="{{ asset('assets/img/10.jpg') }}" alt="#"> </a>
                        </div>
                        <a href="#" class="th-btn style6 mt-35 mb-0"><i class=""></i></a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <p style="color: red;"><strong>If you face any issues with the payment or other issue, please fill out the form. <a href="{{route('enquiry-form')}}">Click Now</strong></a></p>
            <p>At Bodmas Education Services, your dreams are our mission. Founded with the goal of empowering students and professionals to achieve academic and career success, we specialize in providing expert educational consultancy services. With over 20 employees and multiple branches across India, including Gorakhpur and Hisar, we are committed to guiding students through every step of their educational journey.</p>
            <h5>What We Do</h5>
            <p>We offer personalized counseling for medical admissions, including Engineering, MBBS, NBE Diploma, and other healthcare programs, ensuring that students make informed decisions. Additionally, our platform provides accurate, up-to-date information on cutoffs, rankings, and college admissions through detailed content on YouTube and regular updates on Telegram, Instagram, and WhatsApp.</p>
            <h5>Our Branches and Reach</h5>
            <p>We are proud to extend our services nationwide with key operations in Gorakhpur, Hisar, and Noida. Through our online presence, students from across India can access our expertise.</p>
            <h5>Why Choose Us?</h5>
            <ul>
                <li>Expert Guidance: 20+ years of industry experience</li>
                <li>Comprehensive Support: From counseling to loan assistance</li>
                <li>Trusted Partners: Collaboration with financial institutions for educational loans</li>
                <li>Technology-Driven: Online consultations and real-time updates</li>
            </ul>
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
            <a href="{{route('contact')}}"> <img class="mt-5 mb-5" src="{{ asset('assets/img/3.png') }}" alt="#> </a>
        </div>
    </div>
</section>
<!--==============================
Servce Area  
==============================-->
<br><br>
<section class=" space" data-bg-src="assets/img/bg/course_bg_1.png" id="course-sec">
                <div class="container">
                    <div class="mb-35 text-center text-md-start">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-8">
                                <div class="title-area mb-md-0">
                                    <span class="sub-title"><i class="fal fa-book me-2"></i> Paid Guidance</span>
                                    <h2 class="sec-title">Our Popular Paid Guidance</h2>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <a href="{{ route('all-paid-guidance') }}" class="th-btn">View All Paid Guidance <i class="fa-solid fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row slider-shadow th-carousel course-slider-1"
                        data-slide-show="4"
                        data-ml-slide-show="3"
                        data-lg-slide-show="3"
                        data-md-slide-show="2"
                        data-sm-slide-show="1"
                        data-arrows="true">
                        <!-- Dynamic Content -->
                        @foreach($paidPackages as $package)
                        <div class="col-md-6 col-lg-4">
                            <div class="course-box">
                                <div class="course-img">
                                    <a href="{{ url($package['url']) }}">
                                        <img src="{{ asset('images/paid_package/' . $package['image']) }}" alt="{{ $package['package_name'] }}">
                                    </a>
                                </div>
                                <div class="course-content">
                                    <h3 class="course-title">
                                        <a href="{{ url($package['url']) }}">{{ $package['package_name'] }}</a>
                                    </h3>
                                    <p>{{ $package['description'] }}</p>
                                    <div class="course-price">
                                        <span class="base-price">₹{{ number_format($package['base_price'], 2) }}</span> +
                                        <span class="gst">(GST ₹{{ number_format($package['gst_amount'], 2) }})</span>
                                        <strong class="total-price">Total: ₹{{ number_format($package['total_price'], 2) }}</strong>
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
<!--==============================
Footer Area
==============================-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Enquiry Form 

    $('#enquiryForm').on('submit', function(e) {
        e.preventDefault();
        let formData = {
            name: $('#nameEnquiry').val(),
            email: $('#emailEnquiry').val(),
            number: $('#numberEnquiry').val(),
            subject: $('#subject').val(),
            message: $('#messageEnquiry').val(),
            type: $('#typeEnquiry').val(),
            _token: $('input[name="_token"]').val(), // CSRF token
        };
        $.ajax({
            url: "{{ route('enquiry.contact') }}", // Adjust the route name if needed
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Enquiry submitted successfully!');
                    $('#enquiryForm')[0].reset(); // Reset the form
                } else {
                    alert('Failed to submit enquiry: ' + response.error);
                }
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>
@stop

<style>
    .package {
        background: #0d5ef4;
        /* Light green gradient */
        border: 1px solid #81c784;
        /* Subtle border for the package card */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
        /* Soft shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        /* Smooth transition on hover */
        padding: 20px;
        /* Padding inside the card */
        text-align: center;
        /* Center the content */
    }


    .package:hover {
        transform: translateY(-5px);
        /* Lift the card slightly on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15), 0 3px 6px rgba(0, 0, 0, 0.1);
        /* Intensified shadow */
        background: #3498db;
        /* Lighter green on hover */

    }

    .package h5 {
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 10px;
    }

    .package p {
        font-size: 16px;
        color: #fff;
        /* Red color for pricing */
        margin-bottom: 15px;
    }

    .package .th-btn.style4 {
        display: inline-block;
        padding: 10px 20px;
        background: #3498db;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .package .th-btn.style4:hover {
        background: #2980b9;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .package {
            margin-bottom: 20px;
        }
    }
</style>