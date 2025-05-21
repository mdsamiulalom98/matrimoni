@extends('frontEnd.layouts.master')
@section('title', 'Members')

@section('content')


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
    </section>

    @if (!(Auth::guard('member')->check()))
        <form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Popup 1: Basic Information -->
            <div id="popup1" class="popup-container">
                <div class="popup">
                    <fieldset>
                        <h2>Basic Information</h2>
                        <div class="row">
                          
                            <div class="col-sm-12">
                                <!--<div class="form-group">-->
                                <!--    <label>Profile Created By *</label>-->
                                <!--   <div class="toggle_flex">-->
                                <!--    <label class="register-radio-label" for="myself"><input id="myself" type="radio"-->
                                <!--            name="profile_created_by" value="1"> Myself</label><br>-->
                                <!--    <label class="register-radio-label" for="parent"><input id="parent" type="radio"-->
                                <!--            name="profile_created_by" value="2"> Parent</label><br>-->
                                <!--    <label class="register-radio-label" for="guardian"><input id="guardian" type="radio"-->
                                <!--            name="profile_created_by" value="3"> Guardian</label><br>-->
                                <!--    <label class="register-radio-label" for="relatives"><input id="relatives" type="radio"-->
                                <!--            name="profile_created_by" value="4"> Relatives</label><br>-->
                                <!--    <label class="register-radio-label" for="friend"><input id="friend" type="radio"-->
                                <!--            name="profile_created_by" value="5"> Friend</label><br>-->
                                <!--    <label class="register-radio-label" for="others"><input id="others" type="radio"-->
                                <!--            name="profile_created_by" value="6"> Others</label>-->
                                <!--   </div>-->

                                <!--</div>-->
                                <h6 class="my-1" style="text-align: start;font-size:14px;font-weight:bold">Profile Created By *</h6>
                                 <div class="toggle-group" id="profileGroup">
                                <div class="toggle-btn" data-value="1">Myself</div>
                                <div class="toggle-btn" data-value="2">Parent</div>
                                <div class="toggle-btn" data-value="3">Guardian</div>
                                <div class="toggle-btn" data-value="4">Relatives</div>
                                <div class="toggle-btn" data-value="5">Friend</div>
                                <div class="toggle-btn" data-value="6">Others</div>
                            </div>
                            </div>
                            <div class="col-sm-12">
                                <!--<div class="form-group">-->
                                <!--    <label>Looking For *</label>-->
                                <!--    <div class="toggle_flex">-->
                                <!--    <label class="register-radio-label" for="bride"><input id="bride" type="radio"-->
                                <!--            name="looking_for" value="1"> Bride</label><br>-->
                                <!--    <label class="register-radio-label" for="groom"><input id="groom" type="radio"-->
                                <!--            name="looking_for" value="2"> Groom</label><br>-->
                                <!--</div>-->
                                <!--</div>-->
                                <h6 class="my-1" style="text-align: start;font-size:14px;font-weight:bold">Looking For *</h6>
                                <div class="toggle-group" id="lookingForGroup">
                                    <div class="toggle-btn" data-value="bride">Bride</div>
                                    <div class="toggle-btn" data-value="groom">Groom</div>
                                </div>
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
                                            <div class="toggle-btn" data-value="{{ $religion->id }}">{{ $religion->title }}</div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="religion_id" id="selectedReligion">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Profession *</label>
                                    <select name="profession_id">
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
                                        <select name="year">
                                            <option value="">Year</option>
                                            @php
                                                $currentYear = date('Y');
                                                $looplimit = $currentYear - 18;
                                            @endphp
                                            @for ($i = $looplimit; $i >= 1920; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <select name="month">
                                            <option value="">Month</option>
                                            @foreach ($months as $month)
                                                <option value="{{ $month->month }}">{{ $month->title }}</option>
                                            @endforeach
                                        </select>
                                        <select name="day">
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
                                    <select name="education_id">
                                        <option value="">Select Education</option>
                                        @foreach ($educations as $education)
                                            <option value="{{ $education->id }}">{{ $education->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="button" onclick="nextPopup(1, 2)">Next</button>
                    <span class="close-btn" onclick="closePopup(1)">&times;</span>
                </div>
            </div>

            <!-- Popup 2: Educational Qualification -->
            <div id="popup2" class="popup-container">
                <div class="popup">
                    <span class="close-btn" onclick="closePopup(2)">&times;</span>
                    <!-- Present Location -->
                    <fieldset>
                        <div class="row">
                            <h2>Present Location</h2>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Country *</label>
                                    <select name="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Present Division *</label>
                                    <select name="present_division">
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
                                    <select name="present_district">
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
                                    <select name="present_upazila">
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
                                    <select name="residency_id">
                                        <option value="">Select Residency</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="button" onclick="nextPopup(2, 3)">Next</button>
                    <button type="button" onclick="prevPopup(2, 1)">Back</button>
                </div>
            </div>

            <!-- Popup 3: Present Address & Nationality -->
            <div id="popup3" class="popup-container">
                <div class="popup">
                    <span class="close-btn" onclick="closePopup(3)">&times;</span>
                    <fieldset>
                        <div class="row">
                            <h2>Account Information</h2>
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
                                            <input type="file" name="image_one" id="image_one"
                                                class="file-input " />
                                        </label>

                                    </div>

                                    <div class="image-div">
                                        <img id="preview_two" src="{{ asset($memberImage->image_two ?? '') }}" />
                                        <label for="" class="upload-btn member-image">
                                            Change
                                            <input type="file" name="image_two" id="image_two"
                                                class="file-input " />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./ col -->
                    </fieldset>
                    <button type="button" onclick="prevPopup(3, 2)">Back</button>
                    <button type="submit" onclick="submitForm()">Register</button>
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
                button.classList.add('active');
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
    document.querySelectorAll(".toggle-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            let group = this.parentElement;
            group.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));
            this.classList.add("active");
        });
    });

    btn.addEventListener("click", function() {
            let group = this.parentElement;
            group.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));
            this.classList.add("active");

            // Store the selected religion ID in the hidden input field
            document.getElementById("selectedReligion").value = this.getAttribute("data-value");
        });

    function submitSelection() {
        let profileCreatedBy = document.querySelector("#profileGroup .active");
        let lookingFor = document.querySelector("#lookingForGroup .active");

        if (!profileCreatedBy || !lookingFor) {
            alert("Please select both options!");
            return;
        }

        let profileValue = profileCreatedBy.getAttribute("data-value");
        let lookingForValue = lookingFor.getAttribute("data-value");

        alert(`Profile Created By: ${profileValue}\nLooking For: ${lookingForValue}`);
    }
</script>
@endpush
