<!-- Chat bot  -->
 @include('front.widgets.chatbot');
 <!-- Chat bot end -->
<!-- Footer Area  -->
<footer class="footer-wrapper footer-layout1" data-bg-src="{{asset('assets/img/bg/footer-bg.png')}}">
	<div class="shape-mockup footer-shape1 jump" data-left="60px" data-top="70px">
		<img src="{{asset('assets/img/normal/footer-bg-shape1.png')}}" alt="img">
	</div>
	<div class="shape-mockup footer-shape2 jump-reverse" data-right="80px" data-bottom="120px">
		<img src="{{asset('assets/img/normal/footer-bg-shape2.png')}}" alt="img">
	</div>
	<div class="footer-top">
		<div class="container">
			<div class="footer-contact-wrap">
				<div class="footer-contact">
					<div class="footer-contact_icon icon-btn">
						<i class="fal fa-phone"></i>
					</div>
					<div class="media-body">
						<p class="footer-contact_text">Call us any time:</p>
						<a href="tel+91 9511626721" class="footer-contact_link">+91 9511626721</a>
					</div>
				</div>
				<div class="divider"></div>
				<div class="footer-contact">
					<div class="footer-contact_icon icon-btn">
						<i class="fal fa-envelope"></i>
					</div>
					<div class="media-body">
						<p class="footer-contact_text">Email us 24/7 hours:</p>
						<a href="mailto:educationbodmas@gmail.com" class="footer-contact_link">educationbodmas@gmail.com</a>
					</div>
				</div>
				<div class="divider"></div>
				<div class="footer-contact">
					<div class="footer-contact_icon icon-btn">
						<i class="fal fa-location-dot"></i>
					</div>
					<div class="media-body">
						<p class="footer-contact_text">Our office location:</p>
						<a href="#" class="footer-contact_link">Z-169, Ground Floor Sector-12 Noida Uttar Pradesh – 201301</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-wrap" data-bg-src="{{asset('assets/img/bg/jiji.png')}}">
		<div class="widget-area">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-md-6 col-xxl-3 col-xl-3">
						<div class="widget footer-widget">
							<div class="th-widget-about">
								<div class="about-logo">
									<a href="{{route('/')}}"><img src="{{asset('assets/img/logo-o.png')}}" alt="Bodmas"></a>
								</div>
								<p class="about-text">BODMAS Education Services Pvt. Ltd. (BODMAS EDUCATION) is a leading educational consultancy firm dedicated to providing expert guidance and counselling for undergraduate (UG) and postgraduate (PG) students. Founded in July 2018, BODMAS EDUCATION has successfully counselled and guided over 10,000 students, helping them select the right career paths and realize their academic and professional dreams.</p>
								<div class="th-social">
									<h6 class="title text-white">FOLLOW US ON:</h6>
									<a href="https://www.facebook.com/bodmasservices"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/bodmasservices/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://in.linkedin.com/company/bodmas-education-services"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.youtube.com/@BodmasMedical"><i class="fab fa-youtube"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-auto">
						<div class="widget widget_nav_menu footer-widget">
							<h3 class="widget_title">Quick Links</h3>
							<div class="menu-all-pages-container">
								<ul class="menu">
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Gallery</a></li>
									<li><a href="#">Blog & Articals</a></li>
									<li><a href="#">Guidence Fee MBBS</a></li>
									<li><a href="#">Neet Ug Counselling 2025</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-auto">
						<div class="widget widget_nav_menu footer-widget">
							<h3 class="widget_title">Important Links</h3>
							<div class="menu-all-pages-container">
								<ul class="menu">
									<li><a href="#">Education Loan</a></li>
									<li><a href="{{route('mcc-counselling')}}">MCC Counselling</a></li>
									<li><a href="#">Payment Terms</a></li>
									<li><a href="#">Franchise</a></li>
									<li><a href="#">Partnership</a></li>
									<li><a href="{{route('faq')}}">FAQ'S</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xxl-3 col-xl-3">
						<div class="widget newsletter-widget footer-widget">
							<h3 class="widget_title">Get in touch!</h3>
							<p class="footer-text">Subscribe our newsletter to get our latest
								Update & news</p>
							<form class="newsletter-form form-group">
								<input class="form-control" type="email" placeholder="Email Email" required="">
								<i class="far fa-envelope"></i>
								<button type="submit" class="th-btn style3">Subscribe Now <i class="far fa-arrow-right ms-1"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="copyright-wrap">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-6">
						<p class="copyright-text">Copyright © 2025 <a href="{{route('/')}}">BODMAS</a> All Rights Reserved.</p>
					</div>
					<div class="col-md-6 text-end d-none d-md-block">
						<div class="footer-links">
							<ul>
								<li><a href="privacy-policy">Privacy Policy</a></li>
								<li><a href="terms-conditions">Terms & Condition</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Area End  -->

<!--********************************
			Code End  Here 
	******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top mb-5">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
	</svg>
</div>

<!--==============================
    All Js File
============================== -->
<!-- Jquery -->
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<!-- Circle Progress -->
<script src="{{ asset('assets/js/circle-progress.js') }}"></script>
<!-- Range Slider -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!-- Isotope Filter -->
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<!-- Tilt JS -->
<script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script>
<!-- Tweenmax JS -->
<script src="{{ asset('assets/js/tweenmax.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
<!-- Main Js File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>