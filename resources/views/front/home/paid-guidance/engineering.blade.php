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
                        <img src="{{asset('assets/img/engineering.png')}}" alt="Engineering">
                            <!-- <span class="tag"><i class="fas fa-clock"></i> 03 WEEKS</span>
                            <span class="tag bg-theme">BEST SELLER</span> -->
                        </div>
                        <div class="course-meta style2">
                            <!-- <span><i class="fal fa-file"></i>Lesson 8</span> -->
                            <span><i class="fal fa-user"></i>Students 600+</span>
                            <span><i class="fal fa-chart-simple"></i>Premium</span>
                        </div>
                        <h2 class="course-title">Helping Students in making their career in Engineering.</h2>
                        <h3 class="course-title"> What We Offer:</h3>
                        <p>Welcome to Bodmas Education, your trusted partner in securing admissions to top engineering colleges! We provide a comprehensive Paid Guidance Service designed to help students like you navigate the complex college admission process with ease.</p>
                        At Bodmas Education, we aim to make sure every student gets the chance to study at their dream college, aligning with their rank and budget. We believe in personalized counseling that ensures the best possible outcomes for our students.</p>
                    
                        <p> Our dedicated and experienced expert, Mr. Ashok Sir, plays a pivotal role in the entire counseling process. With years of experience in the field, Ashook Sir provides insightful guidance, helping students choose the right college based on their rank, preferences, and financial considerations.</p>
                        <ul>
                            <li>Expert Counseling: Receive tailored advice based on your rank and aspirations.</li>
                            <li>College Selection: Get help in shortlisting top engineering colleges that fit your preferences.</li>
                            <li>Admission Process Guidance: Understand every step of the admission process, ensuring you make informed decisions.</li>
                            <li>Budget-Friendly Options: We’ll guide you to find colleges that match your budget without compromising on quality education.</li>
                            <li>Guaranteed Support: Our team is here to answer all your queries and support you at every stage.</li>

                        </ul>
                        <strong>Why Choose Bodmas Education?</strong>
                       
                        <ul>
                        <li>Top Engineering Colleges: We help students secure spots in prestigious institutions.</li>
                        <li>	Personalized Service: Every student gets individual attention to match their unique profile.</li>
                        <li>	Proven Track Record: With a history of successful admissions, our counseling service has built trust among students and parents alike.</li>
                        <li>	Expert Guidance: Ashook Sir’s vast experience makes a significant difference in your college admission journey.</li>

                        </ul>
                        <p>Ready to take the next step toward your engineering career? Contact us today and benefit from Bodmas Education’s Paid Guidance Service to get the admission you deserve at the top colleges!</p>
                      
                       
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
                                    <h6> Engineering Paid Guidance – Page Basic Package - </h6>
                                    <p>AIQ + state government colleges in any two states of your choice</p>
                                    <strong><del style="color:red">30,000 INR + GST </del> &nbsp; {{$package->basic_fee}} INR + GST (@18%)</strong>
                                    <b>Services Included are:</b>

                                    <div class="row mt-25">
                                        <div class="col-lg-6">
                                            <div class="checklist mb-4">
                                                <ul>
                                                <li>Get 24/7 support via WhatsApp messages for any queries.</li>
                                                <li>	We provide expert counselling for students from two selected states.</li>
                                                <li>	Get personalized advice on choosing colleges based on your rank and budget.</li>
                                                <li>	Receive guidance on procuring necessary certificates like Domicile, EWS, GAP, etc.</li>
                                                <li>	Get detailed analysis of colleges, including seat matrix, fee structure, and branches.</li>
                                                <li>	Step-by-step support for engineering counselling registration, including JoSAA, DASA, and other relevant processes.</li>
                                                <li>	We ensure the safety and proper handling of your security deposit.
                                                <li>	Receive a list of top engineering colleges in your state (IIT, NIT other engineering colleges).</li>
                                                <li>	Get a clear strategy for each round of the counselling process.</li>
                                                <li>	Expert help with choice filling during every round of counselling.</li>
                                                <li>	Merit list and seat matrix will be discussed with both students and parents.</li>
                                                <li>	Choice filling preferences will be done under the guidance of Ashok Sir.    </li>
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
                                    <h6>Premium Engineering Guidance Package Premium Package – </h6>
                                    <del style="color: red;">60000 INR + GST </del> &nbsp; {{$package->premium_fee}} INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                        <li>	24/7 WhatsApp support for all your queries (not on calls).</li>
                                        <li>	Counselling across multiple states as per your needs.</li>
                                        <li>	Access to online mock tests for engineering entrance exams on our app.</li>
                                        <li>	Previous year cut-offs for government and private colleges tailored to your requirements.</li>
                                        <li>	Expert guidance on college selection based on entrance exam scores and budget.</li>
                                        <li>	Advice on obtaining necessary certificates like Domicile, Category, Minority, GAP, EWS, Physically Challenged, and NRI.</li>
                                        <li>	In-depth college analysis, including seat matrix, clinical facts, and fee structures.</li>
                                        <li>	Full support for JOSAA, CSAB and DASA Counselling.</li>
                                        <li>	Immediate updates on court cases related to fees, seats, and eligibility criteria.</li>
                                        <li>	List of top Government/Pvt colleges in each state.</li>
                                        <li>	Strategy support for each round of counselling.</li>
                                        <li>	Expert assistance with choice filling during every counselling round.</li>
                                        <li>	Merit list and seat matrix discussions with parents and students during each round.</li>
                                        <li>	Personalized guidance on choice filling preferences for each counselling round.</li>
                                        <li>	Support for the physical counselling round during mop-up and stray vacancy rounds.</li>
                                        <li>	Detailed explanation of security deposit refund policies.</li>
                                        <li>	Assistance with documentation when reporting to the allotted college.</li>
                                        <li>	Video consultations with expert counsellors after each round of counselling.</li>

                                    </div>
                                    <div class="row ">
                                        <div class="col-sm-4 package">
                                            <h5>First installment </h5>
                                            <p>{{$package->first_installment}} INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-1']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="col-sm-4 package">
                                            <h5>Second Installment</h5>
                                            <p>{{$package->second_installment}} INR + GST </p><br><a href="{{ route('bodmas.payment', ['id' => \Illuminate\Support\Facades\Crypt::encryptString($package['id']), 'installment' => 'premium-2']) }}" class="btn btn-primary">Book Now</a>
                                        </div>
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
                                    <h6>Premium Engineering Guidance Package</h6>
                                    <p>Our Services offer top notch planning, documentation support, and technical assistance for NRI/ sponsored candidates</p>
                                    <p> <del style="color: red;"> 1,00000 INR + GST </del> &nbsp; {{$package->nri_fee}} INR + GST (@18%)</p>
                                    <strong>Services Included are:</strong> <br><br>
                                    <div class="checklist mb-1">
                                        <ul>
                                        <li>	24/7 WhatsApp support for all queries (not on calls). </li>
                                        <li>	Counselling for more than two states based on your preferences.</li>
                                        <li>	Online JEE mock tests via our mobile app for your exam preparation.</li>
                                        <li>	Previous year cut-offs for government and private colleges as per your requirements.</li>
                                        <li>	Expert guidance for college selection based on your JEE score and budget.</li>
                                        <li>	Advice on obtaining necessary certificates such as Domicile, Category, Minority, GAP, EWS, Physically Challenged, and NRI.</li>
                                        <li>	In-depth college analysis with seat matrix, clinical facts, and fee structure.</li>
                                        <li>	Full support for JAC, home state, deemed, and open private states.</li>
                                        <li>	Ensuring the safety of your security deposit.</li>
                                        <li>	Immediate updates on court cases affecting fees, seats, domicile, or eligibility.</li>
                                        <li>	Step-by-step strategy for each counselling round.</li>
                                        <li>	Expert support for choice filling during every round of counselling.</li>
                                        <li>	Merit list and seat matrix discussion with students and parents throughout all rounds.</li>
                                        <li>	Personalized guidance for choice filling preferences for all rounds by Ashok Sir.</li>
                                        <li>	Assistance during the physical round of counselling for mop-up and stray vacancy rounds.</li>
                                        <li>	Clear explanation of security deposit refund policies.</li>
                                        <li>	Documentation help during reporting at the allotted college.</li>
                                        <li>	Video meetings with expert counsellors after every counselling round.</li>
                                        <li>	Documentation support for NRI quota students in government and private colleges.</li>
                                        <li>	Detailed fee structure for NRI quota as per your requirements.</li>
                                        <li>	Assistance for NRI students during physical counselling rounds.</li>

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
                        <div class="th-video">
                            <img src="assets/img/widget/video_1.jpg" alt="video">
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                        </div>
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
                        </div>
                        <a href="#" class="th-btn style6 mt-35 mb-0"><i class="far fa-share-nodes me-2"></i>Share This Packages</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</section>
<!--==============================
Servce Area  
==============================-->
<br><br>
<section class="space" data-bg-src="assets/img/bg/course_bg_1.png" id="course-sec">
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