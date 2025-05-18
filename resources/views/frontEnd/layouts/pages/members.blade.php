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
                    <h3>{{ $memberInfo->name ?? '' }}</h3>

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
            <a href="{{ route('member.logout') }}"> <i class="fa-solid fa-right-from-bracket"></i>Logout </a>
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
                    <button class="nav-link active" id="my-match-tab" data-bs-toggle="tab" data-bs-target="#my-match"
                        type="button" role="tab" aria-controls="my-match" aria-selected="true">My Match</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('members', ['district' => $member->memberlocation->present_district ?? '']) }}"
                        class="nav-link">Near by Match</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('recentlyViews') }}" class="nav-link">View Not Contact</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('myProfileViews') }}" class="nav-link">View My Profile</a>
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

            <div class="tab-pane fade mt-3" id="view-not-contact" role="tabpanel"
                aria-labelledby="view-not-contact-tab">
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
                        <a href="#"
                            onclick="document.getElementById('proposalForm{{ $key }}').submit(); return false;">
                            <span>
                                <i class="fa-solid fa-hand-holding-hand"></i>
                                <p>Proposel</p>
                            </span>
                        </a>
                        <form id="proposalForm{{ $key }}" method="POST"
                            action="{{ route('member.proposal.send', ['receiver_id' => $value->id]) }}">
                            @csrf
                        </form>
                        <a href="#">
                            <span>
                                <i class="fa-solid fa-message"></i>
                                <p>Message</p>
                            </span>
                        </a>
                        @php
                            $requestStatus = '';

                            if (Auth::guard('member')->check()) {
                                $sender_id = Auth::guard('member')->user()->id;
                                $receiver_id = $value->id;
                                $findRequest = \App\Models\ProposalRequest::where(function ($query) use (
                                    $sender_id,
                                    $receiver_id,
                                ) {
                                    $query->where('sender_id', $sender_id)->where('receiver_id', $receiver_id);
                                })->first();
                                $requestStatus = $findRequest->status ?? '';
                        } @endphp ?> ?>
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
                        <a href="#"
                            onclick="document.getElementById('favoriteForm{{ $key }}').submit(); return false;">
                            <span>
                                <i style="color: red;" class="fa-solid fa-heart"></i>
                                <p>Favourite</p>
                            </span>
                        </a>
                        <form id="favoriteForm{{ $key }}" method="POST"
                            action="{{ route('member.favorite.send', ['favorite_id' => $value->id]) }}">
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

 @if (!Auth::guard('member')->check())
    <form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Popup 1: Basic Information -->
        <div id="popup1" class="popup-container">
            <div class="popup">
                @include('frontEnd.layouts.partials.popup1')
                <button type="button" disabled id="basicNext" onclick="nextPopup(1, 2)">Next</button>
            </div>
        </div>

        <!-- Popup 2: Educational Qualification -->
        <div id="popup2" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(2)"><i class="fa-solid fa-arrow-left"></i></span>
                <!-- Present Location -->
                @include('frontEnd.layouts.partials.popup2')
                <button id="educationNext" disabled type="button" onclick="nextPopup(2, 3)">Next</button>
                <button type="button" onclick="prevPopup(2, 1)">Back</button>
            </div>
        </div>

        <!-- Popup 2: Educational Qualification -->
        <div id="popup3" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(3)"><i class="fa-solid fa-arrow-left"></i></span>
                <!-- Present Location -->
                @include('frontEnd.layouts.partials.popup7')
                <button id="professionNext" disabled type="button" onclick="nextPopup(3, 4)">Next</button>
                <button type="button" onclick="prevPopup(3, 2)">Back</button>
            </div>

        </div>

        <!-- Popup 2: Educational Qualification -->
        <div id="popup4" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(4)"><i class="fa-solid fa-arrow-left"></i></span>
                <!-- Present Location -->
                @include('frontEnd.layouts.partials.popup3')
                <button id="partnerNext" disabled type="button" onclick="nextPopup(4, 5)">Next</button>
                <button type="button" onclick="prevPopup(4, 3)">Back</button>
            </div>
        </div>
        <!-- Popup 2: Educational Qualification -->
        <div id="popup5" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(5)"><i class="fa-solid fa-arrow-left"></i></span>
                <!-- Present Location -->
                @include('frontEnd.layouts.partials.popup4')
                <button id="locationNext" disabled type="button" onclick="nextPopup(5, 6)">Next</button>
                <button type="button" onclick="prevPopup(5, 4)">Back</button>
            </div>
        </div>
        <!-- Popup 2: Educational Qualification -->
        <div id="popup6" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(6)"><i class="fa-solid fa-arrow-left"></i></span>
                <!-- Present Location -->
                @include('frontEnd.layouts.partials.popup5')
                <button id="familyNext" disabled type="button" onclick="nextPopup(6, 7)">Next</button>
                <button type="button" onclick="prevPopup(6, 5)">Back</button>
            </div>
        </div>

        <!-- Popup 3: Present Address & Nationality -->
        <div id="popup7" class="popup-container">
            <div class="popup">
                <span class="close-btn" onclick="closePopup(7)"><i class="fa-solid fa-arrow-left"></i></span>
                @include('frontEnd.layouts.partials.popup6')
                <button type="button" onclick="prevPopup(7, 6)">Back</button>
                <button disabled id="registerButton" type="submit" onclick="submitForm()">Register</button>
            </div>
        </div>
    </form>



@endif
@endsection @push('script')
<script>
    $(".toggle2").on("click", function() {
        $("#page-overlay").show();
        $(".profile-popup").addClass("active");
    });

    $("#page-overlay").on("click", function() {
        $("#page-overlay").hide();
        $(".profile-popup").removeClass("active");
        $(".feature-products").removeClass("active");
    });

    $(".profile-popup-close").on("click", function() {
        $("#page-overlay").hide();
        $(".profile-popup").removeClass("active");
    });
</script>

<script>
    $(".toggle3").on("click", function() {
        $("#page-overlay").show();
        $(".image-popup").addClass("active");
    });

    $("#page-overlay").on("click", function() {
        $("#page-overlay").hide();
        $(".image-popup").removeClass("active");
        $(".feature-products").removeClass("active");
    });

    $(".image-popup-close").on("click", function() {
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
            reader.onload = function(e) {
                $(previewId).attr("src", e.target.result).show();
            };
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
    document.querySelectorAll(".toggle-group").forEach((group) => {
        group.addEventListener("click", function(event) {
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
   

    function enableButtonIfValid(containerSelector, buttonSelector) {
        function check() {
            let allFilled = true;

            console.log('--- Validating Required Inputs ---');

            $(`${containerSelector} [required]`).each(function(index) {
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
    enableButtonIfValid("#partnerExpectation", "#partnerNext");
    enableButtonIfValid("#educationInfo", "#educationNext");
    enableButtonIfValid("#familyInfo", "#familyNext");
    enableButtonIfValid("#locationInfo", "#locationNext");
    enableButtonIfValid("#professionInfo", "#professionNext");
    enableButtonIfValid("#personalInfo", "#personalNext");
    enableButtonIfValid("#careerInfo", "#professionNext");
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
    document.addEventListener('DOMContentLoaded', function() {
        const fatherAliveSelect = document.getElementById('father_alive');
        const professionField = document.getElementById('father_profession_field');
        const fatherNameInput = document.getElementById('father_name');

        fatherAliveSelect.addEventListener('change', function() {
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
    document.addEventListener('DOMContentLoaded', function() {
        const motherAliveSelect = document.getElementById('mother_alive');
        const professionField = document.getElementById('mother_profession_field');
        const motherProfessionInput = document.getElementById('mother_profession');

        motherAliveSelect.addEventListener('change', function() {
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

{{-- this for height select --}}

<!-- Actual height dropdown (like 5'0", 5'1", ..., 7'0") -->
<script>
  const select = document.getElementById('height');

  for (let feet = 5; feet <= 7; feet++) {
    for (let inch = 0; inch < 12; inch++) {
      if (feet === 7 && inch > 0) break;

      const heightText = `${feet} feet ${inch} inch`;
      const heightValue = `${feet}'${inch}"`;
      const option = new Option(heightText, heightValue);
      select.add(option);
    }
  }
</script>

<!-- SSC Passing Year -->
<script>
  const yearSelect = document.getElementById('ssc_passing');
  const startYear = 1998;
  const endYear = 2025;

  for (let year = startYear; year <= endYear; year++) {
    const option = new Option(year, year);
    yearSelect.add(option);
  }
</script>

<!-- Partner Age Ranges -->
<script>
  const partnerAgeSelect = document.getElementById('partner_age');

  const ageRanges = [
    [18, 20],
    [20, 25],
    [25, 30],
    [30, 35],
    [35, 40],
    [40, 45],
    [45, 50]
  ];

  ageRanges.forEach(([start, end]) => {
    const text = `${start} - ${end}`;
    const value = `${start}-${end}`;
    const option = new Option(text, value);
    partnerAgeSelect.add(option);
  });
</script>

<!-- Partner Height Ranges (5 - 7 feet in 0.5 steps) -->
<script>
  const partnerHeightSelect = document.getElementById('partner_height');

  const startFeet = 5;
  const endFeet = 7;
  const increment = 0.5;

  for (let height = startFeet; height < endFeet; height += increment) {
    let nextHeight = height + increment;
    if (nextHeight > endFeet) break;

    const format = h => {
      const feet = Math.floor(h);
      const inch = (h % 1 === 0.5) ? 6 : 0;
      return `${feet} feet${inch ? ' ' + inch + ' inch' : ''}`;
    };

    const text = `${format(height)} - ${format(nextHeight)}`;
    const value = `${height}-${nextHeight}`;
    const option = new Option(text, value);
    partnerHeightSelect.add(option);
  }
</script>


{{-- this for district and upazila --}}

<script>
  $('#present_district').on('change', function () {
    const districtId = $(this).val();

    if (districtId) {
      $.ajax({
        url: `{{ url('get-upazilas') }}?id=${districtId}`,
        type: 'GET',
        success: function (data) {
          $('#present_upazila').empty().append('<option value="">Select Upazila</option>');
          data.forEach(function (upazila) {
            $('#present_upazila').append(`<option value="${upazila.id}">${upazila.name}</option>`);
          });
        },
        error: function () {
          alert('Failed to fetch upazilas');
        }
      });
    } else {
      $('#present_upazila').html('<option value="">Select Upazila</option>');
    }
  });
</script>

<script>
    function togglePermanentAddress() {
      var checkbox = document.getElementById("sameAsPresent");
      var permSection = document.getElementById("permanentAddress");
      if (checkbox.checked) {
        // Hide the Permanent Address section
        permSection.style.display = "none";
      } else {
        // Show the Permanent Address section
        permSection.style.display = "block";
      }
    }
  </script>


@endpush
