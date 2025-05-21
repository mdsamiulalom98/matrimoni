<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Agent;

class AgentManageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:agent-list|agent-create|agent-edit|agent-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:agent-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:agent-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:agent-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->keyword) {
            $show_data = Agent::orWhere('phone', $request->keyword)->orWhere('name', $request->keyword)->paginate(20);
        } else {
            $show_data = Agent::paginate(20);
        }

        return view('backEnd.agent.index', compact('show_data'));
    }

    public function edit($id)
    {
        $edit_data = Agent::find($id);
        return view('backEnd.agent.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $input = $request->except('hidden_id');
        $update_data = Agent::find($request->hidden_id);
        // new password

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        // new image
        $image = $request->file('image');
        if ($image) {
            // image with intervention
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/agent/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 100;
            $height = 100;
            $img->height() > $img->width() ? $width = null : $height = null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        } else {
            $input['image'] = $update_data->image;
        }
        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('agents.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Agent::find($request->hidden_id);
        $inactive->status = 'inactive';
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Agent::find($request->hidden_id);
        $active->status = 'active';
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }
    public function profile(Request $request)
    {
        $profile = Agent::with('members')->find($request->id);
        return view('backEnd.agent.profile', compact('profile'));
    }
    public function adminlog(Request $request)
    {
        $agent = Agent::find($request->hidden_id);
        Auth::guard('agent')->loginUsingId($agent->id);
        return redirect()->route('agent.account');
    }
}
