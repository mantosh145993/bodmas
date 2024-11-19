    @extends('front_layouts.master')
    @section('content')
    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="assets/img/bg/breadcumb_shape_1_2.png" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="assets/img/bg/breadcumb_shape_1_3.png" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">NEET College Predictor</h1>
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
                        <span class="sub-title">NEET Predictor !</span>
                        <h2 class="border-title">NEET College Predictor </h2>
                        <p class="mt-n1 mb-30 sec-text">Built using the latest data from official government websites, this predictor is free, reliable and easy to use.</p>
                        <form action="{{ route('predict.college') }}" method="POST" class="contact-form ajax-contact" id="predictForm">
                            @csrf

                            <div class="form-group">
                                <select name="quota" class="nice-select form-select style-white" id="quota" required >
                                    <option value="" disabled selected hidden>Select Quota*</option>
                                    <option value="1">All India Quota</option>
                                    <option value="2">State Quota</option>
                                </select>
                            </div>

                            <!-- State dropdown (this will be populated for "State Quota") -->
                            <div class="form-group" id="state-container" style="display: none;">
                                <select name="state" class="nice-select form-select style-white" id="state" required>
                                    <option value="" disabled selected hidden>Select State*</option>
                                </select>
                            </div>

                            <!-- Category dropdown (this will be populated via AJAX) -->
                            <div class="form-group">
                                <select name="category" class="nice-select form-select style-white" id="category">
                                    <option value="" disabled selected hidden>Select Category*</option>
                                </select>
                            </div>

                            <!-- Subcategory dropdown (this will be populated for "State Quota") -->
                            <div class="form-group" id="subcategory-container" style="display: none;">
                                <select name="subcategory" class="nice-select form-select style-white" id="subcategory">
                                    <option value="" disabled selected hidden>Select Subcategory*</option>
                                </select>
                            </div>
                            <!-- Form contents as provided -->
                            <div class="form-group">
                                <select name="course" id="subject" class="nice-select form-select style-white">
                                    <option value="" disabled selected hidden>Select a Course*</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->title }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="round" class="nice-select form-select style-white">
                                    <option value="" disabled selected hidden>Select Round Number*</option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">3rd</option>
                                    <option value="4">4th</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="rank" placeholder="Enter your rank...">
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
                <h4> Predicted Colleges..</h4>

                <div id="error-message"></div>
                <!-- Table to display predictions -->
                <table id="predictions-table">
                    <thead>
                        <tr>
                            <th>College Name</th>
                            <th>Course</th>
                            <th>Category</th>
                            <th>Cutoff</th>
                            <th>Round</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Predictions will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Error message container -->
    </div>
    @stop
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const errorMessage = document.getElementById('error-message'); // Ensure this exists in your HTML

            document.getElementById('predictButton').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get the form data
                let formData = new FormData(document.getElementById('predictForm'));

                // Send the AJAX request
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

                        // Check if the response indicates success
                        if (data.success) {
                            messageElement.textContent = 'Prediction Successful';
                            messageElement.style.color = 'green';
                            errorMessage.innerHTML = ''; // Clear any previous error message

                            // Display the predictions in the table
                            displayPredictions(data.predictions);
                        } else {
                            // If success is false, display the error message
                            messageElement.textContent = ''; // Clear the success message if any
                            errorMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.querySelector('.form-messages').textContent = 'An error occurred. Please try again.';
                        document.querySelector('.form-messages').style.color = 'red';
                    });
            });
        });

        function displayPredictions(predictions) {
            const tableBody = document.querySelector('#predictions-table tbody');
            const errorMessage = document.getElementById('error-message');
            tableBody.innerHTML = ''; // Clear any existing rows

            if (predictions && predictions.length > 0) {
                errorMessage.innerHTML = ''; // Clear any error message
                predictions.forEach(prediction => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td>${prediction.college_name}</td>
                <td>${prediction.course}</td>
                <td>${prediction.category || 'N/A'}</td>
                <td>${prediction.rank}</td>
                <td>${prediction.round || 'N/A'}</td>
            `;
                    tableBody.appendChild(row);
                });
            } else {
                // If no predictions, show an appropriate message
                errorMessage.innerHTML = `<div class="alert alert-danger">No predictions available.</div>`;
            }
        }



        $(document).ready(function() {
            $('#quota').change(function() {
                var quota = $(this).val(); 
                $('#category').html('<option value="" disabled selected hidden>Select Category*</option>'); // Reset categories
                $('#subcategory-container').hide(); // Hide subcategory dropdown

                if (quota) {
                    $.ajax({
                        url: '/get-categories', // The route for fetching categories/subcategories
                        method: 'GET',
                        data: {
                            quota: quota
                        },
                        success: function(response) {
                            if (response.categories.length > 0) {
                                var categoryOptions = '<option value="" disabled selected hidden>Select Category*</option>';
                                $.each(response.categories, function(index, category) {
                                    categoryOptions += '<option value="' + category.id + '">' + category.name + '</option>';
                                });
                                $('#category').html(categoryOptions);
                            }
                            if (quota == 2) {
                                $('#state-container').show(); // Show the state dropdown
                                loadStates(); // Call function to load states
                                $('#subcategory-container').show();
                            }
                        }
                    });
                }
            });

             // Function to load all states via AJAX
            function loadStates() {
                $.ajax({
                    url: '/get-states', // Route for fetching states
                    method: 'GET',
                    success: function(response) {
                        var stateOptions = '<option value="" disabled selected hidden>Select State*</option>';
                        if (response.states.length > 0) {
                            $.each(response.states, function(index, state) {
                                stateOptions += '<option value="' + state.id + '">' + state.name + '</option>';
                            });
                        } else {
                            stateOptions += '<option value="" disabled>No States Available</option>';
                        }
                        $('#state').html(stateOptions);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading states:', error);
                    }
                });
            }

            // Listen for changes in the category dropdown to populate the subcategory
            $('#category').change(function() {
                var categoryId = $(this).val(); 

                if (categoryId) {
                    $.ajax({
                        url: '/get-subcategories',
                        method: 'GET',
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            var subcategoryOptions = '<option value="" disabled selected hidden>Select Subcategory*</option>';
                            if (response.subcategories.length > 0) {
                                $.each(response.subcategories, function(index, subcategory) {
                                    subcategoryOptions += '<option value="' + subcategory.id + '">' + subcategory.name + '</option>';
                                });
                                $('#subcategory').html(subcategoryOptions);
                            } else {
                                $('#subcategory').html('<option value="" disabled>No Subcategories</option>');
                            }
                        }
                    });
                }
            });
        });
    </script>