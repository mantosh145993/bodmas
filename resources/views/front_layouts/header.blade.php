<!-- Top Header Section -->
<?php $offers = DB::select('SELECT * FROM offers WHERE status = "active" ORDER BY start_date DESC'); ?>
@if(!empty($offers))
<section class="bg-black">
    <div class="row  text-center">
        <div class="col-lg-4 col-md-4 col-xl-4">
           <span style="font-size: x-large;"> {{$offers[0]->title}}</span> <br>
           <span style="color:#ffff;">Vaild Till : {{ \Carbon\Carbon::parse($offers[0]->end_date)->format('M d, Y') }}</span>
        </div>
        <div class="col-lg-4 col-md-4 col-xl-4 text-center">
        Save <span style="font-size: x-large; font-family: 'Poppins', sans-serif;"> ₹{{$offers[0]->price}} </span>

        <br><span style="color:#ffff;"> {{$offers[0]->description}} </span>
        </div>
        <div class="col-lg-4 col-md-4 col-xl-4 text-center">
        <a href="{{$offers[0]->join_us}}" class="btn btn-join-us" id="joinUsBtn" target="_blank" >Join Us</a> <br>
        <span style="color:#ffff;">Avail this Offer</span>
        </div>
    </div>
</section>
@endif
<!-- Top Header Section End -->
<!-- Mobile Menu -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{route('/')}}"><img style="width: 250px;" src="{{asset('assets/img/logo1.png')}}" alt="Bodmas"></a>
        </div>
        <div class="th-mobile-menu d-lg-none">
            <ul>
                @foreach($menus as $menu)
                <li class="menu-item-has-children">
                    <a href="{{ $menu->is_active ? $menu->url : '#' }}">{{ $menu->is_active ? $menu->title : '' }}</a>
                    @if($menu->childrenForPublic->isNotEmpty())
                    <ul class="sub-menu">
                        @foreach($menu->childrenForPublic as $submenu)
                        <li class="menu-item-has-children">
                            <a href="{{ $submenu->url }}">{{ $submenu->title }}</a>
                            @if($submenu->grandChildForPublic->isNotEmpty())
                            <ul class="sub-menu">
                                @foreach($submenu->grandChildForPublic as $grandChild)
                                <li><a href="{{ $grandChild->url }}">{{ $grandChild->title }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- Mobile Menu End -->
<!-- Header Area -->
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="far fa-phone"></i><a href="tel:+91 9511626721">+91 9511626721</a></li>
                            <li class="d-none d-xl-inline-block"><i class="far fa-envelope"></i><a href="mailto:educationbodmas@gmail.com">educationbodmas@gmail.com</a></li>
                            <li><i class="far fa-clock"></i>Mon - Sat: 09:00 - 19:00</li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links header-right">
                        <ul>
                            <li>
                                <div class="header-social">
                                    <span class="social-title">Follow Us:</span>
                                    <a href="https://www.facebook.com/bodmasservices" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/bodmasservices/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://in.linkedin.com/company/bodmas-education-services" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.youtube.com/@BodmasMedical" target="_blank"><i class="fab fa-youtube"></i></a>
                                    <!-- <a href="https://www.instagram.com/"><i class="fab fa-skype"></i></a> -->
                                </div>
                            </li>
                            <li class="d-none d-lg-inline-block">
                                <i class="far fa-user"></i><a href="{{route('admin')}}">Admin Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{route('/')}}"><img style="width: 185px;" src="{{asset('assets/img/logo1.png')}}" alt="Bodmas"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row">
                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <ul>
                                        @foreach($menus as $menu)
                                        <li>
                                            <a href="{{ $menu->is_active ? $menu->url : '' }}">{{ $menu->is_active ? $menu->title : '' }}</a>
                                            @if($menu->childrenForPublic->isNotEmpty())
                                            <ul class="sub-menu">
                                                @foreach($menu->childrenForPublic as $submenu)
                                                @if($submenu->grandChildForPublic->isNotEmpty())
                                                <li class="menu-item-has-children">
                                                    <a href="{{ $submenu->url }}">{{ $submenu->title }}</a>
                                                    @if($submenu->grandChildForPublic->isNotEmpty())
                                                    <ul class="sub-menu">
                                                        @foreach($submenu->grandChildForPublic as $grandChild)
                                                        <li><a href="{{ $grandChild->url }}">{{ $grandChild->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @else
                                                <li class="">
                                                    <a href="{{ $submenu->url }}">{{ $submenu->title }}</a>
                                                    @if($submenu->grandChildForPublic->isNotEmpty())
                                                    <ul class="sub-menu">
                                                        @foreach($submenu->grandChildForPublic as $grandChild)
                                                        <li><a href="{{ $grandChild->url }}">{{ $grandChild->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                            <div class="col-auto d-none d-xl-block">
                                <div class="header-button">
                                    <button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>
                                    <a href="https://meetpro.club/bodmas?isCpBranding=false" class="th-btn ml-25">Book <i class="fa fa-play-circle"></i> Consult</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
 
<style>
    /* Add this to your CSS file */
.bg-black {
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 13px;
    color: #f9a825;
}
/* Basic Button Style */
.btn-join-us {
    position: relative;
    display: inline-block;
    /* padding: 15px 30px; */
    background: linear-gradient(45deg, #ff6f00, #f9a825); /* Gradient effect */
    color: white;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 30px; /* Rounded edges */
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
    letter-spacing: 1px;
    text-transform: uppercase; /* Uppercase text */
}

/* Cracks animation on hover */
.btn-join-us::before,
.btn-join-us::after {
    content: '';
    position: absolute;
    background: rgba(255, 255, 255, 0.7); /* Lighter crack color */
    transition: all 0.4s ease;
}

.btn-join-us::before {
    top: 0;
    left: 50%;
    width: 200%;
    height: 2px;
    transform: translateX(-50%) scaleX(0);
    transform-origin: 50% 50%;
    animation: crack-animation 1s forwards;
}

.btn-join-us::after {
    top: 50%;
    left: 50%;
    width: 2px;
    height: 200%;
    transform: translateX(-50%) scaleY(0);
    transform-origin: 50% 50%;
    animation: crack-animation 1s forwards;
    animation-delay: 0.5s; /* Delay for the second crack */
}

/* Animation Keyframes */
@keyframes crack-animation {
    0% {
        transform: scale(0);
    }
    100% {
        transform: scale(1);
    }
}

/* Hover effect */
.btn-join-us:hover {
    color: #000;
    background-color: white;
    background: linear-gradient(45deg, #ff6f00, #f9a825); /* Gradient on hover */
    border-color: #ff6f00;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(-5px); /* Slight hover lift */
}

/* Hover effect on before and after elements */
.btn-join-us:hover::before,
.btn-join-us:hover::after {
    transform: scale(1);
}

/* Adding a nice hover glow effect */
.btn-join-us:hover {
    box-shadow: 0 0 15px rgba(255, 111, 0, 0.6), 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.5s ease-in-out;
}
</style>