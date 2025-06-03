<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
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
use App\Models\PartnerExpectation;
use App\Models\MemberFamily;
use App\Models\SmsGateway;
use App\Models\GeneralSetting;
use DateTime;

class AgentController extends Controller
{
    function __construct()
    {
        $this->middleware('agent', ['except' => ['register', 'signin', 'store', 'agentVerifyForm', 'agentVerify']]);
    }
    public function account()
    {
        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        if (Auth::guard('agent')->user()->agent_id == null) {
            $agent = Agent::find(Auth::guard('agent')->user()->id);
            $agent->agent_id = Str::random(6);
            $agent->save();
        }
        return view('frontEnd.agent.account', compact('months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));
    }


    public function register()
    {
        return view('frontEnd.agent.agentform');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:agents|digits:11',
            'password' => 'required|min:6'
        ]);

        $imageUrl = 'public/uploads/agent/default.webp';
        $verifyToken = rand(1111, 9999);
        $image = $request->file('nid_image');
        if ($image) {
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/agent/';
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

        $store = new Agent();
        $store->agent_id = Str::random(6);
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->address = $request->address;
        $store->password = bcrypt($request->password);
        $store->verifyToken = $verifyToken;
        $store->agent_type = $request->agent_type;
        $store->nid_passport = $request->nid_passport;
        $store->nid_image = $imageUrl;
        $store->status = 'pending';
        $store->save();

        $site_setting = GeneralSetting::where('status', 1)->first();
        $sms_gateway = SmsGateway::where(['status' => 1])->first();
        if ($sms_gateway) {
            $url = "$sms_gateway->url";
            $data = [
                "api_key" => "$sms_gateway->api_key",
                "number" => '88' . $request->phone,
                "type" => 'text',
                "senderid" => "$sms_gateway->serderid",
                "message" => "Your account verify OTP is $verifyToken \r\nThank you for using $site_setting->name",
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
        }

        Session::put('phoneverify', $request->phone);

        Toastr::success('Success', 'Account Create Successfully');
        return redirect()->route('agent.verify');
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
                Toastr::success('Your account has been suspended.');
                Session::put('phoneverify', $agentCheck->phone);

                return redirect()->back();
            } else {
                $credentials = ['phone' => $request->phone, 'password' => $request->password];
                if (Auth::guard('agent')->attempt($credentials)) {
                    Toastr::success('You have successfully logged in.');

                    return redirect()->route('agent.account');
                } else {
                    Toastr::error('Wrong password !');
                    return redirect()->back();
                }
            }
        } else {
            Toastr::error('You do not have an account.');
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
            'phone' => 'required',
        ]);

        $verified = Agent::where('phone', $request->phone)->first();
        if (!$verified) {
            Toastr::error('Your phone number is not in our database.');
            return redirect()->back();
        } else {
            $verifyToken = rand(1111, 9999);
            // agent id put

            $store_verify = Agent::where('id', $verified->id)->first();
            $store_verify->passResetToken = $verifyToken;
            $store_verify->save();

            Session::put('phoneverify', $request->phone);

            return redirect()->route('agent.passresetpage');
        }
    }

    public function forgot_reset()
    {
        return view('frontEnd.agent.passwordreset');
    }

    public function passResetVerify(Request $request)
    {
        $this->validate($request, [
            'passResetToken' => 'required',
            'password' => 'required',
        ]);

        $verified = Agent::where('phone', Session::get('phoneverify'))->first();
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
            $name = time() . '-' . $image->getClientOriginalName();
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

        $update_data->name = $request->name;
        $update_data->phone = $request->phone;
        $update_data->email = $request->email;
        $update_data->address = $request->address;
        $update_data->image = $imageUrl;
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

        $verified = Agent::where('phone', Session::get('phoneverify'))->first();
        $verifydbtoken = $verified->verifyToken;
        $verifyformtoken = $request->verifyPin;
        if ($verifydbtoken == $verifyformtoken) {
            $verified->verifyToken = 1;
            $verified->status = 1;
            $verified->save();
            Toastr::success('আপনার একাউন্ট ভেরিফাই হয়েছে');
            $credentials = ['phone' => $verified->phone, 'password' => Session::get('initpassword')];
            if (Auth::guard('agent')->attempt($credentials)) {
                Toastr::error('রেজিস্ট্রেশন ফি প্রদান করুন');
                return redirect()->route('agent.account');
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

    public function member_store(Request $request)
    {
        $memberPhone = Member::where('phone', $request->phone)->first();
        if ($memberPhone) {
            Toastr::error('ফোন নম্বর আগে থেকেই আছে', 'Error');
            return redirect()->back();
        }

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
        $store_data->email = $request->email;
        $store_data->gender = $request->looking_for == 2 ? 1 : 2;
        $store_data->gender = $request->gender;
        $store_data->verifyToken = $verifyToken;
        $store_data->status = 0;
        $store_data->publish = 0;
        $store_data->premium = 0;
        $store_data->premium_date = 0;
        $store_data->profile_lock = $request->profile_lock ?? 'only-me';
        $store_data->password = bcrypt(request('password'));
        $store_data->about_dream = $request->about_hobby;
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
        $store_career->job_permanent = $request->job_permanent;
        $store_career->job_type = $request->job_type;
        $store_career->is_student = $request->is_student;
        $store_career->last_education = $request->last_education;
        $store_career->job_duration = $request->job_duration;
        $store_career->save();

        $store_education = new MemberEducation();
        $store_education->member_id = $memberId;
        $store_education->is_student_member = $request->is_student_member;
        $store_education->education_end_id = $request->education_end_id;
        $store_education->ssc_gpa = $request->ssc_gpa;
        $store_education->ssc_passing = $request->ssc_passing;
        $store_education->save();

        // member image information
        $store_location = new MemberLocation();
        $store_location->member_id = $memberId;
        $store_location->present_district = $request->present_district;
        $store_location->present_upazila = $request->present_upazila;
        $store_location->present_division = $request->present_division;
        $store_location->present_area = $request->present_area;
        $store_location->grow_up = $request->grow_up;
        $store_location->save();

        $store_expectation = new PartnerExpectation();
        $store_expectation->member_id = $memberId;
        $store_expectation->partner_height = $request->partner_height;
        $store_expectation->marital_status = $request->marital_status;
        $store_expectation->partner_citizenship = $request->partner_citizenship;
        $store_expectation->profession_ids = $request->profession_ids;
        $store_expectation->education_qualification = $request->education_qualification;
        $store_expectation->age = $request->age;
        $store_expectation->complexion = $request->complexion;
        $store_expectation->monthly_income = $request->monthly_income;
        $store_expectation->economic_situation = $request->economic_situation;
        $store_expectation->drinking_habbit = $request->drinking_habbit;
        $store_expectation->smoking_habbit = $request->smoking_habbit;
        $store_expectation->job_permanent = $request->job_permanent;
        $store_expectation->job_type = $request->job_type;
        $store_expectation->is_student = $request->is_student;
        $store_expectation->last_education = $request->last_education;
        $store_expectation->job_duration = $request->job_duration;
        $store_expectation->present_division = $request->present_division;
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
        $store_family->about_family = $request->about_family;
        $store_family->religious_status = $request->religious_status;
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

        Toastr::success('Member account created successfully!');
        return redirect()->route('agent.account');
    }

    public function my_members()
    {
        $members = Member::where('agent_id', Auth::guard('agent')->user()->id)->get();
        return view('frontEnd.agent.members', compact('members'));
    }


    public function change_pass(){
        return view('frontEnd.agent.change_password');
    }

    public function password_update(Request $request)
    {
        $this->validate($request, [
            'old_password'=>'required',
            'new_password'=>'required',
        ]);

        $agent = Agent::find(Auth::guard('agent')->user()->id);
        $hashPass = $agent->password;

        if (Hash::check($request->old_password, $hashPass)) {

            $agent->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            Toastr::success('Success', 'Password changed successfully!');
            return redirect()->route('agent.account');
        }else{
            Toastr::error('Failed', 'Old password not match!');
            return redirect()->back();
        }
    }

    public function transection()
    {
        return view('frontEnd.agent.transection');
    }


    public function logout(Request $request)
    {
        Auth::guard('agent')->logout();
        Toastr::success('You are logout successfully', 'success!');
        return redirect()->route('agent.login');
    }
}

