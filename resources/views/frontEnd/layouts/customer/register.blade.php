@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">
            {{-- <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="form-content">
                    <p class="auth-title"> Register </p>
                    <form action="{{route('customer.store')}}" method="POST"  data-parsley-validate="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name " required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="phone"> Mobile Number * </label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter your mobile number" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <!--<div class="form-group mb-3">-->
                        <!--    <label for="email"> Email </label>-->
                        <!--    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your mobile number">-->
                        <!--    @error('email')-->
                        <!--        <span class="invalid-feedback" role="alert">-->
                        <!--            <strong>{{ $message }}</strong>-->
                        <!--        </span>-->
                        <!--    @enderror-->
                        <!--</div>-->
                        <!-- col-end -->
                        <div class="form-group mb-4">
                            <label for="password"> Password * </label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Choose a password " name="password" value="{{ old('password') }}" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <button class="submit-btn mt-4">Submit</button>
                         <div class="register-now no-account">
                        <p> If have an account. <a href="{{route('customer.login')}}"><i data-feather="edit-3"></i> Login here </a></p>

                    </div>
                        </div>
                     <!-- col-end -->


                     </form>
                </div>
            </div>
        </div> --}}

            <section class="registration_form section-padding">

                <div class="form_container">
                    <h2>Create a New Profile</h2>
                    <p class="info-warning"><strong>Caution!</strong> Please fill in all required fields (marked with *).</p>

                    <form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Basic Information -->
                        <fieldset>
                            <legend>Basic Information</legend>
                            <div class="form-group">
                                <label>Profile Created By *</label>
                                <select>
                                    <option>Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Looking For *</label>
                                <select>
                                    <option>Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Candidate First Name *</label>
                                <input type="text" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Candidate Last Name *</label>
                                <input type="text" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label>Community / Religion *</label>
                                <select name="religion_id">
                                    <option value="">Select Religion</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->title }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                            <div class="form-group">
                                <label>Education *</label>
                                <select name="education_id">
                                    <option value="">Select Education</option>
                                    @foreach ($educations as $education)
                                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Profession *</label>
                                <select name="profession_id">
                                    <option value="">Select Profession</option>
                                    @foreach ($professions as $profession)
                                        <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>

                        <!-- Present Location -->
                        <fieldset>
                            <legend>Present Location</legend>
                            <div class="form-group">
                                <label>Country *</label>
                                <select name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Present Division *</label>
                                <select name="present_division">
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Present District *</label>
                                <select name="present_district">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Present Upazila *</label>
                                <select name="present_upazila">
                                    <option value="">Select Upazila</option>
                                    @foreach ($upazilas as $upazila)
                                        <option value="{{ $upazila->id }}">{{ $upazila->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Village / Area *</label>
                                <input type="text" name="present_area" placeholder="Enter area name" required>
                            </div>
                            <div class="form-group">
                                <label>Residency Status *</label>
                                <select name="residency_id">
                                    <option value="">Select Residency</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>

                        <!-- Account Information -->
                        <fieldset>
                            <legend>Account Information</legend>
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input name="email" type="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Email Address *</label>
                                <input name="confirm_email" type="email" placeholder="Confirm email address" required>
                            </div>
                            <div class="form-group">
                                <label>Candidate Phone Number *</label>
                                <input name="phone" type="tel" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <label>Guardian Phone Number *</label>
                                <input name="guardian_phone" type="tel" placeholder="Guardian phone number" required>
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input name="password" type="password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password *</label>
                                <input name="confirm_password" type="password" placeholder="Confirm password" required>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="">
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
                </div>
            </section>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
@endpush
