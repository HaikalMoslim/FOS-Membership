@extends('layouts.admin')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit User
            <a href="{{url('users')}}" class="btn btn-warning float-end">Back</a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <!-- Form for editing user data -->
            <form method="post" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
                @csrf
                @method('PUT') <!-- Use PUT or PATCH method for updating -->

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" value="{{ old('lname', $user->lname) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address1">Address 1:</label>
                    <input type="text" name="address1" value="{{ old('address1', $user->address1) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address2">Address 2:</label>
                    <input type="text" name="address2" value="{{ old('address2', $user->address2) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" name="state" value="{{ old('state', $user->state) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" value="{{ old('country', $user->country) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="postalcode">Postal Code:</label>
                    <input type="text" name="postalcode" value="{{ old('postalcode', $user->postalcode) }}" class="form-control">
                </div>

                <!-- Add other form fields as needed -->

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
@endsection
