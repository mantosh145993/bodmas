@extends('front_layouts.master')
    @section('content')


    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/jee.jpg')}}" data-overlay="title" data-opacity="8">
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
                <h1 class="breadcumb-title">JEE Main College Predictor 2025</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li>College Predictor</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
Contact Area  
==============================-->


    <div class="space" id="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-form-wrap" data-bg-src="assets/img/bg/contact_bg_1.png">
                        <span class="sub-title">JEE Main Predictor !</span>
                        <h2 class="border-title">JEE Main College Predictor </h2>
                        <p class="mt-n1 mb-30 sec-text">Built using the latest data from official government websites, this predictor is free, reliable and easy to use.</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form class="contact-form ajax-contact" id="predictForm">
                            @csrf

                            <div class="form-group">
                                <input type="text" id="name" name="name" placeholder="Enter your name">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your Email" required>
                            </div>

                            <div class="form-group">
                                <input type="number" name="number" placeholder="Enter your number" id="phoneNumber" placeholder="Enter your number" oninput="validateNumberInput(this)" required>
                            </div>

                            <div class="form-group">
                                <input type="number" name="rank" placeholder="Enter your rank..." required>
                            </div>

                            <div class="form-group" id="state-container">
                                <select name="state" class="nice-select form-select style-white" id="state">
                                    <option value="" disabled selected hidden>Select Domicile*</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Category dropdown (this will be populated via AJAX) -->
                            <div class="form-group" id="category-container" style="display: none;">
                                <select name="category" class="nice-select form-select style-white" id="category">
                                    <option value="" disabled selected hidden>Select Category*</option>
                                </select>
                            </div>

                            <div class="form-group" id="subcategory-container" style="display: none;">
                                <select name="subcategory" class="nice-select form-select style-white" id="subcategory">
                                    <option value="" disabled selected hidden>Select Subcategory*</option>
                                </select>
                            </div>

                            <!-- Form contents as provided -->
                            <div class="form-group">
                            <select name="course" id="subject" class="nice-select form-select style-white">
                                <option value="" disabled selected hidden>Select a Course*</option>

                                {{-- Define jeeCourse array --}}
                                @php
                                    $jeeCourse = ['NIT', 'IIIT', 'GFTI'];
                                @endphp

                                {{-- Loop through jeeCourse array --}}
                                @foreach($jeeCourse as $course)
                                    <option value="{{ $course }}">{{ $course }}</option>
                                @endforeach
                            </select>
                        </div>


                            <div class="form-group">
                                <select name="budget" class="nice-select form-select style-white">
                                    <option value="" disabled selected hidden>Select Your Mention Budget*</option>
                                    <option value="100000">Less 1 lakh</option>
                                    <option value="400000">2 to 4 lakh</option>
                                    <option value="800000">4 to 8 lakh</option>
                                    <option value="1200000">8 to 12 lakh</option>
                                    <option value="1800000">12 to 18 lakh</option>
                                    <option value="2400000">18 to 24 lakh</option>
                                    <option value="3000000">24 to 30 lakh</option>
                                    <option value="9000000">Above 30 lakh</option>
                                </select>
                            </div>
                            <div class="form-btn col-12 mt-10">
                                <button type="button" class="th-btn" id="predictButton">Predict College<i class="fas fa-long-arrow-right ms-2"></i></button>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>

                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <h4>Predicted Colleges</h4>

                <div class="table-responsive"> <!-- Added this wrapper for responsiveness -->
                    <table id="predictions-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Brance</th>
                                <th>Fee</th>
                                <th>Quota</th>
                                <th>Course</th>
                                <th>Category</th>
                                <th>Rank</th>
                                <th>Round</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div id="error-message"></div>
                            <!-- Predictions will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- Error message container -->
    </div>

    <!-- Paid Cutoff  -->
    <section class="space" data-bg-src="assets/img/bg/course_bg_1.png" id="paid-cutoff-sec">
        <div class="container">
            <div class="mb-35 text-center text-md-start">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-8">
                        <div class="title-area mb-md-0">
                            <span class="sub-title"><i class="fal fa-book me-2"></i> Paid Cutoffs</span>
                            <h2 class="sec-title">Our Popular Paid Cutoffs</h2>
                        </div>
                    </div>
                    <div class="col-md-auto">

                    </div>
                </div>
            </div>
            <div class="row slider-shadow th-carousel course-slider-1"
                data-slide-show="4"
                data-ml-slide-show="3"
                data-lg-slide-show="3"
                data-md-slide-show="2"
                data-sm-slide-show="1"
                data-arrows="true">
                @foreach($paidCutoffs as $cutoff)
                <div class="col-md-6 col-lg-4">
                    <div class="course-box">
                        <div class="course-img">
                            <img src="{{ asset('images/package/' . $cutoff['images']) }}" alt="{{ $cutoff['product_name'] }}">
                        </div>
                        <div class="course-content text-center">
                            <h3 class="course-title">
                            </h3>
                            {{$cutoff['product_name']}}
                            <div class="course-price">
                                <del style="color:red"> <span class="base-price">₹{{ number_format($cutoff['ragular_price'], 2) }}</span></del>
                                <strong class="total-price">Total: ₹{{ number_format($cutoff['sale_price'], 2) }}</strong>
                            </div>
                            <div class="text-center mb-2 mt-2">
                                <form action="{{ route('payment.paidcutoff') }}" method="POST">
                                    <input type="hidden" name="cutoff_id" value="{{$cutoff['id'] }}">
                                    @csrf
                                    <script
                                        src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-id="{{ $cutoff['id'] }}"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{ $cutoff['sale_price'] * 100 }}"
                                        data-buttontext="Pay Now"
                                        data-name="{{ $cutoff['package_name'] }}"
                                        data-description="{{ $cutoff['product_name'] }}"
                                        data-prefill.name="{{ $cutoff['id'] }}"
                                        data-prefill.email="email"
                                        data-image="{{ asset('assets/img/logo1.png') }}"
                                        data-theme.color="#0D5EF4">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Paid Cutoff end  -->
    <style>
        .razorpay-payment-button {
            background-color: #0D5EF4 !important;
            color: white !important;
            border: none !important;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    @stop
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const errorMessage = document.getElementById('error-message'); // Ensure this exists in your HTML
            document.getElementById('predictButton').addEventListener('click', function(event) {
                event.preventDefault();
                // Call the validateForm function to check all fields
                if (!validateForm()) {
                    return; // Stop execution if validation fails all file included here
                }
                let formData = new FormData(document.getElementById('predictForm'));
                fetch("{{ route('predict.college') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF Token for Laravel
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        const messageElement = document.querySelector('.form-messages');
                        if (data.success) {
                            messageElement.textContent = 'Prediction Successful';
                            messageElement.style.color = 'green';
                            errorMessage.innerHTML = '';
                            displayPredictions(data.predictions);
                        } else {
                            messageElement.textContent = '';
                            errorMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.querySelector('.form-messages').textContent = 'An error occurred. Please try again.';
                        document.querySelector('.form-messages').style.color = 'red';
                    });
            });

            function displayPredictions(predictions) {
                const table = $('#predictions-table'); // Use jQuery to target the table
                const errorMessage = document.getElementById('error-message');

                // Clear any existing error message
                errorMessage.innerHTML = '';

                if (predictions && predictions.length > 0) {
                    // Destroy existing DataTable instance if it exists
                    if ($.fn.DataTable.isDataTable(table)) {
                        table.DataTable().destroy();
                    }

                    // Clear table body
                    table.find('tbody').empty();

                    // Populate the table body with predictions
                    predictions.forEach(prediction => {
                        const row = `
                <tr>
                    <td>${prediction.college_name}</td>
                     <td>${prediction.branch ? prediction.branch : 'N/A'}</td>
                    <td>${prediction.fee ? prediction.fee : 'N/A'}</td>
                    <td>${prediction.quota == 2 ? 'Pvt' : 'Govt'}</td>
                    <td>${prediction.course}</td>
                    <td>${prediction.category || 'N/A'}</td>
                    <td>${prediction.rank}</td>
                    <td>${prediction.round || 'N/A'}</td>
                </tr>
            `;
                        table.find('tbody').append(row);
                    });

                    // Initialize DataTable
                    table.DataTable({
                        paging: true, // Enable pagination
                        searching: true, // Enable search box
                        info: true, // Show table information
                        lengthChange: true, // Allow changing page length
                        pageLength: 10, // Set default page length
                        columnDefs: [{
                                orderable: false,
                                targets: []
                            }, // Specify any columns to exclude from sorting
                        ],
                        language: {
                            paginate: {
                                previous: "Back", // Custom text for "Previous"
                                next: "More Colleges", // Custom text for "Next"
                            },
                            info: "We are present college list according provided rank! ",
                            infoEmpty: "No data available",
                            infoFiltered: "(filtered rank from total _MAX_ colleges)",
                        },
                    });

                } else {
                    // Show an error message if no predictions are available
                    errorMessage.innerHTML = `<div class="alert alert-danger">No predictions available.</div>`;
                }
            }




            function validateForm() {
                let isValid = true; // Track if all validations pass
                const form = document.getElementById('predictForm');

                // Validate each input field
                $(form)
                    .find('input, select')
                    .each(function() {
                        const field = $(this);
                        const fieldName = field.attr('name');

                        // Check required fields
                        if (field.prop('required') && field.val().trim() === '') {
                            Swal.fire({
                                title: 'Missing Field',
                                text: `Please fill out the "${fieldName}" field.`,
                                icon: 'warning',
                                confirmButtonText: 'OK',
                            });
                            field.focus();
                            isValid = false;
                            return false; // Break out of the loop
                        }
                    });

                return isValid; // Return the final validation result
            }
            $('#state').change(function() {
                var state = $(this).val(); // Get the selected state value
                $('#state-container').show(); // Show the category container
                $('#category-container').show();
                $('#category').html('<option value="" disabled selected hidden>Select Category*</option>');
                // $('#subcategory').html('<option value="" disabled selected hidden>Select Subcategory*</option>');

                if (state) {
                    $.ajax({
                        url: '/get-categories', // Route for fetching categories
                        method: 'GET',
                        data: {
                            state: state
                        },
                        success: function(response) {
                            if (response.categories && response.categories.length > 0) {
                                var categoryOptions = '<option value="" disabled selected hidden>Select Category*</option>';
                                $.each(response.categories, function(index, category) {
                                    categoryOptions += '<option value="' + category.id + '">' + category.name + '</option>';
                                });
                                $('#category').html(categoryOptions); // Populate categories dropdown
                            } else {
                                $('#category').html('<option value="" disabled>No Categories Available</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching categories:', error);
                        }
                    });
                }
            });
            // On selecting a category
            $('#category').change(function() {
                var state = $('#state').val();
                var categoryId = $(this).val(); // Get the selected category value
                $('#subcategory-container').show(); // Show the subcategory container
                $('#subcategory').html('<option value="" disabled selected hidden>Select Subcategory*</option>'); // Reset subcategories dropdown

                if (categoryId) {
                    $.ajax({
                        url: '/get-subcategories',
                        method: 'GET',
                        data: {
                            category_id: categoryId,
                            state: state
                        },
                        success: function(response) {
                            if (response.subcategories && response.subcategories.length > 0) {
                                var subcategoryOptions = '<option value="" disabled selected hidden>Select Subcategory*</option>';
                                $.each(response.subcategories, function(index, subcategory) {
                                    subcategoryOptions += '<option value="' + subcategory.id + '">' + subcategory.name + '  ' + (subcategory.description ? subcategory.description : ' ') + '</option>';
                                });
                                $('#subcategory').html(subcategoryOptions); // Populate subcategories dropdown
                            } else {
                                $('#subcategory').html('<option value="">No Subcategories Available</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching subcategories:', error);
                        }
                    });
                }
            });
        });

        function validateNumberInput(input) {
            if (input.value.length > 12) {
                input.value = input.value.slice(0, 12);
            }
        }
    </script>