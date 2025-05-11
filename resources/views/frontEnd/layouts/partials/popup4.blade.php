<fieldset id="locationInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Present Location</h2>
        </div>
        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">
                    Country (দেশ) *</h6>
                <select name="country_id" required>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own
                    Division (নিজ বিভাগ)*</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own
                    Division (নিজ বিভাগ)*</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own
                    District (নিজ জেলা) *</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">Own
                    Upazila (নিজ উপজেলা) *</h6>
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
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">
                    Village (গ্রাম)*</h6>
                <input type="text" name="present_area" placeholder="Enter area name" required />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">
                    Residency (আবাসস্থল)*</h6>
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
