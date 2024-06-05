<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewUser($id)
    {
        $user = User::find($id);
        return view('admin.users.view', compact('user'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    // Add the method to handle the update (PUT/PATCH) request for editing
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        // Add validation rules for your user update

        // Update user data
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

        // Redirect to the user view or users list after editing
        return redirect()->route('admin.users.view', ['id' => $id])->with('success', 'User updated successfully!');
    }
}
