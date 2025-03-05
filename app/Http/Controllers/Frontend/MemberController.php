<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Member;
use App\Models\MemberInfo;
use App\Models\MemberCareer;
use App\Models\MemberEducation;
use App\Models\MemberLocation;
use App\Models\Monthname;
use App\Models\Education;
use App\Models\Religion;
use App\Models\Profession;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use DateTime;

class MemberController extends Controller
{
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

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'email' => 'required',
            'confirm_email' => 'required',
            'present_upazila' => 'required',
            'present_area' => 'required',
            'present_district' => 'required',
            'present_division' => 'required',
            'description' => 'required',
            'residency_id' => 'required',
            'religion_id' => 'required',
            'profession_id' => 'required',
            'gender' => 'required',
            'inch' => 'required',
            'feet' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'country_id' => 'required',
            'image_one' => 'required',
            'image_two' => 'required',
            'image_three' => 'required',
            'phone' => 'required|unique:members|digits:11',
            'guardian_phone' => 'required',
        ]);
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
        $store_info->member_id = $memberId;
        $store_info->residency_id = $request->residency_id;
        $store_info->country_id = $request->country_id;
        $store_info->religion_id = $request->religion_id;
        $store_info->dob = $dateofbirth;
        $store_info->age = $age;
        $store_info->save();

        // eduction and career information
        $store_career = new MemberCareer();
        $store_career->member_id = $memberId;
        $store_career->profession_id = $request->profession_id;
        $store_career->save();

        $store_education = new MemberEducation();
        $store_education->member_id = $memberId;
        $store_education->education_id = $request->education_id;
        $store_education->save();

        // member image information
        $store_location = new MemberLocation();
        $store_location->member_id = $memberId;
        $store_location->present_district = $request->present_district;
        $store_location->present_upazila = $request->present_upazila;
        $store_location->present_division = $request->present_division;
        $store_location->present_area = $request->present_area;
        $store_location->save();

        // member id put
        Session::put('initpassword', $request->password);
        Session::put('phoneverify', $request->phone);
        Session::put('memberId', $memberId);

        // Toastr::success('মোবাইল নাম্বারে কোড (ওটিপি)পাঠানো হয়েছে');
        // return redirect()->route('verify_form');
        Toastr::success('Your account has been registered');
        return redirect()->back();
    }
    public function login()
    {
        return view('frontEnd.member.login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'password' => 'required',
        ]);
        $memberCheck = Member::where('phone', $request->phone)->first();

        if ($memberCheck) {
            if ($memberCheck->status != 1) {
                Toastr::success('আপনার অ্যাকাউন্ট স্থগিত করা হয়েছে');
                Session::put('phoneverify', $memberCheck->phone);

                return redirect()->route('member.account');
            } else {
                $credentials = ['phone' => $request->phone, 'password' => $request->password];
                if (Auth::guard('member')->attempt($credentials)) {
                    Toastr::success('আপনি লগিন সফল হয়েছে');
                    if (Cart::instance('wishlist')->count() > 0) {
                        return redirect()->route('wishlist');
                    }
                    return redirect()->route('member.account');
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
        $memberInfo = MemberInfo::where('member_id', $member->id)->first();
        $memberCareer = MemberCareer::where('member_id', $member->id)->first();
        $memberEducation = MemberEducation::where('member_id', $member->id)->first();
        $memberLocation = MemberLocation::where('member_id', $member->id)->first();
        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.member.editprofile', compact('member', 'memberInfo', 'months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas', 'memberInfo', 'memberCareer', 'memberEducation', 'memberLocation'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'email' => 'required',
            'confirm_email' => 'required',
            'present_upazila' => 'required',
            'present_area' => 'required',
            'present_district' => 'required',
            'present_division' => 'required',
            'description' => 'required',
            'residency_id' => 'required',
            'religion_id' => 'required',
            'profession_id' => 'required',
            'gender' => 'required',
            'inch' => 'required',
            'feet' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'country_id' => 'required',
            'image_one' => 'required',
            'image_two' => 'required',
            'image_three' => 'required',
            'phone' => 'required|unique:members|digits:11',
            'guardian_phone' => 'required',
        ]);
        $memberId = Auth::guard('member')->user()->id;
        $memberInfo = Member::where('id', $memberId)->first();
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
        $store_info->member_id = $memberId;
        $store_info->residency_id = $request->residency_id;
        $store_info->country_id = $request->country_id;
        $store_info->religion_id = $request->religion_id;
        $store_info->dob = $dateofbirth;
        $store_info->age = $age;
        $store_info->save();

        // eduction and career information
        $store_career = new MemberCareer();
        $store_career->member_id = $memberId;
        $store_career->profession_id = $request->profession_id;
        $store_career->save();

        $store_education = new MemberEducation();
        $store_education->member_id = $memberId;
        $store_education->education_id = $request->education_id;
        $store_education->save();

        // member image information
        $store_location = new MemberLocation();
        $store_location->member_id = $memberId;
        $store_location->present_district = $request->present_district;
        $store_location->present_upazila = $request->present_upazila;
        $store_location->present_division = $request->present_division;
        $store_location->present_area = $request->present_area;
        $store_location->save();

        Session::forget('admin_login');
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
}
