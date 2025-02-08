@extends('front_layouts.master')
@section('content')
@include('admin.popup.home')
<!--==============================
Hero Area
==============================-->

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">
                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd</span>
                                <h1 class="hero-title text-theme">Don’t Wait  </h1>
                                <h5>Apply Now! NEET UG Registration</h5>
                                <div class="checklist">
                                    <ul>
                                        <li> Now Open</li>
                                        <li>Take the First Step</li>
                                        <li>Towards Your Dream Career!</li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('contact')}}" class="th-btn">Contact Us<i class="fas fa-long-arrow-right ms-2"></i></a>
                                    <a href="{{route('all-paid-guidance')}}" class="th-btn style5">Paid Guidance<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/1.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                </div>
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">
                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd</span>
                                <h1 class="hero-title text-theme">Book One-to-One </h1>
                                <h5>Meeting with Ashok Sir</h5>
                                <div class="checklist">
                                    <ul>
                                        <li>Personalized Guidance</li>
                                        <li> Expert Insights</li>
                                        <li>Clear Doubts</li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('video-meeting-counselling')}}" class="th-btn">Book Now<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/2.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                </div>
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">
                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd </span>
                                <h1 class="hero-title text-theme">Low Rank? </h1>
                                <h5>No Problem! Get Into Top Colleges with Our Paid Guidance! </h5>
                                <div class="checklist">
                                    <ul>
                                        <li> Low Fees</li>
                                        <li>High Opportunities</li>
                                        <li>Let Us Help You Get there!</li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('contact')}}" class="th-btn">Contact Us<i class="fas fa-long-arrow-right ms-2"></i></a>
                                    <a href="{{route('all-paid-guidance')}}" class="th-btn style5">Paid Guidance<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/3.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                </div>
                                 <!-- <div class="details">
                                        <h3 class="hero-counter_number"><span class="counter-number">16500</span>+</h3>
                                        <p class="hero-counter_text">Active Students</p>
                                    </div> -->
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>
                                     <!-- <div class="details">
                                        <h3 class="hero-counter_number"><span class="counter-number">16500</span>+</h3>
                                        <p class="hero-counter_text">Active Students</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">

                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd </span>
                                <h1 class="hero-title text-theme">Limited Seats</h1>
                                <h5>Act fast for secure your spot in the Best Medical College</h5>
                                <div class="checklist">
                                    <ul>
                                        <li>Govt Colleges</li>
                                        <li>Pvt Colleges</li>
                                        <li>Get Expert Guidance to Help You Succeed!</li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('contact')}}" class="th-btn">Contact Us<i class="fas fa-long-arrow-right ms-2"></i></a>
                                    <a href="{{route('all-paid-guidance')}}" class="th-btn style5">Paid Guidance<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/4.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                    <!-- <div class="details">
                                        <h3 class="hero-counter_number"><span class="counter-number">16500</span>+</h3>
                                        <p class="hero-counter_text">Active Students</p>
                                    </div> -->
                                </div>
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>
                                    <!-- <div class="details">
                                        <h3 class="hero-counter_number"><span class="counter-number">7500</span>+</h3>
                                        <p class="hero-counter_text">Online Video Courses</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">
                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd</span>
                                <h1 class="hero-title text-theme">Mentorship</h1>
                                <h5>Get Our Metorship program Prepare Smarter, Score Higher – Join Now!</h5>
                                <div class="checklist">
                                    <ul>
                                        <li>Latest Updates</li>
                                        <li> Mock Tests Series</li>
                                        <li>Exam Prepration Tips!</li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="{{url('mentorship')}}" class="th-btn">Get Started<i class="fas fa-long-arrow-right ms-2"></i></a>
                                    <a href="{{route('all-paid-guidance')}}" class="th-btn style5">Paid Guidance<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/5.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                </div>
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="th-hero-bg" style="background-image: url('assets/img/hero/hero_bg_2_1.jpg');"></div>
                <div class="container z-index-common">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-style2">
                                <span class="hero-subtitle">Bodmas Education Services Pvt Ltd</span>
                                <h1 class="hero-title text-theme">Preparation</h1>
                                <h5>Starts Here document Checklist for NEET UG</h5>
                                <div class="checklist">
                                    <!-- <ul>
                                        <li>Stay Ready </li>
                                        <li>No Surprises</li>
                                        <li>Prepare Smarter</li>
                                    </ul> -->
                                </div>
                                <div class="btn-group">
                                    <a href="{{route('contact')}}" class="th-btn">Contact Us<i class="fas fa-long-arrow-right ms-2"></i></a>
                                    <a href="{{route('all-paid-guidance')}}" class="th-btn style5">Paid Guidance<i class="fas fa-long-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="hero-img2">
                                <img src="{{asset('assets/img/hero/6.png')}}" alt="hero">
                                <div class="hero-counter-wrap hero-counter1">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon1.svg" alt="img">
                                    </div>
                                </div>
                                <div class="hero-counter-wrap hero-counter2">
                                    <div class="hero-counter_icon">
                                        <img src="assets/img/icon/hero2-counter-icon2.svg" alt="img">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6 text-left">
            <button class="custom-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span>←</span>
            </button>
        </div>
        <div class="col-sm-6 text-end">
            <button class="custom-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span>→</span>
            </button>
        </div>
    </div>
</div>

<!--======== / Hero Section ========-->
<!--==============================
Notice Area  
==============================-->
<div class="">
    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <h2 class="sec-title" style="animation: blink 1s infinite;">Latest Notifications & Update</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('all-notification') }}" class="th-btn"> All Notifications <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="notice-section">
            <div class="row">
                @foreach($notices as $notice)
                <div class="col-12 col-md-4">
                    <div class="notice-card">
                        <div class="notice-header">
                            <h3 class="notice-title">
                                <a href="{{ asset('notice/' . $notice->file) }}" target="_blank">
                                    {{ $notice->title }}
                                </a>
                                @if($notice->created_at && $notice->created_at->isToday())
                                <span class="new-label">New</span>
                                @endif
                            </h3>
                        </div>
                        <p class="notice-description">
                            {{ $notice->description }}
                        </p>
                        <div class="notice-actions">
                            <a href="{{ asset('notice/' . $notice->file) }}" class="btn-pdf" download>Download PDF</a>
                            <a href="{{ asset('notice/' . $notice->file) }}" class="btn-view" target="_blank">View Notification</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--==============================
About Area  
==============================-->
<div class="space overflow-hidden" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="img-box1 mb-40 mb-xl-0">
                    <div class="img1">
                        <img class="tilt-active" src="{{asset('assets/a/3.jpg')}}" alt="About">
                    </div>
                    <div class="about-grid" data-bg-src="{{asset('assets/a/5.jpg')}}">
                        <h3 class="about-grid_year"><span class="counter-number">10</span>k<span class="text-theme">+</span></h3>
                        <p class="about-grid_text">Students Active Under Our Mentorship</p>
                    </div>
                    <div class="img2">
                        <img class="tilt-active" src="{{asset('assets/a/8.jpg')}}" alt="About">
                    </div>
                    <div class="shape-mockup about-shape1 jump" data-left="-67px" data-bottom="0">
                        <img src="assets/img/normal/about_1_shape1.png" alt="img">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="title-area mb-30">
                    <span class="sub-title"><i class="fal fa-book me-2"></i> About Our BODMAS</span>
                    <h2 class="sec-title">Welcome to Bodmas Education Services Pvt Ltd.</h2>
                </div>
                <p class="mt-n2 mb-25">BODMAS Education Services Pvt. Ltd. (BODMAS EDUCATION) is a leading educational consultancy firm dedicated to providing expert guidance and counselling for undergraduate (UG) and postgraduate (PG) students. Founded in July 2018, BODMAS EDUCATION has successfully counselled and guided over 10,000 students, helping them select the right career paths and realize their academic and professional dreams. </p>
                <p class="mb-30">Operating from its corporate office in Noida, BODMAS EDUCATION has built a strong nationwide presence with more than 20 educational associates spread across India. The company specializes in assisting students with admissions to a wide range of courses, including:</p>
                <div class="row align-items-center">
                    <div class="col-md-auto">
                        <div class="about-grid_img mb-30 mb-md-0">
                            <img src="{{asset('assets/a/0.jpg')}}" alt="img">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="checklist">
                            <ul>
                                <li>Get access to 6+ of our Popular Guidence Packages</li>
                                <li>Find the right mentor for you</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="btn-group mt-40">
                    <a href="{{route('about')}}" class="th-btn">About More<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Paid Guidance Area  
==============================-->
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
            @foreach($paidPackages as $package)
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <a href="{{ url($package['url']) }}">
                            <img src="{{ asset('images/paid_package/' . $package['image']) }}" alt="{{ $package['package_name'] }}">
                        </a>
                    </div>
                    <div class="course-content text-center">
                        <h3 class="course-title ">
                            <a href="{{ url($package['url']) }}">{{ $package['package_name'] }}</a>
                        </h3>
                        {{ $package['description'] }}
                        <div class="course-price">
                            <span class="base-price">₹{{ number_format($package['base_price'], 2) }}</span> +
                            <span class="gst">(GST ₹{{ number_format($package['gst_amount'], 2) }})</span>
                            <strong class="total-price">Total: ₹{{ number_format($package['total_price'], 2) }}</strong>
                        </div>
                        <div class="text-center mb-2 mt-2">
                            <a href="{{ url($package['url'])}}" class="btn btn-primary">Book Now</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--==============================
Cta Area  
==============================-->
<div class="cta-area-1" data-bg-src="assets/img/bg/cta-bg1.png">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8">
                <div class="cta-wrap title-area mb-0">
                    <div class="cta-icon">
                        <img src="assets/img/normal/cta-icon1.png" alt="icon">
                    </div>
                    <div class="cta-content">
                        <h2 class="cta-title sec-title">Get Online Offline Guidence</h2>
                        <p class="cta-text">Met Our Best Mentor </p>
                    </div>
                    <a href="https://meetpro.club/bodmas?isCpBranding=false" class="th-btn style8">Book Online Session With Us<i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-img-1" data-overlay="title" data-opacity="8">
        <img src="{{('assets/img/normal/guidance.jpg')}}" alt="Image">
        <a href="https://www.youtube.com/@BodmasMedical" class="play-btn style2 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
    </div>
</div>
<!--==============================
Why choose us Area  
==============================-->
<div class="why-area-1 space overflow-hidden">

    <div class="shape-mockup why-shape-1 jump" data-top="10%" data-left="7%">
        <img src="assets/img/normal/about_1_shape1.png" alt="img">
    </div>

    <div class="shape-mockup why-shape-2" data-bg-src="assets/img/normal/wcu_1_shape1.png"></div>

    <div class="shape-mockup why-shape-3 jump-reverse" data-bottom="25%" data-right="-3%">
        <img src="assets/img/normal/wcu_1_shape2.png" alt="img">
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="wcu-img-1">
                    <div class="img1">
                        <img src="{{asset('assets/img/normal/chooseUs.jpg')}}" alt="img">
                    </div>
                    <!-- <div class="student-count jump-reverse">
                        <h5 class="title"><span class="text-theme"><span class="counter-number">10</span>k+</span> Active Students</h5>
                    </div> -->
                    <div class="text-end">
                        <a class="th-btn mt-30" href="{{route('contact')}}">Get Started <i class="far fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="wcu-wrap1">
                    <div class="title-area mb-25">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> WHY CHOOSE US</span>
                        <h2 class="sec-title">BODMAS Ready To Help.</h2>
                        <p class="sec-text mt-20">At BODMAS Education, we are dedicated to providing expert guidance to students at every step of their academic journey. Whether you’re preparing for competitive exams like NEET, JEE, MBA, or planning to study abroad, we are here to help you make informed decisions and achieve your dreams. Led by Mr. Ashok Kumar, a veteran in the education sector, BODMAS Education is your trusted partner in shaping your future. We understand that every student has unique goals, and we’re committed to offering tailored solutions that best fit your needs. Whether it’s about choosing the right course, preparing for competitive exams, or understanding global education opportunities, BODMAS Education is here to guide you.</p>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="wcu-box">
                                <div class="wcu-box_icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="wcu-box_details">
                                    <h3 class="box-title">Expert Guidance</h3>
                                    <!-- <p class="wcu-box_text">Seamlessly envisioneer tactical data through services.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wcu-box">
                                <div class="wcu-box_icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="wcu-box_details">
                                    <h3 class="box-title">Over 10,000 Success Stories</h3>
                                    <!-- <p class="wcu-box_text">Seamlessly envisioneer tactical data through services.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wcu-box">
                                <div class="wcu-box_icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="wcu-box_details">
                                    <h3 class="box-title">Nationwide Network</h3>
                                    <!-- <p class="wcu-box_text">Seamlessly envisioneer tactical data through services.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wcu-box">
                                <div class="wcu-box_icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="wcu-box_details">
                                    <h3 class="box-title">20+ Years of Expertise</h3>
                                    <!-- <p class="wcu-box_text">Seamlessly envisioneer tactical data through services.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Area  -->
<div class="container">
    <div class="counter-area-1 bg-theme" data-bg-src="assets/img/bg/counter-bg_1.png">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">10</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Counselling</strong> Done</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">5</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Successful</strong> Admission</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">20</span><span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Association</strong></p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">12</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Students</strong> Community</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cta Area -->
<section class="cta-area-2 position-relative space-bottom">
    <div class="cta-bg-img" data-bg-src="{{('assets/img/bg/student.jpg')}}">
    </div>
    <div class="cta-bg-img2" data-bg-src="assets/img/bg/cta-bg2-shape.png">
    </div>

    <div class="shape-mockup cta-shape1 jump d-md-block d-none" data-left="-2%" data-bottom="-7%">
        <img src="assets/img/normal/cta_2_shape1.png" alt="img">
    </div>

    <div class="shape-mockup cta-shape2 jump-reverse d-md-block d-none" data-right="-1%" data-top="-3%">
        <img src="assets/img/normal/cta_2_shape2.png" alt="img">
    </div>

    <div class="shape-mockup cta-shape3 spin d-md-block d-none" data-right="20%" data-top="30%">
        <img src="assets/img/normal/cta_2_shape3.png" alt="img">
    </div>

    <div class="container text-center">
        <div class="cta-wrap2">
            <div class="title-area text-center mb-35">
                <span class="sub-title"><i class="fal fa-book me-2"></i>Are You Ready For This Offer</span>
                <h2 class="sec-title text-white">Offer <span class="text-theme2">On Paid Guidance</span> For Featured <br> <span class="fw-normal">By Bodmas Education</span></h2>
                <p class="cta-text">Get access of our Popular paid guidance services </p>
            </div>
            <div class="btn-group justify-content-center">
                <a href="{{route('contact')}}" class="th-btn style3">Join With Us<i class="fas fa-arrow-right ms-2"></i></a>
                <a href="{{route('all-paid-guidance')}}" class="th-btn style2">Explore Our Guidance<i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>




<section class="overflow-hidden space" id="blog-sec" style="height: 680px;">
    <div class="container">
        <div class="mb-35 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8">
                    <div class="title-area mb-md-0">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Bodmas News & Blogs</span>
                        <h2 class="sec-title">Latests News & Blogs</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <a href="{{route('blog-all-posts')}}" class="th-btn">View All Posts<i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row slider-shadow th-carousel blog-slider-1" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-xl-4">
                <div class="th-blog blog-single style2">
                    <div class="blog-img">
                        <a href="{{ route('blog_details', $blog->slug) }}">
                            <img src="{{ asset('images/feature/' . $blog->feature_image) }}" alt="Blog Image" style="width: 100%; height: 200px;object-fit: cover;border-radius: 8px;">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#"><i class="fa-light fa-user"></i>{{ $blog->author }}</a>
                            <a href="#"><i class="fa-light fa-clock"></i>{{ $blog->published_at }}</a>
                        </div>
                        <h4 class="box-title">
                            <a href="{{route('blog_details', $blog->slug)}}">
                                {{ \Illuminate\Support\Str::words($blog->title, 2) }}
                            </a>
                        </h4>

                        </h4>
                        <a href="{{route('blog_details', $blog->slug)}}" class="link-btn">Read More Details<i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!--==============================
Team Area  
==============================-->
<div class="team-area overflow-hidden space" id="team-sec">
    <div class="shape-mockup team-bg-shape1 jump-reverse d-xxl-block d-none" data-left="-2%" data-top="0">
        <img src="assets/img/team/team-shape_1_1.png" alt="img">
    </div>

    <div class="shape-mockup team-bg-shape2 jump d-xxl-block d-none" data-left="40%" data-top="20%">
        <img src="assets/img/team/team-shape_1_2.png" alt="img">
    </div>

    <div class="shape-mockup team-bg-shape3 jump" data-left="5%" data-bottom="9%">
        <img src="assets/img/team/team-shape_1_3.png" alt="img">
    </div>

    <div class="shape-mockup team-bg-shape4 spin" data-left="40%" data-bottom="20%">
        <img src="assets/img/team/team-shape_1_4.png" alt="img">
    </div>

    <div class="shape-mockup team-bg-shape5 jump d-lg-block d-none" data-right="-7%" data-top="10%">
        <img src="assets/img/team/team-shape_1_5.png" alt="img">
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-40 mb-xl-0">
                <div class="title-area mb-30">
                    <span class="sub-title"><i class="fal fa-book me-2"></i> Our Instructor</span>
                    <h2 class="sec-title">Meet Our Bodmas Team</h2>
                    <p class="sec-text mt-20">At <b>BODMAS Education,</b> we take pride in our dedicated team of education experts, counsellors, and advisors who are committed to helping students achieve their academic and career goals. Our team combines decades of experience, specialized knowledge, and personalized support to ensure every student receives the best guidance possible.</p>
                </div>
                <div class="btn-group mt-30">
                    <a href="{{route('all-paid-guidance')}}" class="th-btn">Explore Paid Guidance<i class="fas fa-arrow-right ms-2"></i></a>
                    <a href="{{route('contact')}}" class="th-btn style7">Contact Us<i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="team-card team-card-1-1 team-card-1-1-active mt-0">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/ashok.jpg')}}" alt="Team">
                        </div>
                    </div>
                    <div class="team-hover-wrap">
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                            <div class="th-social">
                                <a target="_blank" href="https://vimeo.com/"><i class="fab fa-vimeo-v"></i></a>
                                <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title"><a href="team-details.html">Ashok Singh</a></h3>
                            <span class="team-desig">Founder & CEO</span>
                        </div>
                    </div>
                </div>
                <div class="team-card team-card-1-1">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/nitu.jpg')}}" alt="Team">
                        </div>
                    </div>
                    <div class="team-hover-wrap">
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                            <div class="th-social">
                                <a target="_blank" href="https://vimeo.com/"><i class="fab fa-vimeo-v"></i></a>
                                <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title"><a href="team-details.html">Mrs. Divya Singh</a></h3>
                            <span class="team-desig">Director</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="team-card team-card-1-2 mt-md-0">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/akash.jpg')}}" alt="Team">
                        </div>
                    </div>
                    <div class="team-hover-wrap">
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                            <div class="th-social">
                                <a target="_blank" href="https://vimeo.com/"><i class="fab fa-vimeo-v"></i></a>
                                <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title"><a href="team-details.html">Mr. Akash</a></h3>
                            <span class="team-desig">Manager</span>
                        </div>
                    </div>
                </div>
                <div class="team-card team-card-1-2 team-card-1-2-active">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/abhishek.jpg')}}" alt="Team">
                        </div>
                    </div>
                    <div class="team-hover-wrap">
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                            <div class="th-social">
                                <a target="_blank" href="https://vimeo.com/"><i class="fab fa-vimeo-v"></i></a>
                                <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title"><a href="team-details.html">Mr. Abhishek</a></h3>
                            <span class="team-desig">Senior Executive</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Testimonial Area -->
<!-- <section class="space" data-bg-src="assets/img/update1/bg/testi_bg_5.jpg" data-overlay="title" data-opacity="9">
    <div class="container z-index-3">
        <div class="row justify-content-between align-items-end">
            <div class="col-md-auto">
                <div class="title-area text-center text-md-start">
                    <span class="sub-title text-white">What Student Says</span>
                    <h2 class="sec-title fw-medium text-white">Student’s Testimonials</h2>
                </div>
            </div>
            <div class="col-auto d-none d-md-block">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slick-prev="#testiSlide5" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slick-next="#testiSlide5" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row th-carousel" id="testiSlide5" data-slide-show="2" data-md-slide-show="1">
            <div class="col-lg-6">
                <div class="testi-list">
                    <div class="testi-list_img">
                        <img src="assets/img/update1/testimonial/testi_2_1.jpg" alt="Avater">
                        <div class="testi-list_quote">
                            <img src="assets/img/update1/icon/quote_left.svg" alt="icon">
                        </div>
                    </div>
                    <div class="testi-list_content">
                        <p class="testi-list_text">Interactively predominate prospective bandwidth without cross functional meta-services. Progressively facilitate reliable e-commerce after alternative ROI. Dynamically initiate visionary web services processes. Quickly incentivize 24/365.</p>
                        <h3 class="testi-list_name box-title">Vlademir Hilton</h3>
                        <span class="testi-list_desig">IT Student</span>
                        <div class="testi-list_review">
                            <i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testi-list">
                    <div class="testi-list_img">
                        <img src="assets/img/update1/testimonial/testi_2_2.jpg" alt="Avater">
                        <div class="testi-list_quote">
                            <img src="assets/img/update1/icon/quote_left.svg" alt="icon">
                        </div>
                    </div>
                    <div class="testi-list_content">
                        <p class="testi-list_text">Interactively predominate prospective bandwidth without cross functional meta-services. Progressively facilitate reliable e-commerce after alternative ROI. Dynamically initiate visionary web services processes. Quickly incentivize 24/365.</p>
                        <h3 class="testi-list_name box-title">Rosana Zarsin</h3>
                        <span class="testi-list_desig">CSE Student</span>
                        <div class="testi-list_review">
                            <i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testi-list">
                    <div class="testi-list_img">
                        <img src="assets/img/update1/testimonial/testi_2_3.jpg" alt="Avater">
                        <div class="testi-list_quote">
                            <img src="assets/img/update1/icon/quote_left.svg" alt="icon">
                        </div>
                    </div>
                    <div class="testi-list_content">
                        <p class="testi-list_text">Interactively predominate prospective bandwidth without cross functional meta-services. Progressively facilitate reliable e-commerce after alternative ROI. Dynamically initiate visionary web services processes. Quickly incentivize 24/365.</p>
                        <h3 class="testi-list_name box-title">Abraham Khalil</h3>
                        <span class="testi-list_desig">GS Student</span>
                        <div class="testi-list_review">
                            <i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!--==============================
Event Area  
==============================-->
<section class="space" data-bg-src="assets/img/bg/event-bg_1.png" id="event-sec">
    <div class="container">
        <div class="mb-35 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8">
                    <div class="title-area mb-md-0">
                        <span class="sub-title"><i class="fal fa-calendar-alt me-2"></i> Featured Events</span>
                        <h2 class="sec-title">Bodmas Events</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <a href="{{route('bodmas-gallery')}}" class="th-btn">View All Events <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row slider-shadow th-carousel event-slider-1"
            data-slide-show="3"
            data-ml-slide-show="3"
            data-lg-slide-show="3"
            data-md-slide-show="2"
            data-sm-slide-show="1"
            data-arrows="true">
            @foreach ($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="event-box">
                    <div class="event-img">
                        <img src="{{asset('images/events/' . $event['image_url'])}}" alt="{{$event['title']}}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Map Area  -->
<section>
    <div class="container">
        <div class="map-sec">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.126510817361!2d77.34101701248609!3d28.598692375581777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5b5752aa1a5%3A0xef25f3cdf6f08c3!2sBodmas%20Education%20Services%20Pvt.%20Ltd.!5e1!3m2!1sen!2sin!4v1731306026310!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
    .notice-section {
        max-height: 300px;
        /* Set the height of the scrollable section */
        overflow-y: auto;
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 10px;
        background: #f9f9f9;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .notice-card {
        display: flex;
        flex-direction: column;
        padding: 15px;
        margin-bottom: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background: #fff;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .notice-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .notice-title {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        margin: 0 0 5px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .new-label {
        display: inline-block;
        margin-left: 10px;
        background-color: red;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 5px;
    }

    @keyframes blink {

        0%,
        100% {
            background-color: red;
        }

        50% {
            background-color: red;
        }
    }

    .notice-description {
        font-size: 0.9rem;
        color: #555;
        margin: 5px 0 10px;
    }

    .notice-actions {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
    }

    .notice-actions a {
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.8rem;
        text-decoration: none;
    }

    .btn-pdf {
        background-color: #007bff;
    }

    .btn-pdf:hover {
        background-color: #0056b3;
    }

    .btn-view {
        background-color: #0056b3;
    }

    .btn-view:hover {
        background-color: #0056b3;
    }

    /* General button styling */
    .custom-prev,
    .custom-next {
        position: absolute;
        top: 50%;
        /* transform: translateY(-50%); */
        background-color: #fff;
        color: #0D5EF4;
        border: none;
        /* padding: 10px 20px; */
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        z-index: 5;
        /* Ensure buttons are above the carousel */
        /* transition: background-color 0.3s ease; */
    }

    /* Specific positioning */
    .custom-prev {
        left: 10px;
        /* Position to the left of the carousel */
    }

    .custom-next {
        right: 10px;
        /* Position to the right of the carousel */
    }

    /* Hover effects */
    .custom-prev:hover,
    .custom-next:hover {
        background-color: #fff
    }

    /* Optional: Style the arrow text */
    /* .custom-prev span, .custom-next span {
    display: inline-block;
    font-size: 24px;
    line-height: 1;
} */
</style>
@stop