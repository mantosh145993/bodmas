<!--==============================
    Sidemenu
============================== -->
<div class="sidemenu-wrapper d-none d-lg-block ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Shopping cart</h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_1.jpg" alt="Cart Image">Plastic Book Bags</a>
                        <span class="quantity">1 ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_2.jpg" alt="Cart Image">The Genie Mind</a>
                        <span class="quantity">1 ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_3.jpg" alt="Cart Image">The Energy Book</a>
                        <span class="quantity">1 ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_4.jpg" alt="Cart Image">Pencil Bag</a>
                        <span class="quantity">1 ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>723.00</span>
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_5.jpg" alt="Cart Image">Sharpner</a>
                        <span class="quantity">1 ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>1080.00</span>
                        </span>
                    </li>
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>Subtotal:</strong>
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="cart.html" class="th-btn wc-forward">View cart</a>
                    <a href="checkout.html" class="th-btn checkout wc-forward">Checkout</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<!--==============================
    Sidemenu End
============================== -->

<!--==============================
    Mobile Menu
  ============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{route('/')}}"><img style="width: 250px;" src="{{asset('assets/img/Logo.jpg')}}" alt="Bodmas"></a>
        </div>
        <!-- Mobile Menu -->
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
</div>
<!--==============================
    Mobile Menu End
  ============================== -->

<!--==============================
	Header Area
==============================-->
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
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{route('/')}}"><img style="width: 250px;" src="{{asset('assets/img/Logo.jpg')}}" alt="Bodmas"></a>
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
<!--==============================
	Header Area End
==============================-->