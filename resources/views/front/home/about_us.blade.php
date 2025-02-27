@extends('front_layouts.master')
@section('content')

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/about.jpg" data-overlay="title" data-opacity="8">
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
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
Service Area  
==============================-->
<section class="overflow-hidden space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><i class="fal fa-book me-2"></i> What We Do</span>
            <h2 class="sec-title">About Us</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="service-card style3">
                    <div class="service-card-content">
                        <div class="service-card-icon">
                            <img src="assets/img/icon/service-icon-3-1.svg" alt="Icon">
                        </div>
                        <h3 class="box-title">Discover, Decide, and Succeed with BODMAS Education</h3>
                        <p class="service-card-text"> BODMAS Education Services Pvt. Ltd. (BODMAS EDUCATION) is a leading educational consultancy firm dedicated to providing expert guidance and counselling for undergraduate (UG) and postgraduate (PG) students. Founded in July 2018, BODMAS EDUCATION has successfully counselled and guided over 10,000 students, helping them select the right career paths and realize their academic and professional dreams.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card style3">
                    <div class="service-card-content">
                        <div class="service-card-icon">
                            <img src="assets/img/icon/service-icon-3-2.svg" alt="Icon">
                        </div>
                        <h3 class="box-title">Expanding Horizons Through Expert Admissions Guidance</h3>
                        <p class="service-card-text"> Operating from its corporate office in Noida, BODMAS EDUCATION has built a strong nationwide presence with more than 20 educational associates spread across India. The company specializes in assisting students with admissions to a wide range of courses, including:</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card style3">
                    <div class="service-card-content">
                        <div class="service-card-icon">
                            <img src="assets/img/icon/service-icon-3-3.svg" alt="Icon">
                        </div>
                        <h3 class="box-title">Your Future, Our Focus: Personalized Education Plans</h3>
                        <p class="service-card-text"> BODMAS Education offers a Popular Paid Guidance and career goals for students. With a focus on providing personalized guidance, BODMAS Education ensures that students select the best path for their professional futures.</p>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Vision and mission  -->
<section>
    <div class="container mb-5">
        <div class="row gy-4">
            <!-- Mission Section -->
            <div class="col-sm-6">
                <div class="mission">
                    <h3 class="sec-title">Mission</h3>
                    <p class="service-card-text">
                        At BODMAS EDUCATION, our mission is to provide personalized and professional educational counselling that helps students identify their strengths, explore their options, and make informed decisions about their future. We are committed to guiding students through the complex process of academic and career planning to ensure they achieve success in their chosen fields.
                    </p>
                </div>
            </div>

            <!-- Vision Section -->
            <div class="col-sm-6">
                <div class="vision">
                    <h3 class="sec-title">Vision</h3>
                    <p class="service-card-text">
                        BODMAS EDUCATION envisions becoming the go-to educational consultancy for students across India, offering unparalleled support in making life-changing academic decisions. We aspire to be at the forefront of educational guidance, continuously helping students achieve their aspirations and contribute positively to society.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision and mission End  -->
<!--==============================
About Area  
==============================-->
<div class="overflow-hidden overflow-hidden bg-smoke space" id="about-sec" data-bg-src="assets/img/bg/about-5-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-50 mb-xl-0">
                <div class="img-box4">
                    <div class="img1">
                        <img class="tilt-active" src="{{asset('assets/img/normal/ashok-sir.JPG')}}" alt="About">
                    </div>
                    <div class="about-grid">
                        <h3 class="about-grid_year"><span class="counter-number">10</span>k+</h3>
                        <p class="about-grid_text">Students Active Under Our Mentorship</p>
                    </div>
                    <div class="img2">
                        <img class="tilt-active" src="assets/img/normal/cta_4_shape1.png" alt="About">
                    </div>
                    <div class="shape1 shape-mockup jump" data-bottom="0" data-left="-46px">
                        <img src="assets/img/normal/about_5_1shape.png" alt="About">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="title-area mb-35">
                    <span class="sub-title"><i class="fal fa-book me-2"></i> About Our Bodmas</span>
                    <h2 class="sec-title">Leadership at BODMAS Education.</h2>
                </div>
                <p class="mt-n2 mb-25">Mr. Ashok Kumar, the visionary Founder and CEO of BODMAS Education Services Pvt. Ltd., brings over 20 years of rich experience in the education sector. His expertise and in-depth understanding of the evolving academic landscape have been instrumental in shaping the company’s mission to provide top-notch guidance and counselling to students across India. Under his leadership, BODMAS Education has emerged as a trusted name in the field of education consulting, particularly for competitive exams like NEET, JEE, and MBA, as well as study abroad programs. With a strong focus on student success, Mr. Ashok Kumar has driven BODMAS Education to guide more than 10,000 students in their academic journeys. His extensive knowledge of education systems, both in India and abroad, allows him to offer invaluable insights to students and parents alike, ensuring that they make informed decisions about their academic and career paths. </p>
                <div class="row mb-35 gy-4">
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Team Area  
==============================-->
<section class="space overflow-hidden">
    <div class="shape-mockup team2-bg-shape1 jump-reverse d-lg-block d-none" data-left="-2%" data-top="0">
        <img src="assets/img/team/team-shape_1_1.png" alt="img">
    </div>

    <div class="shape-mockup team2-bg-shape5 jump d-xxl-block d-none" data-right="-7%" data-top="40%">
        <img src="assets/img/team/team-shape_1_5.png" alt="img">
    </div>

    <div class="container">
        <div class="title-area text-left">
            <span class="sub-title"><i class="fal fa-book me-2"></i> Our Consultants    </span>
            <h2 class="sec-title">Meet Our Expert Consultants</h2>
        </div>
        <div class="row th-carousel slider-shadow" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">
            <!-- Single Item -->
            <div class="col-lg-6">
                <div class="team-card style2">
                    <div class="team-img-wrap">
                        <svg class="team-shape" xmlns="http://www.w3.org/2000/svg" width="327" height="337" viewBox="0 0 327 337" fill="none">
                            <path d="M158.167 331C158.167 333.946 160.555 336.333 163.5 336.333C166.446 336.333 168.833 333.946 168.833 331C168.833 328.054 166.446 325.667 163.5 325.667C160.555 325.667 158.167 328.054 158.167 331ZM158.167 6C158.167 8.94552 160.555 11.3333 163.5 11.3333C166.446 11.3333 168.833 8.94552 168.833 6C168.833 3.05448 166.446 0.666667 163.5 0.666667C160.555 0.666667 158.167 3.05448 158.167 6ZM325 167.5C325 257.254 253.238 330 163.5 330V332C254.359 332 327 258.343 327 167.5H325ZM2.00012 167.5C2.00012 77.7618 73.7458 7 163.5 7V5C72.6574 5 0.00012207 76.6411 0.00012207 167.5H2.00012Z" fill="#0D5EF4" />
                        </svg>
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/nitu.jpg')}}" alt="Nitu Singh">
                        </div>
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-title"><a href="#">Mrs. Divya Singh</a></h3>
                        <span class="team-desig">Director</span>
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-lg-6">
                <div class="team-card style2">
                    <div class="team-img-wrap">
                        <svg class="team-shape" xmlns="http://www.w3.org/2000/svg" width="327" height="337" viewBox="0 0 327 337" fill="none">
                            <path d="M158.167 331C158.167 333.946 160.555 336.333 163.5 336.333C166.446 336.333 168.833 333.946 168.833 331C168.833 328.054 166.446 325.667 163.5 325.667C160.555 325.667 158.167 328.054 158.167 331ZM158.167 6C158.167 8.94552 160.555 11.3333 163.5 11.3333C166.446 11.3333 168.833 8.94552 168.833 6C168.833 3.05448 166.446 0.666667 163.5 0.666667C160.555 0.666667 158.167 3.05448 158.167 6ZM325 167.5C325 257.254 253.238 330 163.5 330V332C254.359 332 327 258.343 327 167.5H325ZM2.00012 167.5C2.00012 77.7618 73.7458 7 163.5 7V5C72.6574 5 0.00012207 76.6411 0.00012207 167.5H2.00012Z" fill="#0D5EF4" />
                        </svg>
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/ashok.jpg')}}" alt="Ashok Singh">
                        </div>
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-title"><a href="#">Mr. Ashok Singh</a></h3>
                        <span class="team-desig">Founder & Ceo</span>
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-lg-6">
                <div class="team-card style2">
                    <div class="team-img-wrap">
                        <svg class="team-shape" xmlns="http://www.w3.org/2000/svg" width="327" height="337" viewBox="0 0 327 337" fill="none">
                            <path d="M158.167 331C158.167 333.946 160.555 336.333 163.5 336.333C166.446 336.333 168.833 333.946 168.833 331C168.833 328.054 166.446 325.667 163.5 325.667C160.555 325.667 158.167 328.054 158.167 331ZM158.167 6C158.167 8.94552 160.555 11.3333 163.5 11.3333C166.446 11.3333 168.833 8.94552 168.833 6C168.833 3.05448 166.446 0.666667 163.5 0.666667C160.555 0.666667 158.167 3.05448 158.167 6ZM325 167.5C325 257.254 253.238 330 163.5 330V332C254.359 332 327 258.343 327 167.5H325ZM2.00012 167.5C2.00012 77.7618 73.7458 7 163.5 7V5C72.6574 5 0.00012207 76.6411 0.00012207 167.5H2.00012Z" fill="#0D5EF4" />
                        </svg>
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/akash.jpg')}}" alt="akash">
                        </div>
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-title"><a href="#">Mr. Akash</a></h3>
                        <span class="team-desig">Manager</span>
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-lg-6">
                <div class="team-card style2">
                    <div class="team-img-wrap">
                        <svg class="team-shape" xmlns="http://www.w3.org/2000/svg" width="327" height="337" viewBox="0 0 327 337" fill="none">
                            <path d="M158.167 331C158.167 333.946 160.555 336.333 163.5 336.333C166.446 336.333 168.833 333.946 168.833 331C168.833 328.054 166.446 325.667 163.5 325.667C160.555 325.667 158.167 328.054 158.167 331ZM158.167 6C158.167 8.94552 160.555 11.3333 163.5 11.3333C166.446 11.3333 168.833 8.94552 168.833 6C168.833 3.05448 166.446 0.666667 163.5 0.666667C160.555 0.666667 158.167 3.05448 158.167 6ZM325 167.5C325 257.254 253.238 330 163.5 330V332C254.359 332 327 258.343 327 167.5H325ZM2.00012 167.5C2.00012 77.7618 73.7458 7 163.5 7V5C72.6574 5 0.00012207 76.6411 0.00012207 167.5H2.00012Z" fill="#0D5EF4" />
                        </svg>
                        <div class="team-img">
                            <img src="{{asset('assets/img/team/abhishek.jpg')}}" alt="Abhishek">
                        </div>
                        <div class="team-social">
                            <a href="#" class="icon-btn">
                                <i class="far fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-title"><a href="#">Mr. Abhishek</a></h3>
                        <span class="team-desig">Senior Executive</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Blog Area  
==============================-->

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
                        <h2 class="cta-title sec-title">Get Online Consultation</h2>
                        <p class="cta-text">Meet our best Consultant</p>
                    </div>
                    <a href="{{route('about')}}" class="th-btn style8">Join With Us<i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-img-1" data-overlay="title" data-opacity="8">
        <img src="{{asset('assets/img/normal/guidance.jpg')}}" alt="Image">
        <a href="https://www.youtube.com/watch?v=3x2SJHlv-40" class="play-btn style2 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
    </div>
</div>
<!--==============================
	Footer Area
==============================-->

<style>
    .service-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Ensures cards take up the full height */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}
/* Mission Section */
.mission {
    background-color: #f4f8fc; /* Light Blue */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #0b3d91; /* Navy Blue Text */
}

/* Vision Section */
.vision {
    background-color: #fff4e6; /* Light Peach */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #d35400; /* Orange Text */
}

/* Shared styles */
/* .sec-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
} */

.service-card-text {
    font-size: 14px;
    line-height: 1.8;
}

.service-card-content {
    padding: 20px;
    text-align: center;
    height: 100%;
}

.service-card-icon {
    margin-bottom: 15px;
}

.box-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    min-height: 50px; /* Ensure title sections are uniform in height */
}


</style>
@stop