<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index',compact('locations'));
    }

    public function add()
    {
        return view('admin.location.add');
    }

    public function insert(Request $request)
    {
        $locations = new Location();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/locations/',$filename);
            $locations->image=$filename;
        }
        $locations->name = $request->input('name');
        $locations->address = $request->input('address');
        $locations->latitude = $request->input('latitude');
        $locations->longitude = $request->input('longitude');
        $locations->telno = $request->input('telno');
        $locations->mobileno = $request->input('mobileno');
        $locations->email = $request->input('email');
        $locations->operation = $request->input('operation');
        $locations->active = $request->input('active') == TRUE ? '1':'0';
        $locations->save();
        return redirect('outlet_location')->with('status',"Location Added Successfully");
    }

    public function edit($id)
    {
        $locations = Location::find($id);
        return view('admin.location.edit', compact('locations'));
    }

    public function update(Request $request, $id)
    {
        $locations = Location::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/locations/'.$locations->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/locations/',$filename);
            $locations->image=$filename;
        }
        $locations->name = $request->input('name');
        $locations->address = $request->input('address');
        $locations->latitude = $request->input('latitude');
        $locations->longitude = $request->input('longitude');
        $locations->telno = $request->input('telno');
        $locations->mobileno = $request->input('mobileno');
        $locations->email = $request->input('email');
        $locations->operation = $request->input('operation');
        $locations->active = $request->input('active') == TRUE ? '1':'0';
        $locations->update();
        return redirect('outlet_location')->with('status',"Location Updated Successfully");
    }

    public function destroy($id)
    {
        $locations = Location::find($id);
        if($locations->image)
        {
            $path = 'assets/uploads/locations/'.$locations->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $locations->delete();
        return redirect('outlet_location')->with('status', "Location Deleted Successfully");
    }
}
