<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="@routeis('resturant.manager.dashboard') active @endrouteis">
                <a href="{{ route('resturant.manager.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{ route('resturant.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="la la-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>
