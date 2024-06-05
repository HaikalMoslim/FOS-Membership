<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Location;
use App\Models\ProductOutlet;
use App\Models\Ads;

class FrontendController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $totalOutletLocation = Location::count();
        $totalProductsOutlet = ProductOutlet::count();
        $totalPromotion = Ads::count();

        return view('admin.index', compact('totalCategories','totalProducts','totalOrders','totalAllUsers','totalUser','totalAdmin','totalOutletLocation','totalProductsOutlet','totalPromotion'));
    }
}
