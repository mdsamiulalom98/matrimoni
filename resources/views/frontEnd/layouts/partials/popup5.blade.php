<fieldset id="familyInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Family information ( পারিবারিক তথ্য )</h2>
        </div>
        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress2"></div>
            </div>
            <p>Your profile score 60%</p>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Father Name (বাবার নাম) *</label>
                <input type="text" name="father_name" placeholder="Father Name" required>
            </div>
        </div>

        <div class="col-sm-12" id="father_profession_field">
            <div class="form-group">
                <label>Father Profession (বাবার পেশা) *</label>
                <input type="text" id="father_profession" name="father_profession" placeholder="Father Name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Is your father alive (আপনার বাবা কি জীবিত)? *</label>
                <select name="father_alive" id="father_alive" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Mother Name (মায়ের নাম)*</label>
                <input type="text" name="mother_name" placeholder="Mother Name" required>
            </div>
        </div>

        <div class="col-sm-12" id="mother_profession_field">
            <div class="form-group">
                <label>Mother Profession (মায়ের পেশা) *</label>
                <input type="text" id="mother_profession" name="mother_profession" placeholder="Mother Name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>Is your mother alive (আপনার মা কি জীবিত)? *</label>
                <select name="mother_alive" id="mother_alive" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>How many brothers do you have (আপনার কতজন ভাই আছে)? *</label>
                <input type="number" name="brother_count" placeholder="How many Brothers" required>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>How many sisters do you have (আপনার কতজন বোন আছে)? *</label>
                <input type="number" name="sister_count" placeholder="How many Sisters" required>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Family financial situation ( পারিবারিক অর্থনৈতিক অবস্থা )? *</label>
                <input type="text" name="financial_situation" placeholder="financial Situation" required>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>What is the family religious environment like? ( পারিবারিক দ্বীনি পরিবেশ কেমন )? *</label>
                <input type="text" name="guardian_profession" placeholder="Guardian's profession" required>
            </div>
        </div>
    </div>
</fieldset>
