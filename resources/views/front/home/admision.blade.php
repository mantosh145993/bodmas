@extends('front_layouts.master')
@section('content')

  <!--==============================
Project Area  
==============================-->
 
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/breadcumb-bg.jpg')}}" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="{{asset('assets/img/bg/breadcumb_shape_1_1.png')}}">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_2.png')}}" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="{{asset('assets/img/bg/breadcumb_shape_1_3.png')}}" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Admission</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li>Government Colleges</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
Project Area End
==============================-->
    <!--==============================
Servce Area  
==============================-->
    <section class="space-top space-extra2-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 order-lg-2">
                    <div class="th-sort-bar course-sort-bar">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md">
                                <p class="woocommerce-result-count">Showing <span class="text-theme">All</span> Colleges</p>
                            </div>

                            <div class="col-md-auto">
                                <div class="nav" role=tablist>
                                    <a href="#" class="active" id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-solid fa-list me-2"></i>List</a>
                                    <a  href="#" id="tab-shop-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-grid" aria-selected="false"><i class="fa-solid fa-grid-2 me-2"></i>Grid</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                            <div class="row gy-30">
                            @foreach($colleges as $college)
                                <div class="col-12">
                                    <div class="course-grid">
                                        <div class="course-img">
                                            <img src="{{ asset('assets/img/course/course_2_1.png') }}" alt="img">
                                            <span class="tag"><i class="fas fa-eye"></i> </span>
                                        </div>
                                        <div class="course-content">
                                            <h3 class="course-title">{{$college->college_name}}</h3>
                                            <button class="btn btn-primary course-apply-button">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                       

                        <div class="tab-pane fade " id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                            <div class="row gy-30">
                                @foreach($colleges as $college)
                                <div class="col-md-6 col-xl-4">
                                    <div class="course-box style2">
                                        <div class="course-content">
                                            <div class="course-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                                    <span style="width:79%">Rated <strong class="rating">4.00</strong> out of 5</span>
                                                </div>(4.7)
                                            </div>
                                            <h3 class="course-title">{{$college->college_name}}</h3>
                                            <button class="btn btn-primary course-apply-button">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="th-pagination text-center pt-50">
                    </div>
                </div>
                <!-- Search area  -->
                <div class="col-xl-3 col-lg-4 order-lg-1">
                    <aside class="sidebar-area sidebar-shop">
                    <div class="widget widget_categories style2  ">
                            <h3 class="widget_title">Select State</h3>
                            <ul>
                                <li><input id="beginnercheck" name="beginnercheck" type="checkbox" checked>
                                    <label for="beginnercheck">All State<span class="checkmark"></span></label>
                                    <select name="" id="">
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                            <div class="widget widget_search">
                            <form class="search-form">
                                <input type="text" placeholder="Search Colleges...">
                            </form>
                        </div>
                        </div>

                      
                    </aside>
                </div>
                <!-- Search area end -->
            </div>
        </div>
    </section>
    @stop
