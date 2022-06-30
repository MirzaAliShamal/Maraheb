<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="@routeis('recruiter.dashboard') active @endrouteis">
                <a href="{{ route('recruiter.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>

            <li class="@routeis('recruiter.event.*') active @endrouteis">
                <a href="{{ route('recruiter.event.list') }}"> <i class="la la-home"></i> Events</a>
            </li>

            <li class="@routeis('recruiter.purchase.manager.*') active @endrouteis">
                <a href="{{ route('recruiter.purchase.manager.list') }}"> <i class="la la-user-tie"></i> Purchase Managers</a>
            </li>

            <li>
                <a href="{{ route('recruiter.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="la la-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</div>
