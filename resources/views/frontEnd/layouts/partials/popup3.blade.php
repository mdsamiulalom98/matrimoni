   <fieldset id="educationInfo">
       <div class="row">
           <div class="title-wrapper">
               <h2>Education Qualification ( প্রত্যাশিত জীবন সঙ্গী )</h2>
           </div>
           <div class="reg_score_bar">
               <div class="progress-bar">
                   <div class="progress2"></div>
               </div>
               <p>Your profile score 60%</p>
           </div>

           <div class="col-sm-12">
               <div class="form-group">
                   <label>Your education department (আপনার শিক্ষা বিভাগ)? *</label>
                   <select name="education_value" required>
                       <option value="1">Science</option>
                       <option value="2">Arts</option>
                       <option value="3">Business</option>
                   </select>
               </div>
               <div class="form-group">
                    <label>Your education medium ( আপনার শিক্ষা মাধ্যম )</label>

                   <select name="education_medium" required>
                       <option value=""> Education</option>
                       @foreach ($educations as $education)
                           <option value="{{ $education->id }}">{{ $education->title }}</option>
                       @endforeach
                   </select>
               </div>
               <div class="form-group">
                   <label>Highest educational qualification ( সর্বোচ্চ শিক্ষাগত যোগ্যতা )</label>

                   <select name="education_id" required>
                       <option value=""> Education</option>
                       @foreach ($educations as $education)
                           <option value="{{ $education->id }}">{{ $education->title }}</option>
                       @endforeach
                   </select>
               </div>
           </div>
           <div class="col-sm-12">
               <div class="form-group">
                   <label>From which class did you study? ( আপনি কোন ক্লাস থেকে পড়াশোনা করেছেন )? *</label>
                   <input type="text" id="edu_labe" name="edu_labe" placeholder="Which class did you study"
                       required>
               </div>
           </div>

           <div class="col-sm-12">
               <div class="form-group">
                   <label>Religious educational qualifications ( দ্বীনি শিক্ষাগত যোগ্যতা ) *</label>
                   <input type="text" id="religious" name="religious"
                       placeholder="Religious educational qualifications" required>
               </div>
           </div>
       </div>
   </fieldset>
