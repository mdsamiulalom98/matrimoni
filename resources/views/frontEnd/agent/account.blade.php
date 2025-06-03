@extends('frontEnd.layouts.master')
@section('title', 'Agent')
@section('content')
    <div class="dashboard">
        <div class="sidebar">
            <div class="agenttoggle">
                <i class="fa-solid fa-bars"></i>
            </div>

            <div class="agent-profile-header">
                <div class="profile_image">
                    <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                        alt="Profile Photo" class="profile-photo">
                </div>
                <div class="agent-profile-info">
                    <p class="agent_verify" style="color: rgb(65, 65, 65)">Account Verified</p>
                    <span class="agent_name mt-2">
                        <h2 style="color: #fff">Name :</h2>
                        <h2 style="color: #fff"> {{ Auth::guard('agent')->user()->name }} </h2>
                    </span>
                    <h2 style="color: #fff">Agent Id : {{ Auth::guard('agent')->user()->agent_id }}</h2>
                    <h2 style="color: #fff">My Blance : 2585Tk</h2>
                </div>
                <div class="agent_verify2 agent_verHide"></div>
                <button id="desktop_none" class="agent_member_add_btn" onclick="showAddMemberModal()">Add New
                    Member</button>
                <div class="desktop_ag_menu">
                    <nav class="sidebar-nav">
                        <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
                        <a href="{{ route('agent.my_members') }}"><i class="fa-solid fa-person-breastfeeding"></i>My
                            Members</a>
                        <a href="{{ route('agent.profile_edit') }}"><i class="fa-solid fa-pen-to-square"></i> Profile
                            edit</a>
                        <a href="{{route('agent.change_pass')}}"><i class="fa-solid fa-lock"></i> Password Change</a>
                        <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-comments-dollar"></i>Cash Withdraw</a>
                        <a href="{{ route('agent.transection') }}"><i class="fa-solid fa-circle-info"></i> Transection
                            Histroy</a>
                        <form action="{{ route('agent.logout') }}" method="POST">
                            @csrf
                            <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                        </form>
                        <a class="mb-3" href="{{ route('agent.logout') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="agent-menu">
            <div class="agent-menu-logo">
                <div class="agent-menu-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="agentmenu-bottom">
                <nav class="sidebar-nav">
                    <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
                    <a href="{{ route('agent.my_members') }}"><i class="fa-solid fa-person-breastfeeding"></i>My Members</a>
                    <a href="{{ route('agent.profile_edit') }}"><i class="fa-solid fa-pen-to-square"></i> Profile edit</a>
                    <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Password Change</a>
                    <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-comments-dollar"></i>Cash Withdraw</a>
                    <a href="{{ route('agent.transection') }}"><i class="fa-solid fa-circle-info"></i> Transection Histroy</a>
                    <form action="{{ route('agent.logout') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                    </form>
                    {{-- <a href="{{ route('agent.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a> --}}
                </nav>
            </div>
        </div>



        <!-- Main Content -->
        <div class="main-content">
            <div class="agent_earn_phone">
                <a href="{{ route('page', ['slug' => 'how-to-earn']) }}"><i class="fa-solid fa-comments-dollar"></i> How to earn</a>
                <a href="{{ route('page', ['slug' => 'terms-&-conditions']) }}">
                    <i class="fa-solid fa-file-invoice"></i> Terms & Conditions
                </a>
            </div>
            <section class="agent-profile">
                <div class="profile-stats">
                    <div class="stat-card">
                        <div class="stat-value">245</div>
                        <div class="stat-label">Total Members</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">$12,450</div>
                        <div class="stat-label">Total Commission</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">94%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
            </section>

            <section>
                <div class="agent_earn_desktop">
                    <a href="{{ route('page', ['slug' => 'how-to-earn']) }}"><i class="fa-solid fa-comments-dollar"></i> How to earn</a>
                    <a href="{{ route('page', ['slug' => 'terms-&-conditions']) }}">
                        <i class="fa-solid fa-file-invoice"></i> Terms & Conditions
                    </a>
                </div>
            </section>

            <!-- Add Member Section -->
            <section class="add-member-section">
                <div class="section-header">
                    <h3 class="agent_member_add_title">Add New Member</h3>
                    <button class="agent_member_add_btn" onclick="showAddMemberModal()">+ Add Member</button>
                </div>
                <!-- Member List Table would go here -->
            </section>
        </div>
    </div>

    <!-- Add Member Modal -->
    <div id="addMemberModal" class="modal">
        <div class="modal-content">
            <button class="form_close" onclick="hideModal()"><i class="fa-solid fa-xmark"></i></button>
            <h3 style="margin-bottom: 20px;">New Member Registration</h3>
            <section class="registration_form">
                <div class="form_container">
                    <form action="{{ route('agent.member_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Basic Information -->
                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup1')
                        </div>

                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup2')
                        </div>
                        
                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup7')
                        </div>

                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup3')
                        </div>
                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup4')
                        </div>
                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup5')
                        </div>
                        <div class="input_field_group">
                            @include('frontEnd.layouts.agentpartials.popup6')
                        </div>

                        <!-- Present Location -->


                        <button type="submit" class="submit-btn">Submit</button>

                    </form>
            </section>
        </div>
    </div>


@endsection
@push('script')
    <script>
        window.addEventListener('scroll', function() {
            const signinButton = document.querySelector('.sidebar');
            if (window.scrollY > 10) {
                signinButton.classList.add('scroll-active');
            } else {
                signinButton.classList.remove('scroll-active');
            }
        });
    </script>


    <script>
        function showAddMemberModal() {
            document.getElementById('addMemberModal').style.display = 'block';
        }

        function hideModal() {
            document.getElementById('addMemberModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
    </script>

    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
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
                const heightValue = `${feet}'${inch}`;
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
        $('.district').on('change', function() {
            const districtId = $(this).val();
            let upazilaSelect = $(this).closest('.rows').find('.upazila');
            console.log(upazilaSelect);
            if (districtId) {
                $.ajax({
                    url: `{{ url('get-upazilas') }}?id=${districtId}`,
                    type: 'GET',
                    success: function(data) {
                        upazilaSelect.empty().append(
                            '<option value="">Select Upazila</option>');
                        data.forEach(function(upazila) {
                            upazilaSelect.append(
                                `<option value="${upazila.id}">${upazila.name}</option>`);
                        });
                    },
                    error: function() {
                        alert('Failed to fetch upazilas');
                    }
                });
            } else {
                upazilaSelect.html('<option value="">Select Upazila</option>');
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


    <script>
        $(".agenttoggle").on("click", function() {
            $("#page-overlay").show();
            $(".agent-menu").addClass("active");
        });

        $("#page-overlay").on("click", function() {
            $("#page-overlay").hide();
            $(".agent-menu").removeClass("active");
            $(".feature-products").removeClass("active");
        });

        $(".agent-menu-close").on("click", function() {
            $("#page-overlay").hide();
            $(".agent-menu").removeClass("active");
        });
    </script>
@endpush
