<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view ('admin.colors.index', compact('colors'));
    }

    public function add()
    {
        return view ('admin.colors.add');
    }

    public function insert(Request $request)
    {
        $colors = new Color();

        $colors->name = $request->input('name');
        $colors->code = $request->input('code');;
        $colors->status = $request->input('status') == TRUE?'1':'0';
        $colors->save();
        return redirect('colors')->with('status', "Color Added Successfully");
    }
}
