@extends('frontEnd.layouts.master')
@section('title', 'Members')

@section('content')

    {{-- <section class="member-profile-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="member-profile-sidebar">
                    @include('frontEnd.member.sidebar')
                </div>
            </div>
            <div class="col-sm-8">
                <div class="member-profile-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Quick Search</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Quick Filter</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="find_member">
                                <div class="filtercontainer">
                                    <form action="{{ route('members') }}" method="GET">
                                            <h4 class="mb-3">🔍 Find Your Perfect Match</h4>

                                           <div class="row">
                                            <div class="col-sm-4 mb-0">
                                                <label for="country" class="form-label">Country</label>
                                                <select id="country" class="form-select">
                                                    <option value="">Select Country</option>
                                                    <option value="USA">USA</option>
                                                    <option value="UK">UK</option>
                                                    <option value="India">India</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-0">
                                                <label for="religion" class="form-label">Religion</label>
                                                <select id="religion" class="form-select">
                                                    <option value="">Select Religion</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hinduism">Hinduism</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Buddhism">Buddhism</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-0">
                                                <label for="gender" class="form-label">Bride/Groom</label>
                                                <select id="gender" class="form-select">
                                                    <option value="">Select</option>
                                                    <option value="Bride">Bride</option>
                                                    <option value="Groom">Groom</option>
                                                </select>
                                            </div>
                                           </div>

                                           <div class="row">
                                            <div class="col-sm-4 mb-0">
                                                <label for="age" class="form-label">Age Range</label>
                                                <div class="form-group">
                                                    <div class="age-range">
                                                        <input type="number" name="from" class="ageinput" value="22">
                                                        <span style="color: #000">to</span>
                                                        <input type="number" name="to" class="ageinput" value="27">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-0">
                                                <label for="marital_status" class="form-label">Marital Status</label>
                                                <select id="marital_status" class="form-select">
                                                    <option value="">Select</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-0">
                                                <label for="education" class="form-label">Education</label>
                                                <input type="text" id="education" class="form-control" placeholder="Enter Education">
                                            </div>
                                           </div>

                                           <div class="row">
                                                <div class="col-sm-6 mb-0">
                                                    <label for="profession" class="form-label">Profession</label>
                                                    <input type="text" id="profession" class="form-control" placeholder="Enter Profession">
                                                </div>
                                                <div class="col-sm-6 mb-0">
                                                    <label for="complexsion" class="form-label">Complexsion</label>
                                                    <input type="text" id="complexsion" class="form-control" placeholder="Enter complexsion">
                                                </div>
                                           </div>

                                            <button type="submit" class="submit-btn">Search</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="member-profile-content">
                                <h5 class="account-title">My Account</h5>
                                <table class="table">
                                    @php
                                        $customer = \App\Models\Member::find(Auth::guard('member')->user()->id);
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $customer->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $customer->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Disctrict</td>
                                            <td>{{ $customer->district }}</td>
                                        </tr>
                                        <tr>
                                            <td>Area</td>
                                            <td>{{ $customer->cust_area ? $customer->cust_area->area_name : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td><img src="{{ asset($customer->image) }}" alt="" class="backend_img"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            There need to something
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

    <section class="member-profile-section section-padding">
        <div class="container">
            @php
                $member = Auth::guard('member')->check() ? Auth::guard('member')->user() : null;
            @endphp

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="my-match-tab" data-bs-toggle="tab" data-bs-target="#my-match"
                        type="button" role="tab" aria-controls="my-match" aria-selected="true">My Match</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('members', ['district' => $member->memberlocation->present_district ?? '']) }}"
                        class="nav-link">Near by
                        Match</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('recentlyViews') }}" class="nav-link">View Not
                        Contact</a>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="view-profile-tab" data-bs-toggle="tab" data-bs-target="#view-profile"
                        type="button" role="tab" aria-controls="view-profile" aria-selected="false">View My
                        Profile</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-3" id="my-match" role="tabpanel" aria-labelledby="my-match-tab">

                    <div class="find_member d-none">
                        <div class="filtercontainer">
                            <form action="#" method="GET">
                                <div class="searchbox">
                                    <h6 class="title">Looking for</h6>

                                    <div class="gender_selection">
                                        <button type="button" class="gender-btn active" data-gender="bride">Bride</button>
                                        <button type="button" class="gender-btn" data-gender="groom">Groom</button>
                                        <input type="hidden" name="gender" id="selectedGender" value="bride">
                                    </div>

                                    <div class="form-group">
                                        <label>Age</label>
                                        <div class="age-box">
                                            <select name="age_min">
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                            <span>to</span>
                                            <select name="age_max">
                                                <option>35</option>
                                                <option>40</option>
                                                <option>45</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Religion</label>
                                        <select name="religion">
                                            <option value="">- Any -</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="search-btn">Search Partner</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade mt-3" id="view-profile" role="tabpanel" aria-labelledby="view-profile-tab">
                    <div class="profile-container">
                        {{-- <div class="profile-header">PROFILE</div> --}}
                        <div class="profile-section">
                            <div class="profile-img">
                                {{-- <img src="{{ asset(Auth::guard('member')->user()->image ?? '') }}" alt=""> --}}
                                <i class="fa-solid fa-user-nurse"></i>
                            </div>

                            <div class="profile-info">
                                <h3>Tania Akter</h3>
                                <p>BGD3604528</p>
                                <p>Membership - Free <a href="#" style="color: blue;">Upgrade Now</a></p>
                                <div class="progress-bar">
                                    <div class="progress"></div>
                                </div>
                                <p>Your profile score 30%</p>
                            </div>

                        </div>
                        <div class="menu">
                            <div class="menu-item"><i class="fas fa-users"></i> Matches</div>
                            <div class="menu-item"><i class="fas fa-envelope"></i> Mailbox</div>
                            <div class="menu-item"><i class="fas fa-calendar-alt"></i> Daily Matches</div>
                            <div class="menu-item"><i class="fas fa-comments"></i> Chat</div>
                            <div class="menu-item"><i class="fas fa-user-edit"></i> Edit Profile</div>
                            <div class="menu-item"><i class="fas fa-user-cog"></i> Edit Partner Preference</div>
                            <div class="menu-item"><i class="fas fa-history"></i> Contact History</div>
                            <div class="menu-item"><i class="fas fa-sms"></i> SMS History</div>
                        </div>
                    </div>
                    {{-- <div class="bottom-nav">
                    <a href="#"><i class="fas fa-home"></i> Home</a>
                    <a href="#"><i class="fas fa-search"></i> Search</a>
                    <a href="#"><i class="fas fa-envelope"></i> Mailbox</a>
                    <a href="#"><i class="fas fa-crown"></i> Upgrade</a>
                    <a href="#"><i class="fas fa-user"></i> Profile</a>
                </div> --}}
                </div>

                <div class="tab-pane fade mt-3" id="view-not-contact" role="tabpanel"
                    aria-labelledby="view-not-contact-tab">
                    <p>There needs to be something here.</p>
                </div>
            </div>
        </div>
    </section>



    <section class="member_section section-padding">
        <div class="custome_container">
            <div class="member_gird">
                @foreach ($members as $key => $value)
                    <div class="post-container">
                        <div class="post-header-flex">
                            <div class="post-header">
                                {{-- <i class="fa-solid fa-user profile-pic"></i> --}}
                                <img class="profile-pic" src="{{ asset($value->memberimage->image_one ?? '') }}"
                                    alt="">
                                <div>
                                    <div class="member_info_flex">
                                        <h3 class="member_name">{{ $value->name }}</h3>
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p class="veri_text">Verified</p>
                                    </div>
                                    <div class="post-time">
                                        <p class="member_id">ID: {{ $value->member_id }}</p>
                                        <p>90 views</p>
                                        <p>9 days ago </p>
                                    </div>
                                </div>
                            </div>
                            <div class="three_dot">
                                <i class="fa-solid fa-ellipsis-h "></i>
                            </div>
                        </div>

                        @if ($value->profile_lock == 1)
                            <div class="member_image d-flex justify-content-center align-items-center">
                                <i class="fa fa-user"></i>
                            </div>
                        @else
                            <div class="member_image">
                                <a href="{{ route('details', $value->id) }}">
                                    <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="Member Image">
                                </a>
                                <div class="post-caption">
                                    {{-- <p class="member_id">ID: {{ $value->member_id }}</p> --}}
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Age :
                                            <p style="color: red">{{ $value->memberinfo->age ?? '' }}</p>
                                        </span>
                                        <span class="member_age">
                                            Height :
                                            <p style="color: red">5 feet 3 inch</p>
                                        </span>
                                        <span class="member_age">
                                            Profession :
                                            <p style="color: red"> {{ $value->membercareer->profession->title ?? '' }}</p>
                                        </span>

                                    </div>
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Riligion :
                                            <p style="color: red">Islam</p>
                                        </span>
                                        <span class="member_age">
                                            Education :
                                            <p style="color: red">Diploma</p>
                                        </span>
                                        <span class="member_age">
                                            Living :
                                            <p style="color: red">Dhaka</p>
                                        </span>

                                    </div>
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Monthly Income :
                                            <p style="color: red">35 k</p>
                                        </span>
                                        <span class="member_age">
                                            Home District :
                                            <p style="color: red">Dhaka</p>
                                        </span>
                                        <span class="member_age">
                                            complexion :
                                            <p style="color: red">fair</p>
                                        </span>

                                    </div>
                                    <div class="discount_box">
                                        <p>75% Off Package</p>
                                        <span class="dflex_p">
                                            <p class="discount_pkg">Buy Now</p>
                                            <a class="boost_btn" href="#">Boost Now</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="post-footer">
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-hand-holding-hand"></i>
                                    <p>Proposel</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-message"></i>
                                    <p>Message</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <p>Contact</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i style="color: red" class="fa-solid fa-heart"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="member_section section-padding">
        <div class="container">
            <div class="member_gird">
                @foreach ($members as $key => $value)
                    <div class="member_container">
                        @if ($value->profile_lock == 1)
                            <div class="member_image d-flex justify-content-center align-items-center">
                                <i class="fa fa-user"></i>
                            </div>
                        @else
                            <div class="member_image">
                                <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="Member Image">
                            </div>
                        @endif
                        <div class="member_info">
                            <p class="member_id">ID: {{ $value->member_id }}</p>
                            <h3 class="member_name">{{ $value->name }}</h3>
                            <p class="member_age">Age: {{ $value->memberinfo->age ?? '' }} years old</p>
                            <p class="member_qualification">Qualification:
                                {{ $value->membercareer->profession->title ?? '' }}</p>
                            <div class="member_buttons">
                                <button class="btn_details">View Details</button>
                                <button class="btn_contact">Contact Now</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    @if (!Auth::guard('member')->check())
        <form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Popup 1: Basic Information -->
            <div id="popup1" class="popup-container">
                <div class="popup">
                    <fieldset id="basicInfo">
                        <div class="pop_up_head_icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="title-wrapper">
                            <h2>Basic Information</h2>
                            <p>30%</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="my-1" style="text-align: start;font-size:14px;font-weight:bold">Profile
                                    Created By *</h6>
                                <div class="toggle-group" id="profileGroup">
                                    <div class="toggle-btn" data-value="1">Myself</div>
                                    <div class="toggle-btn" data-value="2">Parent</div>
                                    <div class="toggle-btn" data-value="3">Guardian</div>
                                    <div class="toggle-btn" data-value="4">Relatives</div>
                                    <div class="toggle-btn" data-value="5">Friend</div>
                                    <div class="toggle-btn" data-value="6">Others</div>
                                </div>
                                <input type="hidden" name="profile_created_by" id="selectedProfile" required>
                            </div>
                            <div class="col-sm-12">

                                <h6 class="my-1" style="text-align: start;font-size:14px;font-weight:bold">Looking For *
                                </h6>
                                <div class="toggle-group" id="lookingForGroup">
                                    <div class="toggle-btn" data-value="1">Bride</div>
                                    <div class="toggle-btn" data-value="2">Groom</div>
                                </div>
                                <input type="hidden" name="looking_for" id="selectedLookingFor" required>
                            </div>
                            <div class="col-sm-12">
                                {{-- <div class="form-group">
                                <label>Community / Religion *</label>
                                <select name="religion_id">
                                    <option value="">Select Religion</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->title }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                                <div class="form-group">
                                    <label>Community / Religion *</label>
                                    <div class="toggle-group" id="religionGroup">
                                        @foreach ($religions as $religion)
                                            <div class="toggle-btn" data-value="{{ $religion->id }}">
                                                {{ $religion->title }}</div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="religion_id" id="selectedReligion" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Profession *</label>
                                    <select name="profession_id" required>
                                        <option value="">Select Profession</option>
                                        @foreach ($professions as $profession)
                                            <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Candidate First Name *</label>
                                    <input type="text" name="first_name" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Candidate Last Name *</label>
                                    <input type="text" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Date of Birth *</label>
                                    <div class="dob-group">
                                        <select name="year" required>
                                            <option value="">Year</option>
                                            @php
                                                $currentYear = date('Y');
                                                $looplimit = $currentYear - 18;
                                            @endphp
                                            @for ($i = $looplimit; $i >= 1920; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <select name="month" required>
                                            <option value="">Month</option>
                                            @foreach ($months as $month)
                                                <option value="{{ $month->month }}">{{ $month->title }}</option>
                                            @endforeach
                                        </select>
                                        <select name="day" required>
                                            <option value="">Day</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option
                                                    @if ($i < 10) value="0{{ $i }}" @else value="{{ $i }}" @endif
                                                    value="{{ $i }}">
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Education *</label>
                                    <select name="education_id" required>
                                        <option value="">Select Education</option>
                                        @foreach ($educations as $education)
                                            <option value="{{ $education->id }}">{{ $education->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="button" id="basicNext" disabled onclick="nextPopup(1, 2)">Next</button>
                    {{-- <span class="close-btn" onclick="closePopup(1)"><i class="fa-solid fa-arrow-left"></i></span> --}}
                    {{-- <span class="close-btn" onclick="closePopup(1)">&times;</span> --}}
                </div>
            </div>

            <!-- Popup 2: Educational Qualification -->
            <div id="popup2" class="popup-container">
                <div class="popup">
                    <span class="close-btn" onclick="closePopup(2)"><i class="fa-solid fa-arrow-left"></i></span>
                    <!-- Present Location -->
                    <fieldset id="presentLocation">
                        <div class="row">
                            <div class="pop_up_head_icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="title-wrapper">
                                <h2>Present Location</h2>
                                <p>60%</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Country *</label>
                                    <select name="country_id" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Present Division *</label>
                                    <select name="present_division" required>
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Present District *</label>
                                    <select name="present_district" required>
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Present Upazila *</label>
                                    <select name="present_upazila" required>
                                        <option value="">Select Upazila</option>
                                        @foreach ($upazilas as $upazila)
                                            <option value="{{ $upazila->id }}">{{ $upazila->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Village / Area *</label>
                                    <input type="text" name="present_area" placeholder="Enter area name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Residency Status *</label>
                                    <select name="residency_id" required>
                                        <option value="">Select Residency</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button id="presentNext" disabled type="button" onclick="nextPopup(2, 3)">Next</button>
                    <button type="button" onclick="prevPopup(2, 1)">Back</button>
                </div>
            </div>

            <!-- Popup 3: Present Address & Nationality -->
            <div id="popup3" class="popup-container">
                <div class="popup">
                    <span class="close-btn" onclick="closePopup(3)"><i class="fa-solid fa-arrow-left"></i></span>
                    <fieldset id="accountInfo">
                        <div class="row">
                            <div class="pop_up_head_icon">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <div class="title-wrapper">
                                <h2>Account Information</h2>
                                <p>100%</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <input name="email" type="email" placeholder="Email address" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Confirm Email Address *</label>
                                    <input name="confirm_email" type="email" placeholder="Confirm email address"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Candidate Phone Number *</label>
                                    <input name="phone" type="tel" placeholder="Phone number" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Guardian Phone Number *</label>
                                    <input name="guardian_phone" type="tel" placeholder="Guardian phone number"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input name="password" type="password" placeholder="Enter password" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Confirm Password *</label>
                                    <input name="confirm_password" type="password" placeholder="Confirm password"
                                        required>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="">
                            <p class="max-image-text">Upload your 2 Photos</p>
                            <div class="register-image-wrapper">
                                <div class="addphoto-flex" id="editPhotos">

                                    <div class="image-div">

                                        <img id="preview_one" src="{{ asset($memberImage->image_one ?? '') }}" />

                                        <label for="" class="upload-btn member-image">
                                            Change
                                            <input type="file" name="image_one" id="image_one" class="file-input " />
                                        </label>

                                    </div>

                                    <div class="image-div">
                                        <img id="preview_two" src="{{ asset($memberImage->image_two ?? '') }}" />
                                        <label for="" class="upload-btn member-image">
                                            Change
                                            <input type="file" name="image_two" id="image_two" class="file-input " />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./ col -->
                    </fieldset>
                    <button type="button" onclick="prevPopup(3, 2)">Back</button>
                    <button disabled id="registerButton" type="submit" onclick="submitForm()">Register</button>
                </div>
            </div>
        </form>
    @endif

@endsection

@push('script')
    <script>
        // Gender selection functionality
        const genderButtons = document.querySelectorAll('.gender-btn');
        genderButtons.forEach(button => {
            button.addEventListener('click', () => {
                genderButtons.forEach(btn => btn.classList.remove('active'));
                const displayElement = document.getElementById('selectedGender');
                button.classList.add('active');
                // Get the selected value from data attribute
                const selectedValue = button.dataset.gender;

                // Update hidden input value (for form submission)
                displayElement.value = selectedValue;
            });
        });

        // Form submission
        document.querySelector('.lets-begin-btn').addEventListener('click', () => {
            const gender = document.querySelector('.gender-btn.active').textContent;
            const minAge = document.querySelector('.age-input:first-child').value;
            const maxAge = document.querySelector('.age-input:last-child').value;
            const religion = document.querySelectorAll('select')[0].value;
            const country = document.querySelectorAll('select')[1].value;

            alert(`Searching for:
        Gender: ${gender}
        Age: ${minAge} to ${maxAge}
        Religion: ${religion}
        Country: ${country}`);
        });
    </script>
    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_one").change(function() {
            previewImage(this, "#preview_one");
        });
        $("#image_two").change(function() {
            previewImage(this, "#preview_two");
        });
        $("#image_three").change(function() {
            previewImage(this, "#preview_three");
        });
    </script>

    <script>
        document.querySelectorAll(".toggle-group").forEach(group => {
            group.addEventListener("click", function(event) {
                let btn = event.target;
                if (!btn.classList.contains("toggle-btn")) return;

                // Remove active class from all buttons in this group
                group.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));

                // Add active class to clicked button
                btn.classList.add("active");

                // Find the associated hidden input and update its value
                let inputField = group.nextElementSibling;
                if (inputField) {
                    inputField.value = btn.getAttribute("data-value");
                }
            });
        });
    </script>
    <script>
        function enableButtonIfValid(containerSelector, buttonSelector) {
            function check() {

                let allFilled = true;

                $(`${containerSelector} [required]`).each(function() {
                    if ($(this).is('select')) {
                        if ($(this).val() === '') {
                            allFilled = false;
                            return false;
                        }
                    } else {
                        if ($.trim($(this).val()) === '') {
                            allFilled = false;
                            return false; // exit loop early
                        }
                    }
                });

                $(buttonSelector).prop('disabled', !allFilled);
            }

            // Run check on input changes
            $(`${containerSelector} [required]`).on('input change', check);

            // Initial check in case some inputs are pre-filled
            $(document).ready(check);
        }

        enableButtonIfValid('#basicInfo', '#basicNext');
        enableButtonIfValid('#presentLocation', '#presentNext');
        enableButtonIfValid('#accountInfo', '#registerButton');
    </script>
@endpush
