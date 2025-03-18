<div class="customer-auth">
    <div class="customer-img">
        <img src="{{ asset(Auth::guard('agent')->user()->image) }}" alt="">
    </div>
    <div class="customer-name">
        <p><small>Hello</small></p>
        <p>{{ Auth::guard('agent')->user()->name }}</p>
    </div>
</div>
<div class="sidebar-menu">
    <ul>
        <li><a href="{{ route('agent.account') }}" class="{{ request()->is('agent/account') ? 'active' : '' }}"><i
                    data-feather="user"></i> My Account</a></li>

        <li><a href="{{ route('agent.profile_edit') }}"
                class="{{ request()->is('agent/profile-edit') ? 'active' : '' }}"><i data-feather="edit"></i> Profile
                Edit</a></li>
                <li>
                    <a href="{{ route('agent.member_create') }}">
                        <i data-feather="user-plus"></i> Add Member
                    </a>
                </li>

        <li><a href="{{ route('agent.logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                    data-feather="log-out"></i> Logout</a></li>
        <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>
