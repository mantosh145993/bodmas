@include('admin.layouts.head');

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         @include('admin.layouts.sidebar');
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            @include('admin.layouts.topbar')
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                     @if(Auth::user()->role=='admin'||Auth::user()->role=='user')
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     @elseif(Auth::user()->role=='marketing')
                        <div class="page_title text-center">
                           <h3><strong> LMS (Dashboard)</strong></h3>
                        </div>
                     @endif
                     </div>
                  </div>
                  @if(Auth::user()->role=='admin'||Auth::user()->role=='user')
                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                           <div>
                                 <i class="fa fa-institution orange_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{ $collegeCount }}</p>
                                 <p class="head_couter"> <strong> Total Colleges</strong></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-map-o blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$pageCount}}</p>
                                 <!-- <p class="total_no">102</p> -->
                                 <p class="head_couter"><strong> Total Pages</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-navicon green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$menuCount}}</p>
                                 <p class="head_couter"><strong> Total Menu</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$noticeCount}}</p>
                                 <p class="head_couter"><strong> Total Notification</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-mortar-board orange_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$paidPackageCount}}</p>
                                 <p class="head_couter"><strong> Total Paid Guidance</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-plug green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$predictorCount}}</p>
                                 <p class="head_couter"><strong> Total Predictor Lead</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-newspaper-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$blogCount}}</p>
                                 <p class="head_couter"><strong> Total Blogs</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-support red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$cutOffCount}}</p>
                                 <p class="head_couter"><strong> Total Uploaded CutOff</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <!-- ---------------------------------------------------------------------  -->
                  </div>
                  @endif
                  @if(Auth::user()->role=='marketing')
                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                           <div>
                                 <i class="fa fa-institution orange_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{ $collegeCount }}</p>
                                 <h4> <strong> Converted Leads</strong></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-map-o blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$pageCount}}</p>
                                 <!-- <p class="total_no">102</p> -->
                                 <h4><strong> Pending Leads</strong> </h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-navicon green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$menuCount}}</p>
                                 <h4><strong> Not Closed Leads</strong> </h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$noticeCount}}</p>
                                 <h4><strong> Progress Leads</strong> </h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-mortar-board orange_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$paidPackageCount}}</p>
                                 <h4><strong> All Total Leads</strong> </h4>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-plug green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$predictorCount}}</p>
                                 <p class="head_couter"><strong> Total Predictor Lead</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-newspaper-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$blogCount}}</p>
                                 <p class="head_couter"><strong> Total Blogs</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-support red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">{{$cutOffCount}}</p>
                                 <p class="head_couter"><strong> Total Uploaded CutOff</strong> </p>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
                  @endif
                  <div class="row column1 social_media_section">
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons fb margin_bottom_30">
                           <div class="social_icon">
                              <i class="fa fa-facebook"></i>
                           </div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong>35k</strong></span>
                                    <span>Friends</span>
                                 </li>
                                 <li>
                                    <span><strong>128</strong></span>
                                    <span>Feeds</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons tw margin_bottom_30">
                           <div class="social_icon">
                              <i class="fa fa-twitter"></i>
                           </div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong>584k</strong></span>
                                    <span>Followers</span>
                                 </li>
                                 <li>
                                    <span><strong>978</strong></span>
                                    <span>Tweets</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons linked margin_bottom_30">
                           <div class="social_icon">
                              <i class="fa fa-linkedin"></i>
                           </div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong>758+</strong></span>
                                    <span>Contacts</span>
                                 </li>
                                 <li>
                                    <span><strong>365</strong></span>
                                    <span>Feeds</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons google_p margin_bottom_30">
                           <div class="social_icon">
                              <i class="fa fa-google-plus"></i>
                           </div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong>450</strong></span>
                                    <span>Followers</span>
                                 </li>
                                 <li>
                                    <span><strong>57</strong></span>
                                    <span>Circles</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- graph -->
                  <div class="row column2 graph margin_bottom_30">
                     <div class="col-md-l2 col-lg-12">
                        <div class="white_shd full">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Extra Area Chart</h2>
                              </div>
                           </div>
                           <div class="full graph_revenue">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="content">
                                       <div class="area_chart">
                                          <canvas height="120" id="canvas"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end graph -->
                  <!-- <div class="row column3">
                     <div class="col-md-6">
                        <div class="dark_bg full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Testimonial</h2>
                              </div>
                           </div>
                           <div class="full graph_revenue">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="content testimonial">
                                       <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                             <div class="item carousel-item active">
                                                <div class="img-box"><img src="images/layout_img/user_img.jpg" alt=""></div>
                                                <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                                <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                             </div>
                                             <div class="item carousel-item">
                                                <div class="img-box"><img src="images/layout_img/user_img.jpg" alt=""></div>
                                                <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                                <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                             </div>
                                             <div class="item carousel-item">
                                                <div class="img-box"><img src="images/layout_img/user_img.jpg" alt=""></div>
                                                <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                                <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                             </div>
                                          </div>
                                          <a class="carousel-control left carousel-control-prev" href="#testimonial_slider" data-slide="prev">
                                             <i class="fa fa-angle-left"></i>
                                          </a>
                                          <a class="carousel-control right carousel-control-next" href="#testimonial_slider" data-slide="next">
                                             <i class="fa fa-angle-right"></i>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Progress Bar</h2>
                              </div>
                           </div>
                           <div class="full progress_bar_inner">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="progress_bar">
                                       <span class="skill" style="width:73%;">Facebook <span class="info_valume">73%</span></span>
                                       <div class="progress skill-bar ">
                                          <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%;">
                                          </div>
                                       </div>
                                       <span class="skill" style="width:62%;">Twitter <span class="info_valume">62%</span></span>
                                       <div class="progress skill-bar">
                                          <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;">
                                          </div>
                                       </div>
                                       <span class="skill" style="width:54%;">Instagram <span class="info_valume">54%</span></span>
                                       <div class="progress skill-bar">
                                          <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">
                                          </div>
                                       </div>
                                       <span class="skill" style="width:82%;">Google plus <span class="info_valume">82%</span></span>
                                       <div class="progress skill-bar">
                                          <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: 82%;">
                                          </div>
                                       </div>
                                       <span class="skill" style="width:48%;">Other <span class="info_valume">48%</span></span>
                                       <div class="progress skill-bar">
                                          <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- <div class="row column4 graph">
                     <div class="col-md-6 margin_bottom_30">
                        <div class="dash_blog">
                           <div class="dash_blog_inner">
                              <div class="dash_head">
                                 <h3><span><i class="fa fa-calendar"></i> 6 July 2018</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                              </div>
                              <div class="list_cont">
                                 <p>Today Tasks for Ronney Jack</p>
                              </div>
                              <div class="task_list_main">
                                 <ul class="task_list">
                                    <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>10:00 AM</strong></li>
                                    <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                                    <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>11:00 AM</strong></li>
                                    <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                                    <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>02:00 PM</strong></li>
                                 </ul>
                              </div>
                              <div class="read_more">
                                 <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="dash_blog">
                           <div class="dash_blog_inner">
                              <div class="dash_head">
                                 <h3><span><i class="fa fa-comments-o"></i> Updates</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                              </div>
                              <div class="list_cont">
                                 <p>User confirmation</p>
                              </div>
                              <div class="msg_list_main">
                                 <ul class="msg_list">
                                    <li>
                                       <span><img src="images/layout_img/msg2.png" class="img-responsive" alt="#" /></span>
                                       <span>
                                          <span class="name_user">Herman Beck</span>
                                          <span class="msg_user">Sed ut perspiciatis unde omnis.</span>
                                          <span class="time_ago">12 min ago</span>
                                       </span>
                                    </li>
                                    <li>
                                       <span><img src="images/layout_img/msg3.png" class="img-responsive" alt="#" /></span>
                                       <span>
                                          <span class="name_user">John Smith</span>
                                          <span class="msg_user">On the other hand, we denounce.</span>
                                          <span class="time_ago">12 min ago</span>
                                       </span>
                                    </li>
                                    <li>
                                       <span><img src="images/layout_img/msg2.png" class="img-responsive" alt="#" /></span>
                                       <span>
                                          <span class="name_user">John Smith</span>
                                          <span class="msg_user">Sed ut perspiciatis unde omnis.</span>
                                          <span class="time_ago">12 min ago</span>
                                       </span>
                                    </li>
                                    <li>
                                       <span><img src="images/layout_img/msg3.png" class="img-responsive" alt="#" /></span>
                                       <span>
                                          <span class="name_user">John Smith</span>
                                          <span class="msg_user">On the other hand, we denounce.</span>
                                          <span class="time_ago">12 min ago</span>
                                       </span>
                                    </li>
                                 </ul>
                              </div>
                              <div class="read_more">
                                 <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
               <!-- footer -->
               @include('admin.layouts.footer');
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
   </div>

</body>

</html>