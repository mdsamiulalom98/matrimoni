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

        <div class="col-sm-12">
            <div class="form-group">
                <label>In which year are you passing SSC <span class="bn_lable">(কত সালে এসএসসি পাস করছেন)</span>
                    *</label>
                <select name="ssc_passing" required>
                    <option value="">Year</option>
                    @php
                        $currentYears = date('Y');
                        $looplimits = $currentYears - 1;
                    @endphp
                    @for ($i = $looplimits; $i >= 1920; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>What is the SSC result <span class="bn_lable">(এসএসসি এর ফলাফল কত)</span>*</label>
                <input type="text" id="ssc_gpa" name="ssc_gpa" placeholder="SSC Result" required>
            </div>
        </div>

      
        <div class="col-sm-12">
            <div class="form-group">
                <label>Latest Educational Qualification <span class="bn_lable">(সর্বশেষ শিক্ষাগত যোগ্যতা)</span>
                    *</label>
                <select name="education_end_id" required>
                    <option value="">Select Latest Qualification</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Are You Studying <span class="bn_lable">(আপনি কি অধ্যয়নরত)</span> *</label>
                <select name="is_student_member" id="is_student_member" required>
                    <option value="">Select</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>
</fieldset>
<button id="educationNext" disabled type="button" onclick="nextPopup(2, 3)">Next</button>
<button type="button" onclick="prevPopup(2, 1)">Back</button>
