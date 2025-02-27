@extends('front_layouts.master')
@section('content')

<section id="contact09">
    <div class="contact-box">
        <div class="contact-links">
            <h2 class="animate-charcter text-center">Bodmas Education Services Pvt Ltd</h2>
            <div class="links">
                <p>BODMAS Education Services Pvt. Ltd. (BODMAS EDUCATION) is a leading educational consultancy firm dedicated to providing expert guidance and counselling for undergraduate (UG) and postgraduate (PG) students. Have a inquiry or some feedback for us? Fill out the form
                    below to contact our team. At BODMAS EDUCATION, our mission is to provide personalized and professional educational counselling that helps students identify their strengths, explore their options, and make informed decisions about their future. We are committed to guiding students through the complex process of academic and career planning to ensure they achieve success in their chosen fields.
                    Mr. Ashok Kumar, the visionary Founder and CEO of BODMAS Education Services Pvt. Ltd., brings over 20 years of rich experience in the education sector. His expertise and in-depth understanding of the evolving academic landscape have been instrumental in shaping the company’s mission to provide top-notch guidance and counselling to students across India. Under his leadership, BODMAS Education has emerged as a trusted name in the field of education consulting, particularly for competitive exams like NEET, JEE, and MBA, as well as study abroad programs.
                </p>
            </div>
        </div>
        <div class="contact-form-wrapper">
            <form id="contact-form">
                @csrf
                <h2>Get in Touch for 2025 Application</h2>
                <p>Have Any Questions?</p>
                <input type="hidden" name="type" value="1" id="type">
                <div class="row">
                    <div>
                        <div class="form-group">
                            <input type="text" class="form-control style-white" name="name" id="name" placeholder="Your Name*" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <input type="email" class="form-control style-white" name="email" id="email" placeholder="Email Address*" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <select name="subject" id="subject" class="form-select style-white" required>
                                <option value="" disabled selected hidden>Select Subject*</option>
                                <option value="mbbs">MBBS</option>
                                <option value="bds">BDS</option>
                                <option value="bums">BUMS</option>
                                <option value="bhms">BHMS</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <input type="tel" class="form-control style-white" name="number" id="number" placeholder="Phone Number*" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control style-white" placeholder="Write Your Message*" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <button class="th-btn" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
            <div id="message-box"></div>
        </div>
    </div>
</section>

<section>
    <div class="space" id="contact-sec">
        <div class="container">
            <div class="map-sec">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.126510817361!2d77.34101701248609!3d28.598692375581777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5b5752aa1a5%3A0xef25f3cdf6f08c3!2sBodmas%20Education%20Services%20Pvt.%20Ltd.!5e1!3m2!1sen!2sin!4v1731306026310!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contact-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = {
                _token: $('input[name="_token"]').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                subject: $('#subject').val(),
                number: $('#number').val(),
                message: $('#message').val()
            };

            // Show a SweetAlert loading message
            Swal.fire({
                title: 'Sending...',
                text: 'Please wait while your enquiry is being sent.',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Send AJAX request
            $.ajax({
                url: "{{ route('enquiry.contact') }}", // Laravel route
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Reset the form
                        $('#contact-form')[0].reset();
                    } else {
                        Swal.fire({
                            title: 'Duplicate Entry',
                            text: response.error,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to send the enquiry. Please check your inputs or try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

@stop
<style>
    .contact-form-wrapper h4 {
        font-size: 23px;
        font-weight: 700;
    }

    h2.animate-charcter {
        background-image: linear-gradient(-225deg,
                #d8d2f0 0%,
                #9883ae 29%,
                #ff1361 67%,
                #fff800 100%) !important;
        font-size: 22px !important;
        font-weight: 500;
    }


    .btn-12 {
        width: 100%;
    }

    .contact-links h2 {
        color: #fff;
        font-size: 22px;
        font-weight: 500;
    }

    .contact-links p {
        color: #fdf9f9;
        /* align-items: center; */
        padding-top: 20px;
        text-align: justify;
    }

    .contact-form-wrapper {
        text-align: center;
    }

    .form-item {
        margin-bottom: 15px;
    }

    #contact09 {
        /* background-color: #6a9ac4;  */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contact-box {
        width: clamp(100px, 90%, 1000px);
        margin: 80px 50px;
        display: flex;
        flex-wrap: wrap;
    }

    .contact-links,
    .contact-form-wrapper {
        width: 50%;
        padding: 8% 5% 10% 5%;
    }

    .contact-links {
        background-color: #1f2e43;
        background: radial-gradient(circle at 55% 92%,
                #426691 0 12%,
                transparent 12.2%),
            radial-gradient(circle at 94% 72%, #426691 0 10%, transparent 10.2%),
            radial-gradient(circle at 20% max(78%, 350px),
                #263a53 0 7%,
                transparent 7.2%),
            radial-gradient(circle at 0% 0%, #263a53 0 40%, transparent 40.2%), #1f2e43;
        border-radius: 10px 0 0 10px;
    }

    .contact-form-wrapper {
        background-color: #ffffff8f;
        border-radius: 0 10px 10px 0;
    }

    @media only screen and (max-width: 800px) {

        .contact-links,
        .contact-form-wrapper {
            width: 100%;
        }

        .contact-links {
            border-radius: 10px 10px 0 0;
        }

        .contact-form-wrapper {
            border-radius: 0 0 10px 10px;
        }
    }

    @media only screen and (max-width: 400px) {
        .contact-box {
            width: 95%;
            margin: 8% 5%;
        }
    }

    .form-item {
        position: relative;
    }

    label,
    input,
    textarea {
        font-family: "Poppins", sans-serif;
    }

    label {
        position: absolute;
        top: 10px;
        left: 2%;
        color: #999;
        font-size: clamp(14px, 1.5vw, 18px);
        pointer-events: none;
        user-select: none;
    }

    input,
    textarea {
        width: 100%;
        outline: 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
        padding: 12px;
        font-size: clamp(15px, 1.5vw, 18px);
    }

    input:focus+label,
    input:valid+label,
    textarea:focus+label,
    textarea:valid+label {
        font-size: clamp(13px, 1.3vw, 16px);
        color: #777;
        top: -20px;
        transition: all 0.225s ease;
    }

    .submit-btn {
        background-color: #fd917e;
        filter: drop-shadow(2px 2px 3px #0003);
        color: #fff;
        font-family: "Poppins", sans-serif;
        font-size: clamp(16px, 1.6vw, 18px);
        display: block;
        padding: 12px 20px;
        margin: 2px auto;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        user-select: none;
        transition: 0.2s;
    }

    .submit-btn:hover {
        transform: scale(1.1, 1.1);
    }

    .submit-btn:active {
        transform: scale(1.1, 1.1);
        filter: sepia(0.5);
    }

    @media only screen and (max-width: 800px) {
        h2 {
            font-size: clamp(40px, 10vw, 60px);
        }
    }

    @media only screen and (max-width: 400px) {
        h2 {
            font-size: clamp(30px, 12vw, 60px);
        }

        .links {
            padding-top: 30px;
        }

        img {
            width: 38px;
            height: 38px;
        }
    }

    .contact-form-wrapper {
        background-color: #ffffff8f;
        border-radius: 0 10px 10px 0;
        box-shadow: 0px 0px 6px 0px #ccc;
    }

    .custom-btn {
        width: 157px;
        line-height: 18px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 800;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    .btn-11 {
        border: none;
        background: rgb(251, 33, 117);
        background: linear-gradient(0deg, rgba(251, 33, 117, 1) 0%, rgba(234, 76, 137, 1) 100%);
        color: #fff;
        overflow: hidden;
    }

    .btn-12 {
        width: 100%;
    }

    .btn-11:hover {
        opacity: .7;
        color: #000;
    }
</style>    