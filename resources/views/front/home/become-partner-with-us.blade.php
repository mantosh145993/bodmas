@extends('front_layouts.master')
@section('content')
<section class="container position-relative">
    <div class="row">
        <div class="image-container" style="position: relative;">
            <img src="{{ asset('assets/img/all-posts.jpg') }}" alt="" style="height: 350px; width: 100%; object-fit: cover;">
            <div class="text-overlay" style="
                position: absolute; 
                top: 50%; 
                left: 50%; 
                transform: translate(-50%, -50%);
                color: white; 
                font-size: 24px; 
                font-weight: bold; 
                text-align: center; 
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                Become A Partner With BODMAS
            </div>
        </div>
    </div>
</section>

<div class="row justify-content-center my-5">
    <div class="col-md-8 col-lg-6">
        <aside class="sidebar-area sidebar-shop">
            <div class="widget widget_categories style2 shadow-lg rounded">
                <h3 class="widget_title text-center text-uppercase bg-primary text-white py-3 rounded-top">
                    Become A Partner
                </h3>
                <form id="partnerForm" method="POST" class="p-4 bg-white rounded-bottom">
                    @csrf
                    <input type="hidden" id="type" name="type" value="1">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="tel" id="number" name="number" class="form-control" placeholder="Enter your phone number" required pattern="[0-9]{10}">
                        <small class="form-text text-muted">Format: 10 digits</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </aside>
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
    });
</script>