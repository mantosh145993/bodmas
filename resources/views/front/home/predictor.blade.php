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
                <!-- <div class="col-xl-5 mb-30 mb-xl-0">
                    <div class="me-xxl-5 mt-60">
                        <div class="title-area mb-25">
                            <h2 class="border-title h3">Have Any Questions?</h2>
                        </div>
                        <p class="mt-n2 mb-25">Have a inquiry or some feedback for us? Fill out the form <br> below to contact our team.</p>
                        <div class="contact-feature">
                            <div class="contact-feature-icon">
                                <i class="fal fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Our Address</p>
                                <a href="https://www.google.com/maps" class="contact-feature_link">2690 Hiltona Street Victoria Road, <br> New York, Canada</a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Phone Number</p>
                                <a href="tel:+011456586986" class="contact-feature_link">Mobile:<span>(+65) - 48596 - 5789</span></a>
                                <a href="tel:+011456586986" class="contact-feature_link">Phone: <span>(+00) - 12543 - 4165</span></a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Hours of Operation</p>
                                <span class="contact-feature_link">Monday - Friday: 09:00 - 20:00</span>
                                <span class="contact-feature_link">Sunday & Saturday: 10:30 - 22:00</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-12">
                    <div class="contact-form-wrap" data-bg-src="assets/img/bg/contact_bg_1.png">
                        <span class="sub-title">NEET Predictor !</span>
                        <h2 class="border-title">NEET College Predictor </h2>
                        <p class="mt-n1 mb-30 sec-text">Built using the latest data from official government websites, this predictor is free, reliable and easy to use.</p>
                        <form action="{{ route('predict.college') }}" method="POST" class="contact-form ajax-contact" id="predictForm">
                            @csrf
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
                                <select name="category" class="nice-select form-select style-white">
                                    <option value="" disabled selected hidden>Select Category*</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
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

    </script>