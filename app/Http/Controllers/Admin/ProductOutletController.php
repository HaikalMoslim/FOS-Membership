<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOutlet;
use App\Models\Location;
use Illuminate\Support\Facades\File;

class ProductOutletController extends Controller
{
    public function index()
    {
        $product_outlets = ProductOutlet::all();
        return view('admin.prodoutlet.index', compact('product_outlets'));
    }

    public function add()
    {
        $location = Location::all();
        return view('admin.prodoutlet.add', compact('location'));
    }

    public function insert(Request $request)
    {
        $product_outlets = new ProductOutlet();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/prodoutlet/',$filename);
            $product_outlets->image=$filename;
        }
        $product_outlets->outlet_id = $request->input('outlet_id');
        $product_outlets->name = $request->input('name');
        $product_outlets->slug = $request->input('slug');
        $product_outlets->original_price = $request->input('original_price');
        $product_outlets->selling_price = $request->input('selling_price');
        $product_outlets->tax = $request->input('tax');
        $product_outlets->quantity = $request->input('quantity');
        $product_outlets->status = $request->input('status') == TRUE ? '1':'0';
        $product_outlets->trending = $request->input('trending') == TRUE ? '1':'0';
        $product_outlets->save();
        return redirect('product_outlets')->with('status',"Product Added Successfully");
    }

    public function edit($id)
    {
        $product_outlets = ProductOutlet::find($id);
        return view('admin.prodoutlet.edit', compact('product_outlets'));
    }

    public function update(Request $request, $id)
    {
        $product_outlets = ProductOutlet::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/prodoutlet/'.$product_outlets->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/prodoutlet/',$filename);
            $product_outlets->image=$filename;
        }
        $product_outlets->name = $request->input('name');
        $product_outlets->slug = $request->input('slug');
        $product_outlets->original_price = $request->input('original_price');
        $product_outlets->selling_price = $request->input('selling_price');
        $product_outlets->tax = $request->input('tax');
        $product_outlets->quantity = $request->input('quantity');
        $product_outlets->status = $request->input('status') == TRUE ? '1':'0';
        $product_outlets->trending = $request->input('trending') == TRUE ? '1':'0';
        $product_outlets->update();
        return redirect('product_outlets')->with('status',"Product Updated Successfully");
    }

    public function destroy($id)
    {
        $product_outlets = ProductOutlet::find($id);
        if($product_outlets->image)
        {
            $path = 'assets/uploads/prodoutlet/'.$product_outlets->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product_outlets->delete();
        return redirect('product_outlets')->with('status', "Product Deleted Successfully");
    }
}
