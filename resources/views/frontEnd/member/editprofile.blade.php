@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">

            <section class="registration_form">

                <div class="form_container">
                    <h2>Create a New Profile</h2>
                    <form action="{{ route('member.updateprofile') }}" name="editForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Basic Information -->
                        @isset($memberInfo)
                            <input type="hidden" name="memberinfo" value="{{ $memberInfo->id }}" />
                        @endisset
                        @isset($memberCareer)
                            <input type="hidden" name="membercareer" value="{{ $memberCareer->id }}" />
                        @endisset
                        @isset($memberEducation)
                            <input type="hidden" name="membereducation" value="{{ $memberEducation->id }}" />
                        @endisset
                        @isset($memberLocation)
                            <input type="hidden" name="memberlocation" value="{{ $memberLocation->id }}" />
                        @endisset
                        @isset($memberImage)
                            <input type="hidden" name="memberimage" value="{{ $memberImage->id }}" />
                        @endisset

                        <fieldset>
                            <legend>Basic Information</legend>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mt-2">
                                        <label>Profile Created By <span class="bn_lable">(প্রোফাইল তৈরি করেছেন)</span>
                                            *</label>

                                        <div class="toggle-group" id="profileGroup">
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 1 ? 'active' : '' }}" data-value="1">Myself</div>
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 2 ? 'active' : '' }}" data-value="2">Parent</div>
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 3 ? 'active' : '' }}" data-value="3">Guardian</div>
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 4 ? 'active' : '' }}" data-value="4">Relatives</div>
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 5 ? 'active' : '' }}" data-value="5">Friend</div>
                                            <div class="toggle-btn {{ $memberInfo->profile_created_by == 6 ? 'active' : '' }}" data-value="6">Others</div>
                                        </div>
                                        <input type="hidden" value="{{ $memberInfo->profile_created_by }}" name="profile_created_by" id="selectedProfile" required>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mt-2">
                                        <label>Looking For <span class="bn_lable">(খুঁজছি)</span> *</label>
                                        <div class="toggle-group" id="lookingForGroup">
                                            <div class="toggle-btn {{ $memberInfo->looking_for == 1 ? 'active' : '' }}"
                                                data-value="1">Bride</div>
                                            <div class="toggle-btn {{ $memberInfo->looking_for == 2 ? 'active' : '' }}"
                                                data-value="2">Groom</div>
                                        </div>
                                        <input type="hidden" value="{{ $memberInfo->looking_for }}" name="looking_for" id="selectedLookingFor" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Your Full Name <span class="bn_lable">(আপনার সম্পূর্ণ নাম)</span> *</label>
                                        <input type="text" value="{{ $member->name }}" name="full_name"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Community / Religion *</label>
                                        <select name="religion_id">
                                            <option value="">Select Religion</option>
                                            @foreach ($religions as $religion)
                                                <option {{ $memberInfo->religion_id == $religion->id ? 'selected' : '' }}
                                                    value="{{ $religion->id }}">{{ $religion->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label>Date of Birth <span class="bn_lable">(জন্ম তারিখ)</span> *</label>
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
                                            <option
                                                @if ($month->id < 10) value="0{{ $month->id }}" @else value="{{ $month->id }}" @endif
                                                value="{{ $month->month }}">{{ $month->title }}</option>
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
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-2">
                                        <label>Weight <span class="bn_lable">(ওজন)</span> *</label>
                                        <input type="number" value="{{ $memberInfo->weight }}" name="weight" placeholder="Weight in kg" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mt-2">
                                        <label>Height <span class="bn_lable">(উচ্চতা)</span> *</label>
                                        <select id="height" value="{{ $memberInfo->height }}" name="height" required>
                                            <option value="">Select Height</option>
                                            {{-- Add height options dynamically here if needed --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mt-2">
                                        <label>Blood Group <span class="bn_lable">(রক্তের গ্রুপ)</span> *</label>
                                        <select name="blood_group" required>
                                            <option value="">Select</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Education Qualification -->
                        <fieldset id="educationInfo">
                            <div class="row">
                                <legend>Education Qualification (শিক্ষাগত যোগ্যতা)</legend>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>In which year are you passing SSC <span class="bn_lable">(কত সালে এসএসসি পাস
                                                করছেন)</span> *</label>
                                        <select name="ssc_passing" required>
                                            <option value="">Year</option>
                                            @php
                                                $currentYears = date('Y');
                                                $looplimits = $currentYears - 1;
                                            @endphp
                                            @for ($i = $looplimits; $i >= 1920; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>What is the SSC result <span class="bn_lable">(এসএসসি এর ফলাফল
                                                কত)</span>*</label>
                                        <input type="text" id="ssc_gpa" name="ssc_gpa" placeholder="SSC Result"
                                            required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Highest educational qualification <span class="bn_lable">(সর্বোচ্চ শিক্ষাগত
                                                যোগ্যতা)</span> *</label>
                                        <select name="education_id" required>
                                            <option value="">Select Highest Education</option>
                                            @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Latest Educational Qualification <span class="bn_lable">(সর্বশেষ শিক্ষাগত
                                                যোগ্যতা)</span> *</label>
                                        <select name="education_end_id" required>
                                            <option value="">Select Latest Qualification</option>
                                            @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>




                        <fieldset id="familyInfo">
                            <div class="row">
                                <legend>Family information (পারিবারিক তথ্য)</legend>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Father Name <span class="bn_lable">(বাবার নাম)</span> *</label>
                                        <input type="text" name="father_name" placeholder="Father Name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Is your father alive <span class="bn_lable">(আপনার বাবা কি জীবিত)</span>
                                            *</label>
                                        <select name="father_alive" id="father_alive" required>
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Father Profession <span class="bn_lable">(বাবার পেশা)</span> *</label>
                                        <input type="text" id="father_profession" name="father_profession"
                                            placeholder="Father Name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Mother Name <span class="bn_lable">(মায়ের নাম)</span>*</label>
                                        <input type="text" name="mother_name" placeholder="Mother Name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Is your mother alive <span class="bn_lable">(আপনার মা কি জীবিত)</span>
                                            *</label>
                                        <select name="mother_alive" id="mother_alive" required>
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Mother Profession <span class="bn_lable">(মায়ের পেশা)</span> *</label>
                                        <input type="text" id="mother_profession" name="mother_profession"
                                            placeholder="Mother Name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>How many brothers do you have <span class="bn_lable">(আপনার কতজন ভাই
                                                আছে)</span> *</label>
                                        <input type="number" name="brother_count" placeholder="How many Brothers">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Married Brother <span class="bn_lable">(বিবাহিত ভাই)</span> *</label>
                                        <input type="number" name="married_brother" placeholder="Married Brother">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>How many sisters do you have <span class="bn_lable">(আপনার কতজন বোন
                                                আছে)</span> *</label>
                                        <input type="number" name="sister_count" placeholder="How many Sisters">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Sister married <span class="bn_lable">(বোনের বিয়ে হয়েছে)</span> *</label>
                                        <input type="number" name="married_sister" placeholder="Sister married">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Guradian Phone <span class="bn_lable">(অভিভাকরে নাম্বার)</span> *</label>
                                        <input type="number" name="guradian_phone" placeholder="Guradian Phone">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>What is the family religious environment like? <span class="bn_lable">(
                                                পারিবারিক দ্বীনি পরিবেশ কেমন )</span> *</label>
                                        <input type="text" name="guardian_profession"
                                            placeholder="Guardian's profession" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group mt-2">
                                        <label>Description of economic situation<span class="bn_lable">( অর্থনৈতিক অবস্থার
                                                বিবরণ )</span> *</label>
                                        <!--<input type="text" name="economic_situation" placeholder="Economic Situation" required>-->
                                        <textarea id="economic_situation" name="economic_situation" rows="3" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- Location --}}

                        <fieldset id="locationInfo">
                            <div class="row" style="margin: 0px;padding: 0px;">
                                <legend>Location (অবস্থান)</legend>
                                <div class="rows" id="presentAddress">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Own District <span class="bn_lable">(নিজ জেলা)</span> *</label>
                                            <select name="present_district" id="present_district" required>
                                                <option value="">Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Own Upazila <span class="bn_lable">(নিজ উপজেলা)</span> *</label>
                                            <select name="present_upazila" id="present_upazila" required>
                                                <option value="">Select Upazila</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Village <span class="bn_lable">(গ্রাম)</span> *</label>
                                            <input type="text" name="present_area" placeholder="Enter area name"
                                                required />
                                        </div>
                                    </div>
                                </div>

                                <div class="address-toggle">
                                    <input type="checkbox" id="sameAsPresent" name="sameAsPresent"
                                        onchange="togglePermanentAddress()">
                                    <label for="sameAsPresent">বৰ্তমান ও স্থায়ী ঠিকানা একই </label>
                                </div>

                                <div class="rows" id="permanentAddress">

                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Own District <span class="bn_lable">(নিজ জেলা)</span> *</label>
                                            <select name="present_district" id="present_district" required>
                                                <option value="">Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Own Upazila <span class="bn_lable">(নিজ উপজেলা)</span> *</label>
                                            <select name="present_upazila" id="present_upazila" required>
                                                <option value="">Select Upazila</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Village <span class="bn_lable">(গ্রাম)</span> *</label>
                                            <input type="text" name="present_area" placeholder="Enter area name"
                                                required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group mt-2">
                                        <label>Where did you grow up? <span class="bn_lable">(কোথায় বড় হয়েছেন)</span>
                                            *</label>
                                        <input type="text" name="grow_up" placeholder="Where did you grow up"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- <fieldset>
                            <legend>Present Location</legend>
                            <div class="form-group mt-2">
                                <label>Country *</label>
                                <select name="country_id">
                                    @foreach ($countries as $country)
                                        <option {{ $memberInfo->country_id == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Present Division *</label>
                                <select name="present_division">
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option {{ $memberLocation->present_division == $division->id ? 'selected' : '' }}
                                            value="{{ $division->id }}">{{ $division->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Present District *</label>
                                <select name="present_district">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option {{ $memberLocation->present_district == $district->id ? 'selected' : '' }}
                                            value="{{ $district->id }}">{{ $district->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Present Upazila *</label>
                                <select name="present_upazila">
                                    <option value="">Select Upazila</option>
                                    @foreach ($upazilas as $upazila)
                                        <option {{ $memberLocation->present_upazila == $upazila->id ? 'selected' : '' }}
                                            value="{{ $upazila->id }}">{{ $upazila->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Village / Area *</label>
                                <input type="text" value="{{ $memberLocation->present_area }}" name="present_area"
                                    placeholder="Enter area name" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Residency Status *</label>
                                <select name="residency_id">
                                    <option value="">Select Residency</option>
                                    @foreach ($countries as $country)
                                        <option {{ $memberInfo->residency_id == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset> --}}

                        <!-- Account Information -->



                        <fieldset id="partnerExpectation">
                            <div class="row">
                                <legend>Prospective life partner (প্রত্যাশিত জীবন সঙ্গী)</legend>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Age <span class="bn_lable">(বয়স)</span> *</label>
                                        <select id="partner_age" name="partner_age" required>
                                            <option value="any age">Any Age</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Complexion <span class="bn_lable">(গাত্রবর্ণ)</span> *</label>
                                        <select name="complexion" id="complexion" required>
                                            <option value="">Select Complexion</option>
                                            <option value="very_fair">Very Fair</option>
                                            <option value="fair">Fair</option>
                                            <option value="wheatish">Wheatish</option>
                                            <option value="dark">Dark</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Height <span class="bn_lable">(উচ্চতা)</span> *</label>
                                        <select id="partner_height" name="partner_height" required>
                                            <option value="Any Height">Any Height</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Education Qualification <span class="bn_lable">(শিক্ষাগত যোগ্যতা)</span>
                                            *</label>
                                        <select name="education_qualification" required>
                                            <option value="">Select</option>
                                            @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>SSC Passing Year <span class="bn_lable">(কত সালে এসএসসি পাস করেছেন)</span>
                                            *</label>
                                        <select id="ssc_passing" name="ssc_passing" required>
                                            <option value="">Select Year</option>
                                            <option value="any age">Any Age</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>SSC Result <span class="bn_lable">(এসএসসি এর ফলাফল কত)</span> *</label>
                                        <input type="text" id="ssc_gpa" name="ssc_gpa" placeholder="SSC Result"
                                            required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>District <span class="bn_lable">(জেলা)</span> *</label>
                                        <select name="present_division" required>
                                            <option value="all_division">All Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Citizenship <span class="bn_lable">(নাগরিকত্ব)</span> *</label>
                                        <select name="pertner_citizenship" required>
                                            <option value="any">Any</option>
                                            @foreach ($countries as $countrie)
                                                <option value="{{ $countrie->id }}">{{ $countrie->nicename }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Marital Status <span class="bn_lable">(বৈবাহিক অবস্থা)</span> *</label>
                                        <select name="marital_status" id="marital_status" required>
                                            <option value="">Select</option>
                                            <option value="unmarried">Unmarried</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Profession <span class="bn_lable">(পেশা)</span> *</label>
                                        <select name="profession_ids" required>
                                            <option value="">Profession</option>
                                            <option value="not_required">প্রযোজ্য নয়</option>
                                            @foreach ($professions as $profession)
                                                <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Economic Situation <span class="bn_lable">(অর্থনৈতিক অবস্থা)</span>
                                            *</label>
                                        {{-- <input type="text" id="economic_situation" name="economic_situation" placeholder="Economic situation" required> --}}
                                        <select name="pertner_eco_situation" id="pertner_eco_situation">
                                            <option value="">Select</option>
                                            <option value="Any">Any</option>
                                            <option value="Lower class">Lower class</option>
                                            <option value="Middle class">Middle class</option>
                                            <option value="Upper_class">Upper class</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Monthly Income <span class="bn_lable">(মাসিক আয়)</span> *</label>
                                        <select name="montly_income" id="montly_income">
                                            <option value="">Select</option>
                                            <option value="Any">Any</option>
                                            <option value="20000 Up">20000 Up</option>
                                            <option value="25000 Up">25000 Up</option>
                                            <option value="30000 Up">30000 Up</option>
                                            <option value="40000 Up">40000 Up</option>
                                            <option value="50000 Up">50000 Up</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Drinking Habit <span class="bn_lable">(মদ্যপানের অভ্যাস)</span> *</label>
                                        <select name="drinking_habbit" id="drinking_habbit" required>
                                            <option value="">Select</option>
                                            <option value="Doesent Matter">Doesn't Matter</option>
                                            <option value="Not Allow">Not Allow</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Smoking Habit <span class="bn_lable">(ধূমপানের অভ্যাস)</span> *</label>
                                        <select name="smoking_habbit" id="smoking_habbit" required>
                                            <option value="">Select</option>
                                            <option value="Doesent Matter">Doesn't Matter</option>
                                            <option value="Not Allow">Not Allow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mt-2">
                                        <label>The qualities you expect in a life partner <span
                                                class="bn_lable">(জীবনসঙ্গীর যেসব গুণ প্রত্যাশা করেন)</span> *</label>
                                        <textarea id="expect_lifepartner" name="expect_lifepartner" rows="3" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset id="careerInfo">
                            <legend>Career Information (ক্যারিয়ার তথ্য)</legend>

                            <div class="row">
                                <div class="form-group mt-2">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label>Profession (পেশা) *</label>
                                            <select name="profession_id" required>
                                                <option value="">Select Profession</option>
                                                @foreach ($professions as $profession)
                                                    <option value="{{ $profession->id }}">{{ $profession->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Is Job Permanent <span class="bn_lable">(চাকরি স্থায়ী কিনা)</span> *</label>
                                        <select name="job_permanent" id="job_permanent" required>
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Government or Private <span class="bn_lable">(সরকারি নাকি প্রাইভেট)</span>
                                            *</label>
                                        <select name="job_type" id="job_type" required>
                                            <option value="">Select</option>
                                            <option value="government">Government</option>
                                            <option value="private">Private</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Are You Studying <span class="bn_lable">(আপনি কি অধ্যয়নরত)</span> *</label>
                                        <select name="is_student" id="is_student" required>
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Latest Educational Qualification <span class="bn_lable">(সর্বশেষ শিক্ষাগত
                                                যোগ্যতা)</span>
                                            *</label>
                                        <input type="text" id="last_education" name="last_education"
                                            placeholder="Economic situation" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>How long have you been in your current job? <span class="bn_lable">(বর্তমান
                                                চাকরি কতদিন ধরে
                                                করছেন)</span> *</label>
                                        <input type="text" id="job_duration" name="job_duration"
                                            placeholder="Economic situation" required>
                                    </div>
                                </div>


                            </div>
                        </fieldset>


                        <fieldset id="accountInfo">
                            <div class="row">
                                <legend>Account Information (অ্যাকাউন্ট তথ্য)</legend>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Email Address <span class="bn_lable">(ইমেইল দিন)</span> *</label>
                                        <input name="email" value="{{ $member->email }}" type="email"
                                            placeholder="Email address" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Your Phone Number <span class="bn_lable">(নিজের মোবাইল নম্বর)</span></label>
                                        <input name="phone" value="{{ $member->phone }}" type="tel"
                                            placeholder="Phone number" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Guardian Phone Number <span class="bn_lable">(অভিভাবকের মোবাইল নম্বর)</span>
                                            *</label>
                                        <input name="guardian_phone" type="tel" placeholder="Guardian phone number"
                                            required />
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Password <span class="bn_lable">(পাসওয়ার্ড)</span></label>
                                        <input name="password" type="password" placeholder="Enter password" required />
                                    </div>
                                </div> --}}
                                {{-- <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                        <label>Confirm Password <span class="bn_lable">(পাসওয়ার্ড নিশ্চিতা)</span></label>
                                        <input name="confirm_password" type="password" placeholder="Confirm password" required />
                                    </div>
                                </div> --}}
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="">
                                <div class="register-image-wrapper">
                                    <div class='col-sm-12'>
                                        <span class="priv_flex">
                                            <h6 class="my-1"
                                                style="text-align: start; font-size: 14px; font-weight: bold;">
                                                Upload Your Profile Picture <span class="bn_lable">(আপনার প্রোফাইল ছবি
                                                    আপলোড করুন)</span> *</h6>
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
                                            <input type="hidden" id="dropdownInput" name="profile_lock">
                                        </span>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="file" name="image_one" placeholder="Add Photo"
                                                    required />
                                            </div>
                                            <div class="col-sm-4">
                                                <img src="{{ asset($memberImage->image_one) }}"
                                                    style="height: 70px; width: auto;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6 class="my-1"
                                                    style="text-align: start; font-size: 14px; font-weight: bold;">
                                                    Upload Your Cover Photo <span class="bn_lable">(আপনার কভার ছবি আপলোড
                                                        করুন)</span> *</h6>
                                                <input type="file" name="image_two"
                                                    placeholder="Upload Your Cover Photo" required />
                                            </div>
                                            <div class="col-sm-4">
                                                <img src="{{ asset($memberImage->image_two) }}"
                                                    style="height: 70px; width: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>



                        {{-- <fieldset>
                            <div class="position-relative">
                                <div class="profile-lock-toggle">
                                    <input type="checkbox" name="profile_lock" id="lock_profile"
                                        {{ $member->profile_lock == 1 ? 'checked' : '' }} value="1" />
                                    <label for="lock_profile"></label>
                                    <p>Lock Your Account</p>
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
                        </fieldset> --}}

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
    <script type="text/javascript">
        @php
            $day = date('d', strtotime($memberInfo->dob));
            $month = date('m', strtotime($memberInfo->dob));
            $year = date('Y', strtotime($memberInfo->dob));
        @endphp

        document.forms['editForm'].elements['day'].value = "{{ $day }}";
        document.forms['editForm'].elements['month'].value = "{{ $month }}";
        document.forms['editForm'].elements['year'].value = "{{ $year }}";
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
@endpush
