@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')

<div class="py-3 mb-3 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('profile')}}">
                Profile
            </a>
        </h6>
    </div>
</div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Profile View
                            <a href="{{url('/')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Profile Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border">{{$user->name}}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{$user->lname}}</div>
                                <label for="">Email</label>
                                <div class="border">{{$user->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border">{{$user->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border">
                                    {{$user->address1}}, <br>
                                    {{$user->address2}}, <br>
                                    {{$user->city}}, <br>
                                    {{$user->state}},
                                    {{$user->country}}
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border">{{$user->postalcode}}</div>
                                <hr>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>

                                <!-- Edit Profile Modal -->
                                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.profile') }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <!-- Your form fields go here, e.g., -->
                                                    <div class="mb">
                                                        <label for="name" class="form-label">First Name:</label>
                                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="lname" class="form-label">Last Name:</label>
                                                        <input type="text" name="lname" value="{{ $user->lname }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="phone" class="form-label">Phone:</label>
                                                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="address1" class="form-label">Address 1:</label>
                                                        <input type="text" name="address1" value="{{ $user->address1 }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="address2" class="form-label">Address 2:</label>
                                                        <input type="text" name="address2" value="{{ $user->address2 }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="city" class="form-label">City:</label>
                                                        <input type="text" name="city" value="{{ $user->city }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="state" class="form-label">State:</label>
                                                        <input type="text" name="state" value="{{ $user->state }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="country" class="form-label">Country:</label>
                                                        <input type="text" name="country" value="{{ $user->country }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb">
                                                        <label for="postalcode" class="form-label">Postal Code:</label>
                                                        <input type="text" name="postalcode" value="{{ $user->postalcode }}" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">New Password (leave blank to keep the current password):</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">
                                    Delete Profile
                                </button>

                                <!-- Delete Profile Modal -->
                                <div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteProfileModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete your profile? This action cannot be undone.</p>
                                                <form action="{{ route('delete.profile') }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Confirm Password to Delete:</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Delete Profile</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Total Points</h4>
                                <hr>
                                <h2 class="text-center">{{$user->points}}</h2>
                                <hr>
                                <a href="{{url('point-history/')}}" class="btn btn-warning">Point History</a>
                                <a href="{{url('voucher-history/')}}" class="btn btn-warning float-end">Rewards</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
