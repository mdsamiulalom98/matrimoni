<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Agent;
use App\Models\Member;
use App\Models\MemberInfo;
use App\Models\MemberCareer;
use App\Models\MemberEducation;
use App\Models\MemberLocation;
use App\Models\MemberImage;
use App\Models\Monthname;
use App\Models\Religion;
use App\Models\Education;
use App\Models\Profession;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use DateTime;

class AgentController extends Controller
{
    function __construct()
    {
        $this->middleware('agent', ['except' => ['register', 'signin', 'store']]);
    }
    public function account()
    {
        return view('frontEnd.agent.account');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:agents|digits:11',
            'password' => 'required|min:6'
        ]);

        $store = new Agent();
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->address = $request->address;
        $store->password = bcrypt($request->password);
        $store->verifyToken = rand(1111, 9999);
        $store->agent_type = $request->agent_type;
        $store->nid_passport = $request->nid_passport;
        $store->nid_image = $request->nid_image;
        $store->status = 'active';
        $store->save();

        Toastr::success('Success', 'Account Create Successfully');
        return redirect()->route('agent.login');
    }



    public function signin(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'password' => 'required',
        ]);
        $agentCheck = Agent::where('phone', $request->phone)->first();

        if ($agentCheck) {
            if ($agentCheck->status != 'active') {
                Toastr::success('আপনার অ্যাকাউন্ট স্থগিত করা হয়েছে');
                Session::put('phoneverify', $agentCheck->phone);

                return redirect()->route('agent.account');
            } else {
                $credentials = ['phone' => $request->phone, 'password' => $request->password];
                if (Auth::guard('agent')->attempt($credentials)) {
                    Toastr::success('আপনি লগিন সফল হয়েছে');

                    return redirect()->route('agent.account');
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
        return view('frontEnd.agent.forgotpassword');
    }

    public function forgotsubmit(Request $request)
    {
        $this->validate($request, [
            'phoneNumber' => 'required',
        ]);

        $verified = Agent::where('phoneNumber', $request->phoneNumber)->first();
        if (!$verified) {
            Toastr::error('আপনার ফোন নম্বর আমাদের ডাটাবেসে নেই');
            return redirect()->back();
        } else {
            $verifyToken = rand(1111, 9999);
            // agent id put

            $store_verify = Agent::where('id', $verified->id)->first();
            $store_verify->passResetToken = $verifyToken;
            $store_verify->save();

            Session::put('phoneverify', $request->phoneNumber);

            return redirect()->route('agent.passresetpage');
        }
    }

    public function passresetpage()
    {
        return view('frontEnd.agent.passwordreset');
    }

    public function passResetVerify(Request $request)
    {
        $this->validate($request, [
            'passResetToken' => 'required',
            'password' => 'required',
        ]);

        $verified = Agent::where('phoneNumber', Session::get('phoneverify'))->first();
        $verifydbtoken = $verified->passResetToken;
        $verifyformtoken = $request->passResetToken;
        if ($verifydbtoken == $verifyformtoken) {
            $verified->passResetToken = 1;
            $verified->password = bcrypt(request('password'));
            $verified->save();
            Toastr::error('আপনার একাউন্টের পাসওয়ার্ড পুনরায় রিসেট করা হয়েছে।');
            return redirect()->route('agent.login');
        } else {
            Toastr::error('আপনার ভেরিফিকেশন কোড ভুল হয়েছে।');
            return redirect()->back();
        }
    }

    public function profile_edit(Request $request)
    {
        $profile_edit = Agent::where(['id' => Auth::guard('agent')->user()->id])->firstOrFail();
        return view('frontEnd.agent.editprofile', compact('profile_edit'));
    }

    public function profile_update(Request $request)
    {
        $update_data = Agent::where(['id' => Auth::guard('agent')->user()->id])->firstOrFail();

        $image = $request->file('image');
        if ($image) {
            // image with intervention
            $name =  time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(Str::slug($name));
            $uploadpath = 'public/uploads/agent/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 120;
            $height = 120;
            $img->resize($width, $height);
            $img->save($imageUrl);
        } else {
            $imageUrl = $update_data->image;
        }

        $update_data->name        =   $request->name;
        $update_data->phone       =   $request->phone;
        $update_data->email       =   $request->email;
        $update_data->address     =   $request->address;
        $update_data->district    =   $request->district;
        $update_data->area        =   $request->area;
        $update_data->image       =   $imageUrl;
        $update_data->save();

        Toastr::success('Your profile update successfully', 'Success!');
        return redirect()->route('agent.account');
    }

    public function agentVerifyForm()
    {
        $agent = Agent::where('phone', Session::get('phoneverify'))->select('phone', 'id', 'verifyToken')->first();
        return view('frontEnd.agent.verify', compact('agent'));
    }

    public function agentVerify(Request $request)
    {
        $this->validate($request, [
            'verifyPin' => 'required',
        ]);

        $verified = Agent::where('phoneNumber', Session::get('phoneverify'))->first();
        $verifydbtoken = $verified->verifyToken;
        $verifyformtoken = $request->verifyPin;
        if ($verifydbtoken == $verifyformtoken) {
            $verified->verifyToken = 1;
            $verified->status = 1;
            $verified->save();
            Toastr::success('আপনার একাউন্ট ভেরিফাই হয়েছে');
            $credentials = ['phoneNumber' => $verified->phoneNumber, 'password' => Session::get('initpassword')];
            if (Auth::guard('agent')->attempt($credentials)) {
                Toastr::error('রেজিস্ট্রেশন ফি প্রদান করুন');
                return redirect()->route('agent.editprofile');
            }
        } else {
            Toastr::error('আপনার ভেরিফিকেশন কোড ভুল হয়েছে।');
            return redirect()->back();
        }
    }

    public function member_create()
    {
        $religions = Religion::all();
        $educations = Education::all();
        $professions = Profession::all();
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $months = Monthname::all();
        return view('frontEnd.agent.member.create', compact('religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas', 'months'));
    }

    public function member_store(Request $request) {
        $memberPhone = Member::where('phone', $request->phone)->first();
        if ($memberPhone) {
            Toastr::error('ফোন নম্বর আগে থেকেই আছে', 'Error');
            return redirect()->back();
        }

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
        $verifyToken = rand(1111, 9999);
        $full_name = $request->first_name . ' ' . $request->last_name;
        $store_data = new Member();
        $store_data->name = $full_name;
        $store_data->member_id = Str::random(16);
        $store_data->agent_id = Auth::guard('agent')->user()->id;
        $store_data->phone = $request->phone;
        $store_data->gender = $request->gender;
        $store_data->verifyToken = $verifyToken;
        $store_data->status = 0;
        $store_data->publish = 0;
        $store_data->premium = 0;
        $store_data->premium_date = 0;
        $store_data->profile_lock = $request->profile_lock ?? 0;
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
        $store_info->guardian_phone = $request->guardian_phone;
        $store_info->dob = $dateofbirth;
        $store_info->age = $age;
        $store_info->looking_for = $request->looking_for;
        $store_info->profile_created_by = $request->profile_created_by;
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

        Toastr::success('Member account created successfully!');
        return redirect()->route('agent.account');
    }

    public function my_members() {
        $members = Member::where('agent_id', Auth::guard('agent')->user()->id)->get();
        return view('frontEnd.agent.members', compact('members'));
    }
}

