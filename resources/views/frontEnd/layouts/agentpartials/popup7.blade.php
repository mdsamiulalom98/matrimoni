<fieldset id="careerInfo">
    <div class="titlewrapper">
        <h2>Career Information</h2>
        <span>(ক্যারিয়ার তথ্য)</span>
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
                <label>How long have you been in your current job? <span class="bn_lable">(বর্তমান চাকরি কতদিন ধরে
                        করছেন)</span> *</label>
                <input type="text" id="job_duration" name="job_duration" placeholder="Job Duration" required>
            </div>
        </div>
        
         <div class="col-sm-12">
            <div class="form-group">
                <label>Detailed description of the profession <span class="bn_lable">(পেশার বিস্তারিত বিবরণ)</span> *</label>
                <textarea id="profession_des" placeholder="Profession Description" name="profession_des" rows="4" cols="50"></textarea>
            </div>
        </div>
    </div>
</fieldset>

