<fieldset id="basicInfo">
    <div class="title-wrapper">
        <h2>Basic Information</h2>
        <span>(সাধারণ তথ্য)</span>
    </div>

    <div class="reg_score_bar">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <p>Your profile score 30%</p>
    </div>

    <div class="row">
    <div class="form-group">
        <label>Profile Created By (প্রোফাইল তৈরি করেছেন) *</label>
        <div class="col-sm-12">
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
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Looking For (খুঁজছি) *</label>
                <div class="toggle-group" id="lookingForGroup">
                    <div class="toggle-btn" data-value="1">Bride</div>
                    <div class="toggle-btn" data-value="2">Groom</div>
                </div>
                <input type="hidden" name="looking_for" id="selectedLookingFor" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Religion (নিজের ধর্ম) *</label>
                <div class="toggle-group" id="religionGroup">
                    @foreach ($religions as $religion)
                        <div class="toggle-btn" data-value="{{ $religion->id }}">
                            {{ $religion->title }}
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="religion_id" id="selectedReligion" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Profession (পেশা) *</label>
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
                <label>Your Full Name (আপনার সম্পূর্ণ নাম) *</label>
                <input type="text" name="first_name" placeholder="Full Name" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Date of Birth (জন্ম তারিখ) *</label>
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
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Weight (ওজন) *</label>
                <input type="number" name="Weight" placeholder="Weight in kg" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Height (উচ্চতা) *</label>
                <select id="height" name="height" required>
                    <option value="">Select Height</option>
                    {{-- Add height options dynamically here if needed --}}
                </select>
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
