@extends('front_layouts.master')

@section('content')
<div class="container page-content-container">

    <div class="breadcumb-wrapper"
        data-bg-src="{{ $banner ? asset('images/banner/' . $banner->image) : 'assets/img/bg/breadcumb-bg.jpg' }}"
        data-overlay="title" data-opacity="8">

        <div class="breadcumb-shape" data-bg-src="{{asset('assets/img/bg/breadcumb_shape_1_1.png')}}"></div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_2.png')}}" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_3.png')}}" alt="shape">
        </div>

        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">{{ $banner ? $banner->title : 'Updated Soon' }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $banner ? $banner->title : 'Updated Soon' }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4 order-lg-1">
            <aside class="sidebar-area sidebar-shop">
                <!-- <div class="widget widget_search  ">
                    <form class="search-form">
                        <input type="text" placeholder="Search Product...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div> -->
                <div class="widget widget_categories style2">
                    <h3 class="widget_title">Our Packages</h3>
                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-12">
                                <div class="course-grid">
                                    <div class="course-content">
                                        <h6 class="course-title">{{ $package->product_name }}</h6>
                                        <p>{{ $package->description }}</p>
                                        <p><strong>Sale Price:</strong> ₹{{ number_format($package->sale_price, 2) }}</p>
                                        <p><strong>Regular Price:</strong> ₹<del style="color:red">{{ number_format($package->ragular_price, 2) }}</del></p>
                                        <button class="btn btn-primary course-apply-button p-1">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
        <div class="col-xl-9 col-lg-8 order-lg-2 mt-5 show-content">
            {!! $page->content !!}
        </div>
    </div>
</div>
@stop
<style>
.show-content h1,
.show-content h2,
.show-content h3,
.show-content h4,
.show-content h5,
.show-content h6 {
font-family: 'Playfair Display', serif;
    color: #333;
}
.page-content-container p {
    font-family: 'Georgia', serif;
    line-height: 1.6;
    margin-bottom: 15px;
    color: black;
}
@media screen and (max-width: 600px) {
    .page-content-container img {
        max-width: 100%;
        max-height: 300px;
    }
    .page-content-container h1 {
        font-size: 1.8em;
    }
    .page-content-container p {
        font-size: 1em;
    }
}
</style>