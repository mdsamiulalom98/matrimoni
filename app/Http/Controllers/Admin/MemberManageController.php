<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Member;
use App\Models\MemberInfo;
use App\Models\Religion;

class MemberManageController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Member::latest();
        $basicinfos = MemberInfo::orderBy('id', 'DESC')->select('id', 'member_id', 'dob', 'age')->get();

        if ($request->start_date && $request->end_date) {
            $show_data = $show_data->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $show_data = $show_data->get();
        // return $show_data;

        $religions = Religion::get();

        return view('backEnd.member.index', compact('show_data'));
    }

    public function edit($id)
    {
        $edit_data = Member::find($id);
        return view('backEnd.member.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
        ]);

        $input = $request->all();
        $update_data = Member::find($request->id);

        $update_data->update($input);

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('members.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Member::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->publish = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Member::find($request->hidden_id);
        $active->publish = 1;
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }
    public function adminlog(Request $request)
    {
        Auth::guard('member')->loginUsingId($request->member_id);
        return redirect()->route('member.editprofile');
    }

    public function profile(Request $request)
    {
        $profile = Member::find($request->id);
        return view('backEnd.member.profile', compact('profile'));
    }

}
