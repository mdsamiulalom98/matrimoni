@extends('frontEnd.layouts.master') @section('title', 'Members') @section('content') @php $memberInfo = Auth::guard('member')->user(); @endphp
<section class="user_profile_section">
    <div class="profile-container">
        <!--<div class="profile-header">PROFILE</div>-->
        <div class="profile-section">
            <div class="profile-img">
                <img src="{{ asset($memberInfo->memberimage->image_one ?? '') }}" alt="" />
               
            </div>
                <div class= "edit_icon">
                  <a href="#"><i class="fa-solid fa-camera"></i> </a>
            </div>
            <div class="profile-info">
                <div class="member_menu_flex">
                    <h3>{{ $memberInfo->name ?? ''}}</h3>

                    <div class="profile_menubar toggle2">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                </div>
                <p>{{ $memberInfo->member_id ?? '' }}</p>
                <p>Membership - Free <a href="#" style="color: blue;">Upgrade Now</a></p>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <p>Your profile score 30%</p>
            </div>
        </div>
        <div class="member_logout">
            <a href="{{route('member.logout')}}"> <i class="fa-solid fa-right-from-bracket"></i>Logout </a>
        </div>
    </div>
</section>

<div class="profile-popup">
      <div class="profile-popup-close">
        <i class="fa fa-times"></i>
    </div>
    <div class="popup_menu">
        <ul>
            <li><a href="#"><i class="fa-solid fa-user-pen"></i> Profile Edit</a></li>
            <li><a href="#"><i class="fa-solid fa-heart-pulse"></i> Favorit List</a></li>
            <li><a href="#"><i class="fa-solid fa-database"></i>My Package</a></li>
            <li><a href="#"><i class="fa-regular fa-handshake"></i> Appointment</a></li>
            <li><a href="#"><i class="fa-solid fa-people-group"></i> Proposal List</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Buy Package</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
        </ul>
    </div>
</div>

<section class="member-profile-section">
    <div class="container">
        @php $member = Auth::guard('member')->check() ? Auth::guard('member')->user() : null; @endphp

        <div class="tab_button">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="my-match-tab" data-bs-toggle="tab" data-bs-target="#my-match" type="button" role="tab" aria-controls="my-match" aria-selected="true">My Match</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('members', ['district' => $member->memberlocation->present_district ?? '']) }}" class="nav-link">Near by Match</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('recentlyViews') }}" class="nav-link">View Not Contact</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('myProfileViews') }}" class="nav-link" >View My Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="view-profile-tab" href="{{ route('favorites') }}">Favourite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="view-profile-tab" href="{{ route('proposals') }}">Proposal</a>
                </li>
            </ul>
        </div>

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
                                    <input type="hidden" name="gender" id="selectedGender" value="bride" />
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
                <h1>Who Visited My Profile</h1>
            </div>

            <div class="tab-pane fade mt-3" id="view-not-contact" role="tabpanel" aria-labelledby="view-not-contact-tab">
                <p>There needs to be something here.</p>
            </div>
        </div>
    </div>
</section>

<section class="member_section">
    <div class="custome_container">
        <div class="member_gird">
            @foreach ($members as $key => $value)
            <div class="post-container">
                <div class="post-header-flex">
                    <div class="post-header">
                        <div class="profile-pic">
                            <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="" />
                            <div class="active_dot"></div>
                        </div>
                        <div class ="post_h_right">
                            <div class="member_info_flex">
                                <h3 class="member_name">{{ $value->name }}</h3>
                                <span>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p class="veri_text">Verified</p>
                                </span>
                            </div>
                            <p class = "online_text" style ="font-size:12px">Online</p>
                            <div class="post-time">
                                <p class="member_id">ID: {{ $value->member_id }}</p>
                                <p>90 views</p>
                                <p>9 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="three_dot">
                        <i class="fa-solid fa-ellipsis-h"></i>
                    </div>
                </div>

                @if ($value->profile_lock == 'only-me')
                <div class="member_image d-flex justify-content-center align-items-center">
                    <i class="fa fa-user"></i>
                </div>
                @else
                <div class="member_image">
                    <a href="{{ route('details', $value->id) }}">
                        <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="Member Image" />
                    </a>
                    <div class="post-caption">
                        {{--
                        <p class="member_id">ID: {{ $value->member_id }}</p>
                        --}}
                        <div class="member_post_flex">
                            <span class="member_age">
                                Age :
                                <p style="color: red;">{{ $value->memberinfo->age ?? '' }}</p>
                            </span>
                            <span class="member_age">
                                Height :
                                <p style="color: red;">5 feet 3 inch</p>
                            </span>
                            <span class="member_age">
                                Profession :
                                <p style="color: red;">{{ $value->membercareer->profession->title ?? '' }}</p>
                            </span>
                        </div>
                        <div class="member_post_flex">
                            <span class="member_age">
                                Religion :
                                <p style="color: red;">Islam</p>
                            </span>
                            <span class="member_age">
                                Education :
                                <p style="color: red;">Diploma</p>
                            </span>
                            <span class="member_age">
                                Living :
                                <p style="color: red;">Dhaka</p>
                            </span>
                        </div>
                        <div class="member_post_flex">
                            <span class="member_age">
                                Monthly Income :
                                <p style="color: red;">35 k</p>
                            </span>
                            <span class="member_age">
                                Home District :
                                <p style="color: red;">Dhaka</p>
                            </span>
                            <span class="member_age">
                                complexion :
                                <p style="color: red;">fair</p>
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
                    <a href="#" onclick="document.getElementById('proposalForm{{ $key }}').submit(); return false;">
                        <span>
                            <i class="fa-solid fa-hand-holding-hand"></i>
                            <p>Proposel</p>
                        </span>
                    </a>
                    <form id="proposalForm{{ $key }}" method="POST" action="{{ route('member.proposal.send', ['receiver_id' => $value->id]) }}">
                        @csrf
                    </form>
                    <a href="#">
                        <span>
                            <i class="fa-solid fa-message"></i>
                            <p>Message</p>
                        </span>
                    </a>
                    @php $requestStatus = ''; if (Auth::guard('member')->check()) { $sender_id = Auth::guard('member')->user()->id; $receiver_id = $value->id; $findRequest = \App\Models\ProposalRequest::where(function ($query) use (
                    $sender_id, $receiver_id, ) { $query->where('sender_id', $sender_id)->where('receiver_id', $receiver_id); })->first(); $requestStatus = $findRequest->status ?? ''; } @endphp
                    <a href="#">
                        <span>
                            <i class="fa-solid fa-phone-volume"></i>
                            @if ($requestStatus == 'accepted')
                            <p>{{ $value->phone }}</p>
                            @else
                            <p>Contact {{ $requestStatus }}</p>
                            @endif
                        </span>
                    </a>
                    <a href="#" onclick="document.getElementById('favoriteForm{{ $key }}').submit(); return false;">
                        <span>
                            <i style="color: red;" class="fa-solid fa-heart"></i>
                            <p>Favourite</p>
                        </span>
                    </a>
                    <form id="favoriteForm{{ $key }}" method="POST" action="{{ route('member.favorite.send', ['favorite_id' => $value->id]) }}">
                        @csrf
                    </form>
                </div>
            </div>
            
            
            
            @endforeach
            
        </div>
        <div class="add_banner">
                <p>
                    ইসলামী আইনে, বিবাহ - অথবা আরও স্পষ্টভাবে বলতে গেলে, বিবাহ চুক্ত
                    ি - কে নিকাহ বলা হয় , যা ইতিমধ্যেই কুরআনে বিবাহ চুক্তিকে বোঝ
                    াতে একচেটিয়াভাবে ব্যবহৃত হয়1 ] হান্স 
                    ওয়েহর ডিকশনারি অফ মডার্ন রিটেন অ্যারাবিকে , নিকাহকে "বিব
                    াহ; বিবাহ চুক্তি; বিবাহ, বিবাহ" হিসাবে সংজ্ঞায়িত করা হয়েছে।
                    [ 12 ] ( পাকিস্তানের মতো কিছু মুসলিম সংস্কৃতিতে , কিছু ব
                    িবাহে, নিকাহ এবং দম্পতির প্রকৃত
                </p>
            </div>
    </div>
</section>

{{--
<section class="member_section section-padding">
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
                    <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="Member Image" />
                </div>
                @endif
                <div class="member_info">
                    <p class="member_id">ID: {{ $value->member_id }}</p>
                    <h3 class="member_name">{{ $value->name }}</h3>
                    <p class="member_age">Age: {{ $value->memberinfo->age ?? '' }} years old</p>
                    <p class="member_qualification">Qualification: {{ $value->membercareer->profession->title ?? '' }}</p>
                    <div class="member_buttons">
                        <button class="btn_details">View Details</button>
                        <button class="btn_contact">Contact Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
--}} @if (!Auth::guard('member')->check())
<form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Popup 1: Basic Information -->
    <div id="popup1" class="popup-container">
        <div class="popup">
            <fieldset id="basicInfo">
                <div class="title-wrapper">
                    <h2>Basic Information</h2>
                </div>
                <div class="reg_score_bar">
                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                    <p>Your profile score 30%</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="my-2" style="text-align: start; font-size: 14px; font-weight: bold;">Profile Created By (প্রোফাইল তৈরি করেছেন) *</h6>
                        <div class="toggle-group" id="profileGroup">
                            <div class="toggle-btn" data-value="1">Myself</div>
                            <div class="toggle-btn" data-value="2">Parent</div>
                            <div class="toggle-btn" data-value="3">Guardian</div>
                            <div class="toggle-btn" data-value="4">Relatives</div>
                            <div class="toggle-btn" data-value="5">Friend</div>
                            <div class="toggle-btn" data-value="6">Others</div>
                        </div>
                        <input type="hidden" name="profile_created_by" id="selectedProfile" required />
                    </div>
                    <div class="col-sm-12">
                        <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Looking For (খুঁজছি)*</h6>
                        <div class="toggle-group" id="lookingForGroup">
                            <div class="toggle-btn" data-value="1">Bride</div>
                            <div class="toggle-btn" data-value="2">Groom</div>
                        </div>
                        <input type="hidden" name="looking_for" id="selectedLookingFor" required />
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Religion (নিজের ধর্ম) *</h6>
                            <div class="toggle-group" id="religionGroup">
                                @foreach ($religions as $religion)
                                <div class="toggle-btn" data-value="{{ $religion->id }}">
                                    {{ $religion->title }}
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="religion_id" id="selectedReligion" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Profession (পেশা) *</h6>
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
                            <label>Your Full Name (আপনার সম্পূর্ণ নাম)*</label>
                            <input type="text" name="first_name" placeholder="First Name" required />
                        </div>
                    </div>
                    
                   <div class="col-sm-12">
                        <div class="form-group">
                            <label>Father Name (বাবার নাম) *</label>
                            <input type="text" name="father_name" placeholder="Father Name" required>
                        </div>
                    </div>
                    
                   <div class="col-sm-12">
                        <div class="form-group">
                            <label>Is your father alive (আপনার বাবা কি জীবিত)? *</label>
                            <select name="father_alive" id="father_alive" required>
                                <option value="">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Mother  Name (মায়ের নাম)*</label>
                            <input type="text" name="mother_name" placeholder="Mother Name" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Is your mother alive (আপনার মা কি জীবিত)? *</label>
                            <select name="mother_alive" id="mother_alive" required>
                                <option value="">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>How many brothers do you have (আপনার কতজন ভাই আছে)? *</label>
                            <input type="number" name="brother_count" placeholder="How many Brothers" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>How many sisters do you have (আপনার কতজন বোন আছে)? *</label>
                            <input type="number" name="sister_count" placeholder="How many Sisters" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>What is your position among your siblings? (তোমার ভাইবোনদের মধ্যে তোমার অবস্থান কী)? *</label>
                            <input type="text" name="siblings_position" placeholder="Guardian's profession" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Date of Birth (জন্ম তারিখ)*</h6>
                            <div class="dob-group">
                                <select name="year" required>
                                    <option value="">Year</option>
                                    @php $currentYear = date('Y'); $looplimit = $currentYear - 18; @endphp @for ($i = $looplimit; $i >= 1920; $i--)
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
                                    <option @if ($i < 10) value="0{{ $i }}" @else value="{{ $i }}" @endif value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Education *</h6>
                            <select name="education_id" required>
                                <option value="">Select Education</option>
                                @foreach ($educations as $education)
                                <option value="{{ $education->id }}">{{ $education->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Your education department (আপনার শিক্ষা বিভাগ)? *</label>
                            <select name="education_id" required>
                                <option value="1">Science</option>
                                <option value="2">Arts</option>
                                <option value="3">Business</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Your education department (আপনার শিক্ষা বিভাগ)? *</label>
                            <select name="education_id" required>
                                <option value="1">Science</option>
                                <option value="2">Arts</option>
                                <option value="3">Business</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                             <label>Weight (ওজন) *</label>
                             <input type="number" name="Weight" placeholder="Weight" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                             <label>Blood Group (রক্তের গ্রুপ) *</label>
                              <select name="blood_group" required>
                              <option value="">Select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O-</option>
                            </select>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button type="button" id="basicNext"  onclick="nextPopup(1, 2)">Next</button>
            {{-- <span class="close-btn" onclick="closePopup(1)"><i class="fa-solid fa-arrow-left"></i></span> --}} {{-- <span class="close-btn" onclick="closePopup(1)">&times;</span> --}}
        </div>
    </div>

    <!-- Popup 2: Educational Qualification -->
    <div id="popup2" class="popup-container">
        <div class="popup">
            <span class="close-btn" onclick="closePopup(2)"><i class="fa-solid fa-arrow-left"></i></span>
            <!-- Present Location -->
            <fieldset id="presentLocation">
                <div class="row">
                    <div class="title-wrapper">
                        <h2>Present Location</h2>
                    </div>
                    <div class="reg_score_bar">
                        <div class="progress-bar">
                            <div class="progress2"></div>
                        </div>
                        <p>Your profile score 60%</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Country (দেশ) *</h6>
                            <select name="country_id" required>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own Division (নিজ বিভাগ)*</h6>
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
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own Division (নিজ বিভাগ)*</h6>
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
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own District (নিজ জেলা) *</h6>
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
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own Upazila (নিজ উপজেলা) *</h6>
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
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Village (গ্রাম)*</h6>
                            <input type="text" name="present_area" placeholder="Enter area name" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Residency (আবাসস্থল)*</h6>
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
                    <div class="title-wrapper">
                        <h2>Account Information</h2>
                    </div>
                    <div class="reg_score_bar">
                        <div class="progress-bar">
                            <div class="progress3"></div>
                        </div>
                        <p>Your profile score 100%</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Email Address (ইমেইল দিন) *</h6>
                            <input name="email" type="email" placeholder="Email address" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Your Phone Number (নিজের মোবাইল নম্বর) *</h6>
                            <input name="phone" type="tel" placeholder="Phone number" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Guardian Phone Number (অভিভাবকের মোবাইল নম্বর) *</h6>
                            <input name="guardian_phone" type="tel" placeholder="Guardian phone number" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Password (পাসওয়ার্ড ) *</h6>
                            <input name="password" type="password" placeholder="Enter password" required />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Confirm Password (পাসওয়ার্ড নিশ্চিতা ) *</h6>
                            <input name="confirm_password" type="password" placeholder="Confirm password" required />
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="">
                     
                     
                    <div class="register-image-wrapper">
                         <div class = 'col-sm-12'>
                             <span class="priv_flex">
                                  <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Upload Your Profile Pricture *</h6>
                                <div class="dropdown" id="customDropdown">
                                    <div class="dropdown-btn" id="dropdownButton">
                                        <i class="fa-solid fa-earth-americas"></i>
                                      <span id="selectedText">Public</span>
                                      <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                    <div class="dropdown-list" id="dropdownOptions">
                                      <div data-value="friends">Friends</div>
                                      <div data-value="public">Public</div>
                                      <div data-value="only-me">Only Me</div>
                                      <div data-value="blur">Blur</div>
                                    </div>
                                  </div>
                              </span>
                              <input type="hidden" id="dropdownInput" name="profile_lock">
                          <input type="file" name="image_one" placeholder="Add Photo" required />
                         </div>
                         <div class = 'col-sm-12'>
                              <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Upload Your Cover Photo (আপনার কভার ছবি আপলোড করুন) *</h6>
                          <input type="file" name="image_two" placeholder="Upload Your Cover Photo" required />
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



@endif @endsection @push('script')

<script>
    $(".toggle2").on("click", function () {
        $("#page-overlay").show();
        $(".profile-popup").addClass("active");
    });

    $("#page-overlay").on("click", function () {
        $("#page-overlay").hide();
        $(".profile-popup").removeClass("active");
        $(".feature-products").removeClass("active");
    });

    $(".profile-popup-close").on("click", function () {
        $("#page-overlay").hide();
        $(".profile-popup").removeClass("active");
    });
</script>

<script>
    $(".toggle3").on("click", function () {
        $("#page-overlay").show();
        $(".image-popup").addClass("active");
    });

    $("#page-overlay").on("click", function () {
        $("#page-overlay").hide();
        $(".image-popup").removeClass("active");
        $(".feature-products").removeClass("active");
    });

    $(".image-popup-close").on("click", function () {
        $("#page-overlay").hide();
        $(".image-popup").removeClass("active");
    });
</script>

<script>
    // Gender selection functionality
    const genderButtons = document.querySelectorAll(".gender-btn");
    genderButtons.forEach((button) => {
        button.addEventListener("click", () => {
            genderButtons.forEach((btn) => btn.classList.remove("active"));
            const displayElement = document.getElementById("selectedGender");
            button.classList.add("active");
            // Get the selected value from data attribute
            const selectedValue = button.dataset.gender;

            // Update hidden input value (for form submission)
            displayElement.value = selectedValue;
        });
    });

    // Form submission
    // document.querySelector(".lets-begin-btn").addEventListener("click", () => {
    //     const gender = document.querySelector(".gender-btn.active").textContent;
    //     const minAge = document.querySelector(".age-input:first-child").value;
    //     const maxAge = document.querySelector(".age-input:last-child").value;
    //     const religion = document.querySelectorAll("select")[0].value;
    //     const country = document.querySelectorAll("select")[1].value;

    //     alert(`Searching for:
    //     Gender: ${gender}
    //     Age: ${minAge} to ${maxAge}
    //     Religion: ${religion}
    //     Country: ${country}`);
    // });
</script>
<script>
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(previewId).attr("src", e.target.result).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image_one").change(function () {
        previewImage(this, "#preview_one");
    });
    $("#image_two").change(function () {
        previewImage(this, "#preview_two");
    });
    $("#image_three").change(function () {
        previewImage(this, "#preview_three");
    });
</script>

<script>
    document.querySelectorAll(".toggle-group").forEach((group) => {
        group.addEventListener("click", function (event) {
            let btn = event.target;
            if (!btn.classList.contains("toggle-btn")) return;

            // Remove active class from all buttons in this group
            group.querySelectorAll(".toggle-btn").forEach((b) => b.classList.remove("active"));

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
    // function enableButtonIfValid(containerSelector, buttonSelector) {
    //     function check() {
    //         let allFilled = true;
    
    //         $(`${containerSelector} [required]`).each(function () {
    //             if ($(this).is("select")) {
    //                 if ($(this).val() === "") {
    //                     allFilled = false;
    //                     return false;
    //                 }
    //             } else {
    //                 if ($.trim($(this).val()) === "") {
    //                     allFilled = false;
    //                     return false;
    //                 }
    //             }
    //         });
    
    //         $(buttonSelector).prop("disabled", !allFilled);
    //     }
    
    //     // Attach input and change events
    //     $(`${containerSelector} [required]`).on("input change", check);
    
    //     // Immediate check on load
    //     check(); // <-- FIXED
    // }
    
    function enableButtonIfValid(containerSelector, buttonSelector) {
    function check() {
        let allFilled = true;

        console.log('--- Validating Required Inputs ---');
        
        $(`${containerSelector} [required]`).each(function (index) {
            const $input = $(this);
            const tag = $input.prop('tagName').toLowerCase();
            const value = $.trim($input.val());
            const name = $input.attr('name') || $input.attr('id') || `Input ${index + 1}`;

            console.log(`[${tag}] ${name}: "${value}"`);

            if (tag === "select" && value === "") {
                console.warn(`❌ Missing select: ${name}`);
                allFilled = false;
                return false;
            } else if (tag !== "select" && value === "") {
                console.warn(`❌ Missing input: ${name}`);
                allFilled = false;
                return false;
            }
        });

        $(buttonSelector).prop("disabled", !allFilled);
        console.log(`Button ${allFilled ? 'ENABLED' : 'DISABLED'}`);
    }

    $(`${containerSelector} [required]`).on("input change", check);

    check(); // Run immediately on load
}




    enableButtonIfValid("#basicInfo", "#basicNext");
    enableButtonIfValid("#presentLocation", "#presentNext");
    enableButtonIfValid("#accountInfo", "#registerButton");
</script>

<script>
    const dropdownBtn = document.getElementById('dropdownButton');
    const selectedText = document.getElementById('selectedText');
    const hiddenInput = document.querySelector('#dropdownInput'); // Your input element
    const dropdownList = document.getElementById('dropdownOptions');
  
    dropdownBtn.addEventListener('click', () => {
      dropdownList.style.display = dropdownList.style.display === 'block' ? 'none' : 'block';
    });
  
    dropdownList.addEventListener('click', (e) => {
      if (e.target.dataset.value) {
        selectedText.textContent = e.target.textContent;
        hiddenInput.value = e.target.dataset.value;
        dropdownList.style.display = 'none';
      }
    });
  
    window.addEventListener('click', (e) => {
      if (!document.getElementById('customDropdown').contains(e.target)) {
        dropdownList.style.display = 'none';
      }
    });
  </script>
  
   <!--hide and show input field-->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const fatherAliveSelect = document.getElementById('father_alive');
    const professionField = document.getElementById('father_profession_field');
    const fatherNameInput = document.getElementById('father_name');

    fatherAliveSelect.addEventListener('change', function () {
      if (fatherAliveSelect.value === 'yes') {
        professionField.style.display = 'block';
        fatherNameInput.setAttribute('required', 'required');
      } else {
        professionField.style.display = 'none';
        fatherNameInput.removeAttribute('required');
      }
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const motherAliveSelect = document.getElementById('mother_alive');
    const professionField = document.getElementById('mother_profession_field');
    const motherProfessionInput = document.getElementById('mother_profession');

    motherAliveSelect.addEventListener('change', function () {
      if (this.value === 'yes') {
        professionField.style.display = 'block';
        motherProfessionInput.setAttribute('required', 'required');
      } else {
        professionField.style.display = 'none';
        motherProfessionInput.removeAttribute('required');
      }
    });
  });
</script>
  
  
@endpush
