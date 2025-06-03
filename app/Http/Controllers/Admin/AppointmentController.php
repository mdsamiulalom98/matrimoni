<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Brian2694\Toastr\Facades\Toastr;

class AppointmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:appointment-list|appointment-create|appointment-edit|appointment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:appointment-create', ['only' => ['create','store']]);
         $this->middleware('permission:appointment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:appointment-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $show_data = Appointment::orderBy('id','DESC')->paginate(15);
        // return $show_data;
        return view('backEnd.appointment.index',compact('show_data'));
    }
    public function create()
    {
        $categories = Appointment::orderBy('id','DESC')->select('id','name')->get();
        return view('backEnd.appointment.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        Appointment::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('banner_category.index');
    }
    
    public function edit($id)
    {
        $edit_data = Appointment::find($id);
        return view('backEnd.appointment.edit',compact('edit_data'));
    }
    

    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $update_data = Appointment::find($request->id);
        $input = $request->all();
        $input['status'] = $request->status?1:0;
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('banner_category.index');
    }

    public function view($id)
    {
        $profile = Appointment::find($id);
        // return $profile;
        return view('backEnd.appointment.profile',compact('profile'));
    }

 
    public function inactive(Request $request)
    {
        $inactive = Appointment::find($request->hidden_id);
        $inactive->status = 'Pending';
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Appointment::find($request->hidden_id);
        $active->status = 'Approved';
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Appointment::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
