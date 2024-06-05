<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product added to Wishlist"]);

            }
            else{
                return response()->json(['status' => "Product does not exists"]);
            }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status'=>"Item Remove From Wishlist"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function clearitem()
{
    if(Auth::check())
    {
        Wishlist::where('user_id', Auth::id())->delete();
        return response()->json(['status' => "Wishlist Cleared"]);
    }
    else
    {
        return response()->json(['status' => "Login to Continue"]);
    }
}


    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishcount]);
    }
}
