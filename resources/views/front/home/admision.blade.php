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
                <li>All Colleges</li>
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
                                <a href="#" class="active" id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-solid fa-list me-2"></i>Government</a>
                                <a href="#" id="tab-shop-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-grid" aria-selected="false"><i class="fa-solid fa-grid-2 me-2"></i>Private</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                    <div class="collegeList" class="col-xl-9 col-lg-8 order-lg-2">
                        <!-- Colleges will be displayed here -->
                    </div>
                        <div class="row gy-30" id="govt">
                            @foreach($colleges as $college)
                            <div class="col-12">
                                <div class="course-grid">
                                    <div class="course-img">
                                        <img src="{{ asset('college/' . $college->image) }}"
                                            alt="{{ $college->title }}"
                                            class="img-fluid college-img"
                                            style="width: 250px; height: 150px; object-fit: cover; border-radius: 5px;">
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-title">{{ $college->name }}</h3>
                                        <p><strong>Address :</strong> {{$college->address}}</p>
                                      <button class="btn" style="margin-top: 10px;">
                                    <a href="{{route('contact')}}" style="text-decoration: none; color: white; padding: 5px 10px; background-color: #007bff; border-radius: 5px;">Apply Now</a>
                                </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade " id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                   
                        <div class="row gy-30" id="pvt">
                            @foreach($privats as $privat)
                            <div class="col-md-6 col-xl-4">
                                <div class="course-box style2">
                                    <div class="course-content">
                                        <div class="course-img">
                                            <img src="{{ asset('college/' . $privat->image) }}"
                                                alt="{{ $privat->title }}"
                                                class="img-fluid college-img"
                                                style="width:300px; height:200px">
                                        </div>
                                        <h3 class="course-title">{{$privat->name}}</h3>
                                        <p><strong>Address :</strong> {{$privat->address}}</p>
                                      <button class="btn" style="margin-top: 10px;">
                                    <a href="{{route('contact')}}" style="text-decoration: none; color: white; padding: 5px 10px; background-color: #007bff; border-radius: 5px;">Apply Now</a>
                                </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="collegeList" class="col-xl-9 col-lg-8 order-lg-2">
                        <!-- Colleges will be displayed here -->
                    </div>
                    </div>
                </div>
                <div class="th-pagination text-center pt-50">
                </div>
            </div>
            <!-- Search area  -->
            <div class="col-xl-3 col-lg-4 order-lg-1">
                <aside class="sidebar-area sidebar-shop">
                    <div class="widget widget_categories style2">
                        <h3 class="widget_title">Select State</h3>
                        <ul>
                            <li>
                                <input id="allStateCheck" name="allStateCheck" type="checkbox">
                                <label for="allStateCheck">All States<span class="checkmark"></span></label>
                            </li>
                            <li>
                                <select name="state_id" id="stateDropdown">
                                    <option value="">Select a State</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            
        </div>
    </div>
</section>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#stateDropdown').on('change', function() {
            var stateId = $(this).val();
            var collegeListContainer = $('.collegeList');

            collegeListContainer.html('<p>Loading colleges...</p>');

            $.ajax({
                url: '/get-colleges-by-state', // Backend route
                method: 'GET', // Use GET instead of POST
                data: {
                    state_id: stateId
                },
                success: function(response) {
                    var collegesHtml = '';
                    if (response.length > 0) {
                        $('#govt').hide();
                        $('#pvt').hide();
                        $.each(response, function(index, college) {
                            collegesHtml += `
                            <div class="college-card" style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                            <div style="flex-shrink: 0; margin-right: 15px;">
                                <img src="/college/${college.image}" alt="${college.name}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                            </div>
                            <div>
                                <h6> ${college.name}</h6>
                                <p><strong>Address:</strong> ${college.address || 'No address available.'}</p>
                                 <button class="btn" style="margin-top: 10px;">
                                    <a href="/contact" style="text-decoration: none; color: white; padding: 5px 10px; background-color: #007bff; border-radius: 5px;">Apply Now</a>
                                </button>
                            </div>
                        </div>
                        `;
                        });
                    } else {
                        collegesHtml = '<p>No colleges found for the selected state.</p>';
                    }
                    collegeListContainer.html(collegesHtml);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading colleges:', error);
                    collegeListContainer.html('<p>Failed to load colleges. Please try again later.</p>');
                }
            });
        });
    });
</script>