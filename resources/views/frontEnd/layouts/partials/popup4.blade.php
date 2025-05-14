<fieldset id="locationInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Location</h2>
            <span class="mt-2">( অবস্থান )</span>
        </div>
        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Own Division <span class="bn_lable">(নিজ বিভাগ)</span> *</label>
                <select name="present_division" required>
                    <option value="">Select Division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Own District <span class="bn_lable">(নিজ জেলা)</span> *</label>
                <select name="present_district" required>
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Own Upazila <span class="bn_lable">(নিজ উপজেলা)</span> *</label>
                <select name="present_upazila" required>
                    <option value="">Select Upazila</option>
                    @foreach ($upazilas as $upazila)
                        <option value="{{ $upazila->id }}">{{ $upazila->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Village <span class="bn_lable">(গ্রাম)</span> *</label>
                <input type="text" name="present_area" placeholder="Enter area name" required />
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Residency <span class="bn_lable">(আবাসস্থল)</span> *</label>
                <select name="residency_id" required>
                    <option value="">Select Residency</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</fieldset>
