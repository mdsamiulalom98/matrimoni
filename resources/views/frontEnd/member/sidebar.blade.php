<div class="customer-auth">
    <div class="customer-img">
        <img src="{{ asset(Auth::guard('member')->user()->image) }}" alt="">
    </div>
    <div class="customer-name">
        <p><small>Hello</small></p>
        <p>{{ Auth::guard('member')->user()->name }}</p>
    </div>
</div>
<div class="sidebar-menu">
    <ul>
        <li><a href="{{ route('member.account') }}" class="{{ request()->is('member/account') ? 'active' : '' }}"><i
                    data-feather="user"></i> My Account</a></li>

        <li><a href="{{ route('member.editprofile') }}"
                class="{{ request()->is('member/profile-edit') ? 'active' : '' }}"><i data-feather="edit"></i> Profile
                Edit</a></li>

        <li><a href="{{ route('member.logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                    data-feather="log-out"></i> Logout</a></li>
        <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>
