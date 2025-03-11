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
@endsection

@push('scrip')
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
@endpush

