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
                    <div class="course-img text-center">
                        <a href="#section1">
                            <img src="{{ asset('assets/img/mbbs.png') }}" alt="MBBS" class="img-fluid w-100">
                        </a>
                    </div>
                        <div class="course-meta style2">
                            <span><i class="fal fa-user"></i>Students 1600+</span>
                            <span><i class="fal fa-chart-simple"></i>Premium</span>
                        </div>
                        <h2 class="course-title">Helping Students in making their career.</h2>
                        <div class="container mt-5">
                        <a href="{{url('video-meeting-counselling')}}"> <img src="{{asset('assets/img/MBBS AIQ.gif')}}" alt="MBBS AIQ"> </a>
                        </div>
                        <h3 class="course-title"> Unlock Your Future with Expert MBBS Admission Counselling & Guidance Services for 2025-26</h3>
                        <strong>What Is the Need of Our Paid Counselling Services?</strong>
                        <p>Choosing the right career path is one of the most important decisions you’ll ever make. If you're aiming for an MBBS degree, the admission process can be complex and overwhelming. That’s where we come in. Our <strong> MBBS Admission Counselling & Guidance Services </strong> are designed to streamline your journey, ensuring you make informed decisions and secure a place at your dream college. Let us help you unlock the doors to a successful medical career!</p>
                        <a href="{{route('video-meeting-counselling')}}"> <img class="mb-3" src="{{ asset('assets/img/2.png') }}" alt="#"></a>
                        <strong>Why Choose Our Paid Counselling Services?</strong>
                        <p>The process of MBBS admission can be daunting and filled with numerous deadlines, overlapping counselling dates, and technical hurdles. Our <strong> paid counselling services </strong> offer you a strategic edge. Here's why we are the best choice for you:</p>
                        <ul>
                            <li>
                                <p><strong>Expert Guidance & Fast, Accurate Information : </strong> With years of experience, we understand that timing and precision are everything. Missing key deadlines or making incorrect choices during counselling can cost you your security money (up to ₹2 lakh) or even disqualify you from future rounds. Our team ensures that you’re always a step ahead with timely, accurate advice.</p>
                            </li>
                            <li>
                                <p> <strong>Your Opportunities: </strong> Many high-achieving students lose out on their dream colleges simply because they don’t have access to the right information. We specialize in helping you navigate the complexities of the counselling process, ensuring you never miss a chance to secure admission.
                            </li>
                            </p>
                        </ul>

                        <!--<img src="{{ asset('assets/img/3.png') }}" alt="#>-->
                        <a href="{{ route('enquiry-form') }}" target="_blank">
                            <img src="{{ asset('assets/img/bg/a1.gif') }}" alt="GIF Preview" width="100%" class=" mb-1">
                        </a>



                        <p><strong>Regular Updates to Keep You Ahead :</strong> Our services go beyond just counselling. We provide you with real-time updates on everything related to MBBS admissions, including:</p>
                        <ul>
                            <li>NEET, NTA, MCC & State Counselling updates</li>
                            <li>Key dates and deadlines</li>
                            <li>Important instructions to avoid last-minute confusion</li>
                        </ul>
                        <p>Think of us as your personal MBBS admissions calendar and scheduler. We’ll send timely reminders, track your progress, and ensure you meet every deadline—so you never miss a beat!</p>
                        <strong>Seamless Documentation and Technical Assistance</strong>
                        <p>Sometimes, technical glitches can hinder your progress—whether it's uploading documents, paying security fees, or understanding eligibility criteria. We’re here to make sure these issues don’t stand in your way:</p>
                        <ul>
                            <li><strong> Troubleshooting:</strong> Whether it’s a technical issue or an eligibility concern, we’ll guide you every step of the way.</li>
                            <li> <strong> Eligibility Clarifications: </strong> If you belong to a particular category or have domicile-specific benefits, we’ll help you leverage these advantages during the admission process.</li>
                            <li> <strong> State-Specific Counselling Management: </strong>We’ll create a tailored strategy for you, ensuring you can apply to multiple states without compromising your chances of securing the best seat.</li>
                        </ul>
                        <a href="{{ route('enquiry-form') }}" target="_blank">
                            <img src="{{ asset('assets/img/admission-call.gif') }}" alt="GIF Preview" width="100%" class=" mb-1">
                        </a>
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
                        <strong>How to Book Our Services</strong>
                        <p>We are committed to providing high-quality, personalized services. To maintain our 100% satisfaction delivery rate, we only accept a limited number of bookings. Here's how you can book our expert counselling services:</p>
                        <ol>
                            <li>Apply through the link provided by our counselor or directly on our website.</li>
                            <li>Use our Mobile App "Bodmas Education" to apply.</li>
                            <li>Walk-in to our Noida office and fill out the application form in person.</li>
                            <li>Fill out our Google form to book our counselling services.</li>
                            <li>Email the required documents, along with the completed service booking form, as provided by our counselor.</li>
                        </ol>
                        <!-- <img src="{{ asset('assets/img/2.png') }}" alt="#"> -->

                        <p>Once you’ve made the payment, we’ll send you a receipt. Our expert team will handle the entire counselling process for you. </p>

                        <a href="https://www.youtube.com/@BodmasMedical" target="_blank">
                            <img src="{{ asset('assets/img/every-saturday.gif') }}" alt="GIF Preview" width="100%" class=" mb-1">
                        </a>
                        <strong>Flexible Packages to Suit Your Needs</strong>
                        <p>We’ve designed our counselling services into varied packages to ensure the best value for your needs. Our services are reasonably priced and tailored to offer the highest level of support. We highly encourage you to review the packages and select the one that works best for you.
                            <i> Note: If you’re unable to book through the methods above, feel free to reach out to our team for assistance. We’re here to help!</i>
                        </p>
                        <strong>Let Us Guide You Toward Your Medical Career</strong>
                        <p>With the right guidance, securing an MBBS seat can be a smooth and successful journey. Let us take care of the complexities while you focus on your goal—becoming a doctor.</p>
                        <strong>Book our counselling services today and take the first step towards a brighter future in medicine!</strong>
                    </div>
                    <div class="container mt-5">
                        <a href="{{url('predictor')}}"> <img src="{{asset('assets/img/cutoff.gif')}}" alt="cutoff"> </a>
                        </div>
                    <div class="course-img" id="section1">
                        <img src="{{asset('assets/img/mbbsQr.png')}}" alt="MBBS Guidance">
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
                        </ul>
                        <div class="tab-content" id="productTabContent">
                            <div class="tab-pane fade show active" id="Coursedescription" role="tabpanel" aria-labelledby="description-tab">
                                <div class="course-description">
                                    <h6>Bodmas Paid Counselling Guidance Fee For Basic Package</h6>
                                    <p>AIQ + state government colleges in any two states of your choice</p>
                                    <strong><del style="color:red">75,000 INR + GST </del> &nbsp; 50,000 INR + GST (@18%)</strong>
                                    <b>Services Included are:</b>

                                    <div class="row mt-25">
                                        <div class="col-lg-6">
                                            <div class="checklist mb-4">
                                                <ul>
                                                    <li> 24/7 Query Support On WhatsApp Messages (Not On Calls)</li>
                                                    <li> We will provide counselling for two states. </li>
                                                    <li>Complete guidance for college selection according to NEET score and budget.</li>
                                                    <li>Advice and guidance an all kind of required certificates like Domicile, Category, Minority, GAP, EWS, physically challenged and NRI etc.</li>
                                                    <li>Bond and bank guarantee details for relevant state will be discussed and explained in detail.</li>
                                                    <li> Detail College Analysis like Seat Matrix, Clinical facts and fee structure will be provided.</li>
                                                    <li>Complete support for MCC and home state counselling for registration.</li>

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
                                    <!-- Basic Package  -->
                                    <!-- Checkbox for Discount -->
                                    <p style="color: red;"> Registration fees & security deposit (if applicable) will be paid by parent only.<br>NOTE: 10% off on all services for Army/ Police/ siblings / single parent.</p>
                                    <input type="checkbox" id="discountCheckbox">
                                    <label for="discountCheckbox" style="color: red; font-weight: bold;">
                                        Check if you have served in the Army, Police, or have a sibling/single parent in service.
                                    </label>
                                    <!-- Checkbox for Discount end -->
                                    <div class="row">
                                        <div class="col-sm-4 package">
                                            <h5>Guidance Fee For MBBS Package</h5>
                                            <p id="packagePrice">{{$package->basic_fee }} INR + GST </p><br>
                                            <a id="bookNow" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']),'installment' => 'basic', 'discount' => 0]) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul>
                                                <li> <strong> BODMAS EDUCATION SERVICES PRIVATE LIMITED </strong></li>
                                                <li> <strong>Bank Name : </strong> ICICI Bank </li>
                                                <li> <strong>Account Type : </strong> Current</li>
                                                <li> <strong>Account No : </strong> 157805009329</li>
                                                <li> <strong>IFSC Code : </strong> ICIC0001578</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4"><img src="{{asset('assets/img/icici.jpg')}}" alt="ICICI Guidance" style="width: 400px; height:200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="course-curriculam">
                                    <h6>Bodmas Paid Counselling Guidance Fee For Premium Package</h6>
                                    <del style="color: red;">150,000 INR + GST </del> &nbsp; 1,00,000 INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                            <li>24/7 Query Support On WhatsApp Messages (Not On Calls)</li>
                                            <li>We will provide counselling for more than two states as per your requirements. </li>
                                            <li>Online NEET mock test on our mobile app for your preparation support.</li>
                                            <li>Previous Year Cut Off as per Your Requirment for Govt. and Pvt. Colleges.</li>
                                            <li>Complete guidance for college selection according to NEET score and budget.</li>
                                            <li>Advice and guidance an all kind of required certificates like Domicile, Category, Minority, GAP, EWS, physically challenged and NRI etc.</li>
                                            <li>Bond and bank guarantee details for relevant state will be discussed and explained in detail.</li>
                                            <li>Detail College Analysis like Seat Matrix, Clinical facts and fee structure will be provided.</li>
                                            <li>Complete Support for MCC/Home State/Deemed and Open Pvt. States.</li>
                                            <li>Safety of security deposit will be our responsibility.</li>
                                            <li>All updates related to court cases for fees, seats, domicile or other eligibility criteria will be explained immediately</li>
                                            <li>State wise list of top Government will be provided.</li>
                                            <li>Round wise Strategy to proceed with the counselling.</li>
                                            <li>Choice filling support during every round from our experts.</li>
                                            <li>Merit list and seat matrix will be discussed with parents and student during all round of counselling</li>
                                            <li>Choice filling preferences for all rounds will be done under guidance of Ashok Sir.</li>
                                            <li>Guidance for physical round of Counselling During Mop up Stray vacancy will will be provided.</li>
                                            <li>Refund policy of security deposit will be explained.</li>
                                            <li>Documentation help at the time of reporting at allotted college will be provided.</li>
                                            <li>Video meeting with our expert counsellor will be provided after every round of counselling.</li>
                                        </ul>
                                    </div>
                                    <!-- Premium Package  -->
                                    <!-- Checkbox for Discount -->
                                    <p style="color: red;"> Registration fees & security deposit (if applicable) will be paid by parent only.<br>NOTE: 10% off on all services for Army/ Police/ siblings / single parent.</p>
                                    <input type="checkbox" id="discountCheckboxPremium">
                                    <label for="discountCheckboxPremium" style="color: red; font-weight: bold;">
                                        Check if you have served in the Army, Police, or have a sibling/single parent in service.
                                    </label>
                                    <!-- Checkbox for Discount end -->
                                    <div class="row ">
                                        <div class="col-sm-4 package">
                                            <h5>First installment </h5>
                                            <p id="packagePrice">{{$package->first_installment}} INR + GST </p><br> <a id="bookNowpremium-1" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-1']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="col-sm-4 package">
                                            <h5>Second Installment</h5>
                                            <p id="packagePrice">{{$package->second_installment}} INR + GST </p><br> <a id="bookNowpremium-2" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-2']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="col-sm-4 package">
                                            <h5>Final Booking</h5>
                                            <p id="packagePrice">{{$package->premium_fee}} INR + GST </p><br>
                                            <a id="bookNowpremium-3" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']),'installment' => 'premium']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="course-curriculam">
                                    <h6>Bodmas Paid Counselling Guidance Fee For NRI/Others/IQ Quota NRI Package</h6>
                                    <p>Our Services offer top notch planning, documentation support, and technical assistance for NRI/ sponsored candidates. We help getting Top Colleges Others/ IQ seats of Karnataka and Maharashtra</p>
                                    <p> <del style="color: red;"> 2,00000 INR + GST </del> &nbsp; 1,50,000 INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                            <li>24/7 Query Support On WhatsApp Messages (Not On Calls)</li>
                                            <li>We will provide counselling for more than two states as per your requirements. </li>
                                            <li>Online NEET mock test on our mobile app for your preparation support.</li>
                                            <li>Previous Year Cut Off as per Your Requirment for Govt. and Pvt. Colleges.</li>
                                            <li>Complete guidance for college selection according to NEET score and budget.</li>
                                            <li>Advice and guidance an all kind of required certificates like Domicile, Category, Minority, GAP, EWS, physically challenged and NRI etc.</li>
                                            <li>Bond and bank guarantee details for relevant state will be discussed and explained in detail.</li>
                                            <li>Detail College Analysis like Seat Matrix, Clinical facts and fee structure will be provided.</li>
                                            <li>Complete Support for MCC/Home State/Deemed and Open Pvt. States.</li>
                                            <li>Safety of security deposit will be our responsibility.</li>
                                            <li>All updates related to court cases for fees, seats, domicile or other eligibility criteria will be explained immediately</li>
                                            <li>State wise list of top Government will be provided.</li>
                                            <li>Round wise Strategy to proceed with the counselling.</li>
                                            <li>Choice filling support during every round from our experts.</li>
                                            <li>Merit list and seat matrix will be discussed with parents and student during all round of counselling</li>
                                            <li>Choice filling preferences for all rounds will be done under guidance of Ashok Sir.</li>
                                            <li>Guidance for physical round of Counselling During Mop up Stray vacancy will will be provided.</li>
                                            <li>Refund policy of security deposit will be explained.</li>
                                            <li>Documentation help at the time of reporting at allotted college will be provided.</li>
                                            <li>Video meeting with our expert counsellor will be provided after every round of counselling.</li>
                                            <li>Documentaion Support for NRI Quata Stdents for Govt. and Pvt. Colleges.</li>
                                            <li>Detail fee Structure of NRI Quata as per your Requerment.</li>
                                            <li>Help During Physical Counselling to NRI Students</li>
                                        </ul>
                                        <!-- NRI Packages  -->
                                        <!-- Checkbox for Discount -->
                                        <p style="color: red;"> Registration fees & security deposit (if applicable) will be paid by parent only.<br>NOTE: 10% off on all services for Army/ Police/ siblings / single parent.</p>
                                        <input type="checkbox" id="discountCheckboxNri">
                                        <label for="discountCheckboxNri" style="color: red; font-weight: bold;">
                                            Check if you have served in the Army, Police, or have a sibling/single parent in service.
                                        </label>
                                        <!-- Checkbox for Discount end -->
                                        <div class="row">
                                            <div class="col-sm-4 package">
                                                <h5>First installment </h5>
                                                <p id="packagePrice">{{$package->first_installment_premium}} INR + GST </p><br> <a id="bookNowNri1" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri-1']) }}" class="btn btn-primary">Book Now</a>
                                            </div>
                                            <div class="col-sm-4 package">
                                                <h5>Second Installment</h5>
                                                <p>{{$package->second_installment_premium}} INR + GST </p><br> <a id="bookNowNri2" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri-2']) }}" class="btn btn-primary">Book Now</a>
                                            </div>
                                            <div class="col-sm-4 package">
                                                <h5>Final Booking</h5>
                                                <p>{{$package->nri_fee}} INR + GST </p><br>
                                                <a id="bookNowNri3" href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'nri']) }}" class="btn btn-primary">Book Now</a>
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
                            <img src="{{asset('assets/img/widget/video_1.jpg')}}" alt="video">
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
            <p style="color: red;" ><strong>If you face any issues with the payment or other issue, please fill out the form. <a href="{{route('enquiry-form')}}">Click Now</strong></a></p>
            <div class="container mb-3">
                        <a href="{{url('predictor')}}"> <img src="{{asset('assets/img/cutoff.gif')}}" alt="cutoff"> </a>
                        </div>
            <p>At Bodmas Education Services, your dreams are our mission. Founded with the goal of empowering students and professionals to achieve academic and career success, we specialize in providing expert educational consultancy services. With over 20 employees and multiple branches across India, including Gorakhpur and Hisar, we are committed to guiding students through every step of their educational journey.</p>
            <a href="{{route('enquiry-form')}}" target="_blank">
                <img src="{{ asset('assets/img/book-seat.gif') }}" alt="GIF Preview" width="100%" class=" mb-1">
            </a>
            <h5>What We Do</h5>
            <p>We offer personalized counseling for medical admissions, including MBBS, NBE Diploma, and other healthcare programs, ensuring that students make informed decisions. Additionally, our platform provides accurate, up-to-date information on cutoffs, rankings, and college admissions through detailed content on YouTube and regular updates on Telegram, Instagram, and WhatsApp.</p>
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
            <a href="{{route('enquiry-form')}}"> <img class="mt-5 mb-5" src="{{ asset('assets/img/3.png') }}" alt="#"> </a>
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
    // Basic Package Discount 
    document.getElementById('discountCheckbox').addEventListener('change', function() {
        let bookNowLink = document.getElementById('bookNow');
        let url = new URL(bookNowLink.href);
        // Set discount=1 if checked, else discount=0
        url.searchParams.set('discount', this.checked ? '1' : '0');
        bookNowLink.href = url.toString();
    });
    //    Premium Package Discount 
    document.getElementById('discountCheckboxPremium').addEventListener('change', function() {
        let premiumButtons = [
            document.getElementById('bookNowpremium-1'),
            document.getElementById('bookNowpremium-2'),
            document.getElementById('bookNowpremium-3')
        ];

        premiumButtons.forEach(bookNowLink => {
            if (bookNowLink) { // Ensure the button exists
                let url = new URL(bookNowLink.href, window.location.origin);
                url.searchParams.set('discount', this.checked ? '1' : '0');
                bookNowLink.href = url.toString();
            }
        });
    });

    //    NRI Package Discount 
    document.getElementById('discountCheckboxNri').addEventListener('change', function() {
        let premiumButtons = [
            document.getElementById('bookNowNri1'),
            document.getElementById('bookNowNri2'),
            document.getElementById('bookNowNri3')
        ];

        premiumButtons.forEach(bookNowLink => {
            if (bookNowLink) { // Ensure the button exists
                let url = new URL(bookNowLink.href, window.location.origin);
                url.searchParams.set('discount', this.checked ? '1' : '0');
                bookNowLink.href = url.toString();
            }
        });
    });

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