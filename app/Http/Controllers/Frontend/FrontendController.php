<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOutlet;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Location;
use App\Models\Ads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        $promotions = Ads::where('status', '1')->get();

        $user_products_tops = [];
        $user_products_bottoms = [];

        if (auth()->check()) {
            $user = auth()->user();

            $color_preferences = explode(',', strtolower($user->color_preference));
            $style_preferences = explode(',', strtolower($user->style_preference));
            $fit_preferences = explode(',', strtolower($user->fit_preference));
            $pattern_preferences = explode(',', strtolower($user->pattern_preference));
            $gender_preference = strtolower($user->gender);
            $clothing_types = explode(',', $user->clothing_type);

            // Filter tops based on user preferences
            $user_products_tops = Product::where(function ($query) use ($color_preferences, $style_preferences, $fit_preferences, $pattern_preferences, $clothing_types) {
                foreach ($color_preferences as $color) {
                    $query->orWhere('color', 'LIKE', $color);
                }

                foreach ($style_preferences as $style) {
                    $query->orWhere('style', 'LIKE', $style);
                }

                foreach ($fit_preferences as $fit) {
                    $query->orWhere('fit_type', 'LIKE', $fit);
                }

                foreach ($pattern_preferences as $pattern) {
                    $query->orWhere('pattern', 'LIKE', $pattern);
                }

                $query->orWhereIn('clothing_type', $clothing_types);
            })->whereHas('category', function ($query) use ($gender_preference) {
                $query->where('name', 'LIKE', $gender_preference);
            })->where('clothing_type', 'top')->take(5)->get();

            // Filter bottoms based on user preferences
            $user_products_bottoms = Product::where(function ($query) use ($color_preferences, $style_preferences, $fit_preferences, $pattern_preferences, $clothing_types) {
                foreach ($color_preferences as $color) {
                    $query->orWhere('color', 'LIKE', $color);
                }

                foreach ($style_preferences as $style) {
                    $query->orWhere('style', 'LIKE', $style);
                }

                foreach ($fit_preferences as $fit) {
                    $query->orWhere('fit_type', 'LIKE', $fit);
                }

                foreach ($pattern_preferences as $pattern) {
                    $query->orWhere('pattern', 'LIKE', $pattern);
                }

                $query->orWhereIn('clothing_type', $clothing_types);
            })->whereHas('category', function ($query) use ($gender_preference) {
                $query->where('name', 'LIKE', $gender_preference);
            })->where('clothing_type', 'bottom')->take(5)->get();
        }

        return view('frontend.index', compact('featured_products', 'trending_category', 'promotions', 'user_products_tops', 'user_products_bottoms'));
    }

    public function category()
    {
        $category = Category::where('status', '1')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status',"Slug does not exists");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $products->id)->get();

                if($ratings->count() > 0)
                {
                    $rating_value = $rating_sum/$ratings->count();
                }
                else{
                    $rating_value=0;
                }

                return view('frontend.products.view',compact('products','ratings','reviews','rating_value','user_rating'));
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"No such category found");
        }
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','1')->get();
        $data = [];

        foreach($products as $item)
        {
            $data[] = $item['name'];
        }
        
        return $data; 
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if($searched_product !="")
        {
            $product = Product::where("name", "LIKE","%$searched_product")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status", "No products matched your search");
            }
        }
        else{
            return redirect()->back();
        }
    }
    
    public function showMap()
    {
        $locations = Location::where('active','1')->get();
        return view('frontend.locations.map', compact('locations'));
    }

    public function viewmap($id)
    {
        if(Location::where('id', $id)->exists())
        {
            $locations = Location::where('id', $id)->where('active', '1')->first();
            $trendingProducts = $locations->productOutlet()->where('trending', 1)->get();
            return view('frontend.locations.view', compact('locations', 'trendingProducts'));
        }
        else {
            return redirect('/')->with('status', "Location does not exist");
        }
    }
}