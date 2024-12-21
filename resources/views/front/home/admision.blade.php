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
                                        @foreach($courses as $course)
                                        @if($course->id == $college->course_id)
                                        <p><strong>Course : </strong> {{ $course->title }}</p>
                                        @break
                                        @endif
                                        @endforeach
                                        <!-- <p><strong>Course : </strong> N/A</p> -->
                                        <p><strong>Type :</strong> {{$college->type}}</p>
                                        <p><strong>Address :</strong> {{$college->address}}</p>
                                        <button class="btn" style="margin-top: 10px;">
                                            <a href="{{route('contact')}}" style="text-decoration: none; color: white; padding: 5px 10px; background-color: #007bff; border-radius: 5px;">Apply Now</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
            <!-- Search area  -->
            <div class="col-xl-3 col-lg-4 order-lg-1">
                <aside class="sidebar-area sidebar-shop">
                    <!-- Widget for State Selection -->
                    <div class="widget widget_categories style2">
                        <h3 class="widget_title">Filter Options</h3>
                        <ul class="filter-options">
                            <!-- Dropdown for State Selection -->
                            <li>
                                <label for="stateDropdown">Select State:</label>
                                <select name="state_id" id="stateDropdown">
                                    <option value="">Select a State</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </li>

                            <!-- Dropdown for Course Selection -->
                            <li>
                                <label for="courseDropdown">Select Course:</label>
                                <select name="course" id="courseDropdown">
                                    <option value="">Select a Course</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </li>

                            <!-- Dropdown for Type Selection -->
                            <li>
                                <label for="typeDropdown">Select Type:</label>
                                <select name="type" id="typeDropdown">
                                    <option value="">Select a Type</option>
                                    <option id="gov" value="Government">Government</option>
                                    <option id="pvt" value="Private">Private</option>
                                </select>
                            </li>

                            <!-- Search Button -->
                            <li class="search-button-container">
                                <button id="searchButton" class="btn btn-primary">Search Colleges</button>
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
        const stateDropdown = $('#stateDropdown');
        const courseDropdown = $('#courseDropdown');
        const typeDropdown = $('#typeDropdown');
        const searchButton = $('#searchButton');
        const collegeListContainer = $('.collegeList');

        const stateTypeMapping = {
            '35': 'Government', // Example: state_id 10 allows only "Government"
            '36': 'Private', // Example: state_id 35 allows only "Private"
            // Add other mappings as needed
        };

        $('#stateDropdown').on('change', function() {
            const selectedStateId = $(this).val(); // Get the selected state_id
            const allowedType = stateTypeMapping[selectedStateId]; // Get allowed type for selected state
            const typeDropdown = $('#typeDropdown');

            // Reset Type Dropdown
            typeDropdown.val('');
            typeDropdown.find('option').show(); // Reset visibility of all options

            if (allowedType) {
                // Hide all options except the allowed type
                typeDropdown.find('option').each(function() {
                    if ($(this).val() !== allowedType && $(this).val() !== '') {
                        $(this).hide();
                    }
                });
            }
        });
        // Triggered when the search button is clicked
        searchButton.on('click', function() {
            const stateId = stateDropdown.val();
            const courseId = courseDropdown.val();
            const type = typeDropdown.val();

            collegeListContainer.html('<p>Loading colleges...</p>');

            // Send all filters in one request
            $.ajax({
                url: '/get-colleges-by-state', // Combined route for all filters
                method: 'GET', // Use GET to send data
                data: {
                    state_id: stateId,
                    course_id: courseId,
                    type: type
                },
                success: function(response) {
                    const colleges = response.colleges; // List of colleges
                    const courses = response.courses; // Optional: List of all courses (if needed)
                    let collegesHtml = '';

                    if (colleges.length > 0) {
                        $('#govt').hide(); // Hide government filter element if necessary

                        $.each(colleges, function(index, college) {
                            const course = courses.find(course => course.id === college.course_id);
                            collegesHtml += `
            <div class="college-card" style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                <div style="flex-shrink: 0; margin-right: 15px;">
                    <img src="/college/${college.image}" alt="${college.name}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                </div>
                <div>
                    <h6>${college.name}</h6>
                     <p><strong>Course:</strong> ${course ? course.title : 'N/A'}</p>
                    <p><strong>Type:</strong> ${college.type || 'No types available.'}</p>
                    <p><strong>Address:</strong> ${college.address || 'No address available.'}</p>
                    <button class="btn" style="margin-top: 10px;">
                        <a href="/contact" style="text-decoration: none; color: white; padding: 5px 10px; background-color: #007bff; border-radius: 5px;">Apply Now</a>
                    </button>
                </div>
            </div>
            `;
                        });
                    } else {
                        collegesHtml = '<p>No colleges found based on the selected filters.</p>';
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
<style>
    .sidebar-area {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .widget_title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    .filter-options li {
        margin-bottom: 10px;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
    }

    label {
        font-size: 14px;
        color: #555;
        margin-left: 8px;
    }

    select,
    input[type="checkbox"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .search-button-container {
        text-align: center;
        margin-top: 15px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>