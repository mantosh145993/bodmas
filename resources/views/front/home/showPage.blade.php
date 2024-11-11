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
                <div class="widget widget_search  ">
                    <form class="search-form">
                        <input type="text" placeholder="Search Product...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
                <div class="widget widget_categories style2  ">
                    <h3 class="widget_title">Categories</h3>
                    <ul>
                        <li><input id="beginnercheck" name="beginnercheck" type="checkbox" checked>
                            <label for="beginnercheck">Beginner<span class="checkmark"></span></label>
                            <ul class="sub-cat">
                                <li><input id="designcheck" name="designcheck" type="checkbox" checked>
                                    <label for="designcheck">Design<span class="checkmark"></span>
                                </li>
                                <li><input id="devcheck" name="devcheck" type="checkbox">
                                    <label for="devcheck">Development<span class="checkmark"></span>
                                </li>
                                <li><input id="photocheck" name="photocheck" type="checkbox">
                                    <label for="photocheck">Photography<span class="checkmark"></span>
                                </li>
                                <li><input id="musiccheck" name="musiccheck" type="checkbox">
                                    <label for="musiccheck">Music<span class="checkmark"></span>
                                </li>
                                <li><input id="cookingcheck" name="cookingcheck" type="checkbox">
                                    <label for="cookingcheck">Cooking<span class="checkmark"></span>
                                </li>
                                <li><input id="financecheck" name="financecheck" type="checkbox">
                                    <label for="financecheck">Finance<span class="checkmark"></span>
                                </li>
                                <li><input id="healthcheck" name="healthcheck" type="checkbox">
                                    <label for="healthcheck">Health<span class="checkmark"></span>
                                </li>
                                <li><input id="teccheck" name="teccheck" type="checkbox">
                                    <label for="teccheck">Technology<span class="checkmark"></span>
                                </li>
                            </ul>
                        </li>
                        <li><input id="reviewcheck" name="reviewcheck" type="checkbox">
                            <label for="reviewcheck">Intermediate<span class="checkmark"></span></label>
                        </li>
                        <li><input id="reviewcheck" name="reviewcheck" type="checkbox">
                            <label for="reviewcheck">Experts<span class="checkmark"></span></label>
                        </li>
                    </ul>
                </div>
                <div class="widget widget_price_filter style2  ">
                    <h4 class="widget_title">Price Level</h4>
                    <ul>
                        <li><input id="freecheck" name="freecheck" type="checkbox" checked>
                            <label for="freecheck">Free<span class="checkmark"></span></label>
                        </li>
                        <li><input id="paidcheck" name="paidcheck" type="checkbox">
                            <label for="paidcheck">Paid<span class="checkmark"></span></label>
                        </li>
                    </ul>
                </div>
                <div class="widget widget_time_duration style2  ">
                    <h4 class="widget_title">Time Duration</h4>
                    <ul>
                        <li><input id="timecheck1" name="timecheck1" type="checkbox">
                            <label for="timecheck1">6+hours (15)<span class="checkmark"></span></label>
                        </li>
                        <li><input id="timecheck2" name="timecheck2" type="checkbox">
                            <label for="timecheck2">6+hours (15)<span class="checkmark"></span></label>
                        </li>
                        <li><input id="timecheck3" name="timecheck3" type="checkbox">
                            <label for="timecheck3">6+hours (15)<span class="checkmark"></span></label>
                        </li>
                    </ul>
                </div>
                <div class="widget widget_instructor style2  ">
                    <h4 class="widget_title">Our Instructor</h4>
                    <ul>
                        <li><input id="instructor1" name="instructor1" type="checkbox">
                            <label for="instructor1">David Smith<span class="checkmark"></span></label>
                        </li>
                        <li><input id="instructor2" name="instructor2" type="checkbox">
                            <label for="instructor2">Alex Jender<span class="checkmark"></span></label>
                        </li>
                        <li><input id="instructor3" name="instructor3" type="checkbox">
                            <label for="instructor3">Lillian Wasla<span class="checkmark"></span></label>
                        </li>
                        <li><input id="instructor4" name="instructor4" type="checkbox">
                            <label for="instructor4">Kiara Desuza<span class="checkmark"></span></label>
                        </li>
                        <li><input id="instructor5" name="instructor5" type="checkbox">
                            <label for="instructor5">Liam Anton<span class="checkmark"></span></label>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
        <div class="col-xl-9 col-lg-8 order-lg-2 mt-5">
            {!! $page->content !!}
        </div>
    </div>
</div>
@stop



<style>
    .page-content-container {
        /* padding-top: 150px; */
        /* Adds padding for spacing */
        padding-bottom: 50px;
        /* Adds padding for spacing */
    }

    .page-content-container img {
        max-width: 100%;
        max-height: 500px;
        /* Set a maximum height for images */
        width: auto;
        /* Allow width to adjust proportionally */
        height: auto;
        /* Keep aspect ratio */
        display: block;
        /* Remove inline spacing around images */
        margin: 20px auto;
        /* Center-align images with space around */
    }

    .page-content-container p,
    .page-content-container div {
        text-align: justify;
        /* Justify text for cleaner alignment */
    }

    @media screen and (max-width: 600px) {
        .page-content-container {
            text-align: -webkit-center;
        }
    }

    @media screen and (max-width: 600px) {
        .page-content-container {
            text-align: -webkit-center;
        }

        .page-content-container p,
        .page-content-container div {
            text-align: justify;
        }

    }
</style>