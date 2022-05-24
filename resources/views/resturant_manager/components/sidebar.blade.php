<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="@routeis('resturant.manager.dashboard') active @endrouteis">
                <a href="{{ route('resturant.manager.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>

            <li class="@routeis('resturant.manager.purchase.manager.*') active @endrouteis">
                <a href="{{ route('resturant.manager.purchase.manager.list') }}"> <i class="la la-user-tie"></i> Purchase Managers</a>
            </li>

            <li>
                <a href="{{ route('resturant.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="la la-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>
