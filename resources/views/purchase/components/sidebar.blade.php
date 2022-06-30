<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="@routeis('purchase.manager.dashboard') active @endrouteis">
                <a href="{{ route('purchase.manager.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>

            <li class="@routeis('purchase.manager.event.*') active @endrouteis">
                <a href="{{ route('purchase.manager.event.list') }}"> <i class="la la-home"></i> Events</a>
            </li>

            <li>
                <a href="{{ route('purchase.manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="la la-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>
