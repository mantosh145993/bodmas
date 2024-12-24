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
                        <h2 class="sec-title" style="animation: blink 1s infinite; margin-top:35px;" >Latest Notice</h2>
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
                                    <a href="{{ asset('notice/' . $notice->file) }}" class="th-btn" target="_blank" >{{$notice->type}} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                        <h3 class="about-grid_year"><span class="counter-number">5</span>k<span class="text-theme">+</span></h3>
                        <p class="about-grid_text">Students Active Our Guidence</p>
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
                                <li>Get access to 4,000+ of our top Guidence</li>
                                <li>Popular topics to learn now</li>
                                <li>Find the right instructor for you</li>
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
Servce Area  
==============================-->
<section class="space" data-bg-src="assets/img/bg/course_bg_1.png" id="course-sec">
    <div class="container">
        <div class="mb-35 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8">
                    <div class="title-area mb-md-0">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Popular Guidence</span>
                        <h2 class="sec-title">Our Popular Guidence</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <a href="all-paid-guidance" class="th-btn">View All Paid Guidence<i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row slider-shadow th-carousel course-slider-1" data-slide-show="4" data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_1.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 03 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="paid-guidance">Paid Guidance For MBBS</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 8</span>
                            <span><i class="fal fa-user"></i>Students 60+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Max Alexix</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_2.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 02 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="veterinary">Paid Guidance For Veterinary</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 9</span>
                            <span><i class="fal fa-user"></i>Students 50+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Kevin Perry</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_3.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 04 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="ayush">Paid Guidance For Ayush</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 7</span>
                            <span><i class="fal fa-user"></i>Students 30+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Max Alexix</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_4.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 02 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="md-ms-dnb">Paid Guidance For MD/MS/DNB</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 10</span>
                            <span><i class="fal fa-user"></i>Students 20+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Kevin Perry</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_1.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 03 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="dental">Paid Guidance For Dental</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 8</span>
                            <span><i class="fal fa-user"></i>Students 60+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Max Alexix</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="course-box">
                    <div class="course-img">
                        <img src="assets/img/course/course_1_2.png" alt="img">
                        <span class="tag"><i class="fas fa-clock"></i> 02 WEEKS</span>
                    </div>
                    <div class="course-content">
                        <div class="course-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                            </div>(4.7)
                        </div>
                        <h3 class="course-title"><a href="nursing">Paid Guidance For Nursing</a></h3>
                        <div class="course-meta">
                            <span><i class="fal fa-file"></i>Lesson 9</span>
                            <span><i class="fal fa-user"></i>Students 50+</span>
                            <span><i class="fal fa-chart-simple"></i>Beginner</span>
                        </div>
                        <div class="course-author">
                            <div class="author-info">
                                <img src="assets/img/course/author.png" alt="author">
                                <a href="course.html" class="author-name">Kevin Perry</a>
                            </div>
                            <div class="offer-tag">Free</div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p class="cta-text">Met Our Best Guider</p>
                    </div>
                    <a href="#" class="th-btn style8">Join With Us<i class="fas fa-arrow-right ms-1"></i></a>
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
                        <img src="assets/img/normal/student-group_1_1.png" alt="img">
                    </div>
                    <div class="text-end">
                        <a class="th-btn mt-30" href="#">Get Started <i class="far fa-arrow-right ms-1"></i></a>
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
                                    <h3 class="box-title">World Class Trainers</h3>
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
                                    <h3 class="box-title">Easy Learning</h3>
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
                    <h2 class="counter-card_number"><span class="counter-number">3.9</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Successfully</strong> Trained</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">15.8</span>k<span class="fw-normal">+</span></h2>
                    <p class="counter-card_text"><strong>Classes</strong> Completed</p>
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
                    <h2 class="counter-card_number"><span class="counter-number">100.2</span>k<span class="fw-normal">+</span></h2>
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
                <h2 class="sec-title text-white">40% Offer First <span class="text-theme2">100 Student’s</span> For Featured <br> <span class="fw-normal">Topics by Education Category</span></h2>
                <p class="cta-text">Get unlimited access to 6,000+ of Bodmas’s top courses for your team. Learn and improve skills across
                    business, tec, design, and more.</p>
            </div>
            <div class="btn-group justify-content-center">
                <a href="#" class="th-btn style3">Join With Us<i class="fas fa-arrow-right ms-2"></i></a>
                <a href="#" class="th-btn style2">Become A Teacher<i class="fas fa-arrow-right ms-2"></i></a>
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
                    <p class="sec-text mt-20">Graduates of XYZ University have achieved remarkable success in their chosen fields, with many going on to pursue advanced degrees, secure fulfilling careers, and make valuable contributions to their communities.</p>
                    <p class="sec-text">The university takes pride in its alumni network, which serves as a testament to the quality of education and the opportunities provided by the institution.</p>
                </div>
                <div class="btn-group mt-30">
                    <a href="#" class="th-btn">Explore Courses<i class="fas fa-arrow-right ms-2"></i></a>
                    <a href="{{route('contact')}}" class="th-btn style7">Contact Us<i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="team-card team-card-1-1 team-card-1-1-active mt-0">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="assets/img/team/team_1_1.jpg" alt="Team">
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
                            <h3 class="team-title"><a href="team-details.html">Hirmar Ubunti</a></h3>
                            <span class="team-desig">Instructor</span>
                        </div>
                        <div class="team-info">
                            <span><i class="fal fa-file-check"></i>2 Courses</span>
                            <span><i class="fa-light fa-users"></i>Students 60+</span>
                        </div>
                    </div>
                </div>
                <div class="team-card team-card-1-1">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="assets/img/team/team_1_2.jpg" alt="Team">
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
                            <h3 class="team-title"><a href="team-details.html">Marvin McKinney</a></h3>
                            <span class="team-desig">Founder & CEO</span>
                        </div>
                        <div class="team-info">
                            <span><i class="fal fa-file-check"></i>3 Courses</span>
                            <span><i class="fa-light fa-users"></i>Students 50+</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="team-card team-card-1-2 mt-md-0">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="assets/img/team/team_1_3.jpg" alt="Team">
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
                            <h3 class="team-title"><a href="team-details.html">Courtney Henry</a></h3>
                            <span class="team-desig">Junior Instructor</span>
                        </div>
                        <div class="team-info">
                            <span><i class="fal fa-file-check"></i>4 Courses</span>
                            <span><i class="fa-light fa-users"></i>Students 30+</span>
                        </div>
                    </div>
                </div>
                <div class="team-card team-card-1-2 team-card-1-2-active">
                    <div class="team-img-wrap">
                        <div class="team-img">
                            <img src="assets/img/team/team_1_4.jpg" alt="Team">
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
                            <h3 class="team-title"><a href="team-details.html">Brooklyn Simmons</a></h3>
                            <span class="team-desig">Senior Instructor</span>
                        </div>
                        <div class="team-info">
                            <span><i class="fal fa-file-check"></i>4 Courses</span>
                            <span><i class="fa-light fa-users"></i>Students 70+</span>
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
<section class="space" data-bg-src="assets/img/bg/event-bg_1.png">
    <div class="shape-mockup event-shape1 jump" data-top="0" data-left="-60px">
        <img src="assets/img/team/team-shape_1_1.png" alt="img">
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><i class="fal fa-book me-2"></i> Fetaured Events</span>
            <h2 class="sec-title">Bodmas Upcoming Events</h2>
        </div>
        <div class="row slider-shadow event-slider-1 th-carousel gx-70" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true">
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-1.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author1.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">David Smith</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>259, NewYork,</p>
                            <p><i class="fal fa-clock"></i>08:00 am - 10:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">What Soul Can Tech Us About Web Design</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-2.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author2.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Adam Jhon</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Hilton, NewYork,</p>
                            <p><i class="fal fa-clock"></i>10:00 am - 11:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Embrace the world of online education</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-3.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author3.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Michael Rich</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>147, Green Road</p>
                            <p><i class="fal fa-clock"></i>11:00 am - 12:00 pm</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Gain insights into how parents can support</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-4.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author4.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Anadi Juila</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Kipling, London,</p>
                            <p><i class="fal fa-clock"></i>08:00 am - 10:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Exploring New Frontiers in Education</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-5.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author1.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">David Smith</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Paris, France,</p>
                            <p><i class="fal fa-clock"></i>10:00 am - 11:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">A Journey of Educational Excellence</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-6.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author2.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Adam Jhon</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Broly, NewYork,</p>
                            <p><i class="fal fa-clock"></i>11:00 am - 12:00 pm</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Unleashing the Potential of Education</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-7.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author3.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Michael Rich</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Easton, USA,</p>
                            <p><i class="fal fa-clock"></i>08:00 am - 10:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Preparing Students for Tomorrow,s Challenges</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-8.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author4.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">Anadi Juila</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Sharjah, UAE,</p>
                            <p><i class="fal fa-clock"></i>10:00 am - 11:00 am</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Embracing Technology in Education</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="event-card">
                    <div class="event-card_img" data-mask-src="assets/img/event/event_img-shape.png">
                        <img src="assets/img/event/event_img-9.png" alt="event">
                    </div>
                    <div class="event-card_content">
                        <div class="event-author">
                            <div class="avater">
                                <img src="assets/img/event/event-author1.png" alt="avater">
                            </div>
                            <div class="details">
                                <span class="author-name">David Smith</span>
                                <p class="author-desig">Chief - Executive</p>
                            </div>
                        </div>
                        <div class="event-meta">
                            <p><i class="fal fa-location-dot"></i>Al Road, Dubai,</p>
                            <p><i class="fal fa-clock"></i>11:00 am - 12:00 pm</p>
                        </div>
                        <h3 class="event-card_title"><a href="event-details.html">Redefining Learning for the 21st Century</a></h3>
                        <div class="event-card_bottom">
                            <a href="event-details.html" class="th-btn">View Event <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="event-card-shape jump">
                            <img src="assets/img/event/event-box-shape1.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Contact Area  
==============================-->
<div class="space-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="title-area mb-lg-0 text-lg-start text-center">
                    <span class="sub-title"><i class="fal fa-book me-2"></i> Our Trusted Partners</span>
                    <h2 class="sec-title mb-0">We Have More Than <span class="text-theme"><span class="counter-number">4263</span>+</span> Global Partners</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="client-wrap text-lg-end text-center">
                    <div class="row gy-40">
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_1.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_2.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_3.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_4.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_5.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_6.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_7.png" alt="img">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="blog.html" class="client-thumb">
                                <img src="assets/img/client/cilent_1_8.png" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="cta-area-3 space-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-30 mb-lg-0">
                <div class="cta-card" data-bg-src="assets/img/bg/cta-bg_3_1.png">
                    <div class="title-area mb-40">
                        <span class="sub-title text-white"><i class="fal fa-book me-2"></i>Popular Courses</span>
                        <h4 class="sec-title text-white">Get The Best Courses & <br> Upgrade Your Skills </h4>
                    </div>
                    <a href="contact.html" class="th-btn style8">Join With Us<i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cta-card" data-bg-src="assets/img/bg/cta-bg_3_2.png">
                    <div class="title-area mb-40">
                        <span class="sub-title text-white"><i class="fal fa-book me-2"></i>Popular Courses</span>
                        <h4 class="sec-title text-white">Engaging Courses for <br> Intellectual Exploration</h4>
                    </div>
                    <a href="contact.html" class="th-btn style8">Join With Us<i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
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
        <div class="title-area text-center mb-50">
            <span class="sub-title"><i class="fal fa-book me-2"></i> Our Students Testimonials</span>
            <h2 class="sec-title">Students Say’s About Our University</h2>
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
                    <a href="blog.html" class="th-btn">View All Posts<i class="fa-solid fa-arrow-right ms-2"></i></a>
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
@stop
