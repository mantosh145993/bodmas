@extends('front_layouts.master')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/blog.jpg')}}" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_2.png')}}" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_3.png')}}" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Read Blogs</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li>News</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
        Blog Area
    ==============================-->
    <section class="th-blog-wrapper blog-details space-top space-extra2-bottom">
        <div class="container">
            <div class="row gx-30">
                <div class="col-xxl-8 col-lg-7">
                    <div class="th-blog blog-single">
                        <div class="">
                            <img src="{{asset('images/feature/'. $blogs->feature_image)}}" alt="Blog Image">
                        </div>&nbsp;
                        <div class="blog-content">
                            <div class="blog-meta">
                                <i class="far fa-user"></i>&nbsp;{{$blogs->author}} &nbsp;
                               <i class="fa-light fa-calendar-days"></i>&nbsp;{{$blogs->published_at}} &nbsp;
                              <i class="fa-light fa-book"></i>&nbsp;Bodmas Blog 
                            </div>
                            <h2 style="text-decoration: underline;">{{$blogs->title}}</h2>
                           {!! $blogs->content !!}
                        </div>
                        <div class="share-links clearfix ">
                            <div class="row justify-content-between">
                                <div class="col-md-auto">
                                    <span class="share-links-title">Tags:</span>
                                    <div class="tagcloud">
                                        <a href="#">Education</a>
                                    </div>
                                </div>
                                <div class="col-md-auto text-xl-end">
                                    <span class="share-links-title">Share:</span>
                                    <ul class="social-links">
                                        <li><a href="https://www.facebook.com/bodmasservices" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.youtube.com/@BodmasMedical" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="https://in.linkedin.com/company/bodmas-education-services" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://www.instagram.com/bodmasservices/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul><!-- End Social Share -->
                                </div><!-- Share Links Area end -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="th-comments-wrap ">
                        <h2 class="blog-inner-title h5"> Comments (3)</h2>
                        <ul class="comment-list">
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater">
                                        <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Adam Jhon</h3>
                                        <span class="commented-on">25Aug, 2023 08:56pm</span>
                                        <p class="text">Through this blog, we aim to inspire readers to embrace education as a lifelong journey and to advocate for quality education that empowers individuals and communities.</p>
                                        <div class="reply_and_edit">
                                            <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                <img src="assets/img/blog/comment-author-2.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <h3 class="name">Marvin McKinney</h3>
                                                <span class="commented-on">25Aug, 2023 10:56pm</span>
                                                <p class="text">Education News and Trends: We provide updates on the latest developments and trends in the education sector, including educational research,</p>
                                                <div class="reply_and_edit">
                                                    <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater">
                                        <img src="assets/img/blog/comment-author-3.jpg" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Anadi Juila</h3>
                                        <span class="commented-on">26Aug, 2023 10:00pm</span>
                                        <p class="text">We discuss strategies to help students make informed decisions about their educational and career paths, ensuring they are prepared for success in the workforce.</p>
                                        <div class="reply_and_edit">
                                            <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>  -->
                    <!-- Comment end -->
                    <!-- Comment Form -->
                    <form class="th-comment-form ">
                        <div class="form-title">
                            <h3 class="blog-inner-title h5">Leave a Reply</h3>
                            <p class="mb-30">Your email address will not be published. Required fields are marked</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Full Name*" class="form-control ">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Your Email*" class="form-control">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" placeholder="Website*" class="form-control">
                                <i class="fal fa-globe"></i>
                            </div>
                            <div class="col-12 form-group">
                                <textarea placeholder="Comment*" class="form-control"></textarea>
                                <i class="fal fa-pencil"></i>
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="th-btn">Submit Message <i class="fas fa-arrow-right ms-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <!-- <div class="widget widget_search  ">
                            <form class="search-form">
                                <input type="text" placeholder="Search Product...">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories  ">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li><a href="service-details.html">Design</a><span>(08)</span></li>
                                <li><a href="service-details.html">Development</a> <span>(12)</span></li>
                                <li><a href="service-details.html">Photography</a><span>(15)</span></li>
                                <li><a href="service-details.html">Health</a><span>(21)</span></li>
                                <li><a href="service-details.html">Health</a><span>(14)</span></li>
                                <li><a href="service-details.html">Finance</a><span>(05)</span></li>
                                <li><a href="service-details.html">Technology</a><span>(10)</span></li>
                            </ul>
                        </div> -->
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach($current_blogs as $current_blog)
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{route('blog_details', $current_blog->slug)}}"><img src="{{asset('images/feature/'. $current_blog->feature_image)}}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{route('blog_details', $current_blog->slug)}}">{{ $current_blog->title }}</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{route('blog_details', $current_blog->slug)}}"><i class="fal fa-calendar"></i>{{ $current_blog->published_at }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud  ">
                            <h3 class="widget_title">Our Tags</h3>
                            <div class="tagcloud">
                                <a href="#">Admission</a>
                                <a href="#">Councelling</a>
                                <a href="#">Online</a>
                                <a href="#">Remote</a>
                                <a href="#">Education</a>
                                <a href="#">Solution</a>
                                <a href="#">Students</a>
                            </div>
                        </div>
                        <div class="widget widget_banner" data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">
                            <div class="widget-banner">
                                <h4 class="title">Need Help? We Are Here
                                    To Help You</h4>
                                <div class="logo"><img src="assets/img/logo.svg" alt="img"></div>
                                <h5 class="subtitle">You Get Online Courses</h5>
                                <a href="tel:+91 9511626721" class="link">+91 9511626721</a>
                                <a href="{{route('contact')}}" class="th-btn style7">Contact Us Now <i class="far fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
 
    @stop