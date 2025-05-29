<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Package;
use App\Models\PackageInfo;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $data = Package::latest()->with('infos');
        if ($request->keyword) {
            $data = $data->where('name', 'LIKE', '%' . $request->keyword . "%");
        }
        $data = $data->paginate(50);
        return view('backEnd.package.index', compact('data'));
    }


    public function create()
    {
        return view('backEnd.package.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'title' => 'required',
        ]);

        $input = $request->except(['icon', 'ititle']);

        $input['status'] = $request->status ? 1 : 0;
        $input['popular'] = $request->popular ? 1 : 0;

        $save_data = Package::create($input);

        if ($request->icon) {
            $icons = array_filter($request->icon);

            $ititle = $request->ititle;
            if (is_array($icons)) {
                foreach ($icons as $key => $icon) {
                    $variable = new PackageInfo();
                    $variable->package_id = $save_data->id;
                    $variable->title = isset($ititle[$key]) ? $ititle[$key] : null;
                    $variable->icon = $icon;
                    $variable->save();
                }
            }
        }


        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('packages.index');
    }


    public function edit($id)
    {
        $edit_data = Package::find($id);

        $packageinfos = PackageInfo::where('package_id', $id)->get();
        return view('backEnd.package.edit', compact('edit_data', 'packageinfos'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'title' => 'required',
        ]);

        $update_data = Package::find($request->id);

        $input = $request->except(['icon', 'ititle', 'up_icon', 'up_ititle', 'up_id']);

        $input['status'] = $request->status ? 1 : 0;
        $input['popular'] = $request->popular ? 1 : 0;
        $update_data->update($input);


        if ($request->up_id) {
            $update_ids = array_filter($request->up_id);
            $up_icon = $request->up_icon;
            $up_ititle = $request->up_ititle;

            if ($update_ids) {
                foreach ($update_ids as $key => $update_id) {
                    $upvariable = PackageInfo::find($update_id);

                    $upvariable->package_id = $update_data->id;
                    $upvariable->title = isset($up_ititle[$key]) ? $up_ititle[$key] : null;
                    $upvariable->icon = $up_icon[$key];
                    $upvariable->save();
                }
            }
        }


        if ($request->icon) {
            $icons = array_filter($request->icon);

            $ititle = $request->ititle;
            if (is_array($icons)) {
                foreach ($icons as $key => $icon) {
                    $variable = new PackageInfo();
                    $variable->package_id = $update_data->id;
                    $variable->title = isset($ititle[$key]) ? $ititle[$key] : null;
                    $variable->icon = $icon;
                    $variable->save();
                }
            }
        }

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('packages.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Package::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Package::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Package::find($request->hidden_id);
        foreach ($delete_data->variables as $variable) {
            $variable->delete();
        }

        $delete_data->delete();
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }
    public function pricedestroy(Request $request)
    {
        $delete_data = PackageInfo::find($request->id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success', 'Package price delete successfully');
        return redirect()->back();
    }


}
