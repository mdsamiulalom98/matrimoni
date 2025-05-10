@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')


        



<section class="register_content">
    <div class="container">
        <div class="reg_content_wrap">
            <div class="quran-container">
                <div class="verse-content">
                    আর তোমাদের মধ্যে যারা বিবাহযোগ্য, তাদের বিবাহ সম্পাদন করো; এবং তোমাদের দাস ও দাসীদের মধ্যে যারা সৎকর্মপরায়ণ, তাদেরও বিবাহ করো। যদি তারা গরিব হয়, তবে আল্লাহ নিজ অনুগ্রহে তাদের অভাবমুক্ত করে দেবেন।
                </div>
                <div class="reference">
                    — কুরআন শরীফ, সূরা আন-নূর (আয়াত ৩২)
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="agrements_section mb-5">
        
        <div class="container" style="display: flex;display: flex; justify-content: center">
            
            <div class="agreement_box">
                <div class="agreements_condi_box">
                    <h3>You need to make some real commitments</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                         <!--<input type="radio" class="radio-input" name="personality" id="good">-->
                        <label style="font-size: 8px" class="form-check-label" for="flexCheckDefault">
                            আমি আল্লাহর নামে শপথ করতেছি যে , সকল তথ্য সঠিক ভাবে প্ৰদান করবো,<br>
                            ভুল তথ্য প্ৰদান করে প্রতারনা করলে হালাল বিবাহ সেবা, দুনিয়া ও আখিরাতের দায়ভার নিবে না।
                        </label>
                      </div>
                      <button class="submit-btn mt-3">Create your biodata</button>
                </div>

                <div class="gender-select">
                    <button class="gender-btn" data-gender="men" onclick="showForm('men')">Men</button>
                    <button class="gender-btn" data-gender="women" onclick="showForm('women')">Women</button>
               </div>

                <!-- Men Form -->
                <div id="menForm" class="form-section">
                     <div class="en_bn_lable">
                        <label>Do you perform Salah regularly?</label>
                       <label class="bn_lable">আপনি কি নিয়মিত নামাজ পড়েন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="salah" id="yes">
                            <span class="radio-label">5 times (৫ বার)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="salah" id="no">
                            <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                        </label>
                    </div>
                    
                    <div class="en_bn_lable">
                        <label>Do you have a beard?</label>
                        <label class="bn_lable">দাড়ি আছে কিনা?</label>
                    </div>

                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="beard" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="beard" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>

                   
                    <div class="en_bn_lable">
                        <label>Do you wear Sunnah-style clothing?</label>
                       <label class="bn_lable">আপনি কি সুন্নাহ স্টাইলের পোশাক পরে থাকোন?</label>
                    </div>

                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="sunnah_clothing" id="yes">
                            <span class="radio-label">Always (সর্বদাই)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="sunnah_clothing" id="no">
                            <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                        </label>
                    </div>
                   
                    <div class="en_bn_lable">
                        <label>Can you read the Quran?</label>
                       <label class="bn_lable">আপনি কি কুরআন পড়তে পারেন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="read_quarn" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="read_quarn" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>How is your financial situation??</label>
                       <label class="bn_lable">আপনার আর্থিক অবস্থা কেমন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="financial_situation" id="heigh">
                            <span class="radio-label">Heigh (উচ্চবিও)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="financial_situation" id="middle">
                            <span class="radio-label">Middle (মধ্যবিও)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="financial_situation" id="low">
                            <span class="radio-label">Lower middle class (নিম্ন মধ্যবিও)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Is your income from a halal source?</label>
                       <label class="bn_lable">আপনার আয় কি হালাল উৎস থেকে?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Are you free from addictions?</label>
                       <label class="bn_lable">আপনি কি নেশা থেকে মুক্ত?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>What are your personality traits?</label>
                       <label class="bn_lable">আপনার চারিত্রিক বৈশিষ্ট্য কেমন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="good">
                            <span class="radio-label">Good (ভাল)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="better">
                            <span class="radio-label">Better (মধ্যম)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="best">
                            <span class="radio-label">Best (উত্তম)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>You may have had a past relationship with someone who is against Islam, which could have a negative impact on your future marital relationship.</label>
                       <label class="bn_lable">আপনার অতিতে ইসলাম এর  সাথে সাংঘর্ষিক হয়  এমন কারো সাথে সম্পর্ক ছিলো, যার কারনে ভবিষৎ বৈবাহিক সম্পর্কে বিরূপ প্রভাব পড়তে পারে।</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="before_relationship" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="before_relationship" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                </div>

                <!-- Women Form -->
                <div id="womenForm" class="form-section">
                    <div class="en_bn_lable">
                        <label>Do you have parental permission? Yes No?</label>
                       <label class="bn_lable">আপনি অভিবাবক এর অনুমতি নিয়েছেন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="guardian_permission" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="guardian_permission" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Want to live with the groom's parents after marriage?</label>
                       <label class="bn_lable">বিয়ের পর পাত্রের বাবা মায়ের সাথে একসঙ্গে বসবাস করতে চান?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="after_marriage" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="after_marriage" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Want to work after marriage?</label>
                       <label class="bn_lable">বিয়ের পর চাকরি করতে চান?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="job_permission" id="yes">
                            <span class="radio-label">If says (যদি বলে)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="job_permission" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Do you wear hijab?</label>
                       <label class="bn_lable">আপনি কি হিজাব পরেন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Do you perform Salah regularly?</label>
                        <label class="bn_lable">আপনি কি নিয়মিত নামাজ পড়েন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="yes">
                            <span class="radio-label">5 times (৫ বার)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="income_source" id="no">
                            <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>Can you read the Quran?</label>
                        <label class="bn_lable">আপনি কি কুরআন পড়তে পারেন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="read_quarn" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="read_quarn" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>What is your lineage??</label>
                        <label class="bn_lable">আপনার বংশমর্যাদা কেমন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="lineage_condition" id="good">
                            <span class="radio-label">Good (ভাল)</span>
                        </label>

                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="lineage_condition" id="better">
                            <span class="radio-label">Better (মধ্যম)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="lineage_condition" id="best">
                            <span class="radio-label">Best (উত্তম)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>What are your personality traits?</label>
                       <label class="bn_lable">আপনার চারিত্রিক বৈশিষ্ট্য কেমন?</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="good">
                            <span class="radio-label">Good (ভাল)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="better">
                            <span class="radio-label">Better (মধ্যম)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="personality" id="best">
                            <span class="radio-label">Best (উত্তম)</span>
                        </label>
                    </div>
                    <div class="en_bn_lable">
                        <label>You may have had a past relationship with someone who is against Islam, which could have a negative impact on your future marital relationship.</label>
                       <label class="bn_lable">আপনার অতিতে ইসলাম এর  সাথে সাংঘর্ষিক হয়  এমন কারো সাথে সম্পর্ক ছিলো, যার কারনে ভবিষৎ বৈবাহিক সম্পর্কে বিরূপ প্রভাব পড়তে পারে।</label>
                    </div>
                    <div class="option-group">
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="before_relationship" id="yes">
                            <span class="radio-label">Yes (হ্যাঁ)</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" class="radio-input" name="before_relationship" id="no">
                            <span class="radio-label">No (না)</span>
                        </label>
                    </div>
                </div>
                <button class="submit-btn mt-3">Next</button>
            </div>
            
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showForm('men'); // You can change to 'women' if needed
        });
    
        function showForm(gender) {
            // Remove 'active' class from all buttons and forms
            document.querySelectorAll('.gender-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.form-section').forEach(form => form.classList.remove('active'));
    
            // Add 'active' to the selected button and form
            if (gender === 'men') {
                document.getElementById('menForm').classList.add('active');
                document.querySelector('.gender-btn[data-gender="men"]').classList.add('active');
            } else if (gender === 'women') {
                document.getElementById('womenForm').classList.add('active');
                document.querySelector('.gender-btn[data-gender="women"]').classList.add('active');
            }
        }
    </script>
@endpush
