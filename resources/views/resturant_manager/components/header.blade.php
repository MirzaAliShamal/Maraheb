<header class="main-header header-shaddow">
    <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="" width="60px" title=""></a>
                    </div>
                </div>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">

                {{-- <button class="menu-btn">
                    <span class="count">1</span>
                    <span class="icon la la-heart-o"></span>
                </button>

                <button class="menu-btn">
                    <span class="icon la la-bell"></span>
                </button> --}}

                <!-- Dashboard Option -->
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ resturantManager()->profile }}" alt="avatar" class="thumb">
                        <span class="name">My Account</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href=""><i class="la la-user-alt"></i>My Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('resturant.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="" title="">
            </a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <button id="toggle-user-sidebar">
                    <img src="{{ resturantManager()->profile }}" alt="avatar" class="thumb">
                </button>
                <span id="toggle-user-sidebar" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></span>
            </div>
        </div>

    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
  </header>
