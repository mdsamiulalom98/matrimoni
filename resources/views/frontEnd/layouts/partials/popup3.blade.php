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
                <input type="number" name="age" placeholder="Age" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Complexion <span class="bn_lable">(গাত্রবর্ণ)</span> *</label>
                <input type="text" id="complexion" name="complexion" placeholder="Complexion" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Height <span class="bn_lable">(উচ্চতা)</span> *</label>
                <select id="partner_height" name="partner_height" required>
                    <option value="">Select Partner Height</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Education Qualification <span class="bn_lable">(শিক্ষাগত যোগ্যতা)</span> *</label>
                <input type="text" id="education_qua" name="education_qua" placeholder="Education Qualification" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>SSC Passing Year <span class="bn_lable">(কত সালে এসএসসি পাস করছেন)</span> *</label>
                <input type="date" id="ssc_passing" name="ssc_passing" required>
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
                    <option value="all_division">All Division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Country <span class="bn_lable">(দেশ)</span> *</label>
                <select name="pertner_country" required>
                    <option value="any">Any</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Citizenship <span class="bn_lable">(নাগরিকত্ব)</span> *</label>
                <select name="pertner_citizenship" required>
                    <option value="any">Any</option>
                    @foreach ($countries as $countrie)
                        <option value="{{ $countrie->id }}">{{ $countrie->title }}</option>
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
                    <option value="">Select Profession</option>
                    @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Economic Situation <span class="bn_lable">(অর্থনৈতিক অবস্থা)</span> *</label>
                <input type="text" id="economic_situation" name="economic_situation" placeholder="Economic situation" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Annual Income <span class="bn_lable">(বার্ষিক আয়)</span> *</label>
                <select name="annual_income" id="annual_income" required>
                    <option value="">Select</option>
                    <option value="Any">Any</option>
                    <option value="20k Up">20k Up</option>
                    <option value="20k">25k Up</option>
                    <option value="30k">30k Up</option>
                    <option value="40k">40k Up</option>
                    <option value="50k">50k Up</option>
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
    </div>
</fieldset>
