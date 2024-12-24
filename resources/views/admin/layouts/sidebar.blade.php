<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="{{ route('dashboard') }}"><img class="logo_icon" src="{{asset('admin/images/logo/logo_icon.png')}}" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="user_profle_side">
            <div class="user_info">
               @if(Auth::user()->role == 'admin')
               <h6>Admin : {{ Auth::user()->name }}</h6>
               <p><span class="online_animation"></span> Online</p>
               @elseif(Auth::user()->role == 'user')
               <h6> User : {{ Auth::user()->name }}</h6>
               <p><span class="online_animation"></span> Online</p>
               @endif
            </div>
         </div>
      </div>
      <div class="sidebar_blog_2">
         @if(Auth::user()->role == 'admin')
         <h4>Admin Dashboard</h4>
         @elseif(Auth::user()->role == 'user')
         <h4>User Dashboard</h4>
         @endif
         <!-- <div>{{ Auth::user()->name }}</div> -->
         <ul class="list-unstyled components">
            <li class="">
               <a href="#all" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-navicon yellow_color"></i> <span>All Menu</span></a>
               <ul class="collapse list-unstyled" id="all">
                  <li>
                     <a href="{{route('predictor.list')}}"> <i class="fa fa-bar-chart orange_color"></i> <span>Predictor Lead</span></a>
                  </li>
                  <li>
                     <a href="{{route('guidance.list')}}"> <i class="fa fa-money orange_color"></i> <span>Paid Guidance</span></a>
                  </li>
                  <li><a href="{{route('pages.pages_list') }}"><i class="fa fa-file-powerpoint-o orange_color"></i> <span>Pages</span></a></li>
                  <li><a href="{{route('menus') }}"><i class="fa fa-server orange_color"></i> <span>All Menu</span></a></li>
                  <li><a href="{{route('chat.chat_list') }}"><i class="fa fa-clone orange_color"></i> <span>Chat Bot</span></a></li>
                  <li><a href="{{route('cutoff.list') }}"><i class="fa fa-print orange_color"></i> <span>Upload Cutoff</span></a></li>
                  <li><a href="{{route('short.link')}}"><i class="fa fa-ellipsis-h orange_color"></i> <span>Short Link</span></a></li>
                  <li><a href="{{route('package.package_list')}}"><i class="fa fa-suitcase orange_color"></i> <span>Packages</span></a></li>
                  <li><a href="{{route('notice.notice_list')}}"><i class="fa fa-tty orange_color"></i> <span>Notice Update</span></a></li>
                  <li><a href="{{route('college.college_list')}}"><i class="fa fa-university orange_color"></i> <span> Colleges</span></a></li>
                  <li><a href="{{ route('admin.blog') }}"><i class="	fa fa-newspaper-o orange_color"></i> <span>Blogs</span></a></li>
                  @if( Auth::user()->role == 'admin')
                  <li><a href="{{ route('admin.permission') }}"><i class="fa fa-stumbleupon orange_color"></i> <span> Permission</span></a></li>
                  @endif
               </ul>
            </li>
            <li class="active">
               <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sliders yellow_color"></i> <span>Banner</span></a>
               <ul class="collapse list-unstyled" id="dashboard">
                  <li>
                     <a href="{{route('admin.banners')}}"> <i class="fa fa-spinner orange_color"></i> <span>Slider Banner</span></a>
                  </li>
                  <li>
                     <a href="{{route('banner.page')}}"> <i class="fa fa-puzzle-piece orange_color"></i><span>Page Banner</span></a>
                  </li>
               </ul>
            </li>
            <li class="active">
               <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs yellow_color"></i> <span>Category</span></a>
               <ul class="collapse list-unstyled" id="category">
                  <li>
                     <a href="{{route('list_category.list')}}"> <i class="fa fa-ticket orange_color"></i> <span>Add New Category</span></a>
                  </li>
               </ul>
            </li>
            <li class="active">
               <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-universal-access yellow_color"></i> <span>Student Dashboard</span></a>
               <ul class="collapse list-unstyled" id="student">
                  <li>
                     <a href="#"> <i class="fa fa-users orange_color"></i> <span>Student List</span></a>
                  </li>
               </ul>
            </li>
            <li class="active">
               <a href="#payment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-ungroup yellow_color"></i> <span>Payment Dashboard</span></a>
               <ul class="collapse list-unstyled" id="payment">
                  <li>
                     <a href="#"> <i class="fa fa-map-signs orange_color"></i> <span>Payment List</span></a>
                  </li>
               </ul>
            </li>
            <li class="active">
               <a href="#channel" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <i class="fa fa-refresh yellow_color"></i> <span>Bodmas Channel Partners</span></a>
               <ul class="collapse list-unstyled" id="channel">
                  <li>
                     <a href="#"> <i class="fa fa-random orange_color"></i> <span>Partner List</span></a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
</nav>