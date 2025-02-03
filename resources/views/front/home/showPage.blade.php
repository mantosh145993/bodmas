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
                <!-- <div class="widget widget_categories style2">
                    <h3 class="widget_title text-center">Become A Partner</h3>
                    <form id="partnerForm" method="POST" class="p-3 shadow rounded bg-white">
                        @csrf
                        <input type="hidden" id="type" name="type" value="1">
                        <div class="mb-3">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" id="number" name="number" class="form-control" placeholder="Enter Phone Number" required pattern="[0-9]{10}">
                        </div>
                        <div class="mb-3">
                            <textarea id="message" name="message" class="form-control" placeholder="Enter Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div> -->
                <div class="widget  ">
                    <h3 class="widget_title text-center">Meeting With Ashok Sir</h3>
                    <!-- Buttons for Booking Consultation -->
                    <div class="text-center mt-3">
                        <a href="https://meetpro.club/bodmas?isCpBranding=false" target="_blank"
                            class="btn btn-primary btn-lg d-block mb-2 fw-bold shadow-sm"
                            style="border-radius: 8px;">
                            📅 Book Online Consultation
                        </a>

                        <a href="https://meetpro.club/bodmas?isCpBranding=false" target="_blank"
                            class="btn btn-outline-dark btn-lg d-block fw-bold shadow-sm"
                            style="border-radius: 8px;">
                            🏢 Book Offline Consultation
                        </a>
                    </div>

                </div>
                <!-- Mentorship Program Section -->
                <div class="widget widget_categories style2 mt-4">
                    <h3 class="widget_title text-center">Our Mentorship Program</h3>
                    <ul class="list-unstyled p-3 shadow rounded bg-white">
                        <li><a href="#">Mentorship Program for JEE</a></li>
                        <li><a href="#">Mentorship Program for NEET UG</a></li>
                        <li><a href="#">Mentorship Program for Law Aspirants</a></li>
                        <li><a href="#">Mentorship Program for CUET Aspirants</a></li>
                        <li><a href="#">Mentorship Timetable</a></li>
                    </ul>
                </div>
            </aside>
        </div>
        <?php
        $currentDomain = request()->getSchemeAndHttpHost(); // Get the current domain
        $updatedContent = str_replace("https://pilot.bodmas.co.in", $currentDomain, $page->content);
        // dd($currentDomain);
        ?>
        <div class="col-xl-6 col-lg-8 order-lg-2 mt-5 show-content">
            {!! $updatedContent !!}
        </div>
        <div class="col-xl-3 col-lg-4 order-lg-3">

            <!-- <div class="widget widget_categories style2">
                <h3 class="widget_title text-center">Contact Us</h3>
                <form id="enquiryForm" method="POST" class="p-3 shadow rounded bg-white">
                    @csrf
                    <input type="hidden" id="typeEnquiry" name="type" value="2">
                    <div class="mb-3">
                        <input type="text" id="nameEnquiry" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" id="emailEnquiry" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" id="numberEnquiry" name="number" class="form-control" placeholder="Enter Phone Number" required pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <select name="subject" id="subject" class="form-select style-white" required>
                            <option value="" disabled selected hidden>Select Course*</option>
                            <option value="mbbs">MBBS</option>
                            <option value="bds">BDS</option>
                            <option value="bums">BUMS</option>
                            <option value="bhms">BHMS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea id="messageEnquiry" name="message" class="form-control" placeholder="Enter Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div> -->
            <div class="widget widget_categories style2">
                <h3 class="widget_title text-center">Paid Guidance Program</h3>
                <ul class="list-unstyled p-3 shadow rounded bg-white">
                    @foreach ($paidGuidance as $guidance)
                    <li>
                        <a href="{{ url($guidance->url) }}" target="_blank">{{ $guidance->package_name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="widget widget_categories style2">
    <h3 class="widget_title text-center">State Wise Colleges</h3>
    
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="courseTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="mbbs-tab" data-bs-toggle="tab" href="#mbbs" role="tab">MBBS Colleges</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="bds-tab" data-bs-toggle="tab" href="#bds" role="tab">BDS Colleges</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="courseTabsContent">
        <!-- MBBS Tab -->
        <div class="tab-pane fade show active" id="mbbs" role="tabpanel">
            <ul class="list-group">
                @foreach($colleges->where('course_id', 1)->groupBy('state_name') as $state => $collegeList)
                    <li class="list-group-item">
                        <strong>{{ $state }}</strong> 
                        <ul class="ps-3">
                            @foreach($collegeList as $college)
                                <li><a href="{{ url('show/college/'.$college->slug) }}">{{ $college->slug }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- BDS Tab -->
        <div class="tab-pane fade" id="bds" role="tabpanel">
            <ul class="list-group">
                @foreach($colleges->where('course_id', 2)->groupBy('state_name') as $state => $collegeList)
                    <li class="list-group-item">
                        <strong>{{ $state }}</strong> 
                        <ul class="ps-3">
                            @foreach($collegeList as $college)
                                <li><a href="{{ url('show/college/'.$college->slug) }}">{{ $college->slug }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


        </div>
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