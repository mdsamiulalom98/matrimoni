<fieldset id="familyInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Family information </h2>
            <span class="mt-2">( পারিবারিক তথ্য )</span>
        </div>
        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Father Name <span class="bn_lable">(বাবার নাম)</span> *</label>
                <input type="text" name="father_name" placeholder="Father Name" required>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label>Is your father alive <span class="bn_lable">(আপনার বাবা কি জীবিত)</span> *</label>
                <select name="father_alive" id="father_alive" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

          <div class="col-sm-12">
            <div class="form-group">
                <label>Father Profession <span class="bn_lable">(বাবার পেশা)</span> *</label>
                <input type="text" id="father_profession" name="father_profession" placeholder="Father Name">
            </div>
         </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Mother Name <span class="bn_lable">(মায়ের নাম)</span>*</label>
                <input type="text" name="mother_name" placeholder="Mother Name" required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Is your mother alive <span class="bn_lable">(আপনার মা কি জীবিত)</span> *</label>
                <select name="mother_alive" id="mother_alive" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

         <div class="col-sm-12">
            <div class="form-group">
                <label>Mother Profession <span class="bn_lable">(মায়ের পেশা)</span> *</label>
                <input type="text" id="mother_profession" name="mother_profession" placeholder="Mother Name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>How many brothers do you have <span class="bn_lable">(আপনার কতজন ভাই আছে)</span> *</label>
                <input type="number" name="brother_count" placeholder="How many Brothers" >
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Married Brother <span class="bn_lable">(বিবাহিত ভাই)</span> *</label>
                <input type="number" name="married_brother" placeholder="Married Brother">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>How many sisters do you have <span class="bn_lable">(আপনার কতজন বোন আছে)</span> *</label>
                <input type="number" name="sister_count" placeholder="How many Sisters">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Sister married <span class="bn_lable">(বোনের বিয়ে হয়েছে)</span> *</label>
                <input type="number" name="married_sister" placeholder="Sister married">
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Guradian Phone <span class="bn_lable">(অভিভাকরে নাম্বার)</span> *</label>
                <input type="number" name="guradian_phone" placeholder="Guradian Phone">
            </div>
        </div>
       
        <div class="col-sm-12">
            <div class="form-group">
                <label>What is the family religious environment like? <span class="bn_lable">( পারিবারিক দ্বীনি পরিবেশ কেমন )</span> *</label>
                <input type="text" name="guardian_profession" placeholder="Guardian's profession" required>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label>Description of economic situation<span class="bn_lable">( অর্থনৈতিক অবস্থার বিবরণ )</span> *</label>
                <!--<input type="text" name="economic_situation" placeholder="Economic Situation" required>-->
                <textarea id="economic_situation" name="economic_situation" rows="4" cols="50"></textarea>
            </div>
        </div>
    </div>
</fieldset>
