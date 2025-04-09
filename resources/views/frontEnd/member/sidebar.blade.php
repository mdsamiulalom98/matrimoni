<div class="member-profile-auth">
    <div class="member-profile-img">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOEe4abTSZtWFesy2WMuo7DHc1QM-LHZTwi_ROMfctGd_2dh7TY_Pb_hrFvZOPEvNTA_Q&usqp=CAU" alt="">
        {{-- <img src="{{ asset(Auth::guard('member')->user()->image) }}" alt=""> --}}
    </div>
    <div class="member-profile-name">
        <p><small>Hello</small></p>
        <p>Md Ujjal Islam</p>
        {{-- <p>{{ Auth::guard('member')->user()->name }}</p> --}}
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
