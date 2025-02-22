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
    <div class="row widget_title text-center mt-5">
        <h3 class=" text-center">Consultation With Our Chief Mentor</h3>
        <div class="col text-center">
            <a href="video-meeting-counselling" target="_blank"
                class="btn btn-primary btn-lg d-block mb-2 fw-bold shadow-sm"
                style="border-radius: 8px; color:white">
                📅 Book Online Consultation
            </a>
        </div>
        <div class="col text-center">
            <a href="video-meeting-counselling" target="_blank"
                class="btn btn-outline-dark btn-lg d-block fw-bold shadow-sm"
                style="border-radius: 8px;">
                🏢 Book Offline Consultation
            </a>
        </div>
    </div>
    <!-- <div class="container mt-4">
        <h3 class="text-center">Our Mentorship Program</h3>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-between w-100" id="mentorshipTabs" role="tablist">
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <a href="{{ url('mentorship/mentorship-program-for-jee') }}" class="nav-link active bg-primary text-white">JEE</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <a href="{{ url('mentorship/mentorship-program-for-neet-ug') }}" class="nav-link bg-success text-white">NEET UG</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <a href="{{ url('mentorship/mentorship-program-for-law-aspirants') }}" class="nav-link bg-danger text-white">Law Aspirants</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <a href="{{ url('mentorship/mentorship-program-for-cuet') }}" class="nav-link bg-warning text-dark">CUET Aspirants</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <a href="{{ url('mentorship/mentorship-timetable') }}" class="nav-link bg-info text-dark">Timetable</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- Bootstrap JS (Required for Tabs) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
<div class="container">
    <div class="row">
        <!-- Main Content Section -->
        <div class="page-content-container col-xl-9 col-lg-8 order-lg-2 mt-5 show-content">
            <?php
            $currentDomain = request()->getSchemeAndHttpHost();
            $updatedContent = str_replace(
                ["https://pilot.bodmas.co.in", "https://pilot.bodmaseducation.com"],
                $currentDomain,
                $page->content
            );
            ?>

            <!-- Ensure tables inside the content are responsive -->
            <div class="table-responsive">
                {!! $updatedContent !!}
            </div>
        </div>

        <!-- Sidebar Contact Form -->
        <div class="col-xl-3 col-lg-4 mt-5">
            <!-- /////////////////// -->
            <div class="widget widget_categories style2">
                <h6 class="widget_title text-center">Explore State Colleges by Course</h6>
                <select id="courseSelect" class="">
                    <option value="">First Select Course</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
                <h6 class=" text-center mt-3">Discover Colleges Across States</h6>
                <ul id="stateList" class="list-group"></ul>
            </div>


            <!-- //////////// -->
            <div class="widget widget_categories style2">
                <h3 class="widget_title text-center">Enquiry Now</h3>
                <form id="enquiryForm" method="POST" class="p-3 shadow rounded bg-white">
                    @csrf
                    <input type="hidden" id="typeEnquiry" name="type" value="2">
                    <div class="mb-3">
                        <input type="text" id="nameEnquiry" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" id="emailEnquiry" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" id="numberEnquiry" name="number" class="form-control" placeholder="Number" required pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <select name="subject" id="subject" class="form-select" required>
                            <option value="" disabled selected hidden>Select Course*</option>
                            <option value="mbbs">MBBS</option>
                            <option value="bds">BDS</option>
                            <option value="bums">BUMS</option>
                            <option value="bhms">BHMS</option>
                            <option value="btech">B.Tech</option>
                            <option value="mba">MBA</option>
                            <option value="law">LAW</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea id="messageEnquiry" name="message" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Ensure tables are responsive */
    .table-responsive table {
        width: 100%;
        min-width: 600px;
        /* Prevents table from shrinking too much */
    }

    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    .state-item {
        background-color: #f8f9fa;
        /* Light Gray */
        padding: 10px;
        margin-bottom: 5px;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
    }

    .state-item:hover {
        background-color: #0D5EF4;
        /* Your logo color */
        color: white;
    }

    .state-item a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        display: block;
    }

    .state-item:hover a {
        color: white;
    }
</style>


</div>
</div>

@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#partnerForm').on('submit', function(e) {
            e.preventDefault();
            let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                number: $('#number').val(),
                message: $('#message').val(),
                type: $('#type').val(),
                _token: $('input[name="_token"]').val(), // CSRF token
            };
            $.ajax({
                url: "{{ route('enquiry.partner') }}", // Adjust the route name if needed
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert('We will connect soon!');
                        $('#partnerForm')[0].reset(); // Reset the form
                    } else {
                        alert('Failed to submit enquiry: ' + response.error);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

        // Enquiry Form 

        $('#enquiryForm').on('submit', function(e) {
            e.preventDefault();
            let formData = {
                name: $('#nameEnquiry').val(),
                email: $('#emailEnquiry').val(),
                number: $('#numberEnquiry').val(),
                subject: $('#subject').val(),
                message: $('#messageEnquiry').val(),
                type: $('#typeEnquiry').val(),
                _token: $('input[name="_token"]').val(), // CSRF token
            };
            $.ajax({
                url: "{{ route('enquiry.contact') }}", // Adjust the route name if needed
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert('Enquiry submitted successfully!');
                        $('#enquiryForm')[0].reset(); // Reset the form
                    } else {
                        alert('Failed to submit enquiry: ' + response.error);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });


    $(document).ready(function() {
        $('#courseSelect').on('change', function() {
            let course_id = $(this).val();
            $('#stateList').html(''); // Clear previous states

            if (course_id) {
                $.ajax({
                    url: "{{ route('getStatesByCourse') }}",
                    type: "GET",
                    data: {
                        course_id: course_id
                    },
                    success: function(states) {
                        if (states.length > 0) {
                            $.each(states, function(index, state) {
                                $('#stateList').append(
                                    '<li class="list-group-item state-item">' +
                                    '<a href="/' + state.page_slug + '">' + state.name + '</a>' +
                                    '</li>'
                                );
                            });
                        } else {
                            $('#stateList').html('<li class="list-group-item text-muted">No states available</li>');
                        }
                    }
                });
            }
        });
    });
</script>

<style>
    [data-f-id="pbf"] {
        display: none;
    }

    .show-content img {
        width: 100% !important;
        /* Make images responsive */
        height: auto;
        /* Maintain aspect ratio */
        box-shadow: 0 20px 8px rgba(0, 0, 0, 0.1);
        /* Apply the same shadow to images */
        margin-bottom: 1em;
        /* Add space below images for better layout */
        border-radius: 20px;
    }

    .widget {
        margin: 20px 0;
    }

    .widget_title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #333;
    }

    form {
        max-width: 100%;
    }

    input,
    textarea {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        width: 100%;
    }

    input:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

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