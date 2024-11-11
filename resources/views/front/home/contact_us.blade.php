    
    @extends('front_layouts.master')
    @section('content')
    <!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/contact.jpg')}}" data-overlay="title" data-opacity="8">
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
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
Contact Area  
==============================-->
    <div class="space" id="contact-sec">
        <div class="container">
            <div class="map-sec">
                <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.126510817361!2d77.34101701248609!3d28.598692375581777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5b5752aa1a5%3A0xef25f3cdf6f08c3!2sBodmas%20Education%20Services%20Pvt.%20Ltd.!5e1!3m2!1sen!2sin!4v1731306026310!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 mb-30 mb-xl-0">
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
                                <a href="https://www.google.com/maps" class="contact-feature_link">Z-169, Ground Floor Sector-12 Noida Uttar Pradesh – 201301</a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Phone Number</p>
                                <a href="tel:+91 09511626721" class="contact-feature_link">Mobile:<span>(+91) - 09511626721</span></a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Hours of Operation</p>
                                <span class="contact-feature_link">Sunday & Saturday: 09:00 - 19:00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="contact-form-wrap" data-bg-src="assets/img/bg/contact_bg_1.png">
                        <span class="sub-title">Contact With Us!</span>
                        <h2 class="border-title">Get in Touch</h2>
                        <p class="mt-n1 mb-30 sec-text">BODMAS Education Services Pvt. Ltd. (BODMAS EDUCATION) is a leading educational consultancy firm dedicated to providing expert guidance and counselling for undergraduate (UG) and postgraduate (PG) students.</p>
                        <form action="mail.php" method="POST" class="contact-form ajax-contact">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control style-white" name="name" id="name" placeholder="Your Name*">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control style-white" name="email" id="email" placeholder="Email Address*">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="single-select nice-select form-select style-white">
                                            <option value="" disabled selected hidden>Select Subject*</option>
                                            <option value="mbbs">MBBS</option>
                                            <option value="bds">BDS</option>
                                            <option value="bums">BUMS</option>
                                            <option value="bhms">BHMS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control style-white" name="number" id="number" placeholder="Phone Number*">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group ">
                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control style-white" placeholder="Write Your Message*"></textarea>
                                        <i class="fal fa-pen"></i>
                                    </div>
                                </div>
                                <div class="form-btn col-12 mt-10">
                                    <button class="th-btn">Send Message<i class="fas fa-long-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
