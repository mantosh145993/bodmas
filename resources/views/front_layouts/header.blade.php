<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                <li>
                                    <div class="question">Have any questions?</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>001-1234-88888</div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div>info.bodmas@gmail.com</div>
                                </li>
                            </ul>
                            <div class="top_bar_login ml-auto">
                                <div class="login_button"><a href="#">Register or Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo_text"> <a href="{{ route('/') }}">
                                        <img src="{{ asset('admin/images/logo/logo.png') }}" alt="" style="height:90px;"></a>
                                </div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <!-- Loop through the main menu items -->
                                @foreach($menus as $menu)
                                <li class="{{ $menu->childrenForPublic->isNotEmpty() ? 'has-submenu' : '' }}">
                                    <a href="{{ $menu->url }}">{{ $menu->is_active ? $menu->title : '' }}</a>

                                    <!-- Render submenu if the item has children -->
                                    @if($menu->childrenForPublic->isNotEmpty())
                                    <ul class="submenu">
                                        @foreach($menu->childrenForPublic as $submenu)
                                        <li class="{{ $submenu->grandChildForPublic->isNotEmpty() ? 'has-submenu' : '' }}">
                                            <a href="{{ $submenu->page_url }}">{{ $submenu->title }}</a>

                                            <!-- Render grandchild submenu if the item has grandchildren -->
                                            @if($submenu->grandChildForPublic->isNotEmpty())
                                            <ul class="submenu">
                                                @foreach($submenu->grandChildForPublic as $grandChild)
                                                <li><a href="{{ $grandChild->page_url }}">{{ $grandChild->title }}</a></li>
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

                            <!-- Additional buttons -->
                            <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Header Search Panel -->
    <div class="header_search_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" class="header_search_form">
                            <input type="search" class="search_input" placeholder="Search" required="required">
                            <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<style>
    /* Basic styling for the submenu */
    .main_nav .has-submenu .submenu {
        display: none;
        /* Hide submenu by default */
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .main_nav .has-submenu:hover .submenu {
        display: block;
        /* Show submenu on hover */
    }

    .main_nav .submenu li {
        padding: 10px;
    }

    .main_nav .submenu li a {
        color: #333;
    }
</style>