<fieldset id="careerInfo">
    <div class="title-wrapper">
        <h2>Career Information</h2>
        <span>(ক্যারিয়ার তথ্য)</span>
    </div>

    <div class="reg_score_bar">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <p>Your profile score 30%</p>
    </div>

    <div class="row">
        <div class="form-group">
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
        <div class="col-sm-12">
            <div class="form-group">
                <label>Is Job Permanent <span class="bn_lable">(চাকরি স্থায়ী কিনা)</span> *</label>
                <select name="job_permanent" id="job_permanent" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Government or Private <span class="bn_lable">(সরকারি নাকি প্রাইভেট)</span> *</label>
                <select name="job_type" id="job_type" required>
                    <option value="">Select</option>
                    <option value="government">Government</option>
                    <option value="private">Private</option>
                    <option value="divorced">Divorced</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Are You Studying <span class="bn_lable">(আপনি কি অধ্যয়নরত)</span> *</label>
                <select name="is_student" id="is_student" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Latest Educational Qualification <span class="bn_lable">(সর্বশেষ শিক্ষাগত যোগ্যতা)</span>
                    *</label>
                <input type="text" id="last_education" name="last_education" placeholder="Economic situation"
                    required>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>How long have you been in your current job? <span class="bn_lable">(বর্তমান চাকরি কতদিন ধরে
                        করছেন)</span> *</label>
                <input type="text" id="job_duration" name="job_duration" placeholder="Economic situation" required>
            </div>
        </div>


    </div>
</fieldset>
<button id="professionNext" disabled type="button" onclick="nextPopup(3, 4)">Next</button>
<button type="button" onclick="prevPopup(3, 2)">Back</button>
