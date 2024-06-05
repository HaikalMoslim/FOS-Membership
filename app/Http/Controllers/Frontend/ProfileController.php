<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.profile.index', compact('user'));
    }

    public function deleteProfile(Request $request)
    {
        $user = Auth::user();

        // Check if the provided password matches the user's current password
        if (Hash::check($request->password, $user->password)) {
            // Delete the user account
            $user->delete();

            // Logout the user
            Auth::logout();

            // Redirect to the homepage or any other page after deletion
            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        } else {
            // If password doesn't match, redirect back with an error message
            return redirect()->back()->with('error', 'Incorrect password. Please try again.');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postalcode' => 'required|string|max:20',
            'password' => 'nullable|string|min:8',
        ]);

        // Update the user profile
        $user->update([
            'name' => $request->input('name'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address1' => $request->input('address1'),
            'address2' => $request->input('address2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'postalcode' => $request->input('postalcode'),
            // Add other fields as needed
        ]);
    
        // Update the password if provided
        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }
    
        return redirect('profile')->with('success', 'Your account has been updated successfully.');
    }

    public function pointHistory()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.profile.point', compact('user','orders'));
    }

    public function voucher()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->get();
        $vouchers = Voucher::where('user_id', Auth::id())->get();
        return view('frontend.profile.reward', compact('user','orders','vouchers'));
    }
}
