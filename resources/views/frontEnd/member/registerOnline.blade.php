@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">




            <button id="openPopup1">Register Now</button>

            <!-- Popup 1: Basic Information -->
            <div id="popup1" class="popup-container">
                <div class="popup">
                    <span class="close-btn" onclick="closePopup(1)">&times;</span>
                    <fieldset>
                        <h2>Basic Information</h2>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Profile Created By *</label>
                                    <select>
                                        <option>Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Looking For *</label>
                                    <select>
                                        <option>Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Community / Religion *</label>
                                    <select name="religion_id">
                                        <option value="">Select Religion</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->title }}</option>
                                        @endforeach
                                    </select>
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
                    <button onclick="nextPopup(1, 2)">Next</button>
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
                    <button onclick="nextPopup(2, 3)">Next</button>
                    <button onclick="prevPopup(2, 1)">Back</button>
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
                    <button onclick="prevPopup(3, 2)">Back</button>
                    <button onclick="submitForm()">Register</button>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
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
        // Open Popup
        document.getElementById("openPopup1").addEventListener("click", function() {
            document.getElementById("popup1").style.display = "flex";
        });

        // Close Popup
        function closePopup(step) {
            document.getElementById("popup" + step).style.display = "none";
        }

        // Next Popup
        function nextPopup(current, next) {
            document.getElementById("popup" + current).style.display = "none";
            document.getElementById("popup" + next).style.display = "flex";
        }

        // Previous Popup
        function prevPopup(current, prev) {
            document.getElementById("popup" + current).style.display = "none";
            document.getElementById("popup" + prev).style.display = "flex";
        }

        // Submit Form
        function submitForm() {
            alert("Registration Successful!");
            closePopup(3);
        }
    </script>
@endpush



{{-- @extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">
           
            <h2>Create an Online Profile</h2>
            <section class="registration_form section-padding">

                <div class="form_container">
                    <form action="{{ route('member_register') }}" method="POST">
                        @csrf
                        <!-- Basic Information -->
                        <fieldset>
                            <h2>Basic Information</h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Profile Created By *</label>
                                        <select>
                                            <option>Select One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Looking For *</label>
                                        <select>
                                            <option>Select One</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Candidate First Name *</label>
                                        <input type="text" name="first_name" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Candidate Last Name *</label>
                                        <input type="text" name="last_name" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Community / Religion *</label>
                                        <select name="religion_id">
                                            <option value="">Select Religion</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <div class="col-sm-3">
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
                                
                                <div class="col-sm-3">
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

                        <!-- Present Location -->
                        <fieldset>
                           <div class="row">
                            <h2>Present Location</h2>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Country *</label>
                                    <select name="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
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
                           
                          <div class="col-sm-3">
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
                           <div class="col-sm-3">
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
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label>Village / Area *</label>
                                <input type="text" name="present_area" placeholder="Enter area name" required>
                            </div>
                          </div>
                            <div class="col-sm-6">
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

                        <!-- Account Information -->
                        <fieldset>
                            <div class="row">
                            <h2>Account Information</h2>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input name="email" type="email" placeholder="Email address" required>
                            </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Confirm Email Address *</label>
                                <input name="confirm_email" type="email" placeholder="Confirm email address" required>
                            </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Candidate Phone Number *</label>
                                <input name="phone" type="tel" placeholder="Phone number" required>
                            </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Guardian Phone Number *</label>
                                <input name="guardian_phone" type="tel" placeholder="Guardian phone number" required>
                            </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password *</label>
                                <input name="password" type="password" placeholder="Enter password" required>
                            </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                                <label>Confirm Password *</label>
                                <input name="confirm_password" type="password" placeholder="Confirm password" required>
                            </div>
                           </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="position-relative">
                                <div class="profile-lock-toggle">
                                    <input type="checkbox" name="profile_lock" id="lock_profile" value="1" />
                                    <label for="lock_profile"></label>
                                    <p>Lock Your Photo</p>
                                </div>
                                <p class="max-image-text">Upload your 3 Photos</p>
                                <div class="register-image-wrapper">
                                    <div class="addphoto-flex" id="editPhotos">

                                        <div class="image-div">

                                            <img id="preview_one" src="{{ asset($memberImage->image_one ?? '') }}" />

                                            <label for="" class="upload-btn member-image">
                                                Change
                                                <input type="file" name="image_one" id="image_one"
                                                    class="file-input @error('image_one') is-invalid @enderror" />
                                            </label>
                                            @error('image_one')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="image-div">
                                            <img id="preview_two" src="{{ asset($memberImage->image_two ?? '') }}" />
                                            <label for="" class="upload-btn member-image">
                                                Change
                                                <input type="file" name="image_two" id="image_two"
                                                    class="file-input @error('image_two') is-invalid @enderror" />
                                            </label>

                                            @error('image_two')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="image-div">
                                            <img id="preview_three" src="{{ asset($memberImage->image_three ?? '') }}" />
                                            <label for="" class="upload-btn member-image">
                                                Change
                                                <input type="file" name="image_three" id="image_three"
                                                    class="file-input @error('image_three') is-invalid @enderror" />
                                            </label>
                                            @error('image_three')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ col -->
                        </fieldset>

                        <div class="form-group terms">
                            <input type="checkbox" required>
                            <label>I affirm that I have read and agreed to the <a href="#">Privacy Policy</a> and <a
                                    href="#">Terms & Conditions</a>.</label>
                        </div>

                        <button type="submit" class="submit-btn">Submit</button>
                    </form>


            </section>
        </div>
    </section>
@endsection
@push('script')
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
@endpush --}}
