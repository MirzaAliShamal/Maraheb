<header class="main-header">

    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="" width="60px" title=""></a>
                </div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li class="current">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="">
                        <a href="">Blogs</a>
                    </li>
                    <li class="">
                        <a href="">Contact</a>
                    </li>

                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
                        <span>
                            <span class="contact-info">
                                <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                                <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                                <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                            </span>
                            <span class="social-links">
                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                                <a href="#"><span class="fab fa-linkedin-in"></span></a>
                            </span>
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- Main Menu End-->
        </div>

        <div class="outer-box">
            @if (Auth::guard('resturant_manager')->check())
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ resturantManager()->profile }}" alt="avatar" class="thumb">
                        <span class="name">My Account</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('resturant.manager.dashboard') }}"><i class="la la-user-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('resturant.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            @elseif (Auth::guard('admin')->check())

            @elseif (Auth::guard('web')->check())
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->profile }}" alt="avatar" class="thumb">
                        <span class="name">My Account</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href="{{ route('user.dashboard') }}"><i class="la la-user-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Login/Register -->
                <div class="btn-box">
                    <a href="{{ route('login') }}" target="_blank" class="theme-btn btn-style-three">Login</a>
                    <a href="{{ route('register') }}" target="_blank" class="theme-btn btn-style-one">Join Us</a>
                </div>
            @endif

        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}" alt="" title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                @if (Auth::guard('resturant_manager')->check())
                    <div class="dropdown dashboard-option">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ resturantManager()->profile }}" alt="avatar" class="thumb">
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="{{ route('resturant.manager.dashboard') }}"><i class="la la-user-alt"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('resturant.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                @elseif (Auth::guard('admin')->check())

                @elseif (Auth::guard('web')->check())
                    <div class="dropdown dashboard-option">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->profile }}" alt="avatar" class="thumb">
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="{{ route('user.dashboard') }}"><i class="la la-user-alt"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="btn-box">
                        <a href="{{ route('login') }}" target="_blank" class="theme-btn btn-style-three">Login</a>
                    </div>
                @endif

                <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
