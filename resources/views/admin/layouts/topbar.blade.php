<div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <a href="{{ route('dashboard') }}"><img class="img-responsive" src="{{asset('admin/images/logo/logo.png')}}" alt="#" /></a>
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">
                           <ul>
                              <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                              <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                              <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                           </ul>
                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset('admin/images/layout_img/user_img.jpg')}}" alt="#" /><span class="name_user">{{ Auth::user()->name }}</span></a>
                                 <div class="dropdown-menu">
                                    <div class="mt-3 space-y-1">
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                                       <x-responsive-nav-link :href="route('profile.edit')">
                                          {{ __('Profile') }}
                                       </x-responsive-nav-link>
                                    @endif
                                       <!-- Authentication -->
                                       <form method="POST" action="{{ route('logout') }}">
                                          @csrf

                                          <x-responsive-nav-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                             {{ __('Log Out') }}
                                          </x-responsive-nav-link>
                                       </form>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>