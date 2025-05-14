<fieldset id="accountInfo">
    <div class="row">
        <div class="title-wrapper">
            <h2>Account Information</h2>
            <span>অ্যাকাউন্ট তথ্য</span>
        </div>
        <div class="reg_score_bar">
            <div class="progress-bar">
                <div class="progress3"></div>
            </div>
            <p>Your profile score 100%</p>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Email Address <span class="bn_lable">(ইমেইল দিন)</span> *</label>
                <input name="email" type="email" placeholder="Email address" required />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Your Phone Number <span class="bn_lable">(নিজের মোবাইল নম্বর)</span></label>
                <input name="phone" type="tel" placeholder="Phone number" required />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Guardian Phone Number <span class="bn_lable">(অভিভাবকের মোবাইল নম্বর)</span> *</label>
                <input name="guardian_phone" type="tel" placeholder="Guardian phone number" required />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Password <span class="bn_lable">(পাসওয়ার্ড)</span></label>   
                <input name="password" type="password" placeholder="Enter password" required />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Confirm Password <span class="bn_lable">(পাসওয়ার্ড নিশ্চিতা)</span></label>
                <input name="confirm_password" type="password" placeholder="Confirm password" required />
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="">
        <div class="register-image-wrapper">
            <div class='col-sm-12'>
                <span class="priv_flex">
                    <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">
                        Upload Your Profile Picture <span class="bn_lable">(আপনার প্রোফাইল ছবি আপলোড করুন)</span> *</h6>
                    <div class="dropdown" id="customDropdown">
                        <div class="dropdown-btn" id="dropdownButton">
                            <i class="fa-solid fa-earth-americas"></i>
                            <span id="selectedText">Public</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="dropdown-list" id="dropdownOptions">
                            <div data-value="friends">Friends</div>
                            <div data-value="public">Public</div>
                            <div data-value="only-me">Only Me</div>
                            <div data-value="blur">Blur</div>
                        </div>
                    </div>
                </span>
                <input type="hidden" id="dropdownInput" name="profile_lock">
                <input type="file" name="image_one" placeholder="Add Photo" required />
            </div>
            <div class="col-sm-12">
                <h6 class="my-1" style="text-align: start; font-size: 14px; font-weight: bold;">
                    Upload Your Cover Photo <span class="bn_lable">(আপনার কভার ছবি আপলোড করুন)</span> *</h6>
                <input type="file" name="image_two" placeholder="Upload Your Cover Photo" required />
            </div>
        </div>
    </div>
</fieldset>
