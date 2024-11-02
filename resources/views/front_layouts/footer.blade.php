
		@include('front.widgets.chatbot');
		<!-- Footer -->
		<footer class="footer">
			<div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
			<div class="container">
				<div class="row footer_row">
					<div class="col">
						<div class="footer_content">
							<div class="row">

								<div class="col-lg-3 footer_col">

									<!-- Footer About -->
									<div class="footer_section footer_about">
										<div class="footer_logo_container">
											<a href="#">
												<div class="logo_text" style="background: #fff;"><img src="{{asset('admin/images/logo/logo.png')}}" alt="" style="height:90px;" > </div>
											</a>
										</div>
										<div class="footer_about_text">
											<p>BODMAS EDUCATION SERVICES PRIVATE LIMITED (BESPL) has been representing premier universities all over the world since July 2018 with a vision to guide and counsel all UG & PG aspirants. </p>
										</div>
										<div class="footer_social">
											<ul>
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>

								</div>

								<div class="col-lg-3 footer_col">

									<!-- Footer Contact -->
									<div class="footer_section footer_contact">
										<div class="footer_title">Contact Us</div>
										<div class="footer_contact_info">
											<ul>
												<li>Z-169, Ground Floor Sector-12 Noida Uttar Pradesh – 201301</li>
												<li>Phone: +(91) 9511 626 721</li>
												<li>educationbodmas@gmail.com</li>
											</ul>
										</div>
									</div>

								</div>

								<div class="col-lg-3 footer_col">

									<!-- Footer links -->
									<div class="footer_section footer_links">
										<div class="footer_title">Important links</div>
										<div class="footer_links_container">
											<ul>
												<li><a href="#">Education</a></li>
												<li><a href="#">Counselling</a></li>
												<li><a href="#">Payment Term</a></li>
												<li><a href="#">Privacy Policy</a></li>
												<li><a href="#">Term & Conditions</a></li>
												<li><a href="#">Faq's</a></li>
											</ul>
										</div>
									</div>

								</div>

								<div class="col-lg-3 footer_col clearfix">

									<!-- Footer links -->
									<div class="footer_section footer_mobile">
										<div class="footer_title">Useful links</div>
										<div class="footer_mobile_content">
											<div class="footer_image"><a href="#"><img src="images/mobile_1.png" alt=""></a></div>
											<div class="footer_image"><a href="#"><img src="images/mobile_2.png" alt=""></a></div>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="row copyright_row">
					<div class="col">
						<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
							<div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved {{ config('app.name') }}</div>
							<div class="ml-lg-auto cr_links">
								<ul class="cr_list">
									<li><a href="#">Copyright notification</a></li>
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="{{ asset('front/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('front/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{ asset('front/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="{{ asset('front/greensock/TweenMax.min.js')}}"></script>
	<script src="{{ asset('front/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{ asset('front/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{ asset('front/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{ asset('front/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
	<script src="{{ asset('front/plugins/easing/easing.js')}}"></script>
	<script src="{{ asset('front/plugins/parallax-js-master/parallax.min.js')}}"></script>
	<script src="{{ asset('front/js/custom.js')}}"></script>
</body>

</html>