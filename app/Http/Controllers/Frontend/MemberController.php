<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\Facades\Image;
use App\Models\Member;
use App\Models\MemberInfo;
use App\Models\MemberCareer;
use App\Models\MemberEducation;
use App\Models\MemberLocation;
use App\Models\MemberImage;
use App\Models\Monthname;
use App\Models\Education;
use App\Models\Religion;
use App\Models\Profession;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\ProposalRequest;
use App\Models\FavoriteMember;
use App\Models\Agent;
use App\Models\MemberQuery;
use App\Models\PartnerExpectation;
use App\Models\MemberFamily;
use DateTime;

class MemberController extends Controller
{
    function __construct()
    {
        $this->middleware('member', ['except' => ['register', 'signin', 'query_store']]);
    }
    public function account()
    {
        return view('frontEnd.member.account');
    }

    public function register(Request $request)
    {
        $memberPhone = Member::where('phone', $request->phone)->first();
        if ($memberPhone) {
            Toastr::error('ফোন নম্বর আগে থেকেই আছে', 'Error');
            return redirect()->back();
        }

        return $request->all();

        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required',
        //     'email' => 'required',
        //     'confirm_email' => 'required',
        //     'present_upazila' => 'required',
        //     'present_area' => 'required',
        //     'present_district' => 'required',
        //     'present_division' => 'required',
        //     'description' => 'required',
        //     'residency_id' => 'required',
        //     'religion_id' => 'required',
        //     'profession_id' => 'required',
        //     'gender' => 'required',
        //     'inch' => 'required',
        //     'feet' => 'required',
        //     'year' => 'required',
        //     'month' => 'required',
        //     'day' => 'required',
        //     'country_id' => 'required',
        //     'image_one' => 'required',
        //     'image_two' => 'required',
        //     'image_three' => 'required',
        //     'phone' => 'required|unique:members|digits:11',
        //     'guardian_phone' => 'required',
        // ]);
        $verifyToken = rand(1111, 9999);
        $full_name = $request->first_name . ' ' . $request->last_name;
        $store_data = new Member();
        $store_data->name = $full_name;
        $store_data->member_id = Str::random(16);
        $store_data->phone = $request->phone;
        $store_data->gender = $request->gender;
        $store_data->verifyToken = $verifyToken;
        $store_data->status = 0;
        $store_data->publish = 0;
        $store_data->premium = 0;
        $store_data->premium_date = 0;
        $store_data->profile_lock = $request->profile_lock ?? 'only-me';
        $store_data->password = bcrypt(request('password'));
        $store_data->save();
        $memberId = $store_data->id;

        $bdate = $request->day;
        $bmonth = $request->month;
        $byear = $request->year;
        $dateofbirth = $byear . '-' . $bmonth . '-' . $bdate;

        $birthDate = $dateofbirth;
        $birthDateTime = new DateTime($birthDate);
        $todayDateTime = new DateTime();

        // Calculate the difference between the two dates
        $ageInterval = $birthDateTime->diff($todayDateTime);

        // Get the number of years from the DateInterval object
        $age = $ageInterval->y;

        // basic information
        $store_info = new MemberInfo();
        // country_id
        $store_info->member_id = $memberId;
        $store_info->residency_id = $request->residency_id;
        // $store_info->country_id = $request->country_id;
        $store_info->religion_id = $request->religion_id;
        $store_info->guardian_phone = $request->guardian_phone;
        $store_info->dob = $dateofbirth;
        $store_info->age = $age;
        $store_info->height = $request->height;
        $store_info->weight = $request->weight;
        $store_info->blood_group = $request->blood_group;
        $store_info->looking_for = $request->looking_for;
        $store_info->profile_created_by = $request->profile_created_by;
        $store_info->save();

        // eduction and career information
        $store_career = new MemberCareer();
        $store_career->member_id = $memberId;
        $store_career->profession_id = $request->profession_id;
        $store_career->profession_name = $request->profession_name;
        $store_career->job_permanent = $request->job_permanent;
        $store_career->job_type = $request->job_type;
        $store_career->is_student = $request->is_student;
        $store_career->last_education = $request->last_education;
        $store_career->job_duration = $request->job_duration;
        $store_career->save();

        $store_education = new MemberEducation();
        $store_education->member_id = $memberId;
        $store_education->education_id = $request->education_id;
        $store_education->education_end_id = $request->education_end_id;
        $store_education->ssc_gpa = $request->ssc_gpa;
        $store_education->ssc_passing = $request->ssc_passing;
        $store_education->save();

        // member image information
        $store_location = new MemberLocation();
        $store_location->member_id = $memberId;
        $store_location->present_district = $request->present_district;
        // $store_location->present_upazila = $request->present_upazila;
        $store_location->present_division = $request->present_division;
        $store_location->present_area = $request->present_area;
        $store_location->save();

        $store_expectation = new PartnerExpectation();
        $store_expectation->member_id = $memberId;
        $store_expectation->partner_height = $request->partner_height;
        $store_expectation->partner_country = $request->partner_country;
        $store_expectation->marital_status = $request->marital_status;
        $store_expectation->partner_citizenship = $request->partner_citizenship;
        $store_expectation->profession_ids = $request->profession_ids;
        $store_expectation->education_qualification = $request->education_qualification;
        $store_expectation->age = $request->age;
        $store_expectation->complexion = $request->complexion;
        $store_expectation->annual_income = $request->annual_income;
        $store_expectation->economic_situation = $request->economic_situation;
        $store_expectation->drinking_habbit = $request->drinking_habbit;
        $store_expectation->smoking_habbit = $request->smoking_habbit;
        $store_expectation->job_permanent = $request->job_permanent;
        $store_expectation->job_type = $request->job_type;
        $store_expectation->is_student = $request->is_student;
        $store_expectation->last_education = $request->last_education;
        $store_expectation->job_duration = $request->job_duration;
        $store_expectation->save();

        $store_family = new MemberFamily();
        $store_family->member_id = $memberId;
        $store_family->father_name = $request->father_name;
        $store_family->father_profession = $request->father_profession;
        $store_family->father_alive = $request->father_alive;
        $store_family->mother_name = $request->mother_name;
        $store_family->mother_profession = $request->mother_profession;
        $store_family->mother_alive = $request->mother_alive;
        $store_family->brother_count = $request->brother_count;
        $store_family->married_brother = $request->married_brother;
        $store_family->sister_count = $request->sister_count;
        $store_family->married_sister = $request->married_sister;
        $store_family->financial_situation = $request->financial_situation;
        $store_family->guardian_profession = $request->guardian_profession;
        $store_family->save();

        // member image information
        $imageUrl = 'public/uploads/member/default.webp';
        $imageUrl2 = 'public/uploads/member/default.webp';
        $imageUrl3 = 'public/uploads/member/default.webp';
        // image with intervention
        $image = $request->file('image_one');
        if ($image) {
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/member/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 300;
            $height = 300;

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->resizeCanvas($width, $height, 'center', false, '#ffffff');
            $img->save($imageUrl);
        }

        // image with intervention
        $image2 = $request->file('image_two');
        if ($image2) {
            $name2 = time() . '-' . $image2->getClientOriginalName();
            $name2 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name2);
            $name2 = strtolower(preg_replace('/\s+/', '-', $name2));
            $uploadpath2 = 'public/uploads/member/';
            $imageUrl2 = $uploadpath2 . $name2;
            $img2 = Image::make($image2->getRealPath());
            $img2->encode('webp', 90);
            $width2 = 300;
            $height2 = 300;
            $img2->resize($width2, $height2, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->resizeCanvas($width2, $height2, 'center', false, '#ffffff');
            $img2->save($imageUrl2);
        }

        // image with intervention
        $image3 = $request->file('image_three');
        if ($image3) {
            $name3 = time() . '-' . $image3->getClientOriginalName();
            $name3 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name3);
            $name3 = strtolower(preg_replace('/\s+/', '-', $name3));
            $uploadpath3 = 'public/uploads/member/';
            $imageUrl3 = $uploadpath3 . $name3;
            $img3 = Image::make($image3->getRealPath());
            $img3->encode('webp', 90);
            $width3 = 300;
            $height3 = 300;
            $img3->resize($width3, $height3, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img3->resizeCanvas($width3, $height3, 'center', false, '#ffffff');
            $img3->save($imageUrl3);
        }

        $store_memberimage = new MemberImage();
        $store_memberimage->member_id = $store_data->id;
        $store_memberimage->image_one = $imageUrl;
        $store_memberimage->image_two = $imageUrl2;
        $store_memberimage->image_three = $imageUrl3;
        $store_memberimage->save();

        // member id put
        Session::put('initpassword', $request->password);
        Session::put('phoneverify', $request->phone);
        Session::put('memberId', $memberId);

        // Toastr::success('মোবাইল নাম্বারে কোড (ওটিপি)পাঠানো হয়েছে');
        // return redirect()->route('verify_form');
        Auth::guard('member')->loginUsingId($memberId);
        Toastr::success('Your account has been registered');
        return redirect()->back();

    }

    public function query_store(Request $request)
    {
        $input = $request->all();
        // return $input;
        $random = Str::random(8);
        Session::put('memberId', $random);
        $memberSession = Session::get('memberId');
        $input['member_id'] = $memberSession;

        MemberQuery::create($input);
        Toastr::success('Query submitted successfully');
        return redirect()->route('members');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'password' => 'required',
        ]);

        $user = Member::where('phone', $request->phone)->first();

        if ($user) {
            if ($user->status != 1) {
                Toastr::success('আপনার অ্যাকাউন্ট স্থগিত করা হয়েছে');
                Session::put('phoneverify', $user->phone);

                return redirect()->route('members');
            } else {
                $credentials = ['phone' => $request->phone, 'password' => $request->password];

                if (Auth::guard('member')->attempt($credentials)) {
                    Toastr::success('আপনি লগিন সফল হয়েছে');
                    if (Cart::instance('wishlist')->count() > 0) {
                        return redirect()->route('wishlist');
                    }
                    return redirect()->route('members');
                } else {
                    Toastr::error('ভুল পাসওয়ার্ড !');
                    return redirect()->back();
                }
            }
        } else {
            Toastr::error('আপনার কোন একাউন্ট নেই');
            return redirect()->back();
        }
    }

    public function forgotpassword()
    {
        return view('frontEnd.member.forgotpassword');
    }

    public function forgotsubmit(Request $request)
    {
        $this->validate($request, [
            'phoneNumber' => 'required',
        ]);

        $verified = Member::where('phoneNumber', $request->phoneNumber)->first();
        if (!$verified) {
            Toastr::error('আপনার ফোন নম্বর আমাদের ডাটাবেসে নেই');
            return redirect()->back();
        } else {
            $verifyToken = rand(1111, 9999);
            // member id put

            $store_verify = Member::where('id', $verified->id)->first();
            $store_verify->passResetToken = $verifyToken;
            $store_verify->save();

            Session::put('phoneverify', $request->phoneNumber);

            return redirect()->route('member.passresetpage');
        }
    }

    public function passresetpage()
    {
        return view('frontEnd.member.passwordreset');
    }

    public function passResetVerify(Request $request)
    {
        $this->validate($request, [
            'passResetToken' => 'required',
            'password' => 'required',
        ]);

        $verified = Member::where('phoneNumber', Session::get('phoneverify'))->first();
        $verifydbtoken = $verified->passResetToken;
        $verifyformtoken = $request->passResetToken;
        if ($verifydbtoken == $verifyformtoken) {
            $verified->passResetToken = 1;
            $verified->password = bcrypt(request('password'));
            $verified->save();
            Toastr::error('আপনার একাউন্টের পাসওয়ার্ড পুনরায় রিসেট করা হয়েছে।');
            return redirect()->route('member.login');
        } else {
            Toastr::error('আপনার ভেরিফিকেশন কোড ভুল হয়েছে।');
            return redirect()->back();
        }
    }

    public function editProfile()
    {
        $member = Member::findOrFail(Auth::guard('member')->user()->id);
        $memberInfo = MemberInfo::firstOrCreate(
            ['member_id' => $member->id],
            [
                'member_id' => $member->id,
                'residency_id' => 1,
                'country_id' => 1,
                'religion_id' => 1,
                'guardian_phone' => '01',
                'dob' => '1990-01-01',
                'age' => 30
            ]
        );
        $memberCareer = MemberCareer::firstOrCreate(
            ['member_id' => $member->id],
            [
                'member_id' => $member->id,
                'profession_id' => 1
            ]
        );
        $memberEducation = MemberEducation::firstOrCreate(
            ['member_id' => $member->id],
            [
                'member_id' => $member->id,
                'education_id' => 1
            ]
        );
        $memberLocation = MemberLocation::firstOrCreate(
            ['member_id' => $member->id],
            [
                'member_id' => $member->id,
                'present_district' => 1,
                'present_upazila' => 1,
                'present_division' => 1,
                'present_area' => ''
            ]
        );
        $memberImage = MemberImage::firstOrCreate(
            ['member_id' => $member->id],
            [
                'member_id' => $member->id,
                'image_one' => 'public/uploads/member/default.webp',
                'image_two' => 'public/uploads/member/default.webp',
                'image_three' => 'public/uploads/member/default.webp'
            ]
        );

        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.member.editprofile', compact('member', 'memberInfo', 'months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas', 'memberInfo', 'memberCareer', 'memberEducation', 'memberLocation', 'memberImage'));
    }

    public function updateProfile(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required',
        //     'email' => 'required',
        //     'confirm_email' => 'required',
        //     'present_upazila' => 'required',
        //     'present_area' => 'required',
        //     'present_district' => 'required',
        //     'present_division' => 'required',
        //     'description' => 'required',
        //     'residency_id' => 'required',
        //     'religion_id' => 'required',
        //     'profession_id' => 'required',
        //     'gender' => 'required',
        //     'inch' => 'required',
        //     'feet' => 'required',
        //     'year' => 'required',
        //     'month' => 'required',
        //     'day' => 'required',
        //     'country_id' => 'required',
        //     'image_one' => 'required',
        //     'image_two' => 'required',
        //     'image_three' => 'required',
        //     'phone' => 'required|unique:members|digits:11',
        //     'guardian_phone' => 'required',
        // ]);
        $memberId = Auth::guard('member')->user()->id;

        $memberInfo = Member::where('id', $memberId)->first();
        $memberInfo->name = $request->name;
        $memberInfo->phone = $request->phone;
        $memberInfo->email = $request->email;
        $memberInfo->profile_lock = $request->profile_lock ?? 0;
        $memberInfo->save();

        $bdate = $request->day;
        $bmonth = $request->month;
        $byear = $request->year;
        $dateofbirth = $byear . '-' . $bmonth . '-' . $bdate;

        $birthDate = $dateofbirth;
        $birthDateTime = new DateTime($birthDate);
        $todayDateTime = new DateTime();

        // Calculate the difference between the two dates
        $ageInterval = $birthDateTime->diff($todayDateTime);

        // Get the number of years from the DateInterval object
        $age = $ageInterval->y;

        // basic information
        if (!empty($request->memberinfo) && is_numeric($request->memberinfo)) {
            $update_memberinfo = MemberInfo::find($request->memberinfo);
        } else {
            $update_memberinfo = new MemberInfo();
        }
        $update_memberinfo->member_id = $memberId;
        $update_memberinfo->residency_id = $request->residency_id;
        $update_memberinfo->country_id = $request->country_id;
        $update_memberinfo->religion_id = $request->religion_id;
        $update_memberinfo->guardian_phone = $request->guardian_phone;
        $update_memberinfo->dob = $dateofbirth;
        $update_memberinfo->age = $age;
        $update_memberinfo->save();

        // eduction and career information
        if (!empty($request->membercareer) && is_numeric($request->membercareer)) {
            $update_membercareer = MemberCareer::find($request->membercareer);
        } else {
            $update_membercareer = new MemberCareer();
        }
        $update_membercareer->member_id = $memberId;
        $update_membercareer->profession_id = $request->profession_id;
        $update_membercareer->save();

        if (!empty($request->membereducation) && is_numeric($request->membereducation)) {
            $update_membereducation = MemberEducation::find($request->membereducation);
        } else {
            $update_membereducation = new MemberEducation();
        }
        $update_membereducation->member_id = $memberId;
        $update_membereducation->education_id = $request->education_id;
        $update_membereducation->save();

        // member image information
        if (!empty($request->memberlocation) && is_numeric($request->memberlocation)) {
            $update_memberlocation = MemberLocation::find($request->memberlocation);
        } else {
            $update_memberlocation = new MemberLocation();
        }
        $update_memberlocation->member_id = $memberId;
        $update_memberlocation->present_district = $request->present_district;
        $update_memberlocation->present_upazila = $request->present_upazila;
        $update_memberlocation->present_division = $request->present_division;
        $update_memberlocation->present_area = $request->present_area;
        $update_memberlocation->save();

        if (!empty($request->memberimage) && is_numeric($request->memberimage)) {
            $update_memberimage = MemberImage::find($request->memberimage);
            // return $update_memberimage;
        } else {
            $update_memberimage = new MemberImage();
        }
        // member image information
        $image = $request->file('image_one');
        if ($image) {
            // image with intervention
            $image = $request->file('image_one');
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/member/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 300;
            $height = 300;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->resizeCanvas($width, $height, 'center', false, '#ffffff');
            $img->save($imageUrl);
        } else {
            $imageUrl = $update_memberimage->image_one;
        }

        // member image information
        $image2 = $request->file('image_two');
        if ($image2) {
            // image with intervention
            $image2 = $request->file('image_two');
            $name2 = time() . '-' . $image2->getClientOriginalName();
            $name2 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name2);
            $name2 = strtolower(preg_replace('/\s+/', '-', $name2));
            $uploadpath2 = 'public/uploads/member/';
            $imageUrl2 = $uploadpath2 . $name2;
            $img2 = Image::make($image2->getRealPath());
            $img2->encode('webp', 90);
            $width2 = 300;
            $height2 = 300;
            $img2->resize($width2, $height2, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->resizeCanvas($width2, $height2, 'center', false, '#ffffff');
            $img2->save($imageUrl2);
        } else {
            $imageUrl2 = $update_memberimage->image_two;
        }

        // member image information
        $image3 = $request->file('image_three');
        if ($image3) {
            // image with intervention
            $image3 = $request->file('image_three');
            $name3 = time() . '-' . $image3->getClientOriginalName();
            $name3 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name3);
            $name3 = strtolower(preg_replace('/\s+/', '-', $name3));
            $uploadpath3 = 'public/uploads/member/';
            $imageUrl3 = $uploadpath3 . $name3;
            $img3 = Image::make($image3->getRealPath());
            $img3->encode('webp', 90);
            $width3 = 300;
            $height3 = 300;
            $img3->resize($width3, $height3, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img3->resizeCanvas($width3, $height3, 'center', false, '#ffffff');
            $img3->save($imageUrl3);
        } else {
            $imageUrl3 = $update_memberimage->image_three;
        }

        $update_memberimage->member_id = $memberId;
        $update_memberimage->image_one = $imageUrl;
        $update_memberimage->image_two = $imageUrl2;
        $update_memberimage->image_three = $imageUrl3;
        // return $update_memberimage;
        $update_memberimage->save();

        Toastr::success('আপনার সংশোধন সফল হয়েছে');
        return redirect()->route('member.editprofile');
    }

    public function memberVerifyForm()
    {
        $member = Member::where('phoneNumber', Session::get('phoneverify'))->select('phoneNumber', 'id', 'verifyToken')->first();
        return view('frontEnd.member.verify', compact('member'));
    }

    public function memberVerify(Request $request)
    {
        $this->validate($request, [
            'verifyPin' => 'required',
        ]);

        $verified = Member::where('phoneNumber', Session::get('phoneverify'))->first();
        $verifydbtoken = $verified->verifyToken;
        $verifyformtoken = $request->verifyPin;
        if ($verifydbtoken == $verifyformtoken) {
            $verified->verifyToken = 1;
            $verified->status = 1;
            $verified->save();
            Toastr::success('আপনার একাউন্ট ভেরিফাই হয়েছে');
            $credentials = ['phoneNumber' => $verified->phoneNumber, 'password' => Session::get('initpassword')];
            if (Auth::guard('member')->attempt($credentials)) {
                Toastr::error('রেজিস্ট্রেশন ফি প্রদান করুন');
                return redirect()->route('member.editprofile');
            }
        } else {
            Toastr::error('আপনার ভেরিফিকেশন কোড ভুল হয়েছে।');
            return redirect()->back();
        }
    }



    public function sendRequest(Request $request)
    {
        $sender_id = Auth::guard('member')->user()->id;
        $receiver_id = $request->receiver_id;
        // Prevent sending request to self
        if ($sender_id == $receiver_id) {
            Toastr::error('You cannot send request to yourself.', 'Sorry');
            return redirect()->back();
        }

        // Check if request already exists
        $existing = ProposalRequest::where(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $sender_id)->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $receiver_id)->where('receiver_id', $sender_id);
        })->first();

        if ($existing) {
            Toastr::error('Proposal request already exists.', 'Sorry');
            return redirect()->back();
        }

        ProposalRequest::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'status' => 'pending',
        ]);

        Toastr::success('Proposal request sent.', 'Success');
        return redirect()->back();
    }

    public function respondToRequest(Request $request)
    {
        // return $request->all();
        $request_id = $request->id;
        $request->status;
        $friendRequest = ProposalRequest::findOrFail($request_id);

        // Only receiver can respond
        if ($friendRequest->receiver_id != Auth::guard('member')->user()->id) {
            Toastr::success('Unauthorized.');
            return redirect()->back();
        }

        $status = $request->input('status'); // accepted or declined

        if ($status == 'Deny') {
            $approveStatus = 'declined';
        } else if ($status == 'Accept') {
            $approveStatus = 'accepted';
        }
        // return $approveStatus;
        $friendRequest->update(['status' => $approveStatus]);
        Toastr::success('Friend request ' . $status);
        return redirect()->back();
    }

    public function request_view($id)
    {
        return view('frontEnd.layouts.pages.requestpage', compact('id'));
    }

    public function favorite_send(Request $request)
    {
        $member_id = Auth::guard('member')->user()->id;
        $favorite_id = $request->favorite_id;
        // return $favorite_id;
        // Prevent sending request to self
        if ($member_id == $favorite_id) {
            Toastr::error('You cannot send request to yourself.', 'Sorry');
            return redirect()->back();
        }

        // Check if request already exists
        $existing = FavoriteMember::where('member_id', $member_id)
            ->where('favorite_id', $favorite_id)
            ->first();

        if ($existing) {
            Toastr::error('Favorite request already exists.', 'Sorry');
            return redirect()->back();
        }

        FavoriteMember::create([
            'member_id' => $member_id,
            'favorite_id' => $favorite_id,
        ]);

        Toastr::success('Proposal request sent.', 'Success');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }

}
