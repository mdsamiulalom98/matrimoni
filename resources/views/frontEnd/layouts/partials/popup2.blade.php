<fieldset id="educationInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Education Qualification</h2>
            <span>(শিক্ষাগত যোগ্যতা)</span>
        </div>

        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>

        <!--<div class="col-sm-12">-->
        <!--    <div class="form-group">-->
        <!--        <label>Your education medium (আপনার শিক্ষা মাধ্যম) *</label>-->
        <!--        <select name="education_medium" required>-->
        <!--            <option value="">Select Education Medium</option>-->
        <!--            @foreach ($educations as $education)-->
        <!--                <option value="{{ $education->id }}">{{ $education->title }}</option>-->
        <!--            @endforeach-->
        <!--        </select>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="col-sm-12">
            <div class="form-group">
                <label>In which year are you passing SSC (কত সালে এসএসসি পাস করছেন)*</label>
                <input type="date" id="ssc_passing" name="ssc_passing" placeholder="Year of SSC Passing" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>What is the SSC result (এসএসসি এর ফলাফল কত)*</label>
                <input type="text" id="ssc_gpa" name="ssc_gpa" placeholder="SSC Result" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Highest educational qualification (সর্বোচ্চ শিক্ষাগত যোগ্যতা) *</label>
                <select name="education_id" required>
                    <option value="">Select Highest Education</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Latest Educational Qualification (সর্বশেষ শিক্ষাগত যোগ্যতা) *</label>
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
