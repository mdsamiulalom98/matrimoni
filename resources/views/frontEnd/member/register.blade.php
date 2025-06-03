@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="register_content">
        <div class="container">
            <div class="reg_content_wrap">
                <div class="quran-container">
                    <div class="verse-content">
                        আর তোমাদের মধ্যে যারা বিবাহযোগ্য, তাদের বিবাহ সম্পাদন করো; এবং তোমাদের দাস ও দাসীদের মধ্যে যারা
                        সৎকর্মপরায়ণ, তাদেরও বিবাহ করো। যদি তারা গরিব হয়, তবে আল্লাহ নিজ অনুগ্রহে তাদের অভাবমুক্ত করে দেবেন।
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
            <form action="{{ route('member_query') }}" method="POST" class="agreement_form" id="form">
                @csrf
                <div class="agreement_box">
                    <div class="agreements_condi_box">
                        <h3>You need to make some real commitments</h3>
                        <span class="create-your-biodata mt-3">Create your biodata</span>
                    </div>

                    <div class="gender-select">
                        <button class="gender-btn" type="button" data-gender="men">Men</button>
                        <button class="gender-btn" type="button" data-gender="women">Women</button>
                    </div>
                    <input type="hidden" name="gender" id="genderInput">
                    <!-- Men Form -->
                    <div id="menForm" class="form-section">
                        <div class="en_bn_lable">
                            <label class="en_lable">Do you perform Salah regularly</label>
                            <label class="bn_lable">(আপনি কি নিয়মিত নামাজ পড়েন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="regular_salah" id="yes"
                                    value="yes">
                                <span class="radio-label">5 times (৫ বার)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="regular_salah" id="no"
                                    value="no">
                                <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Do you have a beard</label>
                            <label class="bn_lable">(দাড়ি আছে কিনা)</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="have_beard" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="have_beard" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Are you religious</label>
                            <label class="bn_lable">( আপনি কি দ্বীনদার )</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="is_religious" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="is_religious" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Do you intend to perform Hajj</label>
                            <label class="bn_lable">( হজ্ব করার ইচ্ছে আছে )</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="hajj_intent" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="hajj_intent" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>


                        <div class="en_bn_lable">
                            <label class="en_lable">Do you wear Sunnah-style clothing</label>
                            <label class="bn_lable">(আপনি কি সুন্নাহ স্টাইলের পোশাক পরে থাকোন)</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="sunnah_clothing" id="yes"
                                    value="yes">
                                <span class="radio-label">Always (সর্বদাই)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="sunnah_clothing" id="no"
                                    value="no">
                                <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Can you read the Quran</label>
                            <label class="bn_lable">(আপনি কি কুরআন পড়তে পারেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="read_quran" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="read_quran" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Do your parents agree to your marriage</label>
                            <label class="bn_lable">(অভিভাবক আপনার বিয়েতে রাজি কি না)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="parents_agree"
                                    id="heigh" value="heigh">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="parents_agree"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Should you keep your wife on screen after marriage</label>
                            <label class="bn_lable">(বিয়ের পর স্ত্রীকে পর্দায় রাখবেন কি না)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="keep_hijab"
                                    id="heigh" value="heigh">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="keep_hijab"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>


                        <div class="en_bn_lable">
                            <label class="en_lable">Do you want to let your wife work after marriage</label>
                            <label class="bn_lable">(বিয়ের পর স্ত্রীকে চাকরি করতে দিতে চান কি না)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="wife_job_permission"
                                    id="heigh" value="heigh">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="wife_job_permission"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Do you want to let your wife work after marriage</label>
                            <label class="bn_lable">(বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="after_marriage_live"
                                    id="with_parents" value="With Parents">
                                <span class="radio-label">With parents (বাবা মায়ের সাথে)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="after_marriage_live"
                                    id="separate" value="Separate">
                                <span class="radio-label">Separate (আলাদা)</span>
                            </label>
                        </div>


                         <div class="en_bn_lable">
                            <label class="en_lable">Should you educate your wife after marriage</label>
                            <label class="bn_lable">(বিয়ের পর বউকে পড়াশোনা  করাবেন কি)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="edu_permission"
                                    id="yes" value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="edu_permission"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>


                         <div class="en_bn_lable">
                            <label class="en_lable">When will you pay the cabin fee?</label>
                            <label class="bn_lable">(কাবিন এর টাকা কখন পরিশোধ করবেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="cabinfee"
                                    id="yes" value="yes">
                                <span class="radio-label">Complete before marriage (বিয়ের আগে সম্পূর্ণ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="cabinfee"
                                    id="no" value="no">
                                <span class="radio-label">Partial before marriage (বিয়ের আগে আংশিক)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="cabinfee"
                                    id="no" value="no">
                                <span class="radio-label">Negotiable (আলোচনা সাপেক্ষে)</span>
                            </label>
                        </div>


                        <div class="en_bn_lable">
                            <label class="en_lable">How is your financial situation</label>
                            <label class="bn_lable">(আপনার আর্থিক অবস্থা কেমন)</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="financial_status"
                                    id="heigh" value="heigh">
                                <span class="radio-label">Heigh (উচ্চবিও)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="financial_status"
                                    id="middle" value="middle">
                                <span class="radio-label">Middle (মধ্যবিও)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="financial_status"
                                    id="low" value="low">
                                <span class="radio-label">Lower middle class (নিম্ন মধ্যবিও)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Is your income from a halal source</label>
                            <label class="bn_lable">(আপনার আয় কি হালাল উৎস থেকে)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="halal_income" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="halal_income" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Are you free from addictions</label>
                            <label class="bn_lable">(আপনি কি নেশা থেকে মুক্ত)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="addiction_free" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="addiction_free" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">What are your personality traits</label>
                            <label class="bn_lable">(আপনার চারিত্রিক বৈশিষ্ট্য কেমন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="personality_trait"
                                    id="good" value="good">
                                <span class="radio-label">Good (ভাল)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="personality_trait"
                                    id="better" value="better">
                                <span class="radio-label">Better (মধ্যম)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="personality_trait"
                                    id="best" value="best">
                                <span class="radio-label">Best (উত্তম)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">You may have had a past relationship with someone who is against Islam,
                                which could have a negative impact on your future marital relationship.</label>
                            <label class="bn_lable">(আপনার অতিতে ইসলাম এর সাথে সাংঘর্ষিক হয় এমন কারো সাথে সম্পর্ক ছিলো, যার
                                কারনে ভবিষৎ বৈবাহিক সম্পর্কে বিরূপ প্রভাব পড়তে পারে।)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="previous_marriage_problem"
                                    id="yes" value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="previous_marriage_problem"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Women Form -->
                    <div id="womenForm" class="form-section">
                        
                       <div class="en_bn_lable">
                            <label class="en_lable">Do your parents agree to your marriage</label>
                            <label class="bn_lable">(অভিভাবক আপনার বিয়েতে রাজি কি না)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="parents_agree"
                                    id="heigh" value="heigh">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input" required name="parents_agree"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Got parental permission to create account</label>
                            <label class="bn_lable">(অ্যাকাউন্ট তৈরি করার জন্য অভিভাবকের অনুমতি নিয়েছেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="parental_permission"
                                    id="yes" value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="parental_permission"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>
                        <div class="en_bn_lable">
                            <label class="en_lable">Do you perform Salah regularly</label>
                            <label class="bn_lable">(আপনি কি নিয়মিত নামাজ পড়েন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="regular_salah" id="yes"
                                    value="yes">
                                <span class="radio-label">5 times (৫ বার)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="regular_salah" id="no"
                                    value="no">
                                <span class="radio-label">Sometimes (মাঝে মাঝে)</span>
                            </label>
                        </div>
                        <div class="en_bn_lable">
                            <label class="en_lable">Can you read the Quran</label>
                            <label class="bn_lable">(আপনি কি কুরআন পড়তে পারেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="read_quran" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="read_quran" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Are you religious</label>
                            <label class="bn_lable">( আপনি কি দ্বীনদার )</label>
                        </div>

                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="is_religious" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="is_religious" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">Want to live with the groom's parents after marriage</label>
                            <label class="bn_lable">(বিয়ের পর পাত্রের বাবা মায়ের সাথে একসঙ্গে বসবাস করতে চান)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="inlaws_residence"
                                    id="yes" value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="inlaws_residence"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>


                        <div class="en_bn_lable">
                            <label class="en_lable">Want to work after marriage</label>
                            <label class="bn_lable">(বিয়ের পর চাকরি করতে চান)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="post_marriage_job"
                                    id="yes" value="yes">
                                <span class="radio-label">If says (যদি বলে)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="post_marriage_job"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>
                        <div class="en_bn_lable">
                            <label class="en_lable">Do you wear hijab</label>
                            <label class="bn_lable">(আপনি কি হিজাব পরেন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="is_hijaban" id="yes"
                                    value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="is_hijaban" id="no"
                                    value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>

                        <div class="en_bn_lable">
                            <label class="en_lable">What is your lineage</label>
                            <label class="bn_lable">(আপনার বংশমর্যাদা কেমন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="lineage" id="good"
                                    value="good">
                                <span class="radio-label">Good (ভাল)</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="lineage" id="better"
                                    value="better">
                                <span class="radio-label">Better (মধ্যম)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="lineage" id="best"
                                    value="best">
                                <span class="radio-label">Best (উত্তম)</span>
                            </label>
                        </div>
                        <div class="en_bn_lable">
                            <label class="en_lable">What are your personality traits</label>
                            <label class="bn_lable">(আপনার চারিত্রিক বৈশিষ্ট্য কেমন)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="personality_trait"
                                    id="good" value="good">
                                <span class="radio-label">Good (ভাল)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="personality_trait"
                                    id="better" value="better">
                                <span class="radio-label">Better (মধ্যম)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="personality_trait"
                                    id="best" value="best">
                                <span class="radio-label">Best (উত্তম)</span>
                            </label>
                        </div>
                        <div class="en_bn_lable">
                            <label class="en_lable">You may have had a past relationship with someone who is against Islam,
                                which could have a negative impact on your future marital relationship</label>
                            <label class="bn_lable">(আপনার অতিতে ইসলাম এর সাথে সাংঘর্ষিক হয় এমন কারো সাথে সম্পর্ক ছিলো, যার
                                কারনে ভবিষৎ বৈবাহিক সম্পর্কে বিরূপ প্রভাব পড়তে পারে)</label>
                        </div>
                        <div class="option-group">
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="previous_marriage_problem"
                                    id="yes" value="yes">
                                <span class="radio-label">Yes (হ্যাঁ)</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" class="radio-input"  name="previous_marriage_problem"
                                    id="no" value="no">
                                <span class="radio-label">No (না)</span>
                            </label>
                        </div>
                    </div>
                    <button disabled type="submit" class="submit-btn mt-3">Next</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showForm('men'); // You can change to 'women' if needed
        });

        document.querySelectorAll('.gender-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                showForm(button.dataset.gender);
            });
        });

        function showForm(gender) {
            // Remove 'active' class from all buttons and forms
            document.getElementById('genderInput').value = gender;
            document.querySelectorAll('.gender-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.form-section').forEach(form => form.classList.remove('active'));

            // Add 'active' to the selected button and form
            if (gender === 'men') {
                document.getElementById('menForm').classList.add('active');
                var $tab = $('#menForm');
                if (!$tab.hasClass('active')) {
                    // Find all required inputs and disable them temporarily
                    $tab.find('[required]').each(function() {
                        $(this).data('was-required', true); // mark it
                        $(this).prop('required', false); // disable validation
                    });
                } else {
                    // Find all required inputs and enable them
                    $tab.find('.radio-input').each(function() {
                        $(this).prop('required', true); // enable validation
                    });
                }
                document.querySelector('.gender-btn[data-gender="men"]').classList.add('active');
            } else if (gender === 'women') {
                document.getElementById('womenForm').classList.add('active');
                var $tab2 = $('#menForm');
                if (!$tab2.hasClass('active')) {
                    // Find all required inputs and disable them temporarily
                    $tab2.find('[required]').each(function() {
                        $(this).data('was-required', true); // mark it
                        $(this).prop('required', false); // disable validation
                    });
                } else {
                    // Find all required inputs and enable them
                    $tab2.find('.radio-input').each(function() {
                        $(this).prop('required', true); // enable validation
                    });
                }
                document.querySelector('.gender-btn[data-gender="women"]').classList.add('active');
            }
        }
    </script>
    <script>
        function enableButtonIfValid(containerSelector, buttonSelector) {
            function check() {
                let allFilled = true;

                console.log('--- Validating Required Inputs ---');

                const $requiredFields = $(`${containerSelector} [required]`);

                // To track checked radio groups
                const radioGroupsChecked = {};

                $requiredFields.each(function(index) {
                    const $input = $(this);
                    const tag = $input.prop('tagName').toLowerCase();
                    const type = $input.attr('type');
                    const name = $input.attr('name');
                    const value = $.trim($input.val());
                    const identifier = name || $input.attr('id') || `Input ${index + 1}`;

                    if (type === 'radio') {
                        if (!radioGroupsChecked[name]) {
                            const $group = $(`${containerSelector} input[type="radio"][name="${name}"]`);
                            const oneChecked = $group.is(':checked');

                            radioGroupsChecked[name] = true; // mark as handled

                            console.log(`[radio] ${name}: ${oneChecked ? '✔ checked' : '❌ none checked'}`);

                            if (!oneChecked) {
                                allFilled = false;
                                return false;
                            }
                        }
                    } else if (type === 'checkbox') {
                        const isChecked = $input.is(':checked');
                        console.log(`[checkbox] ${identifier}: ${isChecked ? '✔ checked' : '❌ not checked'}`);

                        if (!isChecked) {
                            allFilled = false;
                            return false;
                        }
                    } else if (tag === 'select' && value === "") {
                        console.warn(`❌ Missing select: ${identifier}`);
                        allFilled = false;
                        return false;
                    } else if (tag !== 'select' && value === "") {
                        console.warn(`❌ Missing input: ${identifier}`);
                        allFilled = false;
                        return false;
                    } else {
                        console.log(`[${tag}] ${identifier}: "${value}" ✔`);
                    }
                });

                $(buttonSelector).prop("disabled", !allFilled);
                console.log(`Button ${allFilled ? 'ENABLED' : 'DISABLED'}`);
            }

            // Re-check when any required input changes
            $(`${containerSelector} [required]`).on("input change", check);

            check(); // Initial run
        }


        enableButtonIfValid("#form", ".submit-btn");
    </script>
@endpush
