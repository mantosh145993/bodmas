<nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="{{ route('dashboard') }}"><img class="logo_icon img-responsive" src="{{asset('admin/images/logo/logo_icon.png')}}" alt="#" /></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="{{asset('admin/images/layout_img/user_img.jpg')}}" alt="#" /></div>
                     <div class="user_info">
                        <h6>Bodmas Admin</h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <h4>General</h4>
               <!-- <div>{{ Auth::user()->name }}</div> -->
               <ul class="list-unstyled components">
               <li class="">
                     <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-navicon yellow_color"></i> <span>All</span></a>
                     <ul class="collapse list-unstyled" id="dashboard">
                        <li>
                           <a href="{{route('predictor.list')}}">> <span>Predictor Lead</span></a>
                        </li>
                     </ul>
                  </li>

                  <li class="active">
                     <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sliders yellow_color"></i> <span>Banner</span></a>
                     <ul class="collapse list-unstyled" id="dashboard">
                        <li>
                           <a href="{{route('admin.banners')}}">> <span>Slider Banner</span></a>
                        </li>
                        <li>
                           <a href="{{route('banner.page')}}">> <span>Page Banner</span></a>
                        </li>
                     </ul>
                  </li>

                  <li class="active">
                     <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs yellow_color"></i> <span>Category</span></a>
                     <ul class="collapse list-unstyled" id="category">
                        <li>
                           <a href="{{route('list_category.list')}}">> <span>Category</span></a>
                        </li>
                        <!-- <li>
                           <a href="#"> <span>Dashboard style 2</span></a>
                        </li> -->
                     </ul>
                  </li>

                  <li><a href="{{ route('admin.blog') }}"><i class="	fa fa-newspaper-o orange_color"></i> <span>Blogs</span></a></li>
                  <li><a href="{{ route('admin.permission') }}"><i class="fa fa-stumbleupon orange_color"></i> <span> Permission</span></a></li>
                  <li><a href="{{ route('pages.pages_list') }}"><i class="fa fa-file-powerpoint-o orange_color"></i> <span>Pages</span></a></li>
                  <li><a href="{{ route('menus') }}"><i class="fa fa-server orange_color"></i> <span>Menue</span></a></li>
                  <li><a href="{{ route('chat.chat_list') }}"><i class="fa fa-clone orange_color"></i> <span>Chat Bot</span></a></li>
                  <li><a href="{{ route('cutoff.list') }}"><i class="fa fa-print orange_color"></i> <span>Upload Cutoff</span></a></li>
                  <li><a href="{{route('short.link')}}"><i class="fa fa-ellipsis-h orange_color"></i> <span>Short Link</span></a></li>
                  <li><a href="{{route('package.package_list')}}"><i class="fa fa-suitcase orange_color"></i> <span>Packages</span></a></li>
                  <li><a href="{{route('notice.notice_list')}}"><i class="fa fa-tty orange_color"></i> <span>Notice Update</span></a></li>
                  <li><a href="{{route('college.college_list')}}"><i class="fa fa-university orange_color"></i> <span>All Colleges</span></a></li>
                  <!-- <li>
                     <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
                     <ul class="collapse list-unstyled" id="element">
                        <li><a href="#">> <span>General Elements</span></a></li>
                        <li><a href="#">> <span>Media Gallery</span></a></li>
                        <li><a href="#">> <span>Icons</span></a></li>
                        <li><a href="#">> <span>Invoice</span></a></li>
                     </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                  <li>
                     <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                     <ul class="collapse list-unstyled" id="apps">
                        <li><a href="#">> <span>Email</span></a></li>
                        <li><a href="#">> <span>Calendar</span></a></li>
                        <li><a href="#">> <span>Media Gallery</span></a></li>
                     </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                  <li>
                     <a href="#">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                  </li>
                  <li class="active">
                     <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                     <ul class="collapse list-unstyled" id="additional_page">
                        <li>
                           <a href="#">> <span>Profile</span></a>
                        </li>
                        <li>
                           <a href="#">> <span>Projects</span></a>
                        </li>
                        <li>
                           <a href="#">> <span>Login</span></a>
                        </li>
                        <li>
                           <a href="#">> <span>404 Error</span></a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                  <li><a href="#"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li> -->
                  <!-- <li><a href="#"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> -->
               </ul>
            </div>
         </nav>