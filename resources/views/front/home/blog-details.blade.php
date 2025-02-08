@extends('front_layouts.master')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/blog.jpeg')}}" data-overlay="title" data-opacity="8">
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
                        <i class="far fa-user"></i>&nbsp;Editor: {{$blogs->author}} &nbsp;
                        <i class="far fa-calendar-alt"></i> Published at: &nbsp;{{$blogs->published_at}} &nbsp;
                        <i class="far fa-eye"></i> Views: {{ $blogs->views }}
                    </div>
                    <div class="container page-content-container col-xl-12 col-lg-8 order-lg-2 mt-5 show-content">
                        <?php
                        $currentDomain = request()->getSchemeAndHttpHost(); // Get the current domain
                        $updatedContent = str_replace(
                            ["https://pilot.bodmas.co.in", "https://pilot.bodmaseducation.com"], 
                            $currentDomain, 
                            $blogs->content
                        );
                        ?>
                        {!! $updatedContent !!}
                    </div>

                    </div>
                    <div class="share-links clearfix ">
                        <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <span class="share-links-title">Tags:</span>
                                <div class="tagcloud">
                                    @if($blogs->tags)
                                    @php
                                    // Decode the JSON string into an array
                                    $tags = json_decode($blogs->tags, true);
                                    @endphp

                                    @foreach($tags as $tag)
                                    <a href=""> <span class="tag">{{ $tag }}</span> </a>
                                    @endforeach
                                    @else
                                    <p>No tags available</p>
                                    @endif
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
                    <div class="col-md-auto mt-3">
                        <div class="author-description">
                            <span class="author-name">{{ $blogs->author }}</span>
                            <p class="author-bio">{{ $blogs->author_description }}</p>
                            
                        </div>
                    </div>

                </div>
                <!-- Comment Form -->
                <!-- <form class="th-comment-form ">
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
                </form> -->
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
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
                    <div class="widget widget_banner" data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">
                        <div class="widget-banner">
                            <h4 class="title">Need Help? We Are Here
                                To Help You</h4>
                            <!-- <div class="logo"><img src="assets/img/logo.svg" alt="img"></div> -->
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

<style>
 /* Blog Content Container */
 .blog-content {
    font-family: 'Roboto', 'Arial', sans-serif; /* Professional and clean font */
    color: #212529; /* Neutral dark gray text for readability */
    line-height: 1.8; /* Comfortable line spacing for better readability */
    background-color: #ffffff; /* Clean white background */
    padding: 20px!important; /* Padding around the content */
    border-radius: 8px; /* Smooth corners for modern look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Blog Meta Information */
.blog-meta {
    font-size: 14px; /* Smaller font for meta details */
    color: #6c757d; /* Muted gray for secondary info */
    margin-bottom: 10px; /* Space below the meta section */
    padding: 6px;
}

.blog-meta i {
    color: #0D5EF4; /* Blue icons for emphasis */
}

/* Blog Title (H3) */
.blog-content h3 {
    font-size: 28px; /* Prominent size for the blog title */
    color: #000; /* Blue for a professional highlight */
    margin-bottom: 20px; /* Space below the title */
    padding: 6px;
    font-weight: 400 !important;
}

/* Dynamic Content Typography */

/* Headings */
.blog-content h1 {
    font-size: 36px; /* Largest heading size */
    font-weight: 0; /* Bold for emphasis */
    margin: 20px 0; /* Space around headings */
    color: #343a40; /* Slightly darker gray */
    padding: 6px;
}

.blog-content h2 {
    font-size: 30px; /* Second largest heading size */
    font-weight: 600; /* Semi-bold for clarity */
    margin: 18px 0;
    color: #495057; /* Neutral dark gray */
    padding: 6px;
}

.blog-content h3 {
    font-size: 26px;
    font-weight: 600;
    margin: 16px 0;
    color: black;
    padding: 6px;
}

.blog-content h4 {
    font-size: 19px;
    font-weight: 300; /* Slightly lighter for subheadings */
    margin: 14px 0;
    color: black;
    padding: 6px;
}

.blog-content h5 {
    font-size: 18px;
    font-weight: 200;
    margin: 12px 0;
    color: black;
    padding: 6px;
}

.blog-content h6 {
    font-size: 16px;
    font-weight: 100; /* Normal weight for smaller headings */
    margin: 10px 0;
    color: black; /* Muted gray for minor headings */
    padding: 6px;
}

/* Paragraphs */
.blog-content p {
    font-size: 16px; /* Standard text size */
    line-height: 1.8; /* Comfortable line spacing */
    margin-bottom: 16px; /* Space between paragraphs */
    color: #212529; /* Primary dark gray for text */
    text-align: justify; /* Clean justified text */
    padding: px;
}

/* Lists */
.blog-content ul, .blog-content ol {
    margin: 20px 0;
    padding-left: 40px; /* Indentation for lists */
    color: #212529; /* Standard text color */
}

.blog-content ul li, .blog-content ol li {
    margin-bottom: 8px; /* Space between list items */
}

/* Links */
.blog-content a {
    color: #0D5EF4; /* Blue for links */
    text-decoration: none; /* No underline */
    font-weight: 500; /* Medium weight for better visibility */
    transition: color 0.3s ease; /* Smooth hover effect */
}

.blog-content a:hover {
    color: #0941A6; /* Darker blue on hover */
    text-decoration: underline; /* Add underline on hover */
}

/* Blockquotes */
.blog-content blockquote {
    font-style: italic;
    color: #6c757d; /* Muted gray for quotes */
    border-left: 4px solid #0D5EF4; /* Blue left border */
    padding-left: 16px; /* Indentation for quotes */
    margin: 20px 0; /* Space around blockquote */
}

/* Images */
.blog-content img {
    max-width: 100%; /* Responsive images */
    border-radius: 6px; /* Smooth corners */
    margin: 20px 0; /* Space around images */
}

/* Tables */
.blog-content table {
    width: 100%; /* Full-width tables */
    border-collapse: collapse; /* No double borders */
    margin: 20px 0; /* Space around table */
    font-size: 14px; /* Slightly smaller text for tables */
}

.blog-content table th, .blog-content table td {
    border: 1px solid #dee2e6; /* Light gray borders */
    padding: 10px; /* Spacing inside cells */
    text-align: left; /* Left-align text */
}

.blog-content table th {
    background-color: #f8f9fa; /* Light gray header background */
    font-weight: 600; /* Semi-bold for headers */
}

/* Code Blocks */
.blog-content pre {
    background-color: #f8f9fa; /* Light gray background */
    padding: 15px;
    border-radius: 6px; /* Rounded corners */
    overflow-x: auto; /* Scroll for long lines */
}

.blog-content code {
    background-color: #e9ecef; /* Slightly darker gray */
    padding: 2px 4px;
    border-radius: 4px;
    color: #d63384; /* Highlight for inline code */
}
    .author-description {
        background-color: #f9f9f9; /* Light grey background */
        padding: 20px;
        border-radius: 10px; /* Rounded corners */
        border: 1px solid #ddd; /* Subtle border */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        max-width: 100%; /* Limit the width for better readability */
    }

    .author-name {
        display: block; /* Ensure the name is on its own line */
        font-size: 18px;
        font-weight: bold;
        color: #333; /* Dark text for better readability */
        margin-bottom: 10px; /* Space between name and bio */
    }

    .author-bio {
        font-size: 14px;
        line-height: 1.6; /* Better line spacing */
        color: #555; /* Softer color for description text */
        margin: 0; /* Remove default margin for clean alignment */
    }

    .author-description:hover {
        background-color: #f0f8ff; /* Light blue background on hover */
        border-color: #007bff; /* Highlight border on hover */
    }
    [data-f-id="pbf"] {
    display: none;
  }
</style>
