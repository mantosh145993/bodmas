@extends('front_layouts.master')
@section('content')
<!-- Project Area  -->
<!--==============================
Event Area  
==============================-->
<section class="container position-relative">
    <div class="row">
        <div class="image-container" style="position: relative;">
            <img src="{{ asset('assets/img/all-posts.jpg') }}" alt="" style="height: 350px; width: 100%; object-fit: cover;">
            <div class="text-overlay" style="
                position: absolute; 
                top: 50%; 
                left: 50%; 
                transform: translate(-50%, -50%);
                color: white; 
                font-size: 24px; 
                font-weight: bold; 
                text-align: center; 
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                Read All Blogs & Articles
            </div>
        </div>
    </div>
</section>

<!-- blog service area  -->
<section class="overflow-hidden space" id="blog-sec">
    <div class="container">
        <div class="mb-35 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8">
                    <div class="title-area mb-md-0">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Bodmas Article & Blogs</span>
                        <h2 class="sec-title">Latest News & Blogs</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-dropdown mt-3">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Search Article Category Wise</span>
                        <select id="category-select" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="blog-container">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-xl-4">
                <div class="th-blog blog-single style2">
                    <div class="blog-img">
                        <a href="{{ route('blog_details', $blog->slug) }}">
                            <img src="{{ asset('images/feature/' . $blog->feature_image) }}" alt="Blog Image">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#"><i class="fa-light fa-user"></i>{{ $blog->author }}</a>
                            <a href="#"><i class="fa-light fa-clock"></i>{{ $blog->published_at }}</a>
                        </div>
                        <h4 class="box-title">
                            <a href="{{ route('blog_details', $blog->slug) }}">{{ $blog->title }}</a>
                        </h4>
                        <a href="{{ route('blog_details', $blog->slug) }}" class="link-btn">Read More Details<i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
<!-- blog service area end  -->

<div class="container row text-center" id="blog-container-data">
    <!-- Blogs will be dynamically rendered here -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function () {
    $('#category-select').change(function () {
        const categoryId = $(this).val();
        console.log('Selected Category ID:', categoryId);

        $.ajax({
            url: '{{ route("get_blogs_by_category") }}',
            type: 'GET',
            data: { category_id: categoryId },
            success: function (response) {
                console.log('Response:', response);

                if (response.blogs && response.blogs.length > 0) {
                    // Hide the original container
                    let blogHtml = '';
                    response.blogs.forEach(function (blog) {
                        blogHtml += `
                            <div class="col-md-6 col-xl-4">
                                <div class="th-blog blog-single style2">
                                    <div class="blog-img">
                                        <a href="/blog_details/${blog.slug}">
                                            <img src="/images/feature/${blog.feature_image}" alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <a class="author" href="#"><i class="fa-light fa-user"></i>${blog.author}</a>
                                            <a href="#"><i class="fa-light fa-clock"></i>${blog.published_at}</a>
                                        </div>
                                        <h4 class="box-title">
                                            <a href="/blog_details/${blog.slug}">${blog.title}</a>
                                        </h4>
                                        <a href="/blog_details/${blog.slug}" class="link-btn">Read More Details<i class="fas fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    $('#blog-container').hide();
                    $('.mt-4').hide();
                    $('#blog-container-data').html(blogHtml);
                } else {
                    $('#blog-container-data').html('<h6>No blogs found for the selected category.</h6>');
                }
            },
            error: function (xhr) {
                console.error('Error fetching blogs:', xhr.responseText);
            }
        });
    });
});
</script>
@stop

