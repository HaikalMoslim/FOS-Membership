<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Location;
use Illuminate\Support\Facades\File;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Ads::all();
        return view('admin.ads.index', compact('promotions'));
    }

    public function add()
    {
        $location = Location::all();
        return view('admin.ads.add', compact('location'));
    }

    public function insert(Request $request)
    {
        $promotions = new Ads();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/promotion/',$filename);
            $promotions->image=$filename;
        }
        $promotions->outlet_id = $request->input('outlet_id');
        $promotions->name = $request->input('name');
        $promotions->description = $request->input('description');
        $promotions->start_date = $request->input('start_date');
        $promotions->end_date = $request->input('end_date');
        $promotions->status = $request->input('status') == TRUE ? '1':'0';
        $promotions->save();
        return redirect('promotion')->with('status',"Promotion Added Successfully");
    }

    public function edit($id)
    {
        $promotions = Ads::find($id);
        return view('admin.ads.edit', compact('promotions'));
    }

    public function update(Request $request, $id)
    {
        $promotions = Ads::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/promotion/'.$promotions->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/promotion/',$filename);
            $promotions->image=$filename;
        }
        $promotions->name = $request->input('name');
        $promotions->description = $request->input('description');
        $promotions->start_date = $request->input('start_date');
        $promotions->end_date = $request->input('end_date');
        $promotions->status = $request->input('status') == TRUE ? '1':'0';
        $promotions->update();
        return redirect('promotion')->with('status',"Promotion Updated Successfully");
    }

    public function destroy($id)
    {
        $promotions = Ads::find($id);
        if($promotions->image)
        {
            $path = 'assets/uploads/promotion/'.$promotions->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $promotions->delete();
        return redirect('promotion')->with('status', "Promotion Deleted Successfully");
    }
}
