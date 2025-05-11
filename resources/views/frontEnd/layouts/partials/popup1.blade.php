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
            <h6 class="my-2" style="text-align: start; font-size: 14px; font-weight: bold;">Profile Created By
                (প্রোফাইল তৈরি করেছেন) *</h6>
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
            <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Looking For (খুঁজছি)*
            </h6>
            <div class="toggle-group" id="lookingForGroup">
                <div class="toggle-btn" data-value="1">Bride</div>
                <div class="toggle-btn" data-value="2">Groom</div>
            </div>
            <input type="hidden" name="looking_for" id="selectedLookingFor" required />
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Religion (নিজের
                    ধর্ম) *</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Profession (পেশা)
                    *</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Date of Birth
                    (জন্ম তারিখ)*</h6>
                <div class="dob-group">
                    <select name="year" required>
                        <option value="">Year</option>
                        @php
                            $currentYear = date('Y');
                            $looplimit = $currentYear - 18;
                        @endphp @for ($i = $looplimit; $i >= 1920; $i--)
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
                                value="{{ $i }}"> {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        {{-- <div class="col-sm-12">
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
            </div> --}}
        {{-- <div class="col-sm-12">
                <div class="form-group">
                    <label>Your education department (আপনার শিক্ষা বিভাগ)? *</label>
                    <select name="education_id" required>
                        <option value="1">Science</option>
                        <option value="2">Arts</option>
                        <option value="3">Business</option>
                    </select>
                </div>
            </div> --}}
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
{{-- <span class="close-btn" onclick="closePopup(1)"><i class="fa-solid fa-arrow-left"></i></span> --}} {{-- <span class="close-btn" onclick="closePopup(1)">&times;</span> --}}
