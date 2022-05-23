<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="@routeis('user.dashboard') active @endrouteis">
                <a href="{{ route('user.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="la la-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>
