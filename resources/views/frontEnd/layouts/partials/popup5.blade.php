<fieldset id="partnerExpectation">
    <div class="row">
        <div class="title-wrapper">
            <h2>Prospective life partner</h2>
            <span>(প্রত্যাশিত জীবন সঙ্গী)</span>
        </div>

        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Age <span class="bn_lable">(বয়স)</span> *</label>
                <!--<select id="age" name="age" required>-->
                <!--    <option value="any age">Any Age</option>-->
                <!--</select>-->
                <select name="age">
                    <option value="">Select..</option>
                    <option value="Any Age">Any Age</option>
                    @php
                        $startAge = 60;
                        $endAge = 18;
                    @endphp

                    @for ($i = $startAge; $i >= $endAge; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        

        <!--<div class="col-sm-12">-->
        <!--    <div class="form-group">-->
        <!--        <label>Complexion <span class="bn_lable">(গাত্রবর্ণ)</span> *</label>-->
        <!--        <input type="text" id="complexion" name="complexion" placeholder="Complexion" required>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="col-sm-12">
            <div class="form-group">
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

        <div class="col-sm-12">
            <div class="form-group">
                <label>Height <span class="bn_lable">(উচ্চতা)</span> *</label>
                <select id="partner_height" name="partner_height" required>
                    <option value="Any Height">Any Height</option>
                </select>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label>Education Qualification <span class="bn_lable">(শিক্ষাগত যোগ্যতা)</span> *</label>
                <select name="education_qualification" required>
                    <option value="">Select</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>SSC Passing Year <span class="bn_lable">(কত সালে এসএসসি পাস করেছেন)</span> *</label>
                <select id="ssc_passing" name="ssc_passing" required>
                    <option value="">Select Year</option>
                    <option value="any age">Any Age</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>SSC Result <span class="bn_lable">(এসএসসি এর ফলাফল কত)</span> *</label>
                <input type="text" id="ssc_gpa" name="ssc_gpa" placeholder="SSC Result" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>District <span class="bn_lable">(জেলা)</span> *</label>
                <select name="present_division" required>
                    <option value="0">All Division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label>Citizenship <span class="bn_lable">(নাগরিকত্ব)</span> *</label>
                <select name="partner_citizenship" required>
                    <option value="0">Any</option>
                    @foreach ($countries as $countrie)
                        <option value="{{ $countrie->id }}">{{ $countrie->nicename }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Marital Status <span class="bn_lable">(বৈবাহিক অবস্থা)</span> *</label>
                <select name="marital_status" id="marital_status" required>
                    <option value="">Select</option>
                    <option value="unmarried">Unmarried</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Profession <span class="bn_lable">(পেশা)</span> *</label>
                <select name="profession_ids" required>
                    <option value="">Profession</option>
                    <option value="0">প্রযোজ্য নয়</option>
                    @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Economic Situation <span class="bn_lable">(অর্থনৈতিক অবস্থা)</span> *</label>
                {{-- <input type="text" id="economic_situation" name="economic_situation" placeholder="Economic situation" required> --}}
                <select name="economic_situation" id="economic_situation">
                    <option value="">Select</option>
                    <option value="Any">Any</option>
                    <option value="Lower class">Lower class</option>
                    <option value="Middle class">Middle class</option>
                    <option value="Upper_class">Upper class</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Monthly Income <span class="bn_lable">(মাসিক আয়)</span> *</label>
                <select name="monthly_income" id="monthly_income">
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

        <div class="col-sm-12">
            <div class="form-group">
                <label>Drinking Habit <span class="bn_lable">(মদ্যপানের অভ্যাস)</span> *</label>
                <select name="drinking_habbit" id="drinking_habbit" required>
                    <option value="">Select</option>
                    <option value="Doesent Matter">Doesn't Matter</option>
                    <option value="Not Allow">Not Allow</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Smoking Habit <span class="bn_lable">(ধূমপানের অভ্যাস)</span> *</label>
                <select name="smoking_habbit" id="smoking_habbit" required>
                    <option value="">Select</option>
                    <option value="Doesent Matter">Doesn't Matter</option>
                    <option value="Not Allow">Not Allow</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>The qualities you expect in a life partner <span class="bn_lable">(জীবনসঙ্গীর যেসব গুণ প্রত্যাশা
                        করেন)</span> *</label>
                <textarea id="expect_lifepartner" name="expect_lifepartner" rows="4" cols="50"></textarea>
            </div>
        </div>
    </div>
</fieldset>


<button id="partnerNext" disabled type="button" onclick="nextPopup(6, 7)">Next</button>
<button type="button" onclick="prevPopup(6, 5)">Back</button>
