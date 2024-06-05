@extends('layouts.front')

@section('title')
    Point History
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
            </a> /
            <a class ="route-nav" href="{{url('point-history')}}">
                Point History
            </a>
        </h6>
    </div>
</div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Point History
                        <a href="{{url('profile/')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Purchase Tracking Number</th>
                                <th>Total Points Collected</th>
                                <th>Receive Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                                <tr>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection