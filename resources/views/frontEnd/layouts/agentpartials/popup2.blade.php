<fieldset id="educationInfo">
    <div class="row">
        <div class="titlewrapper">
            <h2>Education Qualification</h2>
            <span>(শিক্ষাগত যোগ্যতা)</span>
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

