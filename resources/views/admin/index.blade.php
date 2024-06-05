@extends('layouts.admin')

@section('title')
    Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Welcome {{ auth()->user()->name }}</h1>
        </div>
        <hr style="border-color: #000000;">
        <div class="row">
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label class="text-white">Total Categories</label>
                    <h1>{{$totalCategories}}</h1>
                    <a href="{{ url('categories')}}" class="text-white">view</a>
                </div>
            </div>
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label class="text-white">Total Products</label>
                    <h1>{{$totalProducts}}</h1>
                    <a href="{{ url('products')}}" class="text-white">view</a>
                </div>
            </div>
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label class="text-white">Total Orders</label>
                    <h1>{{$totalOrders}}</h1>
                    <a href="{{ url('orders')}}" class="text-white">view</a>
                </div>
            </div>
        </div>
        <hr style="border-color: #000000;">
        <div class="row">
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label class="text-white">Total All Users</label>
                    <h1>{{$totalAllUsers}}</h1>
                    <a href="{{ url('users')}}" class="text-white">view</a>
                </div>
            </div>
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label class="text-white">Customers</label>
                    <h1>{{$totalUser}}</h1>
                </div>
            </div>
            <div class="col-md-3 ml-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label class="text-white">Admins</label>
                    <h1>{{$totalAdmin}}</h1>
                </div>
            </div>
        </div>
        <hr style="border-color: #000000;">
        <div class="row">
            <div class="col-md-3 ml-3 mb-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label class="text-white">Total Outlet Locations</label>
                    <h1>{{$totalOutletLocation}}</h1>
                    <a href="{{ url('outlet_location')}}" class="text-white">view</a>
                </div>
            </div>
            <div class="col-md-3 ml-3 mb-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label class="text-white">Total Products Outlet</label>
                    <h1>{{$totalProductsOutlet}}</h1>
                    <a href="{{ url('product_outlets')}}" class="text-white">view</a>
                </div>
            </div>
            <div class="col-md-3 ml-3 mb-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label class="text-white">Total Promotion</label>
                    <h1>{{$totalPromotion}}</h1>
                    <a href="{{ url('promotion')}}" class="text-white">view</a>
                </div>
            </div>
        </div>
    </div>
@endsection
