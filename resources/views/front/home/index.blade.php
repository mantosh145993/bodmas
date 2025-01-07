@extends('front_layouts.master')
@section('content')
@include('admin.popup.home')
<!--==============================
Hero Area
==============================-->
<div class="th-hero-wrapper hero-1" id="hero">
    <div class="hero-slider-1 th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-dots="true">


        <div class="th-hero-slide">
            <div class="th-hero-bg" data-overlay="title" data-opacity="8" data-bg-src="assets/img/hero/one.png"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="hero-style1">
                            <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s"><span>NEET PG</span> COUNCELLING</span>
                            <h2 class="hero-title text-white" data-ani="slideinleft" data-ani-delay="0.4s">2024
                                Start <span>Contact Us</span></h2>
                            <p class="hero-text text-white" data-ani="slideinleft" data-ani-delay="0.6s">+91 9511626721, educationbodmas@gmail.com</p>
                            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.8s">
                                <a href="{{route('contact')}}" class="th-btn style3">Get Started<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-lg-end text-center">
                        <div class="hero-img1">
                            <img src="assets/img/hero/one1.png" alt="hero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-shape shape1">
                <img src="assets/img/hero/shape_1_1.png" alt="shape">
            </div>
            <div class="hero-shape shape2">
                <img src="assets/img/hero/shape_1_2.png" alt="shape">
            </div>
            <div class="hero-shape shape3"></div>

            <div class="hero-shape shape4 shape-mockup jump-reverse" data-right="3%" data-bottom="7%">
                <img src="assets/img/hero/shape_1_3.png" alt="shape">
            </div>
            <div class="hero-shape shape5 shape-mockup jump-reverse" data-left="0" data-bottom="0">
                <img src="assets/img/hero/shape_1_4.png" alt="shape">
            </div>
        </div>


        <div class="th-hero-slide">
            <div class="th-hero-bg" data-overlay="title" data-opacity="8" data-bg-src="assets/img/hero/second.png"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="hero-style1">
                            <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s"><span>BODMAS</span> Education</span>
                            <h2 class="hero-title text-white" data-ani="slideinleft" data-ani-delay="0.4s">Counselling Available Anytime & Anywhere <span class="text-theme">Your Dream Our Mission</span></h2>
                            <p class="hero-text text-white" data-ani="slideinleft" data-ani-delay="0.6s">"Empowering your educational journey with expert guidance : Bodmas Medical Education Councelling"</p>
                            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.8s">
                                <a href="{{route('contact')}}" class="th-btn style3">Book Now<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-lg-end text-center">
                        <div class="hero-img1">
                            <img src="assets/img/hero/second2.png" alt="hero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-shape shape1">
                <img src="assets/img/hero/shape_1_1.png" alt="shape">
            </div>
            <div class="hero-shape shape2">
                <img src="assets/img/hero/shape_1_2.png" alt="shape">
            </div>
            <div class="hero-shape shape3"></div>

            <div class="hero-shape shape4 shape-mockup jump-reverse" data-right="3%" data-bottom="7%">
                <img src="assets/img/hero/shape_1_3.png" alt="shape">
            </div>
            <div class="hero-shape shape5 shape-mockup jump-reverse" data-left="0" data-bottom="0">
                <img src="assets/img/hero/shape_1_4.png" alt="shape">
            </div>
        </div>


        <div class="th-hero-slide">
            <div class="th-hero-bg" data-overlay="title" data-opacity="8" data-bg-src="assets/img/hero/third.png"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="hero-style1">
                            <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s"><span>Education</span> Loan</span>
                            <h2 class="hero-title text-white" data-ani="slideinleft" data-ani-delay="0.4s">न्यूनतम ब्याज के साथ ले अधिकतम ऋण</h2>
                            <hp class="hero-title text-white" data-ani="slideinleft" data-ani-delay="0.4s">अपने सपने को दे उड़ान <span>बोडमास एजुकेशन के साथ</span> <br> Supported By एक्सिस बैंक </p> <br><br>
                            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.8s"> 
                                <a href="{{route('contact')}}" class="th-btn style3">Apply Now<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-lg-end text-center">
                        <div class="hero-img1">
                            <img src="assets/img/hero/third3.png" alt="hero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-shape shape1">
                <img src="assets/img/hero/shape_1_1.png" alt="shape">
            </div>
            <div class="hero-shape shape2">
                <img src="assets/img/hero/shape_1_2.png" alt="shape">
            </div>
            <div class="hero-shape shape3"></div>

            <div class="hero-shape shape4 shape-mockup jump-reverse" data-right="3%" data-bottom="7%">
                <img src="assets/img/hero/shape_1_3.png" alt="shape">
            </div>
            <div class="hero-shape shape5 shape-mockup jump-reverse" data-left="0" data-bottom="0">
                <img src="assets/img/hero/shape_1_4.png" alt="shape">
            </div>
        </div>
    </div>
</div>
<!--======== / Hero Section ========-->
<!--==============================
Contact Area  
==============================-->
<div class="space-top">
    <div class="container">
        <div class="category-sec-wrap">
            <div class="shape-mockup category-shape-arrow d-xl-block d-none">
                <img src="assets/img/normal/category-arrow.svg" alt="img">
            </div>
 
            <!-- Notice Area  -->
            <div class="row mb-5">
                <div class="col-xl-4">
                    <div class="title-area mb-25 mb-lg-0 text-xl-start text-center">
                        <h2 class="sec-title" style="animation: blink 1s infinite; margin-top:35px;" >Latest Notice by Bodmas</h2>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row slider-shadow th-carousel category-slider" data-slide-show="4" data-ml-slide-show="3" data-md-slide-show="3" data-sm-slide-show="2" data-arrows="true" data-xl-arrows="true">
                        @foreach($notices as $notice)
                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="">
                                    <h3 class="category-card_title"><a href="{{ asset('notice/' . $notice->file) }}" target="_blank">{{$notice->title}}</a></h3>
                                    {{$notice->description}}
                                </div>
                                <div class="category-card_content">
                                    <a href="{{ asset('notice/' . $notice->file) }}" class="th-btn" target="_blank" >pdf<i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-auto" style="text-align: end;">
                        <a href="{{route('all-notification')}}" class="th-btn">View All Notifications <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <hr>
        <!-- Notice Area End  -->

            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="title-area mb-25 mb-lg-0 text-xl-start text-center">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Admissions</span>
                        <h2 class="sec-title">Explore Top Admissions</h2>
                        <a href="#" class="th-btn">View All Admission<i class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row slider-shadow th-carousel category-slider" data-slide-show="4" data-ml-slide-show="3" data-md-slide-show="3" data-sm-slide-show="2" data-arrows="true" data-xl-arrows="true">
                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_1.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">MBBS</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_2.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">BDS</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_3.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">BAMS</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_4.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">BHMS</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_1.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">BUMS</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_2.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">BVSC</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_3.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">NURSING</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="category-card">
                                <div class="category-card_icon">
                                    <img src="assets/img/icon/cat-1_4.svg" alt="image">
                                </div>
                                <div class="category-card_content">
                                    <h3 class="category-card_title"><a href="#">PHARMACY</a></h3>
                                    <a href="#" class="th-btn">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->

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
                    <h2 class="sec-title">Welcome to BODMAS Education Services.</h2>
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
                        <h2 class="cta-title sec-title">Get Online Guidence</h2>
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
                    <div class="student-count jump-reverse">
                        <h5 class="title"><span class="text-theme"><span class="counter-number">10</span>k+</span> Active Students</h5>
                        <!-- <img src="assets/img/normal/student-group_1_1.png" alt="img"> -->
                    </div>
                    <div class="text-end">
                        <a class="th-btn mt-30" href="{{route('contact')}}">Get Started <i class="far fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="wcu-wrap1">
                    <div class="title-area mb-25">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> WHY CHOOSE US</span>
                        <h2 class="sec-title">Thousands Of Experts Around The BODMAS Ready To Help.</h2>
                        <p class="sec-text mt-20">At BODMAS EDUCATION, our mission is to provide personalized and professional educational counselling that helps students identify their strengths, explore their options, and make informed decisions about their future. We are committed to guiding students through the complex process of academic and career planning to ensure they achieve success in their chosen fields.</p>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="wcu-box">
                                <div class="wcu-box_icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="wcu-box_details">
                                    <h3 class="box-title">World Class Mentor</h3>
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
                                    <h3 class="box-title">Better Mentorship</h3>
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
                                    <h3 class="box-title">Flexible</h3>
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
                                    <h3 class="box-title">Affordable Price</h3>
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
<!--==============================
Counter Area  
==============================-->
<div class="container">
    <div class="counter-area-1 bg-theme" data-bg-src="assets/img/bg/counter-bg_1.png">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">10.9</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Successfully</strong> Guid</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">15.8</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Mentorship</strong> Completed</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">97.5</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Satisfaction</strong> Rate</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">22.2</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Students</strong> Community</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Cta Area  
==============================-->
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
                <h2 class="sec-title text-white">20% Offer  <span class="text-theme2">On Paid Guidance</span> For Featured <br> <span class="fw-normal">By Bodmas Education</span></h2>
                <p class="cta-text">Get access of our Popular paid guidance services </p>
            </div>
            <div class="btn-group justify-content-center">
                <a href="{{route('contact')}}" class="th-btn style3">Join With Us<i class="fas fa-arrow-right ms-2"></i></a>
                <a href="{{route('all-paid-guidance')}}" class="th-btn style2">Explore Our Guidance<i class="fas fa-arrow-right ms-2"></i></a>
            </div>
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
                    <h2 class="sec-title">Meet Our BODMAS Expert Instructor</h2>
                    <p class="sec-text mt-20">At BODMAS EDUCATION, our mission is to provide personalized and professional educational counselling that helps students identify their strengths, explore their options, and make informed decisions about their future. We are committed to guiding students through the complex process of academic and career planning to ensure they achieve success in their chosen fields.</p>
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

<!--==============================
Testimonial Area  
==============================-->
<section class="testi-area-1 overflow-hidden space-bottom" data-bg-src="assets/img/bg/testi_bg_1.png">
    <div class="shape-mockup testi-bg-shape1 jump" data-right="0" data-top="50%">
        <img src="assets/img/testimonial/testi-bg-shape_1_1.png" alt="img">
    </div>
    <div class="shape-mockup testi-bg-shape2 spin" data-left="0" data-top="15%">
        <img src="assets/img/testimonial/testi-bg-shape_1_2.png" alt="img">
    </div>
    <div class="container">
        <div class="title-area text-left mb-50">
            <span class="sub-title"><i class="fal fa-book me-2"></i> Our Students Testimonials</span>
            <h2 class="sec-title">Students Say’s About Our Bodmas Education</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="th-carousel testi-slider1 dot-style2 row" id="testimonial-slider1" data-slide-show="2" data-ml-slide-show="2" data-lg-slide-show="1" data-md-slide-show="1" data-dots="true" data-arrows="false">
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box-bg-shape">
                                <svg width="150" height="137" viewBox="0 0 150 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 9.99951C0 4.47666 4.47715 -0.000488281 10 -0.000488281H140C145.523 -0.000488281 150 4.47666 150 9.99951V10.5803C150 13.3951 148.814 16.0796 146.732 17.9747L18.8619 134.394C17.0205 136.07 14.6199 137 12.1297 137H10C4.47715 137 0 132.522 0 127V9.99951Z" fill="#0D5EF4" />
                                </svg>
                            </div>
                            <div class="testi-box_content">
                                <div class="testi-box_img">
                                    <img src="assets/img/testimonial/testi_1_1.jpg" alt="Avater">
                                </div>
                                <p class="testi-box_text">“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”</p>
                            </div>
                            <div class="testi-box_bottom">
                                <div>
                                    <h3 class="testi-box_name">David H. Smith</h3>
                                    <span class="testi-box_desig">IT Student</span>
                                </div>
                                <div class="testi-box_review">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    (4.7)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box-bg-shape">
                                <svg width="150" height="137" viewBox="0 0 150 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 9.99951C0 4.47666 4.47715 -0.000488281 10 -0.000488281H140C145.523 -0.000488281 150 4.47666 150 9.99951V10.5803C150 13.3951 148.814 16.0796 146.732 17.9747L18.8619 134.394C17.0205 136.07 14.6199 137 12.1297 137H10C4.47715 137 0 132.522 0 127V9.99951Z" fill="#0D5EF4" />
                                </svg>
                            </div>
                            <div class="testi-box_content">
                                <div class="testi-box_img">
                                    <img src="assets/img/testimonial/testi_1_2.jpg" alt="Avater">
                                </div>
                                <p class="testi-box_text">“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”</p>
                            </div>
                            <div class="testi-box_bottom">
                                <div>
                                    <h3 class="testi-box_name">Zara Head Milan</h3>
                                    <span class="testi-box_desig">Regular Student</span>
                                </div>
                                <div class="testi-box_review">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    (4.7)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box-bg-shape">
                                <svg width="150" height="137" viewBox="0 0 150 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 9.99951C0 4.47666 4.47715 -0.000488281 10 -0.000488281H140C145.523 -0.000488281 150 4.47666 150 9.99951V10.5803C150 13.3951 148.814 16.0796 146.732 17.9747L18.8619 134.394C17.0205 136.07 14.6199 137 12.1297 137H10C4.47715 137 0 132.522 0 127V9.99951Z" fill="#0D5EF4" />
                                </svg>
                            </div>
                            <div class="testi-box_content">
                                <div class="testi-box_img">
                                    <img src="assets/img/testimonial/testi_1_1.jpg" alt="Avater">
                                </div>
                                <p class="testi-box_text">“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”</p>
                            </div>
                            <div class="testi-box_bottom">
                                <div>
                                    <h3 class="testi-box_name">David H. Smith</h3>
                                    <span class="testi-box_desig">IT Student</span>
                                </div>
                                <div class="testi-box_review">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    (4.7)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box-bg-shape">
                                <svg width="150" height="137" viewBox="0 0 150 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 9.99951C0 4.47666 4.47715 -0.000488281 10 -0.000488281H140C145.523 -0.000488281 150 4.47666 150 9.99951V10.5803C150 13.3951 148.814 16.0796 146.732 17.9747L18.8619 134.394C17.0205 136.07 14.6199 137 12.1297 137H10C4.47715 137 0 132.522 0 127V9.99951Z" fill="#0D5EF4" />
                                </svg>
                            </div>
                            <div class="testi-box_content">
                                <div class="testi-box_img">
                                    <img src="assets/img/testimonial/testi_1_2.jpg" alt="Avater">
                                </div>
                                <p class="testi-box_text">“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”</p>
                            </div>
                            <div class="testi-box_bottom">
                                <div>
                                    <h3 class="testi-box_name">Zara Head Milan</h3>
                                    <span class="testi-box_desig">Regular Student</span>
                                </div>
                                <div class="testi-box_review">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    (4.7)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Blog Area  
==============================-->
<section class="overflow-hidden space" id="blog-sec">
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
                    <a href="{{route('blog_details', $blog->slug)}}">
                                <img src="{{ asset('images/feature/' . $blog->feature_image) }}" alt="Blog Image">
                            </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#"><i class="fa-light fa-user"></i>{{ $blog->author }}</a>
                            <a href="#"><i class="fa-light fa-clock"></i>{{ $blog->published_at }}</a>
                        </div>
                        <h4 class="box-title"><a href="{{route('blog_details', $blog->slug)}}">{{ $blog->title }}</a>
                        </h4>
                        <a href="{{route('blog_details', $blog->slug)}}" class="link-btn">Read More Details<i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

 <!-- Map Section  -->
<section>
    <div class="container">
    <div class="map-sec">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.126510817361!2d77.34101701248609!3d28.598692375581777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5b5752aa1a5%3A0xef25f3cdf6f08c3!2sBodmas%20Education%20Services%20Pvt.%20Ltd.!5e1!3m2!1sen!2sin!4v1731306026310!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
    </div>
</section>
@stop

