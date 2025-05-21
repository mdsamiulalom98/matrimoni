<fieldset id="locationInfo">
    <div class="row" style="margin: 0px;padding: 0px;">
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

        <div class="rows" id="presentAddress">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Own District <span class="bn_lable">(নিজ জেলা)</span> *</label>
                    <select class="district" name="present_district" id="present_district" required>
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Own Upazila <span class="bn_lable">(নিজ উপজেলা)</span> *</label>
                    <select class="upazila" name="present_upazila" id="present_upazila" required>
                        <option value="">Select Upazila</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Village <span class="bn_lable">(গ্রাম)</span> *</label>
                    <input type="text" name="present_area" placeholder="Enter area name" required />
                </div>
            </div>
        </div>

        <div class="address-toggle">
            <input type="checkbox" id="sameAsPresent" name="sameAsPresent" onchange="togglePermanentAddress()">
            <label for="sameAsPresent">বৰ্তমান ও স্থায়ী ঠিকানা একই </label>
        </div>

        <div class="rows" id="permanentAddress">

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Own District <span class="bn_lable">(নিজ জেলা)</span> *</label>
                    <select name="present_district" class="district" id="present_district" required>
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Own Upazila <span class="bn_lable">(নিজ উপজেলা)</span> *</label>
                    <select name="present_upazila" id="present_upazila" class="upazila" required>
                        <option value="">Select Upazila</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Village <span class="bn_lable">(গ্রাম)</span> *</label>
                    <input type="text" name="present_area" placeholder="Enter area name" required />
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Where did you grow up? <span class="bn_lable">(কোথায় বড় হয়েছেন)</span> *</label>
                <input type="text" name="grow_up" placeholder="Where did you grow up" required />
            </div>
        </div>
    </div>
</fieldset>
<button id="locationNext" disabled type="button" onclick="nextPopup(5, 6)">Next</button>
<button type="button" onclick="prevPopup(5, 4)">Back</button>
